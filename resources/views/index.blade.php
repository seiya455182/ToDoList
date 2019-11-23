@extends('layouts.app')
@section('content')
<div class="container">
  <div class="row">
    <div class="col-3">
      <div class="card" style="width:18rem;">
        <img src=""  style="height:18rem" class="card-img-top" alt="...">
        <div class="card-body">
          <h5 class="card-title">ToDoList</h5>
        </div>
        <ul class="list-group list-group-flush">
          <li class="list-group-item">
            <div class="input-group">
              <form method="POST" action="{{ route('posts')}}">
                @csrf
                <span class="input-group-btn">
                  <input name="todo" type="text" class="form-control" placeholder="やること">
                  <button input type="submit" type="button" class="btn btn-primary">追加</button>
                </span>
              </form>
            </div>
          </li>
          @foreach($lists as $list)
          <form
            style="display: inline-block;"
            method="POST"
            action=""
            >
              @csrf
              <li class="list-group-item">{{ $list->todo }}</li>
              <button class="btn btn-danger">完了</button>
          </form>
          @endforeach
        </ul>
      </div>
    </div>
  </div>
</div>
  @endsection
