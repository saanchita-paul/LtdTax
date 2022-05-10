<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PublicationCat extends Model
{
    use HasFactory;
    protected $guarded = ['*'];

    public function publication()
    {
        return $this->hasMany('App\Models\Publication', 'id');
    }
}
