<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Tenant extends Model
{
    use HasFactory, SoftDeletes;
    protected  $fillable = [
        'name',
        'phone',
        'email',
        'verified_at',
        'code_prefix',
        'deleted_at',
    ];
}
