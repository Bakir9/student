@include('dashboard.layouts.sidebar')

<section class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-lg-3 col-6">
        <div class="small-box bg-gradient-success">
          <div class="inner">
            <h3>+</h3>
            <p>Create account</p>
          </div>
          <div class="icon">
              <i class="fas fa-user-plus"></i>
          </div>
          <a href="/newUser" class="small-box-footer">Create account<i class="fas fa-arrow-circle-right"></i></a>
        </div>
      </div>
      <div class="col-lg-3 col-6">
        <div class="small-box bg-gradient-warning">
          <div class="inner">
          <h3>{{ $all_users }}</h3>
            <p>User Registrations</p>
          </div>
          <div class="icon">
            <i class="fas fa-user-friends"></i>
          </div>
          <a href="#" class="small-box-footer">More info<i class="fas fa-arrow-circle-right"></i></a>
        </div>
      </div>
      <div class="col-lg-3 col-6">
        <div class="small-box bg-info">
          <div class="inner">
          <h3>{{ $active_user }}</h3>
            <p>Active User</p>
          </div>
          <div class="icon">
            <i class="fas fa-user"></i>
          </div>
          <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
      </div>
      <div class="col-12">
        <div class="card">
          <div class="card-header">
            <h3 class="card-title">List of all users</h3>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <table id="example1" class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th>First Name</th>
                  <th>Last Name</th>
                  <th>Username</th>
                  <th>E-mail</th>
                  <th>Type</th>
                  <th>Active</th>
                  <th>Actions</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($users as $user)
                <tr>
                  <td>{{ $user->first_name }}</td>
                  <td>{{ $user->last_name }}</td>
                  <td>{{ $user->username }}</td>
                  <td>{{ $user->e_mail }}</td>
                  <td>{{ $user->type }}</td>
                  <td>{{ $user->active == 1 ? 'Active' : 'Disabled' }}</td>
                  <td>
                  <a href="/user/{{ $user->id}}/edit" class="btn btn-app">
                      <i class="fas fa-edit"></i>Edit
                    </a>
                  <a href="/delete/{{ $user->id }}/user " class="btn btn-app">
                      <i class="fas fa-times" style="color:red"></i> Delete
                    </a>
                    @if ($user->active == 1) 
                     <a href="/status_change/{{$user->id}} " name="status" value="0" class="btn btn-app">
                      <i class="fas fa-lock-open" style="color:red"></i>Disable
                    </a> 
                    @else 
                  <a href="/status_change/{{$user->id}}" name="status" value="1" class="btn btn-app">
                      <i class="fas fa-lock" style="color:green"></i>Activate
                    </a>
                    @endif
                  </td>
                </tr>
                @endforeach
              </tbody>
              <tfoot>
                <tr>
                  <th>First Name</th>
                  <th>Last Name</th>
                  <th>Username</th>
                  <th>E-mail</th>
                  <th>Type</th>
                  <th>Active</th>
                  <th>Actions</th>
                </tr>
              </tfoot>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

@include('dashboard.layouts.footer')

<script>
  $(function () {
    $("#example1").DataTable();
  });
</script>
  