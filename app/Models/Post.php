<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'content',
        'image',
        'category_id',
        'author',
        'created_at'
       ];

       protected $guarded = [];

       public function category(){
           return $this->belongsTo(Category::class);
       }

       public function page(){
        return $this->belongsTo(Page::class);
    }
}
