<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    use HasFactory;
    protected $guarded = ['*'];

    public function districton()
    {
        return $this->belongsTo(self::class, 'district_id', 'id');
    }
    public function thana()
    {
        return $this->hasMany(self::class, 'district_id', 'id');
    }
}
