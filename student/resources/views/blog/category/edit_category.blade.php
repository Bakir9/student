@include('dashboard.layouts.sidebar')

<!-- Main content -->

<section class="content">
  <div class="container-fluid">
  <div class="row">
    <div class="col-md-12">
      <div class="card card-outline card-info">
        <div class="card-header">
          <h3 class="card-title">
              Edit Category
          </h3>
        </div>
        <!-- /.card-header -->
      <form method = "POST" action="/category/{{$category->id}}/update">
        @csrf
        @method('PUT')
        <div class="card-body" style="padding-bottom: 0">
          <div class="row">
            <div class="offset-md-3 col-md-6">
              <div class="form-group">
                <label for="Category Name">Category name</label>
                <input type="text" class="form-control @error('name') border border-danger @enderror" name="name" value="{{$category->name}}"placeholder="Category name" >
                @error('name')
                 <p class="text-danger" role="alert">This field is required</p>
                @enderror
              </div>
            </div>
          </div>
          <div class="row">
            <div class="offset-md-3 col-md-6">
              <div class="form-group">
                <label for="Category Slug">Category slug</label>
                <input type="text" class="form-control @error('name') border border-danger @enderror" name="slug" value="{{$category->slug}}" placeholder="Category slug" required>
                @error('slug')
                  <p class="text-danger" role="alert">This field is required</p>
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

    