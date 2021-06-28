<?php

namespace App\Http\Controllers;

use Auth;
use DB;

use Illuminate\Http\Request;
use App\Models\Timeline;
use App\Models\Photo;
use App\Models\GuestBook;
use App\Models\TimelineComment;
use App\Models\GuestBookComment;
use App\Models\Friend;
use App\Models\RequestFriend;
use App\User;

class HomepageController extends Controller
{
	public function getMain(Request $request)
	{
		$user = User::find(Auth::user()->id);
		$user = User::leftjoin('assets',function($q){
                                $q->on('assets.id','=','users.asset_id')
                                    ->on('assets.deleted',DB::raw(0));
                                })
                                ->select(
                                    'users.*'
                                    ,'assets.file_name as asset_file_name'
                                    ,'assets.id as asset_id'
                                    ,'assets.file_extension as asset_file_extension'
                                )
                                ->find($user->id);

        $guest_books = GuestBook::join('users as guestbook_users','guestbook_users.id','=','guest_books.user_id')
                        ->leftjoin('assets as guestbook_assets',function($q){
                            $q->on('guestbook_assets.id','=','guest_books.asset_id')
                                ->on('guestbook_assets.deleted',DB::raw(0));
                        })
                        ->leftjoin('assets as user_assets',function($q){
                            $q->on('user_assets.id','=','guestbook_users.asset_id')
                                ->on('user_assets.deleted',DB::raw(0));
                        })
                        ->leftjoin('guestbook_comments',function($q){
                                    $q->on('guestbook_comments.guestbook_id','=','guest_books.id')
                                        ->on('guestbook_comments.deleted',DB::raw(0));
                        })
                        ->leftjoin('users as guestbook_comment_users','guestbook_comment_users.id','=','guestbook_comments.user_id')
                        ->leftjoin('assets as guestbook_comment_user_assets',function($q){
                                    $q->on('guestbook_comment_user_assets.id','=','guestbook_comment_users.asset_id')
                                        ->on('guestbook_comment_user_assets.deleted',DB::raw(0));
                        })
                        ->where('guest_books.deleted',0)
                        ->select(
                            'guest_books.*'
                            ,'guestbook_assets.id as guestbook_asset_id'
                            ,'guestbook_assets.file_name as guestbook_asset_file_name'
                            ,'guestbook_assets.file_extension as guestbook_asset_file_extension'
                            ,'user_assets.id as user_asset_id'
                            ,'user_assets.file_name as user_asset_file_name'
                            ,'user_assets.file_extension as user_asset_file_extension'
                            ,'guestbook_users.name as user_name'
                            ,'guestbook_comments.id as guestbook_comment_id'
                            ,'guestbook_comments.guestbook_comment as comment'
                            ,'guestbook_comment_users.name as comment_user_name'
                            ,'guestbook_comment_user_assets.file_name as guestbook_comment_user_asset_file_name'
                            ,'guestbook_comment_user_assets.id as guestbook_comment_user_asset_id'
                            ,'guestbook_comment_user_assets.file_extension as guestbook_comment_user_asset_file_extension'
                        )
                        ->orderBy('id','desc')
                        ->get()
                        ->groupBy('id');

        $timelines = Timeline::join('users as timeline_users','timeline_users.id','=','timelines.user_id')
                            ->leftjoin('assets as timeline_assets',function($q){
                                        $q->on('timeline_assets.id','=','timelines.asset_id')
                                            ->on('timeline_assets.deleted',DB::raw(0));
                            })
                            ->leftjoin('assets as user_assets',function($q){
                                        $q->on('user_assets.id','=','timeline_users.asset_id')
                                            ->on('user_assets.deleted',DB::raw(0));
                            })
                            ->leftjoin('timeline_comments', function($q){
                                        $q->on('timeline_comments.timeline_id','=','timelines.id')
                                            ->on('timeline_comments.deleted',DB::raw(0));
                            })
                            ->leftjoin('users as timeline_comment_users','timeline_comment_users.id','=','timeline_comments.user_id')
                            ->leftjoin('assets as timeline_comment_user_assets',function($q){
                                        $q->on('timeline_comment_user_assets.id','=','timeline_comment_users.asset_id')
                                            ->on('timeline_comment_user_assets.deleted',DB::raw(0));
                            })
                            ->where('timelines.deleted',0)
                            //->where('timelines_comments.deleted',0)
                            ->select(
                                'timelines.*'
                                ,'timeline_users.name as user_name'
                                ,'timeline_assets.id as timeline_asset_id'
                                ,'timeline_assets.file_name as timeline_asset_file_name'
                                ,'timeline_assets.file_extension as timeline_asset_file_extension'
                                ,'user_assets.id as user_asset_id'
                                ,'user_assets.file_name as user_asset_file_name'
                                ,'user_assets.file_extension as user_asset_file_extension'
                                ,'timeline_comments.id as timeline_comment_id'
                                ,'timeline_comments.timeline_comment as comment'
                                ,'timeline_comment_users.name as comment_user_name'
                                ,'timeline_comment_user_assets.file_name as timeline_comment_user_asset_file_name'
                                ,'timeline_comment_user_assets.id as timeline_comment_user_asset_id'
                                ,'timeline_comment_user_assets.file_extension as timeline_comment_user_asset_file_extension'
                            )
                            ->orderBy('id','desc')
                            ->get()
                            ->groupBy('id');

        \Log::info($timelines);

        $photos = Photo::join('users','users.id','=','photos.user_id')
                ->leftjoin('assets as photo_assets',function($q){
                        $q->on('photo_assets.id','=','photos.asset_id')
                            ->on('photo_assets.deleted',DB::raw(0));
                        })
                ->leftjoin('assets as user_assets',function($q){
                        $q->on('user_assets.id','=','users.asset_id')
                            ->on('user_assets.deleted',DB::raw(0));
                        })
                        ->where('photos.deleted',0)
                        ->select(
                            'photos.*'
                            ,'photo_assets.file_name as photo_asset_file_name'
                            ,'photo_assets.file_extension as photo_asset_file_extension'
                            ,'photo_assets.id as photo_asset_id'
                            ,'user_assets.id as user_asset_id'
                            ,'user_assets.file_name as user_asset_file_name'
                            ,'user_assets.file_extension as user_asset_file_extension'
                            ,'users.name as user_name'

                        )
                        ->orderBy('id','desc')
                        ->get();
                                
		return view('homepage.main',[
			'user' => $user,
            'timelines' => $timelines,
            'photos' => $photos,
            'guest_books' => $guest_books
		]);
	}

