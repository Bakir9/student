@include('dashboard.layouts.sidebar')

<!-- Main content -->

<section class="content">
  <div class="container">
  <form action="/job/{{$job->id}}/update" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="row">
      <div class="col-md-12">
        <div class="card" style="border-radius: 10px; border-top: 5px solid #00a8cc">
          <div class="row" style="margin: 0; padding-left: 15px;">
            <h5 style="margin-top: 10px">Info about position</h5>
          </div>
          <div class="row" style="margin: 0">
            <div class="col-md-5">
              <div class="form-group">
                <label for="job_title">Job Title</label>
                <input type="text" class="form-control @error('job_title') border border-danger @enderror" 
                  name="job_title" placeholder="Job title" value="{{$job->job_title,old('job_title')}}" >
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-12">
        <div class="card" style="border-radius: 10px; border-top: 5px solid #00a8cc">
          <div class="row" style="margin: 0; padding-left: 15px;">
            <h5 style="margin-top: 10px">Info about company</h5>
          </div>
          <div class="row" style="margin: 0">
            <div class="col-md-4">
              <div class="form-group">
                <label for="company" style="margin-left: 10px;">Company</label>
                <input type="text" class="form-control @error('company') border border-danger @enderror" 
                  name="company" placeholder="Company" value="{{$job->company,old('company')}}">
              </div>
            </div>
            <div class="col-md-4 align-self-center">
              <div class="form-group">
                <label for="location">Location</label>
                <input type="text" class="form-control @error('location') border border-danger @enderror" 
                  name="location" placeholder="Location" value="{{$job->location,old('location')}}">
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label for="address">Address</label>
                <input type="text" class="form-control @error('address') border border-danger @enderror" 
                  name="address" placeholder="Address" value="{{$job->address,old('address')}}" >
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label for="e_mail">E-mail</label>
                <input type="text" class="form-control @error('e_mail') border border-danger @enderror" 
                  name="e_mail" placeholder="E-mail" value="{{$job->e_mail,old('e_mail')}}">
              </div>
            </div>
            <div class="col-md-4">
              <label for="exampleInputFile">Company logo</label>
              <div class="input-group">
                <div class="custom-file">
                  <input type="file" class="custom-file-input" name="company_logo">
                  <label class="custom-file-label" for="company_logo">Choose file</label>
                </div>
                <div class="input-group-append">
                  <span class="input-group-text" id="">Upload</span>
                </div>
              </div>
           </div>
          </div>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-12">
        <div class="card" style="border-radius: 10px; border-top: 5px solid #00a8cc">
          <div class="row" style="margin: 0; padding-left: 15px;">
            <h5 style="margin-top: 10px">Experince level & deadline</h5>
          </div>
          <div class="row" style="margin: 0">
            <div class="col-md-4">
              <div class="form-group">
                <label for="type_of_job">Select type of job</label>
                <select class="form-control js-example-basic-multiple  
                   @error('type_of_job') border border-danger @enderror"  name="type_of_job[]" multiple="multiple">
                   @foreach($job->type_of_job as $type)
                    <option value="{{$type}}" 
                      {{in_array($type,['Full Time', 'Part Time', 'Freelance', 'Internship', 'Teaching']) ? 'selected' : ''}}>{{$type}}
                    </option>
                    <option value="Full time">Full Time</option>
                    <option value="Part Time">Part Time</option>
                    <option value="Freelance">Freelance</option>
                    <option value="Internship">Internship</option>
                    <option value="Teaching">Teaching</option>
                    @endforeach
                </select>
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label for="experience">Experience</label>
                <select class="form-control  @error('experience') border border-danger @enderror"
                  name="experience" value="{{$job->level}}">
                  <option value="Experience">Experience</option>
                  <option value="Beginner">Beginner</option>
                  <option value="Work Experience">Work Experience</option>
                  <option value="Management">Management</option>
                  <option value="Indepenence">Indepenence</option>
                </select>
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label for="example-date-input">Valid until</label>
                <input class="form-control" type="date" name="valid_until"  id="example-date-input" value="{{$job->valid_until}}">
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-12">
        <div class="card card-outline card-info">
          <div class="card-header">
            <h3 class="card-title">
              Write what you searching from candidate
              <small>Go HARD or Go HOME</small>
            </h3>
          </div>
          <div class="mb-3">
            <textarea id="mytextarea" style="height: 300px;"class="textarea @error('content') border border-danger @enderror" name="content" placeholder="Place some text here"
              style="width: 100%;  font-size: 14px; line-height: 18px; border: 1px solid #00a8cc; padding: 10px;">
              {!! $job->content !!}
            </textarea>
          </div>
          <div class="card-footer">
            <button type="submit" class="btn btn-primary">Submit</button>
          </div>
        </div>
      </div>
    </div>
  </form>
  </div>
</section>

@include('dashboard.layouts.footer')
<script src="../../plugins/summernote/summernote-bs4.min.js"></script>
