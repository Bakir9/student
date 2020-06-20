@include('dashboard.layouts.sidebar')

<!-- Main content -->

<section class="content">
  <div class="container-fluid">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">All Blogs</h3>
        </div>
        <div class="card-body">
          <table id="example1" class="table table-bordered table-striped">
            <thead>
              <tr>
                <th>Title</th>
                <th>Author</th>
                <th>Created at</th>
                <th>Actions</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($blogs as $blog)
              <tr>
                <td>{{ $blog->title }}</td>
                  <td>{{ $blog->user['first_name'] }}</td>
                <td>{{ $blog->created_at }}</td>
                <td>
                  <a href="/blog/{{ $blog->post_slug}}/edit" class="btn btn-app">
                    <i class="fas fa-edit"></i>Edit
                  </a>
                  <a href="/delete/{{ $blog->id }}/blog" class="btn btn-app">
                    <i class="fas fa-times" style="color:red"></i> Delete
                  </a>
                  <a href="/blog/{{$blog->id}}/comments" class="btn btn-app">
                    <i class="fas fa-comments" style="color:black"></i> Comments
                  </a>
                </td>
              </tr>
              @endforeach
            </tbody>
            <tfoot>
              <tr>
                <th>Title</th>
                <th>Author</th>
                <th>Created at</th>
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
  