    public function deleteTimeline(Request $request){
        $timeline_id = $request->get('timeline_id');

        $timeline = Timeline::find($timeline_id);
        $timeline->deleted = 1;
        $timeline->save();
    }

    public function deleteTimelineComment(Request $request){
        $timeline_id = $request->get('timeline_id');
        \Log::info("timeline_id???".$timeline_id);

        $timeline = TimelineComment::find($timeline_id);
        $timeline->deleted = 1;
        $timeline->save();
    }

    public function deletePhoto(Request $request){
        $photo_id = $request->get('photo_id');
        
        $photo = Photo::find($photo_id);
        $photo->deleted = 1;
        $photo->save();

    }

    public function deleteGuestbook(Request $request){
        $guestbook_id = $request->get('guestbook_id');

        $guestbook = GuestBook::find($guestbook_id);
        $guestbook->deleted = 1;
        $guestbook->save();
    }

    public function deleteGuestbookComment(Request $request){
        $guestbook_id = $request->get('guestbook_id');

        $guestbook = GuestBookComment::find($guestbook_id);
        $guestbook->deleted = 1;
        $guestbook->save();
    }


    public function addTimeline(Request $request){
        $user = User::find(Auth::user()->id);
        $timeline_title = $request->get('timeline_title');
        $timeline_content = $request->get('timeline_content');
        $asset_id = $request->get('asset_id');

        $timeline = new Timeline;
        $timeline->title = $timeline_title;
        $timeline->content = $timeline_content;
        $timeline->user_id = Auth::user()->id;
        $timeline->asset_id = $asset_id == -1 ? 0 : $asset_id;
        $timeline->save();

        $timeline = Timeline::join('users','users.id','=','timelines.user_id')
                    ->leftjoin('assets as timeline_assets',function($q){
                                $q->on('timeline_assets.id','=','timelines.asset_id')
                                    ->on('timeline_assets.deleted',DB::raw(0));
                    })
                    ->leftjoin('assets as user_assets',function($q){
                                $q->on('user_assets.id','=','users.asset_id')
                                    ->on('user_assets.deleted',DB::raw(0));
                    })
                    ->where('timelines.deleted',0)
                    ->select(
                        'timelines.*'
                        ,'users.name as user_name'
                        ,'timeline_assets.id as timeline_asset_id'
                        ,'timeline_assets.file_name as timeline_asset_file_name'
                        ,'timeline_assets.file_extension as timeline_asset_file_extension'
                        ,'user_assets.id as user_asset_id'
                        ,'user_assets.file_name as user_asset_file_name'
                        ,'user_assets.file_extension as user_asset_file_extension'
                    )

                    ->find($timeline->id);

            return view('homepage.timeline_sample',[
                'timeline' => $timeline,
                'user' => $user

            ]);
    }

