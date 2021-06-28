<?php

namespace App\Http\Controllers;

use Auth;
use Validator;
use Str;
use App\Helpers\UploadHelper;
use App\Models\Asset;

use Illuminate\Http\Request;

class UploadController extends Controller
{
   public function uploadPhoto(Request $request)
   {    
   		\Log::info("Request".json_encode($request->input()));
        \Log::info("uploadController".($request->file("file")));
        \Log::info("uploadControlle2r".($request->get("type")));
        $type = $request->get("type");

        // $validation = Validator::make($request->all(), [
        //     'file' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',    
        //     'status' => 'required',
        //     ]);
        // if ($validation->fails())
        // {	
        // 	\Log::info("ifinner");
        //     foreach ($validation->messages()->getMessages() as $field_name => $messages)
        //     {
        //     }
        // }
        // else
        // {
            // if($request->get('button_action') == 'insert')
            // {   
                
            // }
            // \Log::info(1);
            if($request->hasFile('file') && $request->file('file')->isValid()){
                $file = $request->file('file');
                $tmp_file_name = Str::random(30);
                $tmp_file_extension = $file->getClientOriginalExtension();
                $file_name = $tmp_file_name . '.' . $tmp_file_extension;

                if($type == "timeline")
                {
                    $file->move(public_path() . '/assets/img/timeline', $file_name);
                }
                else if($type == "user")
                {
                    $file->move(public_path() . '/assets/img/profile', $file_name);   
                }else  if($type == "guestbook")
                {
                    $file->move(public_path() . '/assets/img/guestbook', $file_name); 
                }else if($type == "photo")
                {
                    $file->move(public_path() . '/assets/img/photo', $file_name);
                }else if($type == "background")
                {
                    $file->move(public_path() . '/assets/img/background', $file_name);
                }
            }
            $asset = new Asset;
            $asset->type = $type;
            $asset->user_id = Auth::user()->id;
            $asset->file_name = $tmp_file_name;
            $asset->file_extension = $tmp_file_extension;
            $asset->save();

            \Log::info("Asset_id".$asset->id);

            return $asset->id;
        // }
        // UploadHelper::uploadPhoto($request->file("file"), $request->get("type"));
   }

   public function uploadProfile(Request $request)
   {
        \Log::info("Request".json_encode($request->input()));
        \Log::info("uploadController".($request->file("file")));
        \Log::info("uploadControlle2r".($request->get("type")));

            if($request->hasFile('file') && $request->file('file')->isValid()){
                $file = $request->file('file');
                $tmp_file_name = Str::random(30);
                $tmp_file_extension = $file->getClientOriginalExtension();
                $file_name = $tmp_file_name . '.' . $tmp_file_extension;
                $file->move(public_path() . '/assets/img/timeline', $file_name);
            }
            $asset = new Asset;
            $asset->user_id = Auth::user()->id;
            $asset->file_name = $tmp_file_name;
            $asset->file_extension = $tmp_file_extension;
            $asset->save();

            \Log::info("Asset_id".$asset->id);

            return $asset->id;
   }
}
