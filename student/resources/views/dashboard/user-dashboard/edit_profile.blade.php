@include('dashboard.layouts.sidebar')

<section class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-lg-12">
        <div class="card card-primary card-outline">
          <div class="card-header">
            <h3 class="card-title">
              <i class="fas fa-edit"></i>
              User Info
            </h3>
          </div>
          <div class="card-body">
            <ul class="nav nav-tabs" id="custom-content-below-tab" role="tablist">
              <li class="nav-item">
                <a class="nav-link active" id="custom-content-below-home-tab" data-toggle="pill" href="#custom-content-below-home" role="tab" aria-controls="custom-content-below-home" aria-selected="true">Profile</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" id="custom-content-below-profile-tab" data-toggle="pill" href="#custom-content-below-profile" role="tab" aria-controls="custom-content-below-profile" aria-selected="false">Role</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" id="custom-content-below-messages-tab" data-toggle="pill" href="#custom-content-below-messages" role="tab" aria-controls="custom-content-below-messages" aria-selected="false">Permission</a>
              </li>
            </ul>
            <div class="tab-content" id="custom-content-below-tabContent">
              <div class="tab-pane fade show active" id="custom-content-below-home" role="tabpanel" aria-labelledby="custom-content-below-home-tab">
                <div class="card">
                  <div class="row">
                    <div class="col-lg-12">
                    <h3 style="margin: 15px 0 15px 20px">Profile: <span>{{ $user->first_name }} {{$user->last_name}}</span></h3>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-sm-3" >
                      <img class="d-block w-100" src="{{asset ('/dist/img/avatar.png') }}" alt="" style="padding-left: 20px">
                        <div class="form-group" style="margin: 20px">
                          <div class="input-group">
                            <div class="custom-file">
                              <input type="file" class="custom-file-input" id="exampleInputFile">
                              <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                            </div>
                            <div class="input-group-append">
                              <span class="input-group-text" id="">Upload</span>
                            </div>
                          </div>
                        </div>
                        <table class="table table-striped table-responsive" style="margin: 0 20px">
                          <tbody>
                            <tr style="width: 100px">
                              <td style="font-size: 15px;">Status</td>
                                @if($user->active == 1)
                                  <td><span class="badge bg-success">Active</span></td>
                                @else 
                                  <td><span class="badge bg-warning">Disabled</span></td>
                                @endif
                            </tr>
                            <tr>
                              <td style="font-size: 15px;">Member since</td>
                              <td style="font-size: 15px;">{{$user->created_at}}</td>
                            </tr>
                          </tbody>
                        </table>
                    </div>
                    <div class="col-sm-9">
                      <div class="card-block">
                          <h3>Account Settings</h3>
                        <form action="/user/{{$user->id}}" method="POST">
                          @csrf
                          @method('PUT')
                            <div class="form-group">
                              <div class="row">
                                <div class="col-sm-3 text-right">
                                  <label class="align-self-center" for="exampleInputPassword1" style="font-style:normal">E-mail</label>
                                </div>
                                <div class="col-sm-5">
                                <input type="text" class="form-control" id="exampleInputEmail" name="e_mail" value="{{$user->e_mail}}" required>
                                </div>
                              </div>
                            </div>
                            <div class="form-group">
                              <div class="row">
                                <div class="col-sm-3 text-right">
                                  <label for="exampleInputPassword1">Phone</label>
                                </div>
                                <div class="col-sm-5">
                                  <input type="text" class="form-control" id="exampleInputUsername" name="phone" value="{{$user->phone}}" required>
                                </div>
                              </div>
                            </div>
                            <div class="form-group">
                              <div class="row">
                                <div class="col-sm-3 text-right">
                                  <label for="exampleInputPassword1">Username</label>
                                </div>
                                <div class="col-sm-5">
                                  <input type="text" class="form-control" id="exampleInputUsername" name="username" value="{{$user->username}}" required>
                                </div>
                              </div>
                            </div>
                            <div class="form-group">
                              <div class="row">
                                <div class="col-sm-8 text-right">
                                  <button type="submit" class="btn btn-primary">Save</button>
                                </div>
                                <div class="col-sm-2"></div>
                              </div>
                            </div>
                          </form>
                      </div>
                      <div class="card-block">
                        <h3>Change password</h3>
                        <form action="/password_change/{{$user->id}}" method="POST">
                          @csrf
                          @method('PUT')
                          <div class="form-group">
                            <div class="row">
                              <div class="col-sm-3 text-right">
                                <label for="exampleInputPassword1">Current Password</label>
                              </div>
                              <div class="col-sm-5">
                                <input type="password" class="form-control" id="current_password" name="current_password" placeholder="Current Password" >
                              </div>
                            </div>
                          </div>
                          <div class="form-group">
                            <div class="row">
                              <div class="col-sm-3 text-right">
                                <label for="exampleInputPassword1">New Password</label>
                              </div>
                              <div class="col-sm-5">
                                <input type="password" class="form-control" id="new_password" name="new_password" placeholder="New Password" >
                                <!--<progress max="100" value="0" id="strength" style="width:300px;"></progress>-->
                              </div>
                            </div>
                          </div>
                          <div class="form-group">
                            <div class="row">
                              <div class="col-sm-3 text-right">
                                <label for="exampleInputPassword1">Confirm Password</label>
                              </div>
                              <div class="col-sm-5">
                                <input type="password" class="form-control" id="confirm_password" name="confirm_password" placeholder="Confirm Password" >
                              </div>
                            </div>
                          </div>
                          <div class="form-group">
                            <div class="row">
                              <div class="col-sm-8 text-right">
                                <button type="submit" id="change" class="btn btn-primary">Save</button>
                              </div>
                              <div class="col-sm-2"></div>
                            </div>
                          </div>
                        </form>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="tab-pane fade" id="custom-content-below-profile" role="tabpanel" aria-labelledby="custom-content-below-profile-tab">
                <button type="button" name="user_id" value="{{$user->id}}" 
                        class="btn btn-primary" data-toggle="modal" data-target="#create-role" style="margin: 15px 0">
                  Create Role <i class="fas fa-arrow-circle-right"></i>
                </button>
                <!--Test -->
                @if(!$user_role->isEmpty())
                  @foreach($user_role as $role)
                  <div id="accordion">
                    <div class="card">
                      <div class="card-header" id="headingOne">
                        <div class="row">
                          <div class="col-md-8">
                            <h5 class="mb-0">
                              <button name="role_id" value="{{$role->id}}" class="btn btn-link" data-toggle="modal" 
                                      data-target="#permission-for-role">
                                {{$role->name}}
                              </button>
                            </h5>
                          </div>
                          <div class="col-md-4">
                            <p class="text-secondary" style="margin-top: 20px;"> {{$role->description}}</p>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  @endforeach
                @endif
                <!--kraj test-->
              </div>
              <div class="tab-pane fade" id="custom-content-below-messages" role="tabpanel" aria-labelledby="custom-content-below-messages-tab">
                <div class="row">
                  <div class="col-md-12">
                    <h3>Role: <span>Administrator</span></h3>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-2">
                    <a href=""><i class="fas fa-check" style="color: green"></i>Edit User</a>
                  </div>
                  <div class="col-md-2">
                    <a href=""><i class="fas fa-check" style="color: green"></i>Edit User</a>
                  </div>
                  <div class="col-md-2">
                    <a href=""><i class="fas fa-check" style="color: green"></i>Edit User</a>
                  </div>
                  <div class="col-md-2">
                    <a href=""><i class="fas fa-check" style="color: green"></i>Edit User</a>
                  </div>
                  <div class="col-md-2">
                    <a href=""><i class="fas fa-check" style="color: green"></i>Edit User</a>
                  </div>
                  <div class="col-md-2">
                    <a href=""><i class="fas fa-check" style="color: green"></i>Edit User</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- /.card -->
        </div>
      </div>
    </div>
  </div>
</section>

@include('user-managment.modals.create-role')
@include('user-managment.modals.permission-for-role')
@include('dashboard.layouts.footer')
<script>
  $(function () {
  $('[data-toggle="tooltip"]').tooltip()
})
</script>