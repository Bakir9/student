@include('dashboard.layouts.sidebar')

<!-- Main content -->
<section class="content">
	<div class="container-fluid">
		<!-- Small boxes (Stat box) -->
		<div class="row">
			<div class="col-lg-3 col-6">
				<!-- small box -->
				<div class="small-box bg-warning">
					<div class="inner">
						<h3>+</h3>
						<p>Create tag</p>
					</div>
					<div class="icon">
						<i class="far fa-plus-square"></i>
					</div>
					<a href="/tag/create" class="small-box-footer">Create Tag <i class="fas fa-arrow-circle-right"></i></a>
				</div>
			</div>
		</div>
		<div class="col-12">
			<div class="card">
				<div class="card-header">
					<h3 class="card-title">List of all tags</h3>
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
							@foreach($tags as $tag)
							<tr>
								<td>{{$tag->name}}</td>
								<td>{{$tag->slug}}</td>
								<td>
									<a href="/tag/{{$tag->id}}" class="btn btn-app">
											<i class="fas fa-edit"></i>Edit
										</a>
									<a href="/delete/{{$tag->id}}/tag " class="btn btn-app">
										<i class="fas fa-times" style="color:red"></i> Delete
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
  
