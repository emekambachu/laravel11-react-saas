<?php

namespace App\Models\Feature;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UsedFeature extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'feature_id',
        'credits',
        'data',
    ];

    protected function casts(){
        return [
            'data' => 'array',
        ];
    }

    public function user(){
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function feature(){
        return $this->belongsTo(Feature::class, 'feature_id', 'id');
    }
}
