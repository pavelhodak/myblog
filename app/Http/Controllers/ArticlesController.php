<?php

namespace App\Http\Controllers;

use App\Image;
use App\Article;
use App\Http\Requests;
use App\Http\Requests\ArticleRequest;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use Auth;
use Illuminate\Support\Facades\Input as Input;

class ArticlesController extends Controller
{
    public function __construct(){
        $this->middleware('auth', ['except' => ['index', 'show']]);
        $this->middleware('admin', ['except' => ['index', 'show']]);
    }
    public function index(){
        $articles = Article::latest('published_at')->published()->get();
        $images = Image::all()->unique('article_id')->pluck('image', 'article_id')->all();

        return view('articles.index', compact('articles'), compact('images'));
    }
    public function show($id){
        $article = Article::findOrFail($id);

        $images = Image::where('article_id', '=', $id)->pluck('image')->all();

        return view('articles.show', compact('article'), compact('images'));
    }
    public function create(){
        return view('articles.create');
    }
    public function store(ArticleRequest $request){

        $article = new Article($request->except('images'));
        $article->user_id = $request->user()->id;
        $article->save();

        $files = Input::file('images');
        $uploads = '/uploads/';
        $path = public_path() . $uploads;

        foreach ($files as $file) {
            if (empty($file)) continue;

            $fileName = $file->getClientOriginalName();
            $file->move($path, $fileName);

            (new Image(['image' => $uploads . $fileName, 'article_id' => $article->id]))->save();
        }

        return redirect('articles');
    }
    public function edit($id){
        $article = Article::findOrFail($id);

        $images = Image::where('article_id', '=', $id)->pluck('image')->all();

        return view('articles.edit', compact('article'), compact('images'));
    }
    public function update($id, ArticleRequest $request){

        $article = Article::findOrFail($id);
        $article->update($request->all());

        $files = Input::file('images');
        $uploads = '/uploads/';
        $path = public_path() . $uploads;

        foreach ($files as $file) {
            if (empty($file)) continue;

            $fileName = $file->getClientOriginalName();
            $file->move($path, $fileName);

            (new Image(['image' => $uploads . $fileName, 'article_id' => $article->id]))->save();
        }

        return redirect('articles');
    }
    //Confirm deletion
    public function delete($id){
        $article = Article::findOrFail($id);

        return view('articles.delete', compact('article'));
    }
    public function destroy($id){

        $article = Article::findOrFail($id);
        $article->delete();

        return redirect('articles');
    }
}
