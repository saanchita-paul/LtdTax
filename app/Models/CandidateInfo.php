<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CandidateInfo extends Model
{
    use HasFactory;
    protected $guarded = ['*'];

    public function districton()
    {
        return $this->belongsTo('App\Models\Location', 'district_id', 'id');
    }
    public function thana()
    {
        return $this->hasMany('App\Models\Location', 'district_id', 'id');
    }
}
