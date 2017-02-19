<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Page extends Model
{
    use SoftDeletes;

    protected $table = 'pages';
    protected $dates = ['deleted_at'];
    protected $fillable = [
        'title', 'slug', 'tags', 'image', 'template', 'excerpt', 'content',
        'is_public', 'last_updated_by'
    ];



    public function user() {
        return $this->belongsTo(User::class, 'last_updated_by');
    }
}
