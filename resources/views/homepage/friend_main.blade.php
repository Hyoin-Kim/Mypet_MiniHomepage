@extends('layouts.master')

@section('style')
<link href="{{ asset('css/main.css') }}" rel="stylesheet">
<style type="text/css">
	
               
</style>
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
@endsection
@section('content')
<div class="container">
<div class="row">
    <div class="col-sm-12">
        <div>
            <div class="content social-timeline">
                <div class="">

                    <div class="row">
                        <div class="col-md-12">
                            <div class="social-wallpaper">
                                <div class="wrap">
                                   <div class="search">
                                      <input type="text" id="note-has-id"class="searchTerm" placeholder="Search your Friend Id!">
                                      <button type="submit" class="searchButton">
                                        <i class="fa fa-search" onclick="searchFriends(this)"></i>
                                     </button>
                                   </div>
                                </div>

                                 <img src="{{ url("/assets/chihiro015.jpg") }}" class="d-block w-100" alt="first" style="width: 500px;height: 360px">

                                <div class="profile-hvr">
                                    <i class="icofont icofont-ui-edit p-r-10"></i>
                                    <i class="icofont icofont-ui-delete"></i>
                                </div>
                            </div>
                            <div class="timeline-btn" data-id="{{$user->id}}">
                                <a href="#" class="btn btn-primary waves-effect waves-light m-r-10" id="timeline-add-friend"onclick="addFriends(this)" >Add Friends</a>
                                <a href="#" class="btn btn-primary waves-effect waves-light" onclick="sendMessages(this)">Send Message</a>
                            </div>

                        </div>
                    </div>

                    <div class="row">
                        <div class="col-xl-3 col-lg-4 col-md-4 col-xs-12">
                            <div class="social-timeline-left">
                                <div class="card">
                                    <div class="social-profile">

                                        
                                        <img class="img-fluid width-100" class="d-block w-100" alt="first" id="avatar2" name="avatar2" @if($user->asset_id != 0) src="{{url('/assets/img/profile/'.$user->asset_file_name.'.'.$user->asset_file_extension)}}" @else src="{{ url("/assets/mononoke111.jpg") }}" @endif style="width: 300px; height: 300px">

                                        <div class="profile-hvr m-t-15">
                                            <i class="icofont icofont-ui-edit p-r-10"></i>
                                            <i class="icofont icofont-ui-delete"></i>
                                        </div>
                                    </div>
                                    <div class="card-block social-follower">
                                        <h4>{{ $user->name }} 님의 펫 {{$user->pet_name}}</h4>
                                        <h5>{{$user->user_info}}</h5>
{{--                                         <div class="row follower-counter">
                                            <div class="col-4">
                                                <a href="{{url('/info/mypage')}}" class="btn btn-primary btn-icon" title="Mypage"data-toggle="tooltip" data-placement="top" title="" data-original-title="485">
                                                    <i class="fa fa-user"></i>
                                                </a>
                                            </div>
                                            <div class="col-4">
                                                <a href="{{url('/info/message')}}" class="btn btn-danger btn-icon" title="Message"data-toggle="tooltip" data-placement="top" title="" data-original-title="2k">
                                                    <i class="far fa-envelope"></i>
                                                </a>
                                            </div>
                                            <div class="col-4">
                                                <button class="btn btn-success btn-icon" title="MyPet-Info"data-toggle="tooltip" data-placement="top" title="" data-original-title="90">
                                                    <i class="fas fa-paw"></i>
                                                </button>
                                            </div>
                                        </div> --}}
                                    </div>
                                </div>

                                <div class="card">
                                    <div class="card-header">
                                        <h5 class="card-header-text">오늘의 메세지</h5>
                                    </div>
                                    <div class="card-block user-box">
                                        <div class="media m-b-10">
                                            <a class="media-left" href="#!">
                                                <img class="media-object img-radius"  @if($user->asset_id != 0) src="{{url('/assets/img/profile/'.$user->asset_file_name.'.'.$user->asset_file_extension)}}" @else src="{{ url("/assets/mononoke111.jpg") }}" @endif  alt="Generic placeholder image" data-toggle="tooltip" data-placement="top" title="" data-original-title="user image">
                                                <div class="live-status bg-danger"></div>
                                            </a>
                                            <div class="media-body">
                                                <div class="chat-header">{{$user->status_message}}</div>
                                                
                                            </div>
                                        </div>
                                    </div>
                                </div>

