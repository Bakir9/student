@include('dashboard.layouts.sidebar')

<section class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-lg-12">
        <div class="card card-primary card-outline">
          <div class="card-header">
            <h3 class="card-title">
              <i class="fas fa-edit"></i>
              Edit Permission for Role <span>{{$role->name}}</span>
            </h3>
          </div>
          <div class="card-body">
						<div class="row">
							<div class="col-md-12">
								<form action="/user/{{$user->id}}/role/{{$role->id}}/update" method="GET">
									@csrf
									<div class="row">
										<div class="col-md-12">
											<h3 class="card-title" style="margin: 10px 0 10px 10px;">Blog</h3>
										</div>
									</div>
									<div class="row">
										@foreach($permissions as $permission)
											@if($permission->type =='Blog')
												<div class="col-md-2">
													<div class="form-check">
														<input type="checkbox" class="form-check-input" 
																	value="{{$permission->id}}" name="permission[]" id="exampleCheck1"
																	{{in_array($permission->id, $role->permissions->pluck('id')->toArray()) ? 'checked' : '' }}>
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
											@if($permission->type =='Job')
												<div class="col-md-2">
													<div class="form-check">
														<input type="checkbox" class="form-check-input" 
																	value="{{$permission->id}}" name="permission[]" id="exampleCheck1"
																	{{in_array($permission->id, $role->permissions->pluck('id')->toArray()) ? 'checked' : '' }}>
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
											@if($permission->type =='User')
												<div class="col-md-2" >
													<div class="form-check">
														<input type="checkbox" class="form-check-input" 
																	value="{{$permission->id}}" name="permission[]" id="exampleCheck1"
																	{{in_array($permission->id, $role->permissions->pluck('id')->toArray()) ? 'checked' : '' }}>
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
											@if($permission->type =='Poll')
												<div class="col-md-2">
													<div class="form-check">
														<input type="checkbox" class="form-check-input"
																	 value="{{$permission->id}}" name="permission[]" id="exampleCheck1"
																	 {{in_array($permission->id, $role->permissions->pluck('id')->toArray()) ? 'checked' : '' }}>
														<label class="form-check-label" for="exampleCheck1">{{$permission->name}}</label>
													</div>
												</div>
												@endif
											@endforeach
									</div>
									<div class="card-footer" style="margin-top: 10px">
										<div class="row">
											<div class="col-md-12">
												<button type="submit"  class="btn btn-primary">Save <i class="fas fa-check" style="margin-left:5px"></i></button>
											</div>
										</div>
									</div>
								</form>
							</div>
						</div>
          </div>
          <!-- /.card -->
        </div>
      </div>
    </div>
  </div>
</section>


@include('dashboard.layouts.footer')