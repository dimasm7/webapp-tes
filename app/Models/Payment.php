<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Payment extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = [
        'invoice_id',
        'amount',
        'due_date',
    ];

    public static $rules = [
        'invoice_id' => ['required'],
        'amount' => ['required'],
    ];
}