{{--                                 <div class="card">
                                    <div class="card-header">
                                        <h5 class="card-header-text d-inline-block">Friends</h5>

                                        <span class="label label-primary f-right"> 명수 </span>
                                    </div>

                                                 <div class="card-block post-timelines">
                                                    <span class="dropdown-toggle addon-btn text-muted f-right service-btn" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true" role="tooltip"></span>
                                                    <div class="dropdown-menu dropdown-menu-right b-none services-list">
                                                        <a class="dropdown-item" href="#">Remove tag</a>
                                                        <a class="dropdown-item" href="#">Report Photo</a>
                                                        <a class="dropdown-item" href="#">Hide From Timeline</a>
                                                        <a class="dropdown-item" href="#">Blog User</a>
                                                    </div>
                                                    <div class="media bg-white d-flex">
                                                        <div class="media-left media-middle">
                                                            <a href="#">
                                                                <img class="media-object" width="50" src="https://bootdey.com/img/Content/avatar/avatar1.png" alt="">
                                                            </a>
                                                        </div>
                                                        <div class="media-body friend-elipsis">
                                                            <div class="f-15 f-bold m-b-5">Josephin Doe</div>
                                                            <div class="text-muted social-designation">Software Engineer</div>
                                                        </div>
                                                    </div>
                                                </div>

                                </div> --}}

                            </div>

                        </div>
                        <div class="col-xl-9 col-lg-8 col-md-8 col-xs-12 ">

                            <div class="card social-tabs">
                                <ul class="nav nav-tabs md-tabs tab-timeline" role="tablist">
{{--                                     <li class="nav-item">
                                        <a class="nav-link active" data-toggle="tab" href="#timeline" role="tab">Timeline</a>
                                        <div class="slide"></div>
                                    </li> --}}
                                    <li class="nav-item">
                                        <a class="nav-link active" data-toggle="tab" href="#about" role="tab">Friends</a>
                                        <div class="slide"></div>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" data-toggle="tab" href="#photos" role="tab">Photo</a>
                                        <div class="slide"></div>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" data-toggle="tab" href="#friends" role="tab">Guest-Book</a>
                                        <div class="slide"></div>
                                    </li>
                                </ul>
                            </div>

                            <div class="tab-content">

                               {{--  <div class="tab-pane active" id="timeline">
                                    <div class="row">
                                        <div class="col-md-12 timeline-dot">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12 timeline-dot">
                                            <div class="social-timelines p-relative">
                                                <div class="row timeline-right p-t-35">
                                                    <div class="col-2 col-sm-2 col-xl-1">
                                                        <div class="social-timelines-left">
                                                            <img class="img-radius timeline-icon"  @if($user->asset_id != 0) src="{{url('/assets/img/profile/'.$user->asset_file_name.'.'.$user->asset_file_extension)}}" @else src="{{ url("/assets/mononoke111.jpg") }}" @endif  alt="">
                                                        </div>
                                                    </div>
                                                    <div class="col-10 col-sm-10 col-xl-11 p-l-5 p-b-35">

                                                                <div id="note-full-container" class="card card-white grid-margin">
                                                                    <div class="row">
                                                                        <div class="col-md-12 mb-3">
                                                                            <div class="note-title">
                                                                                <label><b>Note Title</b></label>
                                                                                <input type="text" id="note-has-title" class="form-control"placeholder="Title" />
                                                                            </div>
                                                                        </div>

                                                                        <div class="col-md-12">
                                                                            <div class="note-content">
                                                                                <label><b>Note Description</b></label>
                                                                                <textarea id="note-has-content" class="form-control"placeholder="Content" rows="3"></textarea>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                <div class="card-body">
                                                                    <div class="post">

                                                                        <div class="post-options">
                                                                            <div class="input-group mb-3 px-2 py-2 rounded-pill bg-white shadow-sm">
                                                                                <input id="upload" type="file" class="form-control border-0" style="display:none;" onchange="loadPreviewImage(this,'modal-image');$('.image-wrapper').show();" >
                                                                                <label id="upload-label" class="font-weight-light text-muted"></label>
                                                                                <div class="input-group-append" >
                                                                                    <label for="upload" class="btn btn-light m-0 rounded-pill px-4"> <i class="fa fa-cloud-upload mr-2 text-muted" ></i><small class="text-uppercase font-weight-bold text-muted">Choose file</small></label>
                                                                                </div>
                                                                            </div>
                                                                            <input id="upload" type="file" class="form-control border-0" style="display:none;" onchange="loadPreviewImage(this,'modal-image');$('.image-wrapper').show();" ><a href="#"><i class="fa fa-camera"></i></a>
                                                                            <a href="#"><i class="fas fa-video"></i></a>
                                                                            <a href="#"><i class="fa fa-music"></i></a>
                                                                            <button class="btn btn-outline-danger float-right" onclick="addTimeline()"><b>Post</b></button>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            @foreach($timelines as $idx => $timeline)

                                                            <div class="card" id="card-full-container" data-id="{{$timeline[0]->id}}">
                                                                <div class="card-block post-timelines">
                                                                    <span class="dropdown-toggle addon-btn text-muted f-right service-btn" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true" role="tooltip"></span>
                                                                    <div class="dropdown-menu dropdown-menu-right b-none services-list">
                                                                        <a class="dropdown-item" href="#">Remove tag</a>
                                                                        <a class="dropdown-item" href="#">Report Photo</a>
                                                                        <a class="dropdown-item" href="#">Hide From Timeline</a>
                                                                        <a class="dropdown-item" href="#">Blog User</a>
                                                                    </div>
                                                                    <img class="editable img-responsive" alt=" Avatar" id="avatar2" @if($timeline[0]->user_asset_id != 0) src="{{url('/assets/img/profile/'.$timeline[0]->user_asset_file_name.'.'.$timeline[0]->user_asset_file_extension)}}" @else src="{{ url("/assets/mononoke111.jpg") }}" @endif style="width: 50px; height: 50px;margin-right: 10px">
                                                                    <a style="font-size: 15px;font-family: 'Nunito', sans-serif;"><b>{{$timeline[0]->user_name}}</b> 님이 타임라인에 글을 남겼습니다.</a>
                                                                    <div class="social-time text-muted">{{$timeline[0]->created_at}}</div>
                                                                </div>
                                                                <div class="container" style="display: flex;justify-content: center;">
                                                                    <img class="editable img-responsive" alt=" Avatar" id="avatar2" @if($timeline[0]->timeline_asset_id != 0) src="{{url('/assets/img/timeline/'.$timeline[0]->timeline_asset_file_name.'.'.$timeline[0]->timeline_asset_file_extension)}}" @else src="{{ url("/assets/mononoke111.jpg") }}" @endif style="width: 300px;height: 300px">
                                                                </div>
                                                                <div class="card-block" style="padding-bottom: 0px">
                                                                    <div class="timeline-details">
                                                                        <div class="chat-header"><h3>{{$timeline[0]->title}}</h3></div>
                                                                        <p class="text-muted"><h4>{{$timeline[0]->content}}</h4></p>
                                                                    </div>
                                                                </div>
                                                                <div class="card-block user-box" style="padding-top: 0px">
                                                                        <div class="timeline-options">
                                                                            <a href="#"><i class="fa fa-thumbs-up"></i> Like (15)</a>
                                                                            <a href="#"><i class="fa fa-comment"></i> Comment (4)</a>
                                                                            <a href="#"><i class="far fa-trash-alt" onclick="deleteTimeline(this)"> Delete </i>
                                                                        </div>
                                                                    <div class="timeline-container-{{$timeline[0]->id}}">
                                                                        @foreach($timeline as $idx2 => $timeline_comment)
                                                                        @if(!empty($timeline_comment->timeline_comment_id))
                                                                    
                                                                        <div class="timeline-comment-container">
                                                                            <div class="timeline-comment" id="timeline-comment" data-id="{{$timeline_comment->timeline_comment_id}}">
                                                                                <div class="timeline-comment-header">
                                                                                    <img class="editable img-responsive" alt=" Avatar" id="avatar2" @if($timeline_comment->timeline_comment_user_asset_id != 0 && !empty($timeline_comment->timeline_comment_user_asset_id)) src="{{url('/assets/img/profile/'.$timeline_comment->timeline_comment_user_asset_file_name.'.'.$timeline_comment->timeline_comment_user_asset_file_extension)}}" @else src="{{ url("/assets/mononoke111.jpg") }}" @endif style="width: 50px; height: 50px;">
                                                                                    <p>{{$timeline_comment->comment_user_name}} <small>{{$timeline_comment->created_at}}</small></p>
                                                                                    <a href="#"><i class="far fa-trash-alt" onclick="deleteTimelineComment(this)" style="padding-left: 550px"> Delete </i>
                                                                                </div>
                                                                                <p class="timeline-comment-text" style="padding-left: 60px">{{$timeline_comment->comment}}</p>
                                                                            </div>
                                                                        </div>
                                                                    
                                                                        @endif
                                                                        @endforeach
                                                                    </div>     
                                                                    <div class="media">
                                                                        <a class="media-left" href="#">
                                                                            <img class="editable img-responsive" alt=" Avatar" id="avatar2" @if($timeline[0]->user_asset_id != 0) src="{{url('/assets/img/profile/'.$timeline[0]->user_asset_file_name.'.'.$timeline[0]->user_asset_file_extension)}}" @else src="{{ url("/assets/mononoke111.jpg") }}" @endif style="width: 50px; height: 50px;">
                                                                        </a>
                                                                        <div class="media-body">
                                                                            <form class="">
                                                                                <div class="">
                                                                                    <textarea rows="5" cols="5" id="timeline-has-comment"class="form-control" placeholder="댓글을 남겨보세요!"></textarea>
                                                                                    <div class="text-right m-t-20"><a href="#" class="btn btn-primary waves-effect waves-light" onclick="addTimelineComment({{$idx}})">Post</a></div>
                                                                                </div>
                                                                            </form>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            @endforeach

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div> --}}

                                <div class="tab-pane" id="about">
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="card">
                                                <div class="card-header">
                                                    <h5 class="card-header-text">Basic Information</h5>
                                                    <button id="edit-btn" type="button" class="btn btn-primary waves-effect waves-light f-right">
                                                        <i class="icofont icofont-edit"></i>
                                                    </button>
                                                </div>
                                                <div class="container">
                                                    <div class="row">
                                                        <div class="col-md-8">
                                                            <div class="people-nearby">           
                                                              <div class="nearby-user">
                                                                <div class="row">
                                                                  <div class="col-md-2 col-sm-2">
                                                                    <img src="https://bootdey.com/img/Content/avatar/avatar7.png" alt="user" class="profile-photo-lg">
                                                                  </div>
                                                                  <div class="col-md-7 col-sm-7">
                                                                    <h5><a href="#" class="profile-link">Sophia Page</a></h5>
                                                                    <p>Software Engineer</p>
                                                                    <p class="text-muted">500m away</p>
                                                                  </div>
                                                                  <div class="col-md-3 col-sm-3">
                                                                    <button class="btn btn-primary pull-right">Add Friend</button>
                                                                  </div>
                                                                </div>
                                                              </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                                <div class="tab-pane" id="photos">
                                    <div class="row">
                                        <div class="col-md-12 timeline-dot">
                                            <div class="social-timelines p-relative">
                                                <div class="row timeline-right p-t-35">
                                                    <div class="col-2 col-sm-2 col-xl-1">
                                                        <div class="social-timelines-left">
                                                            <img class="img-radius timeline-icon"  @if($user->asset_id != 0) src="{{url('/assets/img/profile/'.$user->asset_file_name.'.'.$user->asset_file_extension)}}" @else src="{{ url("/assets/mononoke111.jpg") }}" @endif  alt="">
                                                        </div>
                                                    </div>
                                                    <div class="col-10 col-sm-10 col-xl-11 p-l-5 p-b-35">

                                                                <div class="card card-white grid-margin">
                                                                    <div class="row">
                                                                        <div class="col-md-12 mb-3">
                                                                            <div class="note-title">
                                                                                <label><b>Photo Title</b></label>
                                                                                <input type="text" id="photo-has-title" class="form-control" minlength="25" placeholder="Title" />
                                                                            </div>
                                                                        </div>

                                                                        <div class="col-md-12">
                                                                            <div class="note-description">
                                                                                <label><b>Photo Description</b></label>
                                                                                <textarea id="photo-has-content" class="form-control" minlength="60" placeholder="Content" rows="3"></textarea>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                <div class="card-body">
                                                                    <div class="post">

                                                                        <div class="post-options">
                                                                            <div class="input-group mb-3 px-2 py-2 rounded-pill bg-white shadow-sm">
                                                                                <input id="upload" type="file" class="form-control border-0" style="display:none;" onchange="loadPreviewImage(this,'modal-image');$('.image-wrapper').show();" >
                                                                                <label id="upload-label" class="font-weight-light text-muted"></label>
                                                                                <div class="input-group-append" >
                                                                                    <label for="upload" class="btn btn-light m-0 rounded-pill px-4"> <i class="fa fa-cloud-upload mr-2 text-muted" ></i><small class="text-uppercase font-weight-bold text-muted">Choose file</small></label>
                                                                                </div>
                                                                            </div>
                                                                            <input id="upload-photo" type="file" class="form-control border-0" style="display:none;" onchange="loadPreviewImage(this,'modal-image');$('.image-wrapper').show();" ><a href="#"><i class="fa fa-camera"></i></a>
                                                                            <a href="#"><i class="fas fa-video"></i></a>
                                                                            <a href="#"><i class="fa fa-music"></i></a>
                                                                            <button class="btn btn-outline-primary float-right" onclick="addPhoto()"><b>Post</b></button>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            @foreach($photos as $idx => $photo)

                                                            <div class="card" id="photo-full-container" data-id="{{$photo->id}}">
                                                                <div class="card-block post-timelines">
                                                                    <span class="dropdown-toggle addon-btn text-muted f-right service-btn" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true" role="tooltip"></span>
                                                                    <div class="dropdown-menu dropdown-menu-right b-none services-list">
                                                                        <a class="dropdown-item" href="#">Remove tag</a>
                                                                        <a class="dropdown-item" href="#">Report Photo</a>
                                                                        <a class="dropdown-item" href="#">Hide From Timeline</a>
                                                                        <a class="dropdown-item" href="#">Blog User</a>
                                                                    </div>
                                                                    <img class="editable img-responsive" alt=" Avatar" id="avatar2" @if($photo->user_asset_id != 0) src="{{url('/assets/img/profile/'.$photo->user_asset_file_name.'.'.$photo->user_asset_file_extension)}}" @else src="{{ url("/assets/mononoke111.jpg") }}" @endif style="width: 50px; height: 50px;margin-right: 10px">
                                                                    <a style="font-size: 15px;font-family: 'Nunito', sans-serif;"><b>{{$photo->user_name}}</b> 님이 사진을 올렸습니다.</a>
                                                                    <div class="social-time text-muted">{{$photo->created_at}}</div>
                                                                </div>
                                                                <div class="container" style="display: flex;justify-content: center;">
                                                                <img class="editable img-responsive" alt=" Avatar" id="avatar2" @if($photo->photo_asset_id != 0) src="{{url('/assets/img/photo/'.$photo->photo_asset_file_name.'.'.$photo->photo_asset_file_extension)}}" @else src="{{ url("/assets/mononoke111.jpg") }}" @endif style="width: 300px;height: 300px">
                                                                </div>
                                                                <div class="card-block">
                                                                    <div class="timeline-details">
                                                                        <div class="chat-header"><h3>{{$photo->title}}</h3></div>
                                                                        <p class="text-muted"><h4>{{$photo->content}}</h4></p>
                                                                    </div>
                                                                </div>
                                                                    <div class="stats">
                                                                        <div class="timeline-options" style="padding-left: 20px">
                                                                            <a href="#"><i class="fa fa-thumbs-up"></i> Like (15)</a>
                                                                            <a href="#"><i class="far fa-trash-alt" onclick="deletePhoto(this)"> Delete </i>
                                                                        </div>
                                                                    </div>
                                                            </div>
                                                            @endforeach
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="tab-pane" id="friends">
                                    <div class="row">
                                        <div class="col-lg-12 col-xl-12">

                                        <div class="row">
                                            <div class="col-md-12 timeline-dot">
                                                <div class="social-timelines p-relative">
                                                    <div class="row timeline-right p-t-35">
                                                        <div class="col-2 col-sm-2 col-xl-1">
                                                            <div class="social-timelines-left">
                                                                <img class="img-radius timeline-icon"  @if($user->asset_id != 0) src="{{url('/assets/img/profile/'.$user->asset_file_name.'.'.$user->asset_file_extension)}}" @else src="{{ url("/assets/mononoke111.jpg") }}" @endif  alt="">
                                                            </div>
                                                        </div>
                                                         <div class="col-10 col-sm-10 col-xl-11 p-l-5 p-b-35">
                                                            <div class="card card-white grid-margin">
                                                                <div class="card-body">
                                                                    <div class="post" style="font-size: 20px">
                                                                        <label><b>방명록</b></label>
                                                                        <textarea class="form-control" id ="guestbook-has-board"placeholder="Post" rows="4"></textarea>
                                                                        <div class="post-options">
                                                                                <div class="input-group mb-3 px-2 py-2 rounded-pill bg-white shadow-sm">
                                                                                <input id="upload" type="file" class="form-control border-0" style="display:none;" onchange="loadPreviewImage(this,'modal-image');$('.image-wrapper').show();" >
                                                                                <label id="upload-label" class="font-weight-light text-muted"></label>
                                                                                <div class="input-group-append" >
                                                                                    <label for="upload" class="btn btn-light m-0 rounded-pill px-4"> <i class="fa fa-cloud-upload mr-2 text-muted" ></i><small class="text-uppercase font-weight-bold text-muted">Choose file</small></label>
                                                                                </div>
                                                                            </div>
                                                                            <input id="upload-post" type="file" class="form-control border-0" style="display:none;" onchange="loadPreviewImage(this,'modal-image');$('.image-wrapper').show();" ><a href="#"><i class="fa fa-camera"></i></a>
                                                                            <a href="#"><i class="fas fa-video"></i></a>
                                                                            <a href="#"><i class="fa fa-music"></i></a>
                                                                            <button class="btn btn-outline-primary float-right" onclick="addGuestBook()"><b>Post</b></button>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            @foreach($guest_books as $idx => $guest_book)
                                                            <div class="profile-timeline">
                                                                <ul class="list-unstyled">
                                                                    <li class="timeline-item" data-id="{{$guest_book[0]->id}}">
                                                                        <div class="card card-white grid-margin" id="post-full-container">
                                                                            <div class="card-body">
                                                                                <div class="timeline-item-header">
                                                                                    <img class="editable img-responsive" alt=" Avatar" id="avatar2" @if($guest_book[0]->user_asset_id != 0) src="{{url('/assets/img/profile/'.$guest_book[0]->user_asset_file_name.'.'.$guest_book[0]->user_asset_file_extension)}}" @else src="{{ url("/assets/mononoke111.jpg") }}" @endif style="width: 50px; height: 50px;margin-right: 10px">
                                                                                    <p><b>{{$guest_book[0]->user_name}} </b><span>님이 글을 남겼습니다.</span></p>
                                                                                    <small>{{$guest_book[0]->created_at}}</small>
                                                                                </div>
                                                                            <div class="container" style="display: flex;justify-content: center;">
                                                                                <img class="editable img-responsive" alt=" Avatar" id="avatar2" @if($guest_book[0]->guestbook_asset_id != 0) src="{{url('/assets/img/guestbook/'.$guest_book[0]->guestbook_asset_file_name.'.'.$guest_book[0]->guestbook_asset_file_extension)}}" @else src="{{ url("/assets/mononoke111.jpg") }}" @endif style="width: 300px;height: 300px" >
                                                                            </div>
                                                                                <div class="timeline-item-post">
                                                                                    <p>{{$guest_book[0]->board}}</p>
                                                                                    <div class="timeline-options">
                                                                                        <a href="#"><i class="fa fa-thumbs-up"></i> Like (15)</a>
                                                                                        <a href="#"><i class="fa fa-comment"></i> Comment (4)</a>
                                                                                        <a href="#"><i class="far fa-trash-alt" onclick="deleteGuestbook(this)"> Delete </i>
                                                                                    </div>

                                                                            <div class="guestbook-container-{{$guest_book[0]->id}}">
                                                                                @foreach($guest_book as $idx2 => $guestbook_comment)
                                                                                @if(!empty($guestbook_comment->guestbook_comment_id))
                                                                                <div class="guestbook-comment" >
                                                                                    <div class="timeline-comment"  data-id="{{$guestbook_comment->guestbook_comment_id}}">
                                                                                        <div class="timeline-comment-header">
                                                                                            <img class="editable img-responsive" alt=" Avatar" id="avatar2" @if($guestbook_comment->guestbook_comment_user_asset_id != 0 && !empty($guestbook_comment->guestbook_comment_user_asset_id)) src="{{url('/assets/img/profile/'.$guestbook_comment->guestbook_comment_user_asset_file_name.'.'.$guestbook_comment->guestbook_comment_user_asset_file_extension)}}" @else src="{{ url("/assets/mononoke111.jpg") }}" @endif style="width: 50px; height: 50px;">
                                                                                            <p>{{$guestbook_comment->user_name}} <small>{{$guestbook_comment->created_at}}</small></p>
                                                                                            <a href="#"><i class="far fa-trash-alt" onclick="deleteGuestbookComment(this)" style="padding-left: 550px"> Delete </i>
                                                                                        </div>
                                                                                        <p class="timeline-comment-text" style="padding-left: 60px">{{$guestbook_comment->comment}}</p>

                                                                                    </div>
                                                                                </div>
                                                                                @endif
                                                                                @endforeach
                                                                            </a></div>
                                                                                    <div class="media">
                                                                                        <a class="media-left" href="#">
                                                                                            <img class="editable img-responsive" alt=" Avatar" id="avatar2" @if($guest_book[0]->user_asset_id != 0) src="{{url('/assets/img/profile/'.$guest_book[0]->user_asset_file_name.'.'.$guest_book[0]->user_asset_file_extension)}}" @else src="{{ url("/assets/mononoke111.jpg") }}" @endif style="width: 50px; height: 50px;">
                                                                                        </a>
                                                                                        <div class="media-body">
                                                                                            <form class="">
                                                                                                <div class="">
                                                                                                    <textarea rows="5" cols="5" id="guestbook-has-comment"class="form-control" placeholder="댓글을 남겨보세요!"></textarea>
                                                                                                    <div class="text-right m-t-20"><a href="#" class="btn btn-primary waves-effect waves-light" onclick="addGuestbookComment({{$guest_book[0]->id}},)">Post</a></div>
                                                                                                </div>
                                                                                            </form>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </li>
                                                            </div>
                                                            @endforeach


   
    
