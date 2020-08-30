<div class="modal fade permission-for-role" id="permission-for-role">
	<div class="modal-dialog modal-xl">
		<div class="modal-content">
			<div class="modal-header">
					<h4 class="modal-title">Select Permissions</h4>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
			</div>
			@if(!$user_role->isEmpty())
			<div class="modal-body">
				<div class="card">
					<form action="/permissions/role/{{$role->id}}" method="GET">
						@csrf
							<div class="card-body">
								<div class="row">
									<div class="col-md-12">
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
															<input type="checkbox" class="form-check-input" 
																		value="{{$permission->id}}" name="permission[]" id="exampleCheck1">
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
															<input type="checkbox" class="form-check-input" 
																		value="{{$permission->id}}" name="permission[]" id="exampleCheck1">
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
															<input type="checkbox" class="form-check-input" 
																		value="{{$permission->id}}" name="permission[]" id="exampleCheck1">
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
															<input type="checkbox" class="form-check-input"
															value="{{$permission->id}}" name="permission[]" id="exampleCheck1">
															<label class="form-check-label" for="exampleCheck1">{{$permission->name}}</label>
														</div>
													</div>
												@endif
											@endforeach
										</div>
								</div>
							</div>
						</div>
						<div class="modal-footer justify-content-between">
							<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
							<button type="submit" class="btn btn-primary">Save changes <i class="fas fa-pen" style="margin-left:5px"></i></button>
						</div>
					</form>
				</div>
			</div>
			@endif
		</div>
	</div>
</div>