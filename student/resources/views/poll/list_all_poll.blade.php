@include('dashboard.layouts.sidebar')

<!-- Main content -->

<section class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-lg-12">
        <form action="delete/poll" method="get">
          @csrf
          <button type="submit" class="btn btn-primary">Submit</button>
        </form>
      </div>
    </div>
    <div class="col-12">
      <div class="card" style="border-radius: 10px; border-top: 5px solid #00a8cc">
        <div class="card-header">
          <h3 class="card-title">List of Poll</h3>
        </div>
        <div class="card-body">
          <table id="example1" class="table table-bordered table-striped">
            <thead>
              <tr>
                <th>Question</th>
                <th>Start & End</th>
								<th>Status</th>
								<th>Created by</th>
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
									<td>{{$poll->user['first_name']}} {{$poll->user['last_name']}}</td>
									<td>
                    <a href="/poll/{{ $poll->id }}/edit" class="btn btn-app">
											<i class="fas fa-edit"></i>Edit
                    </a>
                    <a href="/poll/{{ $poll->id }}/delete" class="btn btn-app">
                      <i class="fas fa-times" style="color:red"></i> Delete
										</a>
										@if($poll->isActive == 1)
											<a href="/poll/{{ $poll->id }}/status" class="btn btn-app">
												<i class="fas fa-lock" style="color:rgb(133, 48, 48)"></i>Close
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
								<th>Created by</th>
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
  