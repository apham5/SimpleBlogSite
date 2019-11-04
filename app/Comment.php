<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    //
    protected $primaryKey = 'comment_id';

    protected $fillable = [
        'username', 'blog_id', 'content'
    ];

    public function user() {
        return $this->belongsTo('App\User','username','username');
    }
}
