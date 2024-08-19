<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'status',
        'user_id',
        'name',
        'category_id',
        'usertype',
        'image',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
