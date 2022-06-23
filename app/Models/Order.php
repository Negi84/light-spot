<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $table = 'payment_gateway';
    protected $primarykey = 'payment_id';
    protected $fillable = ['name', 'email', 'mobile', 'password', 'select_class', 'select_board', 'school_name', 'city', 'ORDER_ID', 'CUST_ID', 'INDUSTRY_TYPE_ID', 'CHANNEL_ID', 'TXN_AMOUNT', 'formname', 'paymentstatus'];
    public $timestamps = false;

    public function standard()
    {
        return $this->belongsTo('App\Models\Standard', 'select_class', 'class_id');
    }

    public function board()
    {
        return $this->belongsTo('App\Models\Board', 'select_board', 'board_id');
    }
}
