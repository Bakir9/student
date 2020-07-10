@include('dashboard.layouts.sidebar')

<!-- Main content -->

<section class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-6">
        <div class="card card-primary">
          <div class="card-header">
            <h3 class="card-title"><i class="fas fa-poll-h" style="font-size: 30px; margin-right:10px"></i> Create poll</h3>
          </div>
        <form  method = "post" action = "{{ url('/poll/create') }}">
          @csrf
            <div class="card-body">
              <div class="row">
                <div class="col-sm-12">
                  <div class="form-group">
                    <label for="exampleFormControlTextarea1">Question ?</label>
                    <textarea class="form-control @error('question') border border-danger @enderror" placeholder="Question ?" id="question" name="question" rows="3" value="{{ old('question') }}" required></textarea>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-sm-12">
                  <h3 class="card-title" style="margin-bottom: 10px;">Options</h3>
                </div>
              </div>
              <div class="options" id="options">
              <div class="row">
                <div class="col-sm-1"></div>
                <div class="col-sm-11">
                  <div class="form-group">
                    <input type="text" class="form-control @error('option') border border-danger @enderror" name="option[]"
                           placeholder="Ex: Options 1"  value="{{old('option')}}" required>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-sm-1"></div>
                <div class="col-sm-11">
                  <div class="form-group">
                    <input type="text" class="form-control @error('option') border border-danger @enderror" name="option[]"
                           placeholder="Ex: Options 2" value="{{old('option')}}" required>
                  </div>
                </div>
              </div>
            </div>
              <div class="row">
                <div class="col-sm-1"></div>
                <div class="col-sm-11">
                  <a type="button" class="btn btn-primary" onclick="addElement();"><i class="fas fa-plus-square"></i></a>
                </div>
              </div>
              <div class="row">
                <div class="col-md-4">
                  <div class="form-group">
                    <label for="start_at">Start At</label>
                    <input class="datepicker form-control @error('start_at') border border-danger @enderror" type="date" name="start_at"  id="start_at" value="{{ old('start_at')}}">
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label for="example-date-input">End At</label>
                    <input class="form-control @error('end_at') border border-danger @enderror" type="date" name="end_at"  id="end_at" value="{{ old('end_at') }}" required>
                  </div>
                </div>
              </div>
            </div>
            <div class="card-footer">
              <button type="submit" class="btn btn-primary">Create</button>
            </div>
          </form>
        </div>
      </div>
      <div class="col-md-6">
        <div id="calendar">
        </div>
      </div>
    </div>
  </div>
</section>

@include('dashboard.layouts.footer')

    