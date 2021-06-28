
<div class="card" id="photo-full-container">
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
    <img class="editable img-responsive" alt=" Avatar" id="avatar2" @if($photo->photo_asset_id != 0) src="{{url('/assets/img/photo/'.$photo->photo_asset_file_name.'.'.$photo->photo_asset_file_extension)}}" @else src="{{ url("/assets/mononoke111.jpg") }}" @endif >
    </div>
    <div class="card-block">
        <div class="timeline-details">
            <div class="chat-header"><h3>{{$photo->title}}</h3></div>
            <p class="text-muted"><h4>{{$photo->content}}</h4></p>
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
</div>