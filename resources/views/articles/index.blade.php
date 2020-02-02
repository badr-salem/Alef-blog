@extends('layouts.app');
@section('title' , __('All articles'))

@section('content')
<h3 class="text pb-2">{{__('All articles')}}</h3>
<div class="row ">
  @forelse($articles as $article)
  @include('articles._article_card')
  @empty
  {{__('No articles yet')}}

  @endforelse

</div>
@endsection
