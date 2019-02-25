<?php
namespace App\Http\Controllers\Api\V1;

use Illuminate\Http\Request;
use App\Models\PurchasesRows;

/**
 * Контроллер клиентов
 * 
 * @author Андрей Сердюк
 * @copyright (c) 2019 IMND
 */ 
class PurchasesController extends ApiController
{
    /**
     * @inheritdoc
     */
    protected $modelName = 'App\Models\Purchases';
    /**
     * @inheritdoc
     */
    protected $collectionName = 'App\Http\Resources\PurchaseCollection';

    public function update($id, Request $request)
    {
        $postData = $request->post();
        // фактура
        $modelName = $this->modelName;
        $invoice = $modelName::find($id);
        $invoice->update($postData['purchase']);
        // позиции фактуры
        // чистим
        foreach ($invoice->rows()->get() as $row) {
            $row->delete();
        }
        // пересоздаем новые
        foreach ($postData['rows'] as $rowData) {
            (new PurchasesRows($rowData))->save();
        }
        return response()->json('successfully updated.');
    }
}
