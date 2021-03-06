<?php
namespace App\Traits;

trait Date
{
    /**
     * Получить дату.
     *
     * @param  string $value
     * @return string
     */
    public function getDateReadableAttribute($value)
    {
        $date = date_create($value);
        $date = date_format($date, 'd.m.Y');
        return $date;
    }

    /**
     * Установить дату.
     *
     * @param  string $value
     * @return void
     */
    public function setDateReadableAttribute($value)
    {
        if (
                !$date = date_create_from_format($value, 'd.m.Y')
            and !$date = date_create_from_format($value, $this->dateFormat)
        ) {
            return;
        }
        $this->attributes['date'] = date_format($date, $this->dateFormat);
    }
}
