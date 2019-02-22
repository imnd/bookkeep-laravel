<?php

namespace App\Http\Controllers\Api\V1;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Validator;
use App\Models\Clients;
use App\Http\Resources\ClientCollection;

/**
 * Контроллер клиентов
 * 
 * @author Андрей Сердюк
 * @copyright (c) 2019 IMND
 */ 
class ClientsController extends Controller
{
    public function list()
    {
        return new ClientCollection(Clients::all());
    }

    public function create(Request $request)
    {
        $client = new Clients([
            'title' => $request->get('title'),
            'body' => $request->get('body')
        ]);
        $client->save();

        return response()->json('success');
    }

    public function edit($id)
    {
        $client = Clients::find($id);
        return response()->json($client);
    }

    public function update($id, Request $request)
    {
        $client = Clients::find($id);
        $client->update($request->all());

        return response()->json('successfully updated');
    }

    public function delete($id)
    {
        $client = Clients::find($id);
        $client->delete();

        return response()->json('successfully deleted');
    }
}
