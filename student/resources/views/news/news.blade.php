@include ('layouts.template.header')

@include ('layouts.template.menu')

<div class="row justify-content-center no-margin" style="margin-top: 15px;">
	@forelse($blogs->slice(0,2) as $blog) 
	<div class="col-md-6">
		<div class="card-block" style="border: 2px solid gray">
			<div class="row no-margin">
        <div class="col-lg-7 no-padding">
          <img class="w-100" src="/images/{{$blog->image}}" alt="" style="height: 400px; width: 340px;">
        </div>
        <div class="col-lg-5 no-padding">
          <a href=""></a>
          <a href="blog/{{$blog->post_slug}}" class="news-title">{{ $blog->title }}</a>
          <p class="card-text news-desc">{{ $blog->subtitle }}</p>
        </div>
        </div>
      </div>
    </div>
    @empty 
      <p>Nema blogova za trazeni tag</p>
  @endforelse
</div>

<div class="row" style="margin: 10px 0 0 0 ">
  @foreach($blogs as $key => $blog) 
    @if($key > 1)
  <div class="col-lg-3" style="margin: 10px 0">
    <div class="card" >
      <img class="card-img-top" src="/images/{{$blog->image}}" style="height: 200px;" alt="Card image cap">
      <div class="card-body">
        <a href="blog/{{$blog->post_slug}}" class="news-title" style="margin-left: 0">{{ $blog->title }}</a>
        <p class="card-text news-desc" style="margin-left: 0">{{$blog->subtitle}}</p>
      </div>
    </div>
  </div>
    @endif
  @endforeach
</div>
  
@include ('layouts.template.footer')        