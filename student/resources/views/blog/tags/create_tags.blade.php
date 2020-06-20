@include('dashboard.layouts.sidebar')

<!-- Main content -->

<section class="content">
  <div class="container-fluid">
  <div class="row">
    <div class="col-md-12">
      <div class="card card-outline card-info">
        <div class="card-header">
          <h3 class="card-title">
              Add new Tag
          </h3>
        </div>
        <!-- /.card-header -->
      <form method = "post" action="{{ url('/tag/create/new') }}">
        @csrf
        <div class="card-body" style="padding-bottom: 0">
          <div class="row">
            <div class="offset-md-3 col-md-6">
              <div class="form-group">
                <label for="Tag Name">Tag name</label>
                <input type="text" class="form-control @error('name') border border-danger @enderror" id="name" name="name" placeholder="Tag name" >
                @error('name')
                  <p class="text-danger" role="alert">The name field is required</p>
                @enderror
              </div>
            </div>
          </div>
          <div class="row">
            <div class="offset-md-3 col-md-6">
              <div class="form-group">
                <label for="Tag Slug">Tag slug</label>
                <input type="text" class="form-control @error('slug') border border-danger @enderror" name="slug" placeholder="Tag slug" >
                @error('slug')
                  <p class="text-danger" role="alert">The slug field is required</p>
                @enderror
              </div>
            </div>
          </div>
        </div>
        <div class="card-footer" style="padding-top: 0">
          <div class="offset-md-3 col-md-6">
            <button type="submit" class="btn btn-info">Submit</button>
          </div>
        </div>
      </form>
      </div>
      </div>
    </div>
  </div>
</section>

@include('dashboard.layouts.footer')

    