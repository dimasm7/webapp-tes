<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ServiceOffering extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = [
        'project_id',
        'name',
        'qty',
        'price',
        'status',
    ];

    public static $rules = [
        'project_id' => ['required'],
        'name' => ['required'],
        'qty' => ['required', 'numeric'],
    ];
}
