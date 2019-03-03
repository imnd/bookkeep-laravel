<?php
namespace App\Http\Controllers\Api\V1;

use Illuminate\Http\Request,
    Illuminate\Http\Exception;

/**
 * Контроллер табличных моделей (фактур и т.д.)
 * 
 * @author Андрей Сердюк
 * @copyright (c) 2019 IMND
 */ 
class HasRowsController extends ApiController
{
    /**
     * Позиции модели
     */
    public function rows($id)
    {
        if (!$item = $this->repo->find($id)) {
            throw new HttpException('Нет такой модели');
        }
        return $item
            ->rows()
            ->get()
            ->all();
    }

    public function update($id, Request $request)
    {
        // главная модель
        if (!$item = $this->repo->find($id)) {
            throw new HttpException('Нет такой модели');
        }
        $postData = $request->post();
        $item->update($postData['invoice']);

        // позиции главой модели
        // чистим
        $item->rows()->delete();
        // пересоздаем новые
        foreach ($postData['rows'] as $rowData) {
            $item->rows()->create($rowData);
        }
        return response()->json('successfully updated.');
    }
}
