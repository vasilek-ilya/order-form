<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    public $timestamps = false;

    public function client()
    {
        return $this->belongsTo(Client::class);
    }

    public function tariff()
    {
        return $this->belongsTo(Tariff::class);
    }
}
