<div id="timeline-comment-container">
    <div class="timeline-comment" id="timeline-comment">
        <div class="timeline-comment-header">
            <img class="editable img-responsive" alt=" Avatar" id="avatar2" @if($timeline_comment->timeline_comment_user_asset_id != 0 && !empty($timeline_comment->timeline_comment_user_asset_id)) src="{{url('/assets/img/profile/'.$timeline_comment->timeline_comment_user_asset_file_name.'.'.$timeline_comment->timeline_comment_user_asset_file_extension)}}" @else src="{{ url("/assets/mononoke111.jpg") }}" @endif style="width: 50px; height: 50px;">
            <p>{{$timeline_comment->user_name}} <small>{{$timeline_comment->created_at}}</small></p>
            <a href="#"><i class="far fa-trash-alt" onclick="deleteTimelineComment(this)" style="padding-left: 550px"> Delete </i>
        </div>
        <p class="timeline-comment-text"  style="padding-left: 60px">{{$timeline_comment->timeline_comment}}</p>
    </div>
</div>