<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Training extends Model
{
    use HasFactory;
    protected $guarded = ['*'];

    public function Categories()
    {
        return $this->belongsTo('App\Models\TrainingCat', 'tcat_id');
    }

    public function Contact()
    {
        return $this->belongsTo('App\Models\TrainingContact', 'contact_id');
    }
}
