<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ResumeViewStatus extends Model
{
    use HasFactory;
    protected $fillable = ['application_id', 'employer_id', 'view_status'];

}
