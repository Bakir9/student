@include('dashboard.layouts.sidebar')

<!-- Main content -->
<section class="content">
	<div class="container-fluid">
		<!-- Small boxes (Stat box) -->
		<div class="row">
			<div class="col-lg-3 col-6">
				<!-- small box -->
				<div class="small-box bg-lightblue">
					<div class="inner">
						<h3>+</h3>
						<p>Create Permission</p>
					</div>
					<div class="icon">
						<i class="far fa-plus-square"></i>
					</div>
					<button style="border: none; width: 100%" class="small-box-footer" data-toggle="modal" data-target="#create-permission">
						Create Permission
						<i class="fas fa-arrow-circle-right"></i></button>
        </div>
      </div>
		</div>
		<div class="col-12">
			<div class="card" style="border-radius:10px; border-top: 5px solid blue;">
				<div class="card-header">
					<h3 class="card-title">List Permissions</h3>
				</div>
				<!-- /.card-header -->
				<div class="card-body">
					<div class="row">
						<div class="col-sm-12">
							<h3 style="margin-top: 10px;">Blog</h3>
						</div>
					</div>
					<div class="row">
						@foreach($permissions as $permission)
							@if($permission->type == 'Blog')
								<div class="col-sm-3">
									<input type="hidden" name="permissionId" value="{{ $permission->id }}" />
									<div class="permission" style="margin-top: 10px;">
										<a class="btn btn-info" href="/delete/{{$permission->id}}/permission" style="margin-right: 5px; color: red;"><i class="fas fa-times"></i></a>
										<button class="btn btn-info open-modal" value="{{$permission->id}}" type="submit" style="margin-right: 5px" data-toggle="modal" data-target="#edit-permission"><i class="fas fa-pen"></i></button>
										<p style="display: inline">{{$permission->name}}</p>
									</div>
								</div>
							@endif
						@endforeach
					</div>
					<div class="row">
						<div class="col-sm-12">
							<h3 style="margin-top: 10px;">User</h3>
						</div>
					</div>
					<div class="row">
						@foreach($permissions as $permission)
							@if($permission->type == 'User')
								<div class="col-sm-3">
									<input type="hidden" name="permissionId" value="{{ $permission->id }}" />
									<div class="permission" style="margin-top: 10px;">
										<a class="btn btn-info " href="/delete/{{$permission->id}}/permission" style="margin-right: 5px; color: red;"><i class="fas fa-times"></i></a>
										<button class="btn btn-info open-modal btn-edit" name="permisija" value="{{$permission->id}}" type="submit" style="margin-right: 5px" data-toggle="modal" data-target="#edit-permission"><i class="fas fa-pen"></i></button>
										<p style="display: inline">{{$permission->name}}</p>
									</div>
								</div>
							@endif
						@endforeach
					</div>
					<div class="row">
						<div class="col-sm-12">
							<h3 style="margin-top: 10px;">Job</h3>
						</div>
					</div>
					<div class="row">
						@foreach($permissions as $permission)
							@if($permission->type == 'Job')
								<div class="col-sm-3">
									<input type="hidden" name="permissionId" value="{{ $permission->id }}" />
									<div class="permission" style="margin-top: 10px;">
										<a class="btn btn-info" href="/delete/{{$permission->id}}/permission" style="margin-right: 5px; color: red;"><i class="fas fa-times"></i></a>
										<button class="btn btn-info open-modal" value="{{$permission->id}}" type="submit" style="margin-right: 5px" data-toggle="modal" data-target="#edit-permission"><i class="fas fa-pen"></i></button>
										<p style="display: inline">{{$permission->name}}</p>
									</div>
								</div>
							@endif
						@endforeach
					</div>
					<div class="row">
						<div class="col-sm-12">
							<h3 style="margin-top: 10px;">Poll</h3>
						</div>
					</div>
					<div class="row">
						@foreach($permissions as $permission)
							@if($permission->type == 'Poll')
								<div class="col-sm-3">
									<input type="hidden" name="permissionId" value="{{ $permission->id }}" />
									<div class="permission" style="margin-top: 10px;">
										<a class="btn btn-info" href="/delete/{{$permission->id}}/permission" style="margin-right: 5px; color: red;"><i class="fas fa-times"></i></a>
										<button class="btn btn-info open-modal" value="{{$permission->id}}" type="submit" style="margin-right: 5px" data-toggle="modal" data-target="#edit-permission"><i class="fas fa-pen"></i></button>
										<p style="display: inline">{{$permission->name}}</p>
									</div>
								</div>
							@endif
						@endforeach
          </div>
          <div class="row">
						<div class="col-sm-12">
							<h3 style="margin-top: 10px;">Dashboard</h3>
						</div>
					</div>
					<div class="row">
						@foreach($permissions as $permission)
							@if($permission->type == 'Dashboard')
								<div class="col-sm-3">
									<input type="hidden" name="permissionId" id="permissionId" value="{{ $permission->id }}" />
									<div class="permission" style="margin-top: 10px;">
										<a class="btn btn-info" href="/delete/{{$permission->id}}/permission" style="margin-right: 5px; color: red;"><i class="fas fa-times"></i></a>
											<button class="btn btn-info open-modal" value="{{$permission->id}}" type="button" style="margin-right: 5px" data-toggle="modal" data-target="#edit-permission">
											<i class="fas fa-pen"></i>
										</button>
										<p style="display: inline">{{$permission->name}}</p>
									</div>
								</div>
							@endif
						@endforeach
					</div>
				</div>
			</div>
		</div>
	</div>
</section>

@include('user-managment.modals.edit-permission')
@include('user-managment.modals.create-permission')
@include('dashboard.layouts.footer')


<script>
$(document).on('click','.open-modal',function(){
	var permission_id = $(this).val();
	$.ajax({
		type: "GET",
		url: "/edit/"+ permission_id,
		success: function(data){
			$('#name').val(data.name);
			$('#description').val(data.description);
			$('#type').val(data.type);
			$('.edit-permission').modal('show');
		},
		error: function(data) {
			console.log("PROBLEM");
		}
	});
});

$('.btn-edit').on('click', function(){
	console.log("proslo");
	//var permisija = $('.btn-edit').val();
	var permisija =  $(this).closest('[name=permissionId]').val();
	var formAction = "/edit/" +permisija+ "/permission"
	var forma = $('.test').attr('action', formAction);
	
console.log(permisija);
});
/*
$('#edit-data').on('submit', function (e){
	e.preventDefault();
	var id = $("#permission_id").val();
	console.log(id);
	//var url = "{{URL('/edit/' .$permission->id. '/permission')}}";
	//console.log(url);
	$.ajax({
            url: '/edit/'+id+'/permission',
						type:"GET",
						data: {
							name:$('#name').val(),
							description:$('#description').val(),
							type:$('#type').val()
						},
			success: function (data){
						console.log(data);
			},
			error: function(error) {
						console.log(error);
			}
		});
	});/*
</script>

