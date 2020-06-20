@include('dashboard.layouts.sidebar')

<!-- Main content -->

<section class="content">
  <div class="container-fluid">
  <form action="{{ url('/blog/create') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="row">
      <div class="col-md-5">
        <div class="form-group">
          <label for="blog_title">Post Title</label>
          <input type="text" class="form-control @error('post_title') border border-danger @enderror" name="post_title" placeholder="Blog title" >
        </div>
      </div>
      <div class="col-md-3">
          <label for="exampleInputFile">File input</label>
          <div class="input-group">
            <div class="custom-file">
              <input type="file" class="custom-file-input @error('post_image') border border-danger @enderror" name="post_image">
              <label class="custom-file-label " for="exampleInputFile">Choose file</label>
            </div>
            <div class="input-group-append">
              <span class="input-group-text" id="">Upload</span>
            </div>
          </div>
      </div>
      <div class="col-md-4 align-self-center">
        <div class="custom-control custom-checkbox">
          <input class="custom-control-input" type="checkbox" name="published" checked>
          <label for="customCheckbox1" class="custom-control-label">Publish</label>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-5">
        <div class="form-group">
          <label for="post_subtitle">Post subtitle</label>
          <input type="text" class="form-control @error('post_subtitle') border border-danger @enderror" name="post_subtitle" placeholder="Blog slug" >
        </div>
      </div>
      <div class="col-md-5">
        <div class="form-group">
          <label for="post_category">Select category</label>
          <select class="form-control @error('post_category') border border-danger @enderror" name="post_category">
            <option>Select Categorie</option>
            @foreach($categorys as $category)
              <option value="{{$category->id}}">{{$category->name}}</option>
            @endforeach
          </select>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-5">
        <div class="form-group">
          <label for="post_slug">Post Slug</label>
          <input type="text" class="form-control @error('post_slug') border border-danger @enderror" name="post_slug" placeholder="Blog slug" >
        </div>
      </div>
      <div class="col-md-5">
          <div class="form-group">
            <label for="post_tag">Select tags</label>
            <select class="form-control js-example-basic-multiple @error('post_tag') border border-danger @enderror" name="post_tag[]" multiple="multiple">
              @foreach($tags as $tag)
                <option value="{{$tag->id}}">{{$tag->name}}</option>
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
              <textarea id="mytextarea" style="height: 300px;" class="textarea @error('body') border border-danger @enderror" name="body" placeholder="Place some text here"
                style="width: 100%;  font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">
              </textarea>
            </div>
          </div>
          <div class="card-footer">
            <button type="submit" class="btn btn-primary">Submit</button>
          </div>
        </div>
      </div>
    </div>
  </form>
  </div>
</section>

@include('dashboard.layouts.footer')
<script src="../../plugins/summernote/summernote-bs4.min.js"></script>
