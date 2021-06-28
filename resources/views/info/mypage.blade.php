@extends('layouts.master')

@section('style')
<style type="text/css">


body{


}
.panel.panel-default {
    border-top-width: 3px;
}
.panel {
    box-shadow: 0 3px 1px -2px rgba(0,0,0,.14),0 2px 2px 0 rgba(0,0,0,.098),0 1px 5px 0 rgba(0,0,0,.084);
    border: 0;
    border-radius: 4px;
    margin-bottom: 16px;
}
.thumb96 {
    width: 96px!important;
    height: 96px!important;
}
.thumb48 {
    width: 48px!important;
    height: 48px!important;
}
</style>

@endsection

@section('content')
<div class="container bootstrap snippets bootdey">
<div class="row ng-scope">
    <div class="col-md-4">

            <div class="panel-body text-center">
              <span class="profile-picture">
                <img class="editable img-responsive" id="avatar2" name="avatar2" @if($user->asset_id != 0) src="{{url('/assets/img/profile/'.$user->asset_file_name.'.'.$user->asset_file_extension)}}" @else src="{{ url("/assets/mononoke111.jpg") }}" @endif style="width: 250px; height: 250px">
              </span>
                <h3 class="m0 text-bold"></h3>
                <div class="mv-lg">
                </div>
                <input id="upload" type="file" class="form-control border-0" style="display:none;" onchange="loadPreviewImage(this,'avatar2');">
              <label id="upload-label" class="font-weight-light text-muted"></label>
              <a href="#" class="btn btn-sm btn-block btn-primary">
               <label for="upload"><i class="fas fa-portrait"></i>
                <span class="bigger-110">사진 변경하기</span></label>
              </a>
            </div>


    </div>
    <div class="col-md-8">
        <div class="panel panel-default">
            <div class="panel-body">
                <div class="pull-right">
                    <div class="btn-group dropdown" uib-dropdown="dropdown">

                    </div>
                </div>
                <div class="h4 text-center">Modify Mypage</div>
                <div class="row pv-lg">
                    <div class="col-lg-2"></div>
                    <div class="col-lg-8">
                        <form class="form-horizontal ng-pristine ng-valid">
                            <div class="form-group">
                                <label class="col-sm-2 control-label" for="user-has-name"><b>이름</b></label>
                                <div class="col-sm-10">
                                    <input class="form-control" id="user-has-name" type="text" placeholder="" value={{$user->name}}>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label" for="user-has-id"><b>아이디</b></label>
                                <div class="col-sm-10">
                                    <input class="form-control" id="user-has-id" type="text" placeholder="" value="{{$user->user_id}}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label" for="user-has-email"><b>Email</b></label>
                                <div class="col-sm-10">
                                    <input class="form-control" id="user-has-email" type="email" value="{{$user->email}}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-5 control-label" for="user-has-message"><b>상태 메시지</b></label>
                                <div class="col-sm-10">
                                    <textarea class="form-control" id="user-has-message" row="4">{{$user->status_message}}</textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-5 control-label" for="user-has-insta"><b>인스타계정</b></label>
                                <div class="col-sm-10">
                                    <input class="form-control" id="user-has-insta" type="text" value="{{$user->instagram}}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-6 control-label" for="user-has-pet"><b>내 펫 이름</b></label>
                                <div class="col-sm-10">
                                    <input class="form-control" id="user-has-pet" type="text" value="{{$user->pet_name}}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-5 control-label" for="user-has-info"><b>나를 설명해보세요</b></label>
                                <div class="col-sm-10">
                                    <textarea class="form-control" id="user-has-info" row="4">{{$user->user_info}}</textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-offset-2 col-sm-10">
                                    <a href="#" class="btn btn-info" type="submit" onclick="updateProfile(this)">저장하기</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
@endsection
@section('script')
<script type ="text/javascript">

  function updateProfile(elem)
  {

    var asset_id = uploadPhoto('#upload','/upload/upload-photo','user');

    var user_name = $("#user-has-name").val();
    var user_id = $("#user-has-id").val();
    var user_email = $("#user-has-email").val();
    var user_message = $("#user-has-message").val();
    var user_insta = $("#user-has-insta").val();
    var user_pet = $("#user-has-pet").val();
    var user_info = $("#user-has-info").val();

    var ajax_data = {
      'user_name' : user_name,
      'user_id' : user_id,
      'user_email' : user_email,
      'user_message' : user_message,
      'user_insta' : user_insta,
      'user_pet' : user_pet,
      'user_info' : user_info,
      'asset_id' : asset_id
      }


      mini_ajax("put","/info/update-profile",ajax_data,function(resp){


        var result = confirm("프로필이 수정되었습니다.");
        if(result)
        {
          window.location.href = '{{ env("URL_BLOG")."/homepage/main" }}';

        }
      });


  }

</script>
@endsection