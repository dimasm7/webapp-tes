<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PurchaseOrder extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = [
        'project_id',
        'invoice_id',
    ];

    public static $rules = [
        'project_id' => ['required'],
        'invoice_id' => ['required'],
    ];
}
