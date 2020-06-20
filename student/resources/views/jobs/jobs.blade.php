@include ('layouts.template.header')

@include ('layouts.template.menu')

  <div class="jobs-enviroment">
    <div class="container">
      <div class="row">
        <div class="col-lg-12 text-center">
          <h3 class="header-job">Find job for you</h3>
      </div>
      <div class="col-lg-12">
        <div class="find-job">
          <form action="/search/job" method="POST">
            @csrf
          <div class="row justify-content-center">
            <div class="col-lg-6" style="padding-right: 0;">
              <div class="input-group">
                <input type="text" class="form-control" name="job_title" placeholder="Job title, Keywords">
              </div>
            </div>
            <div class="col-lg-4" style="padding-left: 0; margin-left: 5px;">
              <div class="input-group">
                <select class="custom-select" id="inputGroupSelect04" aria-label="Example select with button addon" name="level">
                  <option>Choose...</option>
                  <option value="Beginner">Begginer</option>
                  <option value="Mid">Mid</option>
                  <option value="Experienced">Experienced</option>
                </select>
                  <div class="input-group-append">
                    <button class="btn btn-primary" type="submit">Search</button>
                  </div>
              </div>
            </div>
          </div>
          <div class="row" style="margin-top: 15px;">
            <div class="col-lg-2 text-right" style="padding: 0">
              <div class="form-group">
                <div class="form-check">
                  <input type="checkbox" class="form-check-input" value="Full Time" id="dropdownCheck" name="full_time">
                  <label class="form-check-label" for="dropdownCheck">
                   Full Time
                  </label>
                </div>
              </div>
            </div>
            <div class="col-lg-2 text-left">
              <div class="form-group">
                <div class="form-check">
                  <input type="checkbox" class="form-check-input" value="Part Time" id="dropdownCheck" name="part_time">
                  <label class="form-check-label" for="dropdownCheck">
                   Part Time
                  </label>
                </div>
              </div>
            </div>
          </div>
        </form>
        </div>
      </div>
    </div>
  </div>
  </div>
  <div class="row no-padding" style="margin-top: 20px;">
    <div class="col-lg-6">
      <div class="counter-job float-right">
        <p class="counter" data-count="1245">0</p>
        <p class="job-posted">Jobs posted</p>
      </div>
    </div>
    <div class="col-lg-6">
      <div class="counter-job ">
        <p class="counter" data-count="154">0</p>
        <p class="job-company">Company</p>
      </div>
    </div>
  </div>  
<div class="row">
  <div class="col-lg-12 text-center">
    <h3 class="header-job">Aktuelle Jobs</h3>
    <p class="subheader-job">Lorem ipsum dolor sit amet consectetur</p>
  </div>
</div>
  <div class="row no-margin">
    <div class="col-lg-12">
      @if (count($jobs) > 0) 
        @foreach($jobs as $job)
        <div class="single-job">
          <div class="row no-margin">
            <div class="job-image">
              <div class="col-lg-2">
                  <img src="/images/{{$job->image}}" style="height: 100px; width: 100px; border-radius: 8px;" alt="">
              </div>
            </div>
            <div class="col-lg-5">
              <div class="job-description">
                <h6 class="job-title">{{$job->job_title}}</h6>
                <p class="job-location"><i class="fas fa-map-marker-alt" style="margin: 5px;"></i>Bihac</p>
                <p class="job-time"><i class="far fa-clock" style="margin: 5px;"></i>
                  {{implode(',',$job->type_of_job)}}
                </p><br>
                <p class="deadline">Deadline: <span> {{$job->valid_until}}</span></p>
              </div>
            </div>
            <div class="col-lg-5 float-right">
              <a href="/jobs-description/{{$job->id}}" class="btn btn-primary float-right align-middle job-sign">Apply now</a>
            </div>
          </div>
        </div>
        @endforeach
      @else 
        <p>Currently nothing to show</p>
      @endif
    </div>
  </div>


@include ('layouts.template.footer') 
