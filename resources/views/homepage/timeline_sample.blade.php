
<div class="card" id="card-full-container">
    <div class="card-block post-timelines">
        <span class="dropdown-toggle addon-btn text-muted f-right service-btn" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true" role="tooltip"></span>
        <div class="dropdown-menu dropdown-menu-right b-none services-list">
            <a class="dropdown-item" href="#">Remove tag</a>
            <a class="dropdown-item" href="#">Report Photo</a>
            <a class="dropdown-item" href="#">Hide From Timeline</a>
            <a class="dropdown-item" href="#">Blog User</a>
        </div>
        <img class="editable img-responsive" alt=" Avatar" id="avatar2" @if($timeline->user_asset_id != 0) src="{{url('/assets/img/profile/'.$timeline->user_asset_file_name.'.'.$timeline->user_asset_file_extension)}}" @else src="{{ url("/assets/mononoke111.jpg") }}" @endif style="width: 50px; height: 50px;margin-right: 10px">
        <a style="font-size: 15px;font-family: 'Nunito', sans-serif;"><b>{{$timeline->user_name}}</b> posted on your timeline</a>
        <div class="social-time text-muted">{{$timeline->created_at}}</div>
    </div>
    <div class="container" style="display: flex;justify-content: center;">
    <img class="editable img-responsive" alt=" Avatar" id="avatar2" @if($timeline->timeline_asset_id != 0) src="{{url('/assets/img/timeline/'.$timeline->timeline_asset_file_name.'.'.$timeline->timeline_asset_file_extension)}}" @else src="{{ url("/assets/mononoke111.jpg") }}" @endif >
    </div>
    <div class="card-block">
        <div class="timeline-details">
            <div class="chat-header"><h3>{{$timeline->title}}</h3></div>
            <p class="text-muted"><h4>{{$timeline->content}}</h4></p>
        </div>
    </div>
        <div class="stats">
            <a href="#" class="btn btn-default stat-item" style="padding-left: 30px">
                <i class="fa fa-thumbs-up icon"></i> Like (228)
            </a>
            <a href="#" class="btn btn-default stat-item">
                <i class="fa fa-share icon"></i> Share (128)
            </a>
        </div>
    <div class="card-block user-box">
        <div class="p-b-30"> <span class="f-14" style="font-size: 15px;padding-left: 70px"><a href="#">Comments (댓글 수)</a></span><span class="f-right"></span></div>
        <div class="media">
            <a class="media-left" href="#">
                        <img class="editable img-responsive" alt=" Avatar" id="avatar2" @if($timeline->user_asset_id != 0) src="{{url('/assets/img/profile/'.$timeline->user_asset_file_name.'.'.$timeline->user_asset_file_extension)}}" @else src="{{ url("/assets/mononoke111.jpg") }}" @endif style="width: 50px; height: 50px;margin-right: 10px">
            </a>
            <div class="media-body">
                <form class="">
                    <div class="">
                        <textarea rows="5" cols="5" class="form-control" placeholder="Write Something here..."></textarea>
                        <div class="text-right m-t-20"><a href="#" class="btn btn-primary waves-effect waves-light">Post</a></div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>