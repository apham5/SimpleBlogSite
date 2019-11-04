<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    //
    protected $primaryKey = 'blog_id';
    //public $timestamps = false;

    protected $fillable = [
        'title', 'content', 'created_at', 'last_edited_at'
    ];

    public static $rules = [
        'title' => 'required',
        'content' => 'required'
    ];

    public static $messages = [
        'title.required' => 'Please give your blog post a title.',
        'content.required' => 'The content of your blog post is empty.'
    ];

    public function user() {
        return $this->belongsTo('App\User','username','username');
    }
}
