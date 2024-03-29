<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ServiceRequest extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = [
        'project_id',
        'qty',
        'deadline',
    ];

    public static $rules = [
        'project_id' => ['required'],
        'qty' => ['required', 'numeric'],
    ];
}
