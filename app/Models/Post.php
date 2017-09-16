<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use SoftDeletes;

    protected $table = 'posts';
    protected $dates = ['deleted_at', 'published_at'];
    protected $guarded = ['id'];


    public function user() {
        return $this->belongsTo(User::class, 'last_updated_by');
    }
}
