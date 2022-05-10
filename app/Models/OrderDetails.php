<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderDetails extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function orders()
    {
        return $this->belongsTo(Order::class);
    }
    public function books()
    {
        return $this->belongsTo(BookPackage::class, 'package_id');
    }
}
