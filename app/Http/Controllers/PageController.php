<?php

namespace App\Http\Controllers;
use App\Article;
use App\Category;
use Illuminate\Http\Request;

class PageController extends Controller
{
    //


    public function index(){
      $articles = Article::take(6)->orderBy('id' , 'DESC')->get();

      return view('index', compact('articles'));
    }

    public function contact(){
      $user = \auth::user();
      $options = ['genral'=>'genral message',
                  'question'=>'question'
    ];
      return view('contact' , compact('user' , 'options'));
    }

    public function storeContact(Request $request){

      $validateData = $request->validate([
        'sender_name' => 'required' ,
        'message' => 'required'
      ]);

      $request->session()->put('username' , $request->sender_name);
      return "done";
    }

    public function about(Request $request){
      $userName = $request->session()->get('username');
        return view('about' , ['username' => $userName]);


    }

    public function clearName(Request $request){
      $request->session()->forget('username');
    return redirect()->back();
    }
}
