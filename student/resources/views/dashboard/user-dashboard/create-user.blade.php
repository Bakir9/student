@include('dashboard.layouts.sidebar')

<!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!--Create users ---->
          <div class="col-md-6">
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Create account</h3>
            </div>
          <form  method = "post" action = "{{ url('/new_account') }}">
            @csrf
              <div class="card-body">
                <div class="row">
                  <div class="col-md-12">
                    <!-- select -->
                    <div class="form-group">
                      <label>Select Group</label>
                      <select name="type" class="form-control">
                        <option value="">- - -</option>
                        <option value="student">Student</option>
                        <option value="company">Company</option>
                      </select>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-sm-6">
                    <div class="form-group">
                      <label for="exampleInputfirst_name">First Name</label>
                      <input type="text" class="form-control" id="exampleInputfirst_name" name="first_name" placeholder="Enter First Name" required>
                    </div>
                  </div>
                  <div class="col-sm-6">
                    <div class="form-group">
                      <label for="exampleInputlast_name">Last Name</label>
                      <input type="text" class="form-control" id="exampleInputlast_name" name="last_name" placeholder="Last Name" required>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-sm-12">
                    <div class="form-group">
                      <label for="exampleInputEmail1">Email</label>
                      <input type="text" class="form-control" id="exampleInputEmail1" name="e_mail" placeholder="E-mail address" required>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-sm-12">
                    <div class="form-group">
                      <label for="exampleInputEmail1">Phone</label>
                      <input type="text" class="form-control" id="exampleInputPhone" name="phone" placeholder="Phone number" required>
                    </div>
                  </div>
                </div>
              <div class="row">
                <div class="col-sm-12">
                  <div class="form-group">
                    <label for="exampleInputUsername">Username</label>
                    <input type="text" class="form-control" id="exampleInputUsername" name="username" placeholder="Username" required>
                  </div>
                </div>
              </div>
                <div class="row">
                  <div class="col-sm-12">
                    <div class="form-group">
                      <label for="exampleInputPassword1">Password</label>
                      <input type="password" class="form-control" id="exampleInputPassword1" name="password" placeholder="Password" required>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-sm-12">
                    <div class="form-check">
                      <input type="checkbox" class="form-check-input" name="active" id="exampleCheck1" checked>
                      <label class="form-check-label" for="exampleCheck1">Active</label>
                    </div>
                  </div>
                </div>
              </div>
              <div class="card-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
              </div>
            </form>
          </div>
        </div><!---End creating user -->
      </div>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  @include('dashboard.layouts.footer')
 