@endsection
@section('script')
<script type="text/javascript">

    function addTimeline(){
        var asset_id = uploadPhoto('#upload','/upload/upload-photo','timeline');
        console.log("asset_id", asset_id);

        var timeline_title = $("#note-has-title").val(); 
        var timeline_content = $("#note-has-content").val();
        console.log("title ",timeline_title);
        console.log("content ",timeline_content);

        var ajax_data={
            'timeline_title' : timeline_title,
            'timeline_content' : timeline_content,
            'asset_id' : asset_id
        }

        mini_ajax("post","/homepage/add-timeline",ajax_data,function(resp){
            console.log("resp",resp);
            $("#card-full-container").prepend(resp);
            confirm("타임라인에 글이 게시되었습니다.");
        })

        }

        function addTimelineComment(timeline_id){
            var timeline_comment = $("#timeline-has-comment").val();
            console.log("timeline_comment",timeline_comment);
            console.log("timeline_id",timeline_id);

            var ajax_data={
                'timeline_comment' : timeline_comment,
                'timeline_id' : timeline_id
            }

            mini_ajax("post","/homepage/add-timeline-comment",ajax_data,function(resp){
                $("#timeline-comment-container").append(resp);
                confirm("해당 게시물에 댓글이 게시되었습니다.");
            })

        }

    function addPhoto(){
        var asset_id = uploadPhoto("#upload",'/upload/upload-photo','photo');
        console.log("asset_id 는?", asset_id);

        var photo_title = $("#photo-has-title").val();
        var photo_content = $("#photo-has-content").val();

        var ajax_data={
            'photo_title' : photo_title,
            'photo_content' : photo_content,
            'asset_id' : asset_id
        }

        mini_ajax("post",'/homepage/add-photo',ajax_data,function(resp){
            $("#photo-full-container").prepend(resp);
            confirm("사진첩에 사진이 게시되었습니다.");
        })
    }
    function addGuestBook(){
        var asset_id = uploadPhoto("#upload",'/upload/upload-photo','guestbook');
        console.log("asset_id는?", asset_id);

        var guest_book = $("#guestbook-has-board").val();
        console.log("방명록 내용 : ", guest_book);

        ajax_data={
            'guest_book' : guest_book,
            'asset_id' : asset_id
        }

        mini_ajax("post","/homepage/add-guestbook",ajax_data,function(resp){
            $("#post-full-container").prepend(resp);
            confirm("방명록에 글이 게시되었습니다.");
        })
    }
    function addGuestbookComment(guestbook_id){
        var guestbook_comment = $("#guestbook-has-comment").val();
        console.log(guestbook_comment);
        console.log(guestbook_id);

        var ajax_data={
            'guestbook_comment' : guestbook_comment,
            'guestbook_id' : guestbook_id
        }

        mini_ajax("post","/homepage/add-guestbook-comment",ajax_data,function(reap){
            $("#guestbook-comment").append(resp);
            confirm("해당 방명록에 댓글이 게시되었습니다.");

        })

    }


      function sdasdFriends(elem){
    console.log('hello');
        $('#addnotesmodal').modal('show');
        $('#btn-n-save').hide();
        $('#btn-n-add').show();
        $('#btn-n-discard').text("Cancel");
  }


    function searchFriends(elem){

        var friend_id =$("#note-has-id").val();

        var ajax_data={
            'friend_id':friend_id
        }
        console.log("friend_id : ",friend_id);
        mini_ajax("post",'/homepage/add-friends',ajax_data,function(resp){
            if(resp=="failed"){
                alert("해당 아이디의 사용자를 찾을 수 없습니다.");
            }else{
                alert("해당 아이디의 사용자의 미니 홈페이지에 놀러가보세요!");
                $('#addnotesmodal').modal('show');
            }

        });

    }

    function addFriends(elem){
        var friend_id = $(elem).parents(".timeline-btn").attr('data-id');
        console.log('friend-id',friend_id);

        var ajax_data={
            'friend_id' : friend_id
        }

    }

    function sendMessages(elem){
        var friend_id = $(elem).parents(".timeline-btn").attr('data-id');

    }

</script>
@endsection