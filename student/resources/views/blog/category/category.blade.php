@include('dashboard.layouts.sidebar')

<!-- Main content -->
<section class="content">
	<div class="container-fluid">
		<!-- Small boxes (Stat box) -->
		<div class="row">
			<div class="col-lg-3 col-6">
				<!-- small box -->
				<div class="small-box bg-info">
					<div class="inner">
						<h3>+</h3>
						<p>Create category</p>
					</div>
					<div class="icon">
						<i class="far fa-plus-square"></i>
					</div>
					<a href="/category/create" class="small-box-footer">Create Category <i class="fas fa-arrow-circle-right"></i></a>
        </div>
      </div>
      <div class="col-lg-2 text-right">
        <label for="exampleInputPassword1">Default Category</label>
      </div>
      <div class="col-lg-5">
        <div class="row">
          <div class="col-lg-8">
            <div class="form-group">
              <select class="form-control @error('post_category') border border-danger @enderror" name="post_category">
                @foreach($categorys as $category)
                  <option value="{{$category->id}}" {{$category->default == 'yes' ? 'selected' : '' }}>{{$category->name}}</option>
                @endforeach
              </select>
            </div>
          </div>
        </div>
      </div>
		</div>
		<div class="col-12">
			<div class="card" style="border-radius:10px; border-top: 5px solid blue;">
				<div class="card-header">
					<h3 class="card-title">List of all category</h3>
				</div>
				<!-- /.card-header -->
				<div class="card-body">
					<table id="example1" class="table table-bordered table-striped">
						<thead>
							<tr>
								<th>Name</th>
								<th>Slug</th>
								<th>Actions</th>
							</tr>
						</thead>
						<tbody>
							@foreach($categorys as $category)
							<tr>
								<td>{{$category->name}}</td>
								<td>{{$category->slug}}</td>
								<td>
									<a href="/category/{{$category->id}}/edit" class="btn btn-app">
										<i class="fas fa-edit"></i>Edit
									</a>
									<a href="/delete/{{$category->id}}/category" class="btn btn-app">
										<i class="fas fa-times" style="color:red"></i> Delete
                  </a>
                  <a href="/category/{{$category->id}}/default" class="btn btn-app" >
                    <i class="fas fa-check-square {{$category->default == 'yes' ? 'is-default' : ''}}" ></i> 
                    {{$category->default == 'yes' ? 'Default' : 'Set Default'}}
									</a>
								</td>
							</tr>
							@endforeach
						</tbody>
						<tfoot>
							<tr>
								<th>Name</th>
								<th>Slug</th>
								<th>Actions</th>
							</tr>
						</tfoot>
					</table>
				</div>
			</div>
		</div>
	</div>
</section>

@include('dashboard.layouts.footer')

<script>
	$(function () {
	  $("#example1").DataTable();
	});
</script>
  
