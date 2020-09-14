@include ('layouts.template.header')

@include ('layouts.template.menu')

<div class="row no-margin">
	<div class="col-lg-12">
		<div class="card">
			<img class="card-img w-100" style="height: 350px" src="/images/{{$blog->image}}" alt="Card image">
			<div class="card-img-overlay">
        <p class="blog-title">{{$blog->title}}</p>
				<p class="blog-subtitle">{{$blog->subtitle}}</p>
			</div>
		</div>
	</div>
</div>
<div class="container" style="margin-top: 15px;">
	<div class="row">
    <div class="col-lg-2">
      <div class="row">
        <div class="col-lg-6 text-right">
          <p class="author">Author</p>
          <p  class="author-name">{{$blog->user->first_name}}</p>
          <div class="divider"></div>
        </div>
        <div class="col-lg-6">
          <img class="rounded-circle" style="height: 65px; width: 65px" src="{{asset ('/dist/img/avatar.png') }}" alt="User Image">
        </div>
        <div class="col-lg-12"></div>
      </div>
    </div>
		<div class="col-lg-6">
			{!!$blog->body!!}
    </div>
    @if(Cookie::has('voted') != null)
    <div class="col-lg-4">
      @include('poll.result')
    </div>
    @else
    <div class="col-lg-4">
      @if($poll != null)
      <div class="card shadow p-3" style="border-radius: 15px">
        <div class="card-header bg-light">
          <h4 class="text-info ">{{$poll->question}}</h4>
        </div>
        <div class="card-body">
          <form action="/vote/{{$poll->id}}/poll" method="get">
            @foreach ($options as $option)
              <div class="custom-control custom-radio">
                <input type="radio" class="custom-control-input" value="{{$option->id}}" id="option{{$option->id}}" name="option[]">
                <label class="custom-control-label" for="option{{$option->id}}">{{$option->option}}</label>
              </div>
            @endforeach
            <div class="card-footer">
              <button type="submit" {{(Auth::check())==null ? 'disabled' : ''}} class="btn btn-primary">Vote</button>
            </div>
          </form>
        </div>
      </div>
      @endif
    </div>
    @endif
  </div>
  <div class="row">
    <div class="col-lg-2"></div>
    <div class="col-lg-6">
      <ul class="demo-tags">
        @foreach($blog->tags as $tag)
         <li><a href="{{ route('news.show', ['tag' => $tag->name]) }}"><i class="fas fa-hashtag"></i>{{$tag->name}}</a></li>
        @endforeach
      </ul>
    </div>
    <div class="col-lg-4"></div>
  </div>
</div>

<div class="container" style="margin-top: 20px;">
  <div class="row">
    <div class="col-lg-12">
      <h5 class="number-of-comments"><i class="fas fa-comment-alt" style="margin-right: 10px"></i>{{$numberOfComments}} Comments</h4>
        @foreach($comments as $comment)
        <div class="row" style="margin-bottom: 10px">
          <div class="col-lg-1" style="padding-right: 0">
            <img class="rounded-circle" style="height: 50px; width: 50px" src="{{asset ('/dist/img/avatar.png') }}" alt="User Image">
          </div>
          <div class="col-lg-3 text-left" style="padding-left:0">
            <div class="comment-on-post">
              <p class="user-comments">{{$comment->username}}
                <span class="comments-time">
                  {{date('F d, Y', strtotime($comment->created_at))}} at {{date('g:ia', strtotime($comment->created_at))}}
                </span>
              </p>
              <p class="comments">{{$comment->content}}</p>
            </div>
          </div>
        </div>
        @endforeach
    </div>
  </div>
  <form action="/comments/{{$blog->id}}" method="GET">
    @csrf
    <div class="row">
      <div class="col-lg-6">
        <h4 class="leave-comment"><i class="fas fa-comment-alt" style="margin-right: 15px"></i>Leave comment</h4>
      </div>
    </div>
    <div class="row">
      <div class="col-lg-6">
        <div class="form-group">
          <label for="name">Username</label>
          <input type="text" class="form-control @error('username') border border-danger @enderror" name="username" placeholder="Your Name" >
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-lg-6">
        <div class="form-group">
          <label for="content">Your Comment</label>
          <textarea class="form-control textarea" rows="5" name="content" placeholder="Your comment" ></textarea>
        </div>
      </div>
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
  </form>
</div>

@include('layouts.template.footer')