    function addTimelineComment(Request $request){
        $user = User::find(Auth::user()->id);
        $request_timeline_comment = $request->get('timeline_comment');
        $timeline_id = $request->get('timeline_id');

        $new_timeline_comment = new TimelineComment;
        $new_timeline_comment->timeline_comment = $request_timeline_comment;
        $new_timeline_comment->timeline_id = $timeline_id;
        $new_timeline_comment->user_id = Auth::user()->id;
        $new_timeline_comment->save();

        $timeline_comment = TimelineComment::join('users','users.id','=','timeline_comments.user_id')
                                            ->leftjoin('assets',function($q){
                                                $q->on('assets.id','=','users.asset_id')
                                                    ->on('assets.deleted',DB::raw(0));
                                            })
                                            ->select(
                                                'timeline_comments.*'
                                                ,'users.name as user_name'
                                                ,'assets.file_name as timeline_comment_user_asset_file_name'
                                                ,'assets.id as timeline_comment_user_asset_id'
                                                ,'assets.file_extension as timeline_comment_user_asset_file_extension'
                                            )
                                            ->find($new_timeline_comment->id);

        $user = User::leftjoin('assets',function($q){
                        $q->on('assets.id','=','users.asset_id')
                            ->on('assets.deleted',DB::raw(0));
                        })
                        ->select(
                            'users.*'
                            ,'assets.file_name as asset_file_name'
                            ,'assets.id as asset_id'
                            ,'assets.file_extension as asset_file_extension'
                        )
                        ->find(Auth::user()->id);

        return view('homepage.timeline_comment_sample',[
            'user' => $user,
            'timeline_comment' => $timeline_comment

        ]);
    }

    function addGuestbookComment(Request $request){
        $user = User::find(Auth::user()->id);
        $request_guestbook_comment = $request->get('guestbook_comment');
        $guestbook_id = $request->get('guestbook_id');

        $new_guestbook_comment = new GuestBookComment;
        $new_guestbook_comment->guestbook_id = $guestbook_id;
        $new_guestbook_comment->guestbook_comment = $request_guestbook_comment;
        $new_guestbook_comment->user_id = Auth::user()->id;
        $new_guestbook_comment->save();

        \Log::info("guestbook_id".$guestbook_id);


        $guestbook_comment = GuestBookComment::join('users','users.id','=','guestbook_comments.user_id')
                                            ->leftjoin('assets',function($q){
                                                $q->on('assets.id','=','users.asset_id')
                                                    ->on('assets.deleted',DB::raw(0));
                                            })
                                            ->select(
                                                'guestbook_comments.*'
                                                ,'users.name as user_name'
                                                ,'assets.file_name as guestbook_comment_user_asset_file_name'
                                                ,'assets.id as guestbook_comment_user_asset_id'
                                                ,'assets.file_extension as guestbook_comment_user_asset_file_extension'
                                            )
                                            ->find($new_guestbook_comment->id);

        $user = User::leftjoin('assets',function($q){
                $q->on('assets.id','=','users.asset_id')
                    ->on('assets.deleted',DB::raw(0));
                })
                ->select(
                    'users.*'
                    ,'assets.file_name as asset_file_name'
                    ,'assets.id as asset_id'
                    ,'assets.file_extension as asset_file_extension'
                )
                ->find(Auth::user()->id);
                \Log::info("guestbook".$guestbook_comment);

        return view('homepage.guestbook_comment_sample',[
            'user' => $user,
            'guestbook_comment' => $guestbook_comment

        ]);

    }

