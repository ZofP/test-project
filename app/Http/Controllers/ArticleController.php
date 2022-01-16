<?php

namespace App\Http\Controllers;

use Illuminate\View\View;

class ArticleController extends Controller
{
    //

    public function app(): View
    {
        return view('article.app');
    }

}
