<?php
namespace App\Http\Controllers\Api\V1;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Http\Resources\Json\ResourceCollection;

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

    //public function list(Request $request)
//    {
//        $modelName = $this->modelName;
//        /**
//         * @var \Illuminate\Database\Eloquent\Builder $query
//         */
//        $query = $modelName::query();
//        $conditions = $modelName::getQueryConditions($request->all());
//        return new ResourceCollection($query->where($conditions)->get());
//    }

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
