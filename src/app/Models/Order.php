<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    const UPDATED_AT = null;
    public $timestamps = true;

    protected $fillable = ['day_of_week', 'address'];

    public function client()
    {
        return $this->belongsTo(Client::class);
    }

    public function tariff()
    {
        return $this->belongsTo(Tariff::class);
    }
}
