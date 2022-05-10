<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Education extends Model
{
    use HasFactory;
    protected $guarded = ['*'];

    public function parent()
    {
        return $this->belongsTo(self::class, 'parent_id', 'id');
    }
    public function child()
    {
        return $this->hasMany(self::class, 'parent_id', 'id');
    }
}
