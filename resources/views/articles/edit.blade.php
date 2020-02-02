@extends('layouts.app')
@section('title' , __('Edit article'))

@section('content')

<h2>{{__('Edit article')}} : {{$article->title}}</h2>
<form  action="{{route('articles.update' , $article)}}" method="post">
  @method('PATCH')
@include('articles._form' ,  ['sumbitText'=>__('Edit')])
</form>
@endsection
