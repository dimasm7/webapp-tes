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
        'status',
        'desc',
    ];

    public static $rules = [
        'job_type_id' => ['required'],
        'name' => ['required'],
    ];

    public function job_types(){ 
        return $this->belongsTo(JobType::class,'job_type_id'); 
    }
}
