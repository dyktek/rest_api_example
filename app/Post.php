<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = ['title', 'body', 'user_id', 'category_id'];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function getWithCategories()
    {
        return Post::select('posts.*', 'categories.name')
            ->join('categories', 'categories.id', '=', 'posts.category_id')
            ->orderBy('created_at', 'DESC')
            ->paginate(10);
    }
}
