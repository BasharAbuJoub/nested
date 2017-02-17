<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    //




    public function getAuthor(){

        return User::where('id', $this->author_id)->first()->name;


    }




}
