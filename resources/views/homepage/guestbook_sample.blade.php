<div class="profile-timeline">
    <ul class="list-unstyled">
        <li class="timeline-item">
            <div class="card card-white grid-margin" id="post-full-container">
                <div class="card-body">
                    <div class="timeline-item-header">
                        <img class="editable img-responsive" alt=" Avatar" id="avatar2" @if($guest_book->user_asset_id != 0) src="{{url('/assets/img/profile/'.$guest_book->user_asset_file_name.'.'.$guest_book->user_asset_file_extension)}}" @else src="{{ url("/assets/mononoke111.jpg") }}" @endif style="width: 50px; height: 50px;margin-right: 10px">
                        <p><b>{{$guest_book->user_name}} </b><span>님이 글을 남겼습니다.</span></p>
                        <small>3 hours ago</small>
                    </div>
                    <div class="container" style="display: flex;justify-content: center;">
                    <img class="editable img-responsive" alt=" Avatar" id="avatar2" @if($guest_book->guestbook_asset_id != 0) src="{{url('/assets/img/guestbook/'.$guest_book->guestbook_asset_file_name.'.'.$guest_book->guestbook_asset_file_extension)}}" @else src="{{ url("/assets/mononoke111.jpg") }}" @endif style="width: 300px;height: 300px" >
                    <div class="timeline-item-post">
                    </div>
                        <p>방명록 글 예시</p>
                        <div class="timeline-options">
                            <a href="#"><i class="fa fa-thumbs-up"></i> Like (15)</a>
                            <a href="#"><i class="fa fa-comment"></i> Comment (4)</a>
                        </div>
                        <div class="timeline-comment">
                            <div class="timeline-comment-header">
                                <img src="https://bootdey.com/img/Content/avatar/avatar7.png" alt="" />
                                <p>Jamara Karle <small>1 hour ago</small></p>
                            </div>
                            <p class="timeline-comment-text">Xullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                        </div>
                        <textarea class="form-control" placeholder="Replay"></textarea>
                     <button class="btn btn-outline-primary float-right"><b>Post</b></button>

                    </div>
                </div>
            </div>
        </li>
</div>