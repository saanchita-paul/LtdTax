<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function job_categories()
    {
        return $this->belongsTo('App\Models\JobCat', 'jobcat_id');
    }
    public function company()
    {
        return $this->belongsTo('App\Models\CompanyDetailInfo', 'company_id');
    }
    public function morejob()
    {
        return $this->belongsTo('App\Models\MoreJob', 'mjob_id');
    }
}
