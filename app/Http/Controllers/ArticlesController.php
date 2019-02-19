<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Validator;
use App\Models\Articles;
use App\Models\ArticleSubcats;

/**
 * Контроллер товаров
 * 
 * @author Андрей Сердюк
 * @copyright (c) 2018 IMND
 */ 
class ArticlesController extends Controller
{
    /**
     * @var string $modelName
     */
    protected $modelName = 'Articles';

    /**
     * Главная страница, список товаров
     * 
     * @param Request $request
     * @return [view]
     */
    public function items()
    {
        $query = Articles::with('subcategory')
            ->orderBy($_GET['field'] ?? 'name', $_GET['order'] ?? 'ASC');

        foreach (['name', 'subcategory_id', 'active'] as $field) {
            if (isset($_GET[$field])) {
                $query->where($field, $_GET[$field]);
            }
        }
        if (isset($_GET['priceFrom'])) {
            $query->where('price', $_GET['priceFrom']);
        }
        if (isset($_GET['priceTo'])) {
            $query->where('price', $_GET['priceTo']);
        }

        return view('articles.items', [
            'pageTitle' => 'Список товаров',
            'data' => $query->get()->all(),
            'subcategories' => ArticleSubcats::all(),
            'units' => Articles::getUnits(),
        ]);
    }

    /**
     * Render create article page
     * @return [view]
     */
    public function create(Request $request)
    {
        if ($request->isMethod('post')) {
            
            $validatedData = $request->validate(Articles::getRules());
            
            $validator = $this->validate($request);
            if (
                    !$validator->fails()
                and $article = Articles::create([
                    'subcat_id' => $request->subcat_id,
                    'name' => $request->name,
                    'price' => $request->price,
                    'unit' => $request->unit,
                    'active' => $request->active ?: 0,
                ])
            ) {
                return redirect("/articles/item/{$article->id}");
            }
            return redirect()
                ->back()
                ->withErrors($validator->errors())
                ->withInput();
        }

        return view('articles.create', [
            'pageTitle' => 'Новый товар',
        ]);
    }

    /**
     * Render update article page
     * @return [view]
     */
    public function update(Request $request, Articles $article)
    {
        if ($request->isMethod('post')) {
            $validator = $this->validate($request);
            if (
                    !$validator->fails()
                and $article
                    ->update([
                        'subcat_id' => $request->subcat_id,
                        'name' => $request->name,
                        'price' => $request->price,
                        'unit' => $request->unit,
                        'active' => $request->active ?: 0,
                    ])
            ) {
                return redirect()
                    ->back()
                    ->with(['message' => 'сохранено успешно']);
            }
            return redirect()
                ->back()
                ->withErrors($validator->errors())
                ->withInput();
        }

        return view('articles.update', [
            'pageTitle' => 'Редактирование товара',
            'data' => $article,
        ]);
    }

    /**
     * delete article
     */
    public function delete($id)
    {
        if ($request->isMethod('post')) {
            Articles::where('id', $id)->delete();
            return redirect('/articles');
        }
    }
}
