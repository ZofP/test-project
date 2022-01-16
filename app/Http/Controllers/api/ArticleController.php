<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Requests\ArticleRequest;
use App\Models\Article;
use Illuminate\Support\Facades\Auth;

class ArticleController extends Controller
{
    public function index(): array
    {
        $articles = Article::orderBy('created_at', 'DESC')->with('user:id,name')->get();

        foreach ($articles as $article) {
            $article->date = date('F d, Y', strtotime($article->updated_at));
        }

        return ['articles' => $articles];
    }

    public function show($article_id): array
    {

        $article = Article::findOrFail($article_id);

        return ['article' => $article];

    }

    public function create(ArticleRequest $request): array
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
