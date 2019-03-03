<?php
namespace App\Http\Controllers\Api\V1;

use App\Repositories\InvoicesRowsRepositoryInterface;

use Illuminate\Http\Resources\Json\ResourceCollection,
    App\Models\InvoicesRows;

/**
 * Контроллер позиций фактур
 * 
 * @author Андрей Сердюк
 * @copyright (c) 2019 IMND
 */ 
class InvoicesRowsController extends ApiController
{
    /**
     * Создание нового экземпляра контроллера.
     *
     * @param InvoicesRowsRepositoryInterface $repo
     * @return void
     */
    public function __construct(InvoicesRowsRepositoryInterface $repo)
    {
        $this->repo = $repo;
    }

    public function list($invoiceId)
    {
        return new ResourceCollection(InvoicesRows::where('invoice_id', $invoiceId)->get());
    }
}
