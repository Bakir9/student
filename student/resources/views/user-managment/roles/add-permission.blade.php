@include('dashboard.layouts.sidebar')

<!-- Main content -->
<section class="content">
	<div class="container-fluid">
		<div class="col-12">
			<div class="card" style="border-radius:10px; border-top: 5px solid blue;">
				<div class="card-header">
					<h3 class="card-title">Select permission for role: <span>{{$role->name}}</span></h3>
				</div>
				<!-- /.card-header -->
				<div class="card-body">
					<div class="row">
						<div class="col-md-12">
							<form action="/" method="POST">
								<div class="row">
									<div class="col-md-12">
										<h3 class="card-title" style="margin: 10px 0 10px 10px;">Blog</h3>
									</div>
								</div>
								<div class="row">
									@foreach($permissions as $permission)
										@if($permission->type == 'Blog')
											<div class="col-md-2">
												<div class="form-check">
													<input type="checkbox" class="form-check-input" value="{{$permission->id}}" name="permission[]" id="exampleCheck1">
													<label class="form-check-label" for="exampleCheck1">{{$permission->name}}</label>
												</div>
											</div>
										@endif
									@endforeach
								</div>
								<div class="row">
									<div class="col-md-12">
										<h3 class="card-title" style="margin: 10px 0 10px 10px;">Job</h3>
									</div>
								</div>
								<div class="row">
									@foreach($permissions as $permission)
										@if($permission->type == 'Job')
											<div class="col-md-2">
												<div class="form-check">
													<input type="checkbox" class="form-check-input" value="{{$permission->id}}" name="permission[]" id="exampleCheck1">
													<label class="form-check-label" for="exampleCheck1">{{$permission->name}}</label>
												</div>
											</div>
										@endif
									@endforeach
								</div>
								<div class="row">
									<div class="col-md-12">
										<h3 class="card-title" style="margin: 10px 0 10px 10px;">User</h3>
									</div>
								</div>
								<div class="row">
									@foreach($permissions as $permission)
										@if($permission->type == 'User')
											<div class="col-md-2" >
												<div class="form-check">
													<input type="checkbox" class="form-check-input" value="{{$permission->id}}" name="permission[]" id="exampleCheck1">
													<label class="form-check-label" for="exampleCheck1">{{$permission->name}}</label>
												</div>
											</div>
										@endif
									@endforeach
								</div>
								<div class="row">
									<div class="col-md-12">
										<h3 class="card-title" style="margin: 10px 0 10px 10px;">Poll</h3>
									</div>
								</div>
								<div class="row">
									@foreach($permissions as $permission)
										@if($permission->type == 'Poll')
											<div class="col-md-2">
												<div class="form-check">
													<input type="checkbox" class="form-check-input" value="{{$permission->id}}" name="permission[]" id="exampleCheck1">
													<label class="form-check-label" for="exampleCheck1">{{$permission->name}}</label>
												</div>
											</div>
										@endif
									@endforeach
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
@include('user-managment.modals.create-role')

@include('dashboard.layouts.footer')

  
