<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Standard extends Model
{
    use HasFactory;
    protected $table = 'class';
    public $timestamps = false;

    public function order()
    {
        return $this->hasMany('App\Models\Order');
    }
}
