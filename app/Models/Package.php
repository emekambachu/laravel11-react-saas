<?php

namespace App\Models;

use App\Models\Feature\Feature;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Package extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'price',
        'credits',
        'slug',
        'description'
    ];
}
