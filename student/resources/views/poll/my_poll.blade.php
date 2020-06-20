@include('dashboard.layouts.sidebar')

<!-- Main content -->

<section class="content">
  <div class="container-fluid">
    <div class="col-12">
      <div class="card" style="border-radius: 10px; border-top: 5px solid #00a8cc">
        <div class="card-header">
          <h3 class="card-title">My Poll</h3>
        </div>
        <div class="card-body">
          <table id="example1" class="table table-bordered table-striped">
            <thead>
              <tr>
                <th>Question</th>
                <th>Start & End</th>
                <th>Status</th>
                <th>Actions</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($polls as $poll)
              <tr>
								<td>{{$poll->question}}</td>
								<td>{{$poll->start_at}} - {{$poll->end_at}}</td>
						
								@if($poll->isActive == 1)
									<td>Active</td>
								@else 
									<td>Closed</td>
								@endif
                <td>
                  <a href="/poll/{{ $poll->id }}/edit" class="btn btn-app">
                    <i class="fas fa-edit"></i>Edit
                  </a>
                  <a href="/poll/{{ $poll->id }}/delete" class="btn btn-app">
                    <i class="fas fa-times" style="color:red"></i> Delete
									</a>
									@if($poll->isActive == 1)
										<a href="/poll/{{ $poll->id }}/status" class="btn btn-app">
											<i class="fas fa-window-close" style="color:red"></i>Close
										</a>
									@endif
                  <a href="/poll/{{ $poll->id }}/result" class="btn btn-app">
                    <i class="fas fa-chart-pie" style="color:blue"></i>Result
                  </a>
                </td>
							</tr>
							@endforeach
            </tbody>
            <tfoot>
              <tr>
                <th>Question</th>
                <th>Start & End</th>
                <th>Status</th>
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
  