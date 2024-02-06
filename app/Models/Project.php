<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Project extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = [
        'client_id',
        'job_type_id',
        'name',
        'desc',
        'status',
        'date_start',
        'date_end',
    ];

    public static $rules = [
        'client_id' => ['required'],
        'job_type_id' => ['required'],
        'name' => ['required'],
    ];

    public function invoice(): HasMany
    {
        return $this->hasMany(Invoice::class);
    }
}