    public function addPhoto(Request $request){
        $user = User::find(Auth::user()->id);
        $photo_title = $request->get('photo_title');
        $photo_content = $request->get('photo_content');
        $asset_id = $request->get('asset_id');

        $photo = new Photo;
        $photo->title = $photo_title;
        $photo->content = $photo_content;
        $photo->user_id = Auth::user()->id;
        $photo->asset_id = $asset_id == -1 ? 0 : $asset_id;
        $photo->save();

        $photo = Photo::join('users','users.id','=','photos.user_id')
                ->leftjoin('assets as photo_assets',function($q){
                        $q->on('photo_assets.id','=','photos.asset_id')
                            ->on('photo_assets.deleted',DB::raw(0));
                        })
                ->leftjoin('assets as user_assets',function($q){
                        $q->on('user_assets.id','=','users.asset_id')
                            ->on('user_assets.deleted',DB::raw(0));
                        })
                        ->where('photos.deleted',0)
                        ->select(
                            'photos.*'
                            ,'photo_assets.file_name as photo_asset_file_name'
                            ,'photo_assets.file_extension as photo_asset_file_extension'
                            ,'photo_assets.id as photo_asset_id'
                            ,'user_assets.id as user_asset_id'
                            ,'user_assets.file_name as user_asset_file_name'
                            ,'user_assets.file_extension as user_asset_file_extension'
                            ,'users.name as user_name'

                        )
                        ->find($photo->id);

            return view('homepage.photo_sample',[
                'photo' => $photo,
                'user' => $user

            ]);


    }
    public function addGuestBook(Request $request){
        $user = User::find(Auth::user()->id);
        $guest_content = $request->get('guest_book');
        $asset_id = $request->get('asset_id');

        $guest_book = new GuestBook;
        $guest_book->user_id = Auth::user()->id;
        $guest_book->board = $guest_content;
        $guest_book->asset_id = $asset_id == -1 ? 0 : $asset_id;
        $guest_book->save();

        $guest_book = GuestBook::join('users','users.id','=','guest_books.user_id')
                        ->leftjoin('assets as guestbook_assets',function($q){
                            $q->on('guestbook_assets.id','=','guest_books.asset_id')
                                ->on('guestbook_assets.deleted',DB::raw(0));
                        })
                        ->leftjoin('assets as user_assets',function($q){
                            $q->on('user_assets.id','=','users.asset_id')
                                ->on('user_assets.deleted',DB::raw(0));
                        })
                        ->where('guest_books.deleted',0)
                        ->select(
                            'guest_books.*'
                            ,'guestbook_assets.id as guestbook_asset_id'
                            ,'guestbook_assets.file_name as guestbook_asset_file_name'
                            ,'guestbook_assets.file_extension as guestbook_asset_file_extension'
                            ,'user_assets.id as user_asset_id'
                            ,'user_assets.file_name as user_asset_file_name'
                            ,'user_assets.file_extension as user_asset_file_extension'
                            ,'users.name as user_name'
                        )
                        ->find($guest_book->id);


            return view('homepage.guestbook_sample',[
                    "user" => $user,
                    "guest_book" => $guest_book

                ]);

    }

    public function addFriends(Request $request){
        $friend_id = $request->get('friend_id');        
    }

    public function getFriend(){

    }
    public function searchFriends(Request $request){
        $friend_id = $request->get('friend_id');

        $user = User::where('user_id',$friend_id)->first();

        if(empty($user))
        {
            return [
                'status' => "failed"
            ];
        }
        else
        {
            return [
                'status' => "success",
                'user' => $user
            ];
        }
    }

