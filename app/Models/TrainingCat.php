<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TrainingCat extends Model
{
    use HasFactory;
    protected $guarded = ['*'];

    public function training()
    {
        return $this->hasMany('App\Models\Training', 'id');
    }
}
