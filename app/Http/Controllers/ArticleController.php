<?php

namespace App\Http\Controllers;

use App\Http\Requests\ArticleRequest;
use App\Models\Article;
use Illuminate\Support\Facades\Auth;

class ArticleController extends Controller
{
    //

    public function app()
    {
        return view('article.app');
    }

    public function store(ArticleRequest $request)
    {
        $article = new Article;

        $article->title = $request->input('title');
        $article->text = $request->input('text');
        $article->user_id = Auth::id();

        $article->save();

        return ['message' => 'save successful'];

    }

    public function update(ArticleRequest $request)
    {
        $article_id = $request->input('article_id');

        $article = Article::findOrFail($article_id);

        $article->title = $request->input('title');
        $article->text = $request->input('text');

        $article->save();

    }

}
