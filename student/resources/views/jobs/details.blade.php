@include ('layouts.template.header')

@include ('layouts.template.menu')

<div class="container" style="margin-top: 10px;">
    <div class="row">
      <div class="col-lg-3">
          <img src="/images/{{$job->image}}" alt="" height="200px;" width="250px;">
      </div>
      <div class="col-lg-3">
          <p class="company-name">{{$job->company}}</p>
          <p href="#" class="company-web">{{$job->location}}</p>
          <p href="#" class="company-web">{{implode(',',$job->type_of_job)}}</p>
      </div>
      <div class="col-lg-4">
          <p class="company-blog">Broj oglasa:<span class="company-counter">4</span></p>
          <p class="company-blog">Broj pracenja:<span class="company-counter">2</span></p>
      </div>
    </div>
    <div class="jobs">
      <div class="row no-margin">
        <div class="col-lg-9 ">
          <p class="position">{{$job->job_title}}</p>
        </div>
      </div>
      <div class="container">
        <div class="row no-margin">
          <div class="col-lg-12 ">
            {!! $job->content!!}
          </div>
        </div>
      </div>
      <div class="row no-margin">
        <div class="col-lg-9">
          <p class="location">Location: <span>{{$job->location}}</span></p>
          <p class="location">Valid till: <span>{{$job->valid_until}}</span></p>
        </div>
      </div>
    </div>
</div>

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Send us your info</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <div class="container-fluid">
                <form action="">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="first-name" class="col-form-label">First Name:</label>
                                <input type="text" class="form-control" id="first-name">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="first-name" class="col-form-label">Last Name:</label>
                                <input type="text" class="form-control" id="last-name">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="phone" class="col-form-label">Phone:</label>
                                <input type="text" class="form-control" id="phone">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="email" class="col-form-label">E-mail:</label>
                                <input type="text" class="form-control" id="email">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="inputGroupFileAddon01">Upload</span>
                            </div>
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01">
                                <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary">Send</button>
        </div>
      </div>
    </div>
  </div>
<script>
$('#exampleModal').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget) // Button that triggered the modal
    var recipient = button.data('whatever') // Extract info from data-* attributes
    // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
    // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
    
})
</script>
  
@include ('layouts.template.footer')

