@include('dashboard.layouts.sidebar')

<!-- Main content -->

<section class="content">
  <div class="container-fluid">
    <div class="col-12">
      <div class="card" style="border-radius: 10px; border-top: 5px solid #00a8cc">
        <div class="card-header">
          <h3 class="card-title">Currently active jobs</h3>
        </div>
        <div class="card-body">
          <table id="example1" class="table table-bordered table-striped">
            <thead>
              <tr>
                <th>Job Title</th>
                <th>Company</th>
                <th>Type of Job</th>
                <th>Deadline</th>
                <th>Actions</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($jobs as $job)
              <tr>
                <td>{{ $job->job_title }}</td>
                <td>{{ $job->company }}</td>
                <td>{{ implode(',',$job->type_of_job) }}</td>
                <td>{{ $job->valid_until }}</td>
                <td>
                  <a href="/job/{{ $job->id }}/edit" class="btn btn-app">
                    <i class="fas fa-edit"></i>Edit
                  </a>
                  <a href="/delete/{{ $job->id }}/job" class="btn btn-app">
                    <i class="fas fa-times" style="color:red"></i> Delete
                  </a>
                </td>
              </tr>
              @endforeach
            </tbody>
            <tfoot>
              <tr>
                <th>Job Title</th>
                <th>Company</th>
                <th>Type of Job</th>
                <th>Deadline</th>
                <th>Actions</th>
              </tr>
            </tfoot>
          </table>
        </div>
      </div>
    </div>
  </div>
</section>

@include('dashboard.layouts.footer')
<script>
  $(function () {
    $("#example1").DataTable();
  });
</script>
  