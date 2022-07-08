<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Issues extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'cat_id',
        'number',
        'volume',
        'year',
        'startDate',
        'status',
        
    ];

    public function category(){
        return $this->belongsTo('App\Category');
    }

    public function cat(){
        return $this->hasOne(Category::class, 'id', 'cat_id');
    }

}
