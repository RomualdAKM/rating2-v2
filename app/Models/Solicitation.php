<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Solicitation extends Model
{
    use HasFactory;

    protected $fillable = [
        'structure_id',
        'name',
        'email',
        'contact',
        'object_solicitation',
        'description_solicitation',
        'file',
        'status',
    ];
}
