<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function billing_adderss()
    {
        return $this->belongsTo(BillingAddress::class, 'billing_id');
    }
    public function orderdetails()
    {
        return $this->hasMany(OrderDetails::class, 'order_id');
    }
    public function trainorderDetails(){
        return $this->hasMany(TrainOrderDetails::class, 'order_id');
    }
}
