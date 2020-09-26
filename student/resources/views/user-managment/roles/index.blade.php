@include('dashboard.layouts.sidebar')

<!-- Main content -->
<section class="content">
	<div class="container-fluid">
		<div class="col-12">
			<div class="card" style="border-radius:10px; border-top: 5px solid blue;">
				<div class="card-header">
					<h3 class="card-title">List roles</h3>
				</div>
				<!-- /.card-header -->
				<div class="card-body">
					<table id="example1" class="table table-bordered table-striped">
						<thead>
							<tr>
								<th>Name</th>
								<th>Description</th>
								<th>Actions</th>
							</tr>
						</thead>
						<tbody>
								@foreach($roles as $role)
								<tr>
									<td>{{$role->name}}</td>
									<td>{{$role->description}}</td>
									<td>
										<a href="delete/{{$role->id}}/role" class="btn btn-app">
											<i class="fas fa-times" style="color:red"></i> Delete
										</a>
										<a href="/roles/{{$role->id}}" class="btn btn-app" >
											<i class="fas fa-low-vision"></i>Permissions
										</a>
									</td>
								</tr>
								@endforeach
						</tbody>
						<tfoot>
							<tr>
								<th>Name</th>
								<th>Description</th>
								<th>Actions</th>
							</tr>
						</tfoot>
					</table>
				</div>
			</div>
		</div>
	</div>
</section>

@include('user-managment.modals.create-role')

@include('user-managment.modals.assign-role')

@include('dashboard.layouts.footer')

<script>
  $(function () {
    $("#example1").DataTable();
  });
</script>
  
  
