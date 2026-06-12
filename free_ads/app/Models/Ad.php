<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ad extends Model
{
    protected $fillable = [
        'title',
        'category',
        'description',
        'photo',
        'price',
        'location',
        'user_id'
    ];

    public function user(){
        return $this->belongsTo(User::class);    
    }
}
