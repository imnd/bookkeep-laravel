<?php
namespace App\Traits;

trait Client
{
    /**
     * Get the client.
     */
    public function client()
    {
        return $this->belongsTo('App\Models\Clients', 'client_id')->withDefault();
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
