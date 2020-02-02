@extends('layouts.app')

@section("title", __("Contact"))

@section('content')
@if(date('D') == 'mon')
@include('_partials._closed_alert')
@endif
@if($errors->any())

<ul>
  @foreach($errors->all() as $error)
  <li>{{$error}}</li>
  @endforeach
</ul>

@endif

@auth
<p>welcome , {{$user->name}}</p>
@else
<p>welcome</p>
@endauth
<form  action="" method="post">
{{csrf_field()}}

<div class="form-group">
  <input class="form-control" type="text" name="sender_name" value="" placeholder="your name">

</div>
<div class="form-group">
  <select class="form-control" name="option">
    @forelse($options as $key => $option)
    <option value="{{$key}}">{{$option}}</option>
     @empty
     <option value="null">not seleected</option>
    @endforelse

  </select>

</div>

<div class="form-group">
  <textarea class="form-control" name="message" rows="8" cols="80" placeholder="your message"></textarea>
</div>
<div class="form-group">
  <button class="btn btn-primary" type="submit" name="button" >OK</button>

</div>
</form>


@endsection
