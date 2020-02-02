@csrf
<div class="form-group">
  <label for="title">{{__('Title')}}</label>
  <input type="text" name="title" class="form-control" @isset($article) value="{{$article->title}}" @endisset>
</div>
<div class="form-grup">
  @foreach ($categories as $id => $title)
    <label for="category_{{$id}}">{{$title}}</label>
    <input id="category_{{$id}}" type="checkbox" name="categories[]" value="{{$id}}"
    @if(isset($article) && in_array($id , $articleCategories))  checked    @endif
    >
  @endforeach

</div>
<div class="form-group">
  <label for="content">{{__('Content')}}</label>
  <textarea name="content" rows="8" cols="80" class="form-control">@isset($article) {{$article->content}} @endisset</textarea>
</div>
<div class="form-group">
  <button class="btn btn-success" name="button">{{$sumbitText}}</button>
</div>
