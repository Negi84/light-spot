<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $table = 'payment_gateway';
    protected $primarykey = 'payment_id';
    protected $fillable = ['name', 'email', 'mobile', 'password', 'select_class', 'select_board', 'school_name', 'city'];
    public $timestamps = false;
}