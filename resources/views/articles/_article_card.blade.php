
<div class="col-md-4 pb-3">
  <div class="card">
    <h4 class="card-header">
<a href="{{route('articles.show',$article->id)}}">{{$article->title}}</a>
</h4>
    <div class="card-body">

      {{ \Illuminate\Support\Str::limit($article->content,150, $end=' ... ') }}
    </div>
    <div class="card-footer">
      <b>{{__('Author')}} :</b> {{$article->user->name}} </br>
      <b>{{__('Category')}} : </b>
      @foreach($article->categories as $category)
     {{$category->title}}
      @endforeach
    </div>
  </div>
</div>
