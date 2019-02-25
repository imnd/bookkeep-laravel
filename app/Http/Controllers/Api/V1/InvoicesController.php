<?php
namespace App\Http\Controllers\Api\V1;

use Illuminate\Http\Request;
use App\Models\InvoicesRows;

/**
 * Контроллер клиентов
 * 
 * @author Андрей Сердюк
 * @copyright (c) 2019 IMND
 */ 
class InvoicesController extends ApiController
{
    /**
     * @inheritdoc
     */
    protected $modelName = 'App\Models\Invoices';
    /**
     * @inheritdoc
     */
    protected $collectionName = 'App\Http\Resources\InvoiceCollection';

    public function update($id, Request $request)
    {
        $postData = $request->post();
        // фактура
        $modelName = $this->modelName;
        $invoice = $modelName::find($id);
        $invoice->update($postData['invoice']);
        // позиции фактуры
        // чистим
        foreach ($invoice->rows()->get() as $row) {
            $row->delete();
        }
        // пересоздаем новые
        foreach ($postData['rows'] as $rowData) {
            (new InvoicesRows($rowData))->save();
        }
        return response()->json('successfully updated.');
    }
}
