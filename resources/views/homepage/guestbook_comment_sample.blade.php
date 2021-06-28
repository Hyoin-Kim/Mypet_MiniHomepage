<?php
	\Log::info("g_c_s".$guestbook_comment);
?>
<div class="guestbook-comment">
    <div class="timeline-comment">
        <div class="timeline-comment-header">
            <img class="editable img-responsive" alt=" Avatar" id="avatar2" @if($guestbook_comment->guestbook_comment_user_asset_id != 0 && !empty($guestbook_comment->guestbook_comment_user_asset_id)) src="{{url('/assets/img/profile/'.$guestbook_comment->guestbook_comment_user_asset_file_name.'.'.$guestbook_comment->guestbook_comment_user_asset_file_extension)}}" @else src="{{ url("/assets/mononoke111.jpg") }}" @endif style="width: 50px; height: 50px;">
            <p>{{$guestbook_comment->user_name}} <small>{{$guestbook_comment->created_at}}</small></p>
            <a href="#"><i class="far fa-trash-alt" onclick="deleteTimelineComment(this)" style="padding-left: 550px"> Delete </i>
        </div>
        <p class="timeline-comment-text" style="padding-left: 60px">{{$guestbook_comment->guestbook_comment}}</p>

    </div>
</div>