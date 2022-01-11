<?php

namespace App\Http\Controllers;

use App\Http\Requests\ArticleRequest;
use App\Models\Article;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class ArticleController extends Controller
{
    //

    public function app(): View
    {
        return view('article.app');
    }

    public function store(ArticleRequest $request): array
    {
        $article = new Article;

        $article->title = $request->input('title');
        $article->text = $request->input('text');
        $article->user_id = Auth::id();

        $article->save();

        return ['message' => 'save successful'];

    }

    public function update(ArticleRequest $request): void
    {
        $article_id = $request->input('article_id');

        $article = Article::findOrFail($article_id);

        $article->title = $request->input('title');
        $article->text = $request->input('text');

        $article->save();

    }

}
