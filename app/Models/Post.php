<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use SoftDeletes;

    protected $table = 'posts';
    protected $dates = ['deleted_at', 'published_at'];
    protected $fillable = [
        'title', 'slug', 'tags', 'image', 'template', 'excerpt', 'content',
        'is_public', 'last_updated_by', 'is_commentable', 'published_at'
    ];


    public function user() {
        return $this->belongsTo(User::class, 'last_updated_by');
    }
}
