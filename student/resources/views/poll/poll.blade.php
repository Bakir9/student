<div class="card shadow p-3" style="border-radius: 15px">
  <div class="card-header bg-light">
    <h4 class="text-info ">{{$poll->question}}</h4>
  </div>
  <div class="card-body">
    <form action="vote/poll" method="post">
      @csrf
      @foreach ($options as $option)
      <div class="custom-control custom-radio">
        <input type="radio" class="custom-control-input" value="{{$option->id}}" id="option{{$option->id}}" name="option[]">
        <label class="custom-control-label" for="option{{$option->id}}">{{$option->option}}</label>
      </div>
      @endforeach
      <div class="card-footer">
        <button type="button" class="btn btn-primary">Vote</button>
      </div>
    </form>
  </div>
</div>