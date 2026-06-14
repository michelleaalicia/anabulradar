<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PetReport extends Model
{
    protected $fillable = [
        'user_id',
        'pet_name',
        'species',
        'breed',
        'gender',
        'age',
        'color',
        'special_mark',
        'photo',
        'lost_location',
        'lost_date',
        'description',
        'contact_number',
        'status',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
}