<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Article;
use App\Http\Requests\ArticleRequest;
use Carbon\Carbon;

class ArticlesController extends Controller
{
    public function __construct()
    {
      $this->middleware('auth');
    }

    public function index()
    {
      $articles = Article::latest('published_at')->get();
      return view('articles.index', compact('articles'));
    }

    public function show(Article $article)
    {
      // dd($article);
      // $article = Article::findOrFail($id);
      //dd($article->published_at->diffForHumans());
      return view('articles.show', compact('article'));
    }

    public function create()
    {
      return view('articles.create');
    }

    public function store(ArticleRequest $request)
    {
      // $article = new Article($request->all());
      // \Auth::user()->articles()->save($article);
      \Auth::user()->articles()->create($request->all());

      \Session::flash('flash_message', 'Your article has been created');

      return redirect('articles');
    }

    public function edit(Article $article)
    {
      // $article = Article::findOrFail($id);
      return view('articles.edit', compact('article'));
    }

    public function update(ArticleRequest $request, $id)
    {
      $article = Article::findOrFail($id);
      $article->update($request->all());

      return redirect('articles');
    }
}
