@include('dashboard.layouts.sidebar')

<!-- Main content -->

<section class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-6">
        <div class="card card-primary">
          <div class="card-header">
            <h3 class="card-title"><i class="far fa-edit" style="font-size: 30px; margin-right:10px"></i> Edit Poll</h3>
          </div>
        <form  method = "post" action = "/poll/{{$poll->id}}/update">
          @csrf
            <div class="card-body">
              <div class="row">
                <div class="col-sm-12">
                  <div class="form-group">
                    <label for="exampleFormControlTextarea1">Question ?</label>
									<textarea class="form-control @error('question') border border-danger @enderror" placeholder="Question ?" id="question" name="question" rows="3" {{($poll->isActive == 1 || $poll->isActive == 0 )? 'disabled'  : ''}}>{{$poll->question}}</textarea>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-sm-12">
                  <h3 class="card-title" style="margin-bottom: 10px;">Options</h3>
                </div>
              </div>
              <div class="options" id="options">
								@foreach($options as $option)
              <div class="row">
                <div class="col-sm-1"></div>
                <div class="col-sm-11">
                  <div class="form-group">
                    <input type="text" class="form-control @error('option') border border-danger @enderror" name="option[]"
												placeholder="Ex: Options 1"  value="{{$option->option}}" {{($poll->isActive == 1 || $poll->isActive == 0 )? 'disabled'  : ''}} disabled>
                  </div>
                </div>
							</div>
							@endforeach
						</div>
						@if($poll->isActive == 2)
              <div class="row">
                <div class="col-sm-1"></div>
                <div class="col-sm-11">
                  <a type="button" class="btn btn-primary" onclick="addElement();"><i class="fas fa-plus-square"></i></a>
                </div>
							</div>
							@endif
              <div class="row">
                <div class="col-md-4">
                  <div class="form-group">
                    <label for="start_at">Start At</label>
                    <input class="form-control @error('start_at') border border-danger @enderror" type="date" name="start_at"  id="start_at" value="{{$poll->start_at}}" required {{($poll->isActive == 1 || $poll->isActive == 0 )? 'disabled'  : ''}}>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label for="example-date-input">End At</label>
                    <input class="form-control @error('end_at') border border-danger @enderror" type="date" name="end_at"  id="end_at" value="{{$poll->end_at}}" {{$poll->isActive == 1 ? 'disabled'  : ''}} required>
                  </div>
                </div>
              </div>
            </div>
            <div class="card-footer">
              <button type="submit" class="btn btn-primary">Save</button>
            </div>
          </form>
        </div>
      </div><!---End editing poll -->
			<!--Possible to show current result if poll is active -->
			<div class="col-md-6">
				<div class="row">
					<div class="col-sm-12">
						<div class="alert alert-danger alert-dismissible">
							<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
							<h5><i class="icon fas fa-ban"></i> Alert!</h5>
							Because, this poll is currently active, you only have optios to edit <strong>END DATE</strong>.
							Also, you can see current result of your poll !
						</div>
					</div>
				</div>
				<!-- Result from current poll -->
					@include('poll.result')
			</div>
    </div>
  </div>
</section>

@include('dashboard.layouts.footer')

    