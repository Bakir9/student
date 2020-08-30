<!-- Modal --->
<div class="modal fade assign-role" id="assign-role" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Assign Role to User</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="/edit/" method="POST">
					<div class="col-12-lg">
						<div class="card" style="border-radius:10px; border-top: 5px solid blue;">
							<div class="card-header">
								<h3 class="card-title">List roles</h3>
							</div>
							<!-- /.card-header -->
							<div class="card-body">
								<table id="example1" class="table table-bordered table-striped">
									<thead>
										<tr>
											<th>First Name</th>
											<th>Last Name</th>
											<th>Actions</th>
										</tr>
									</thead>
										<tbody>
											<tr>
												<td>Bakir</td>
												<td>Malkoc</td>
												<td>
													<a href="/roles/{{$role->id}}" class="btn btn-app">
														<i class="fas fa-low-vision"></i>Show Roles
													</a>
													<a href="#" class="btn btn-app" >
														<i class="fas fa-tasks"></i></i> Assigne
													</a>
												</td>
											</tr>
											<tr>
												<td>Neko</td>
												<td>Malkoc</td>
												<td>
													<a href="/roles/{{$role->id}}" class="btn btn-app">
														<i class="fas fa-low-vision"></i>Show Roles
													</a>
													<a href="#" class="btn btn-app" >
														<i class="fas fa-tasks"></i></i> Assigne
													</a>
												</td>
											</tr>
										</tbody>
									<tfoot>
										<tr>
											<th>First Name</th>
											<th>Last Name</th>
											<th>Actions</th>
										</tr>
									</tfoot>
								</table>
							</div>
						</div>
					</div>
        </form>
      </div>
    </div>
  </div>
</div>

<script>
  $(function () {
    $("#example1").DataTable();
  });
</script>