<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;

    const UPDATED_AT = null;
    public $timestamps = true;

    protected $fillable = ['name', 'phone'];

    public function orders()
    {
        return $this->hasMany(Order::class);
    }
}
