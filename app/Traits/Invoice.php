<?php
namespace App\Traits;

trait Invoice
{
    /**
     * Get the invoice.
     */
    public function invoice()
    {
        return $this->hasOne('App\Models\Invoices', 'invoice_id');
    }
}
