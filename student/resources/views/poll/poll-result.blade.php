@include('dashboard.layouts.sidebar')

<!-- Main content -->
<section class="content">
  <div class="container-fluid">
    <div class="row">
			<!--Possible to show current result if poll is active -->
			<div class="col-md-6">
				<div class="row">
          @if($poll->isActive == 1)
			<div class="col-sm-12">
				<div class="alert alert-warning alert-dismissible">
					<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
					<h5><i class="icon fas fa-ban"></i> Alert!</h5>
					This poll is currently active.  
				</div>
          </div>
          @elseif ($poll->isActive == 0)
			<div class="col-sm-12">
				<div class="alert alert-danger alert-dismissible">
					<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
					<h5><i class="icon fas fa-ban"></i> Alert!</h5>
					Closed poll
				</div>
			</div>
			@elseif ($poll->isActive == 2)
          <div class="col-sm-12">
			<div class="alert alert-info alert-dismissible">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
				<h5><i class="icon fas fa-info"></i> Alert!</h5>
				Poll is currently on hold
			</div>
          </div>
          @endif
				</div>
				<!-- Result from current poll -->
					@include('poll.result')
			</div>
			<div class="col-md-6">
				<div class="card" style="border-left: 3px solid red; border-radius-left: 20px;">
					<div class="card-header">
						<h3 class="card-title">
							<i class="fas fa-info"></i>
							Info about poll
						</h3>
					</div>
					<div class="card-body">
						<dl class="row">
							<dt class="col-sm-4">Start At:</dt>
							<dd class="col-sm-8">{{$poll->start_at}}</dd>
							<dt class="col-sm-4">End At:</dt>
							<dd class="col-sm-8">{{$poll->end_at}}</dd>
							<dt class="col-sm-4">Sum of voting:</dt>
							<dd class="col-sm-8">{{$sum}}</dd>
						</dl>
					</div>
				</div>
			</div>
    </div>
  </div>
</section>

@include('dashboard.layouts.footer')

    