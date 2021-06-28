<?php

namespace App\Http\Controllers;

use Auth;
use DB;

use Illuminate\Http\Request;
use App\User;

class InfoController extends Controller
{
	public function getMypage()
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
                                
		return view('info.mypage',[
			'user' => $user

		]);
	}

	public function updateProfile(Request $request)
	{
		$user_name = $request->get('user_name');
		$user_id = $request->get('user_id');
		$user_email = $request->get('user_email');
		$user_message = $request->get('user_message');
		$user_insta = $request->get('user_insta');
		$user_pet = $request->get('user_pet');
		$user_info = $request->get('user_info');

		$asset_id = $request->get('asset_id');


		$user =User::find(Auth::user()->id);
		$user->asset_id=$asset_id == -1 ? 0 : $asset_id;
		$user->name=$user_name;
		$user->user_id=$user_id;
		$user->email=$user_email;
		$user->status_message=$user_message;
		$user->instagram=$user_insta;
		$user->pet_name=$user_pet;
		$user->user_info=$user_info;
		$user->save();

		\Log::info("asset_Id : ".$asset_id);

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

       \Log::info("user : ".$user);
        return $user;

	}

	public function getMessage()
	{
		return view('info.message');
	}

}