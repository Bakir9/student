@include('dashboard.layouts.sidebar')

<!-- Main content-->

<section class="content">
  <div class="container-fluid">
  <form action="/blogs/{{$blog->post_slug}}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="row">
      <div class="col-md-5">
        <div class="form-group">
          <label for="blog_title">Title</label>
          <input type="text" value="{{$blog->title}}" class="form-control @error('post_title') border border-danger @enderror" name="post_title" placeholder="Blog title" >
        </div>
      </div>
      <div class="col-md-4">
          <label for="exampleInputFile">File input</label>
          <div class="input-group">
            <div class="custom-file">
              <input type="file" class="custom-file-input @error('post_image') border border-danger @enderror" name="post_image">
              <label class="custom-file-label" for="exampleInputFile">Choose file</label>
            </div>
            <div class="input-group-append">
              <span class="input-group-text" id="">Upload new Image</span>
            </div>
          </div>
      </div>
      <div class="col-md-3 align-self-center">
        <div class="custom-control custom-checkbox">
          <input class="custom-control-input" type="checkbox" name="published" checked>
          <label for="customCheckbox1" class="custom-control-label">Publish</label>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-5">
        <div class="form-group">
          <label for="post_subtitle">Subtitle</label>
         <input type="text" value="{{$blog->subtitle}}" class="form-control @error('post_subtitle') border border-danger @enderror" name="post_subtitle" placeholder="Blog slug" >
        </div>
      </div>
      <div class="col-md-5">
        <div class="form-group">
          <label for="post_category">Select category</label>
          <select class="form-control @error('post_category') border border-danger @enderror" name="post_category">
            @foreach($categorys as $category)
              <option value="{{$category->id}}" {{old('post_slug', $blog->category_id) == $category->id ? 'selected' : ''}}>
                {{$category->name}}
              </option>
            @endforeach
          </select>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-5">
        <div class="form-group">
          <label for="post_slug">Slug</label>
          <input type="text" disabled value="{{$blog->post_slug}}" class="form-control @error('post_slug') border border-danger @enderror" name="post_slug" placeholder="Blog slug" >
        </div>
      </div>
      <div class="col-md-5">
          <div class="form-group">
            <label for="post_tag">Select tags</label>
            <select class="form-control js-example-basic-multiple @error('post_tag') border border-danger @enderror" name="post_tag[]" multiple="multiple">
              @foreach($tags as $tag)
                <option value="{{$tag->id}}" {{in_array($tag->id, old('post_tag[]', $blog->tags->pluck('id')->toArray())) ? 'selected' : ''}}>
                  {{$tag->name}}
                </option>
              @endforeach
            </select>
          </div>
        </div>
    </div>
    <div class="row">
      <div class="col-md-12">
        <div class="card card-outline card-info">
          <div class="card-header">
            <h3 class="card-title">
              Write Post
              <small>Simple and fast</small>
            </h3>
          </div>
          <div class="card-body">
            <div class="mb-3">
              <textarea id="mytextarea"  class="textarea @error('body') border border-danger @enderror" 
                name="body" placeholder="Place some text here"
                style="width: 100%; height: 500px !important;  font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">
                {!! $blog->body !!}
            </textarea>
            </div>
          </div>
          <div class="card-footer">
            <button type="submit" class="btn btn-primary">Save Changes</button>
          </div>
        </div>
      </div>
    </div>
  </form>
  </div>
</section>

@include('dashboard.layouts.footer')
<script src="../../plugins/summernote/summernote-bs4.min.js"></script>
