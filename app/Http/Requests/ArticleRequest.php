<?php

namespace App\Http\Requests;

use App\Models\Article;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class ArticleRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(Request $request): bool
    {
        $article_id = $request->input('article_id') ?? null;

        if ($article_id) {

            $article = Article::findOrFail($article_id);

            return Gate::allows('update-article', $article);
        } else {
            return true;
        }
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {

        return [
            'title' => 'required|min:5|max:10',
            'text' => 'required|min:10|max:300',
        ];

    }
}
