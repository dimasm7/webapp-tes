<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Invoice extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = [
        'project_id',
        'amount',
        'due_date',
        'status',
    ];

    public static $rules = [
        'project_id' => ['required'],
        'amount' => ['required'],
    ];
}
