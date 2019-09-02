<?php
namespace App\Traits;

use App\Models\Clients;

trait Client
{
    /**
     * Get the client.
     */
    public function client()
    {
        return $this->belongsTo(Clients::class, 'client_id')->withDefault();
    }

    /**
     * Получить имя клиента.
     *
     * @param  string $value
     * @return string
     */
    public function getClientAttribute($value)
    {
        return ucfirst($value);
    }
}
