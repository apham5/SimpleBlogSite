<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
    //
    protected $primaryKey = ['username','blog_id'];
    protected $fillable = [
        'username', 'blog_id', 'timestamp'
    ];
    public $incrementing = false;
    public $timestamps = false;
}
