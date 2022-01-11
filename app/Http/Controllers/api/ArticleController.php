<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Article;

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

}
