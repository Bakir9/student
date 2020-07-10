<div class="card shadow p-3" style="border-radius: 15px">
  <div class="card-header bg-light">
    <h4 class="text-info ">Thank you for vote</h4>
  </div>
  <div class="card-body">
    @foreach($options as $option)
    <strong style="margin-top: 5px;">{{$option->option }} </strong><span class='pull-right'>{{$option->vote}}</span>
    <div class="progress" style="height: 25px;">
      <div class="progress-bar bg-success" role="progressbar" style="width: {{$option->vote}}%;" aria-valuenow="{{$option->vote}}" aria-valuemin="0" aria-valuemax="100"></div>
    </div>
    @endforeach
  </div>
  <div class="card-footer">
  <p class="card-text">Number of votes: <strong>{{$sum}}</strong></p>
  </div>
</div>