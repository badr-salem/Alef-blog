@extends('layouts.app');
@section('title' , __('Home page'))

@section('content')
<h3 class="text pb-2">{{__('Latest aricles')}}</h3>
<div class="row ">
  @forelse($articles as $article)
  @include('articles._article_card')
  @empty
  {{__('No articles yet')}}

  @endforelse

</div>
<a class="btn btn-link" href="{{route('articles.index')}}">{{__('Browse all articles')}}</a>
@endsection
