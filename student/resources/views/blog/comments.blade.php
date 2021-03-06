@include('dashboard.layouts.sidebar')

<!-- Main content -->

  <section class="content">
    <div class="container-fluid">
        <div class="container">
          <div class="row">
            <div class="col-lg-12">
              <div class="card-header" style="border-radius: 10px; border-top: 5px solid blue;">
                <h4>Comments for blog: <span style="color:black">{{$blog->title}}</span></h4>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-lg-12">
              <form action="/delete/{{$blog->id}}/selected" method="post">
                @csrf
                @method('DELETE')
                @can('delete-comments')
                  <a href="/comments/{{$blog->id}}/delete" class="btn btn-app" style="margin-top: 10px;">
                    <i class="fas fa-trash" style="color:black"></i> Delete all
                  </a>
                  <button type="submit" class="btn btn-app" style="margin-top: 10px">
                    <i class="fas fa-trash" style="color:gray"></i>Delete selected
                  </button>
                @endcan
              <table class="table">
                <thead>
                  <tr>
                    @can('delete-comments')
                      <th scope="col">#</th>
                    @endcan
                    <th scope="col">Username</th>
                    <th scope="col">Comment</th>
                    <th scope="col">Date & Time</th>
                    @can('delete-comments')
                     <th scope="col">Actions</th>
                    @endcan
                  </tr>
                </thead>
                  <tbody>
                    @if(count($comments) > 0)
                      @foreach($comments as $comment)
                        <tr>
                          @can('delete-comments')
                            <td scope="row"><input type="checkbox" value="{{$comment->id}}" name="comment_id[]"></td>
                          @endcan
                          <td>{{$comment->username}}</td>
                          <td>{{$comment->content}}</td>
                          <td>
                            {{date('F d, Y', strtotime($comment->created_at))}} at {{date('g:ia', strtotime($comment->created_at))}}
                          </td>
                          <td style="padding-top:0">
                            @can('delete-comments')
                              <a href="/singleComment/{{$comment->id}}/delete" class="btn btn-block btn-danger btn-sm" style="margin-top: 10px;">
                                <i class="fas fa-trash" style="color:black"></i> Delete
                              </a>
                            @endcan
                          </td>
                        </tr>
                      @endforeach
                    @else 
                      <tr>
                        <td></td>
                        <td></td>
                        <td style="color: red;font-size: 16px;font-family: 'Alegreya Sans', sans-serif;">
                          Nothing to show.
                        </td>
                      </tr>
                    @endif
                  </tbody>
              </table>
            </form>
            </div>
          </div>
          </div>
        </div>
    </div>
  </section>

@include('dashboard.layouts.footer')

    