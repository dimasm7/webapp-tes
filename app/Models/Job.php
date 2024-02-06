<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Job extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = [
        'job_type_id',
        'name',
        'desc',
        'status',
    ];

    public static $rules = [
        'job_type_id' => ['required'],
        'name' => ['required'],
    ];
}
