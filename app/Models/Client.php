<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Client extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = [
        'name',
        'email',
        'phone',
        'address',
    ];

    public static $rules = [
        'name' => ['required'],
        'email' => ['required', 'unique:clients'],
        'phone' => ['max:15']
    ];
}
