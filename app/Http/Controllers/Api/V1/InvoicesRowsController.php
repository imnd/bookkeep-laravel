<?php
namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\InvoicesRows;
use App\Http\Resources\InvoicesRowsCollection;

/**
 * Контроллер клиентов
 * 
 * @author Андрей Сердюк
 * @copyright (c) 2019 IMND
 */ 
class InvoicesRowsController extends Controller
{
    /**
     * @inheritdoc
     */
/*    protected $modelName = 'App\Models\InvoicesRows';*/
    /**
     * @inheritdoc
     */
/*    protected $collectionName = 'App\Http\Resources\InvoicesRowsCollection';*/

    public function list($invoiceId)
    {
        return new InvoicesRowsCollection(InvoicesRows::where('invoice_id', $invoiceId)->get());
    }
}
