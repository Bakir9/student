@include('dashboard.layouts.sidebar')

<section class="content">
    <div class="container-fluid">
      <div class="row">
          <div class="col-lg-12">
              <div class="card">
                <div class="row">
                  <div class="col-lg-12">
                  <h3 style="margin: 15px 0 15px 20px">Profile: <span>{{ $user->first_name }} {{$user->last_name}}</span></h3>
                  </div>
                </div>
                <div class="row">
                  <div class="col-sm-3" >
                    <img class="d-block w-100" src="{{asset ('/dist/img/profilna.jpg') }}" alt="" style="padding-left: 20px">
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
                                <td><span class="badge bg-success">Active</span></td></td>
                              @else 
                                <td><span class="badge bg-warning">Disabled</span></td></td>
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
      </div>
    </div>
</section>

@include('dashboard.layouts.footer')

