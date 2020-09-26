<!-- Modal --->
<div class="modal fade create-permission" id="create-permission" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Create Permission</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form action="{{ url ('/permission/create') }}">
						@csrf
						<div class="row">
              <div class="col-md-12">
                <div class="form-group">
                  <label for="Permission Name">Permission name</label>
                  <input type="text" class="form-control @error('name') border border-danger @enderror" id="name" name="name" placeholder="Permission name" >
                  @error('name')
                    <p class="text-danger" role="alert">The name field is required</p>
                  @enderror
                </div>
							</div>
							<div class="col-md-12">
                <div class="form-group">
                  <label for="Permission Description">Permission Description</label>
                  <input type="text" class="form-control @error('description') border border-danger @enderror" id="description" name="description" placeholder="Permission description" >
                  @error('description')
                    <p class="text-danger" role="alert">The description field is required</p>
                  @enderror
                </div>
              </div>
              <div class="col-md-12">
                <div class="form-group">
                  <label>Permission Type</label>
                  <select class="form-control select2" name="type" style="width: 100%;">
                    <option value="Blog" selected="selected">Blog</option>
                    <option value="Job">Job</option>
                    <option value="Poll">Poll</option>
                    <option value="User">User</option>
                    <option value="Dashboard">Dashboard</option>
                  </select>
                </div>
              </div>
						</div>
						<div class="modal-footer">
								<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
								<button type="submit" class="btn btn-primary">Create</button>
						</div>
					</form>
        </div>
      </div>
    </div>
  </div>