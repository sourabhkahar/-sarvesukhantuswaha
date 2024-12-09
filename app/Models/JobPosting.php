<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class JobPosting extends Model
{
    protected $fillable = [
        'title',
        'company',
        'location',
        'employment_type',
        'min_salary',
        'max_salary',
        'currency',
        'description',
        'requirements',
        'responsibilities',
        'posted_date',
        'application_deadline',
        'job_category',
        'experience_level',
        'contact_email',
    ];
}