    public function friendMain($id){
        $user = User::find($id);
        //$user = User::find(Auth::user()->id);
        $user = User::leftjoin('assets',function($q){
                                $q->on('assets.id','=','users.asset_id')
                                    ->on('assets.deleted',DB::raw(0));
                                })
                                ->select(
                                    'users.*'
                                    ,'assets.file_name as asset_file_name'
                                    ,'assets.id as asset_id'
                                    ,'assets.file_extension as asset_file_extension'
                                )
                                ->find($user->id);

        $guest_books = GuestBook::join('users as guestbook_users','guestbook_users.id','=','guest_books.user_id')
                        ->leftjoin('assets as guestbook_assets',function($q){
                            $q->on('guestbook_assets.id','=','guest_books.asset_id')
                                ->on('guestbook_assets.deleted',DB::raw(0));
                        })
                        ->leftjoin('assets as user_assets',function($q){
                            $q->on('user_assets.id','=','guestbook_users.asset_id')
                                ->on('user_assets.deleted',DB::raw(0));
                        })
                        ->leftjoin('guestbook_comments',function($q){
                                    $q->on('guestbook_comments.guestbook_id','=','guest_books.id')
                                        ->on('guestbook_comments.deleted',DB::raw(0));
                        })
                        ->leftjoin('users as guestbook_comment_users','guestbook_comment_users.id','=','guestbook_comments.user_id')
                        ->leftjoin('assets as guestbook_comment_user_assets',function($q){
                                    $q->on('guestbook_comment_user_assets.id','=','guestbook_comment_users.asset_id')
                                        ->on('guestbook_comment_user_assets.deleted',DB::raw(0));
                        })
                        ->where('guest_books.deleted',0)
                        ->select(
                            'guest_books.*'
                            ,'guestbook_assets.id as guestbook_asset_id'
                            ,'guestbook_assets.file_name as guestbook_asset_file_name'
                            ,'guestbook_assets.file_extension as guestbook_asset_file_extension'
                            ,'user_assets.id as user_asset_id'
                            ,'user_assets.file_name as user_asset_file_name'
                            ,'user_assets.file_extension as user_asset_file_extension'
                            ,'guestbook_users.name as user_name'
                            ,'guestbook_comments.id as guestbook_comment_id'
                            ,'guestbook_comments.guestbook_comment as comment'
                            ,'guestbook_comment_users.name as comment_user_name'
                            ,'guestbook_comment_user_assets.file_name as guestbook_comment_user_asset_file_name'
                            ,'guestbook_comment_user_assets.id as guestbook_comment_user_asset_id'
                            ,'guestbook_comment_user_assets.file_extension as guestbook_comment_user_asset_file_extension'
                        )
                        ->orderBy('id','desc')
                        ->get()
                        ->groupBy('id');

        $timelines = Timeline::join('users as timeline_users','timeline_users.id','=','timelines.user_id')
                            ->leftjoin('assets as timeline_assets',function($q){
                                        $q->on('timeline_assets.id','=','timelines.asset_id')
                                            ->on('timeline_assets.deleted',DB::raw(0));
                            })
                            ->leftjoin('assets as user_assets',function($q){
                                        $q->on('user_assets.id','=','timeline_users.asset_id')
                                            ->on('user_assets.deleted',DB::raw(0));
                            })
                            ->leftjoin('timeline_comments', function($q){
                                        $q->on('timeline_comments.timeline_id','=','timelines.id')
                                            ->on('timeline_comments.deleted',DB::raw(0));
                            })
                            ->leftjoin('users as timeline_comment_users','timeline_comment_users.id','=','timeline_comments.user_id')
                            ->leftjoin('assets as timeline_comment_user_assets',function($q){
                                        $q->on('timeline_comment_user_assets.id','=','timeline_comment_users.asset_id')
                                            ->on('timeline_comment_user_assets.deleted',DB::raw(0));
                            })
                            ->where('timelines.deleted',0)
                            //->where('timelines_comments.deleted',0)
                            ->select(
                                'timelines.*'
                                ,'timeline_users.name as user_name'
                                ,'timeline_assets.id as timeline_asset_id'
                                ,'timeline_assets.file_name as timeline_asset_file_name'
                                ,'timeline_assets.file_extension as timeline_asset_file_extension'
                                ,'user_assets.id as user_asset_id'
                                ,'user_assets.file_name as user_asset_file_name'
                                ,'user_assets.file_extension as user_asset_file_extension'
                                ,'timeline_comments.id as timeline_comment_id'
                                ,'timeline_comments.timeline_comment as comment'
                                ,'timeline_comment_users.name as comment_user_name'
                                ,'timeline_comment_user_assets.file_name as timeline_comment_user_asset_file_name'
                                ,'timeline_comment_user_assets.id as timeline_comment_user_asset_id'
                                ,'timeline_comment_user_assets.file_extension as timeline_comment_user_asset_file_extension'
                            )
                            ->orderBy('id','desc')
                            ->get()
                            ->groupBy('id');

        \Log::info($timelines);

        $photos = Photo::join('users','users.id','=','photos.user_id')
                ->leftjoin('assets as photo_assets',function($q){
                        $q->on('photo_assets.id','=','photos.asset_id')
                            ->on('photo_assets.deleted',DB::raw(0));
                        })
                ->leftjoin('assets as user_assets',function($q){
                        $q->on('user_assets.id','=','users.asset_id')
                            ->on('user_assets.deleted',DB::raw(0));
                        })
                        ->where('photos.deleted',0)
                        ->select(
                            'photos.*'
                            ,'photo_assets.file_name as photo_asset_file_name'
                            ,'photo_assets.file_extension as photo_asset_file_extension'
                            ,'photo_assets.id as photo_asset_id'
                            ,'user_assets.id as user_asset_id'
                            ,'user_assets.file_name as user_asset_file_name'
                            ,'user_assets.file_extension as user_asset_file_extension'
                            ,'users.name as user_name'

                        )
                        ->orderBy('id','desc')
                        ->get();
        return view('homepage.friend_main',[
            'user' => $user,
            'timelines' => $timelines,
            'photos' => $photos,
            'guest_books' => $guest_books

        ]);
    }
}