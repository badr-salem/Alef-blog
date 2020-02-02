<?php

namespace App\Http\Controllers;

use App\Article;
use App\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class ArticleController extends Controller
{
  public function __construct(){
    $this->middleware('auth')->except('show' , 'index');
  }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $articles = Article::orderBy('id' , 'DESC')->get();


        return view('articles.index' , compact('articles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $categories = Category::pluck('title' , 'id');

        return view('articles.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $request->validate([
        'title'=>'min:3|max:70|required',
        'content'=>'min:50|required',
        'categories'=>'required'
      ]);

      $user = Auth::user();

      $categories = array_values($request->categories);

     $article = $user->articles()->create($request->except('categories'));

     $article->categories()->attach($categories);

      return redirect()->to('/home');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function show(Article $article)
    {
      $categories = Category::pluck('title' , 'id');

      $articleCategories = $article->categories()->pluck('id')->toArray();
        return view('articles.show' , compact('categories','article' ,'articleCategories'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function edit(Article $article)
    {

      if(Auth::id() != $article->user_id){
        return abort(401);
      }


      $categories = Category::pluck('title' , 'id');

      $articleCategories = $article->categories()->pluck('id')->toArray();

      return view('articles.edit', compact('categories' , 'article' , 'articleCategories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Article $article)
    {
      if(Auth::id() != $article->user_id){
        return abort(401);
      }

      $request->validate([
        'title'=>'min:3|max:70|required',
        'content'=>'min:50|required',
        'categories'=>'required'
      ]);


        $article->update($request->all());

        $article->categories()->sync($request->categories);


        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function destroy(Article $article)
    {
      if(Auth::id() != $article->user_id){
        return abort(401);
      }
        $article->delete();
        return redirect()->back();

    }
}
