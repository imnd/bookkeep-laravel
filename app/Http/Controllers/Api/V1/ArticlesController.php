<?php

namespace App\Http\Controllers\Api\V1;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Validator;
use App\Models\Articles;
use App\Http\Resources\ArticleCollection;

/**
 * Контроллер товаров
 * 
 * @author Андрей Сердюк
 * @copyright (c) 2019 IMND
 */ 
class ArticlesController extends Controller
{
    public function list()
    {
        return new ArticleCollection(Articles::all());
    }

    public function create(Request $request)
    {
        $article = new Articles([
            'title' => $request->get('title'),
            'body' => $request->get('body')
        ]);
        $article->save();

        return response()->json('success');
    }

    public function edit($id)
    {
        $article = Articles::find($id);
        return response()->json($article);
    }

    public function update($id, Request $request)
    {
        $article = Articles::find($id);
        $article->update($request->all());

        return response()->json('successfully updated');
    }

    public function delete($id)
    {
        $article = Articles::find($id);
        $article->delete();

        return response()->json('successfully deleted');
    }
}
