 <!-- Modal Registration-->
  
 <div class="modal hide fade" id="modalForRegistration" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <form method="post" action="{{url ('/userRegistration') }}" id="registrationForm">
            @csrf
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Login</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
            <span id="info_message"></span>
          </div>
          <div class="modal-body">
            <div class="row">
              <div class="form-group col-md-6">
                <label for="Name">First name</label>
                <input type="text" class="form-control" name="first_name" id="first_name">
              </div>
              <div class="form-group col-md-6">
                <label for="Name">Last Name</label>
                <input type="text" class="form-control" name="last_name" id="last_name">
              </div>
            </div>
            <div class="row">
              <div class="form-group col-md-12">
                <label for="Name">E-mail</label>
                <input type="text" class="form-control" name="e-mail" id="e_mail">
              </div>
            </div>
            <div class="row">
              <div class="form-group col-md-12">
                <label for="Name">Phone</label>
                <input type="text" class="form-control" name="phone" id="phone">
              </div>
            </div>
            <div class="row">
              <div class="form-group col-md-12">
                <label for="Name">Username</label>
                <input type="text" class="form-control" name="username" id="username">
              </div>
            </div>
            <div class="row">
              <div class="form-group col-md-12">
                <label for="Name">Password</label>
                <input type="password" class="form-control" name="password" id="password" autocomplete="on">
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary" id="submit_data">Send</button>
          </div>
          <span id="messages"></span>
        </form>
        </div>
      </div>
    </div>