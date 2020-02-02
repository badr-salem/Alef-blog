@extends('layouts.app')
@section('title', __('about us'))
@section('content')
@include('_partials._closed_alert')
<h2>{{__('welcome to our website') , $username}}</h2>
<a href="clear-my-name">clear my name</a>
 @endsection
