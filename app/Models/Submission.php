<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Submission extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'cat_id',
        'issue_id',
        'pages',
        'author',
        'abstract',
        'keywords',
        'pdf_link',
        'startDate',
        'status',
        
    ];

    public function cat(){
        return $this->hasOne(Category::class, 'id', 'cat_id');
    }

    public function iss(){
        return $this->hasOne(Issues::class, 'id', 'issue_id');
    }
}
