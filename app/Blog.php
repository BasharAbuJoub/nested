<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{


    protected $fillable = ['title', 'cover', 'content', 'author_id'];


    public function scopeGetPostsForUser($query, $id)
    {

        return $query->where('author_id', '=', $id)->orderby('id', 'desc')->get();


    }

    public function scopeGetBlog($query, $id)
    {


        return $query->where('id', '=', $id)->first();

    }

    public function getAuthor()
    {

        $user = User::where('id', '=', $this->author_id)->first();
        return $user->name;

    }

    public function getDate()
    {

        return $this->created_at;

    }

    public function comments()
    {

        return $this->hasMany('App\Comment', 'blog_id', 'id')->orderby('id', 'desc');


    }


}
