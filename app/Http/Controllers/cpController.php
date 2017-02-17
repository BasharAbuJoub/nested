<?php

namespace App\Http\Controllers;

use App\Blog;
use App\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;

class cpController extends Controller
{
    //


    public function showCp()
    {


        return view('controlpanel');

    }

    public function showNew()
    {


        return view('new');

    }


    public function newPost(Request $r)
    {

        $title = $r->input('title');
        $cover = $r->input('cover');
        $content = $r->input('content');
        $author_id = Auth::user()->id;


        Blog::create(['title' => $title, 'cover' => $cover, 'content' => $content, 'author_id' => $author_id]);

        return view('new')->with('added', 1);


    }

    public function showPost($id)
    {
        if (isset($id)) {
            $post = Blog::getBlog($id);
            if (!empty($post)) {
                return view('post')->with('post', $post);
            }

        }


    }

    public function editPost($id, Request $r)
    {

        $edited = 0;

        $post = Blog::getBlog($id);

        if ($r->isMethod('post')) {

            $post->update($r->all());

            $edited = 1;

        }

        return view('editpost')->with('edited', $edited)->with('post', $post);


    }

    public function postComment($id, Request $r){
        $added = 0;
        $post = Blog::getBlog($id);

        if($r->isMethod('post')){
            if(!empty($r->input('addcomment'))){


                $user_id = Auth::user()->id;

                $added = 1;
                $comment = new Comment();
                $comment->author_id = $user_id;
                $comment->blog_id = $id;
                $comment->content = $r->input('content');
                $comment->save();


            }
        }

        return view('post')->with('added', $added)->with('post', $post);



    }


}
