<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Article;
use Psy\Command\WhereamiCommand;

class WebController extends Controller
{
    public function index(){
   	 $artikel = Article::all();
    	 return view('article',['artikel' => $artikel]);
}

	public function store(Request $request)
{
	$article = new Article;
	$article->name = $request->name;
	$article->save();
}
 public function show($id)
 {
	Article::with('tag')->get();
	$article = Article::where('id',$id)->with('tag')->first();

	  echo json_encode($article);

 }

}
