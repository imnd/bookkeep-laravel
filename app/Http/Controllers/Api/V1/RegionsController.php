<?php

namespace App\Http\Controllers\Api\V1;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Validator;
use App\Models\Regions;
use App\Http\Resources\RegionCollection;

/**
 * Контроллер товаров
 * 
 * @author Андрей Сердюк
 * @copyright (c) 2018 IMND
 */ 
class RegionsController extends Controller
{
    public function list()
    {
        return new RegionCollection(Regions::all());
    }

    public function create(Request $request)
    {
        $region = new Regions([
            'title' => $request->get('title'),
            'body' => $request->get('body')
        ]);
        $region->save();

        return response()->json('success');
    }

    public function edit($id)
    {
        $region = Regions::find($id);
        return response()->json($region);
    }

    public function update($id, Request $request)
    {
        $region = Regions::find($id);
        $region->update($request->all());

        return response()->json('successfully updated');
    }

    public function delete($id)
    {
        $region = Regions::find($id);
        $region->delete();

        return response()->json('successfully deleted');
    }
}
