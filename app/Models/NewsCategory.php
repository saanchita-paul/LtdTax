<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NewsCategory extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function nwcat()
    {
        return $this->belongsTo(NewsCategory::class, 'parent_id');
    }
    public function children()
    {
        return $this->hasMany(NewsCategory::class, 'parent_id');
    }
}
