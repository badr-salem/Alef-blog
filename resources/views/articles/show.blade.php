@extends('layouts.app');
@section('title' , $article->title)

@section('content')
<div class="card">
  <h4 class="card-header">{{$article->title}}</h4>
  <div class="card-body">
    {!!nl2br($article->content)!!}
  </div>
  <div class="card-footer">
    <div><b>{{__('Author')}} : </b>{{$article->user->name}}</div>
    <div><b>{{__('Created at')}} : </b>{{$article->created_at}}</div>
    <div><b>{{__('Updated at')}} : </b>{{$article->updated_at}}</div>
    <div> <b>{{__('Categories')}} : </b>
      @foreach ($categories as $id => $title)

        @if(isset($article) && in_array($id , $articleCategories))  {{$title}}   @endif

      @endforeach
    </div>
  </div>
</div>

<div id="comments" class="container">
  <h3 class="mt-3">{{__('The comments')}}</h3>
  @forelse($article->comments as $comment)
  <div class="card p-3 mb-2">
      <p><b>{{$comment->user->name}} : </b> {!!nl2br($comment->content)!!}</p>


    @if(Auth::id() == $comment->user_id)
    <form  action="{{route('comments.destroy', $comment)}}" method="post">
      @method('DELETE')
      @csrf
      <button class="btn btn-danger btn-sm mt-1" onclick="return confirm('{{__('Are you sure?')}}')">{{__('Delete')}}</button>
    </form>
    @endif
  </div>

  @empty
  {{__('No comment yet')}}
  @endforelse
</div>



@auth
<div class="container mt-5" id="commentForm">
  <div class="card">
    <h5 class="card-header bg-secondary text-white">{{__('Write comment')}}</h5>
    <div class="card-body">
      <form class="" action="{{route('comments.store',$article->id)}}" method="post">
        @csrf
        <div class="form-group">
          <textarea name="content" id="content" rows="8" cols="80" placeholder="  {{__('Write your comment here')}}"></textarea>
        </div>
        <div class="form-group">
          <button type="submit" class="btn btn-success">{{__('Send the comment')}}</button>
        </div>
      </form>
    </div>
  </div>
</div>
@else
<p class="mt-5">{{__('Please login to write your comment')}}</p>
@endauth
@endsection
