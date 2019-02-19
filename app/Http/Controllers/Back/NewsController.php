<?php

namespace App\Http\Controllers\Back;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Jenssegers\Date\Date;
use Validator;
use App\Models\Articles;
use App\Models\Categories;

class NewsController extends Controller
{
    /**
     * Render news list page
     * @return [view]
     */
    public function items()
    {
        $data = Articles::orderBy('created_at', 'DESC')->get()->all();
        return view('back.news.items', compact('data'));
    }

    /**
     * Render news page
     * @return [view]
     */
    public function item($id)
    {
        Date::setLocale('ru');

        if (!$data = Articles::where('id', $id)->first()) {
            return abort(404);
        }

        $pageTitle = $data->title;
        return view('back.news.item', compact('data', 'pageTitle'));
    }
}
