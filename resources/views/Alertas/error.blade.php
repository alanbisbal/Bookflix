@if(count($errors))
<div class="alert alert-danger">
  <button type="button" class="close" data-dismiss="alert">
    &times;

  </button>

    @foreach($errors->$error)
      <li>
        {{$error }}
      </li>
    @endforeach
</div>

@endif
