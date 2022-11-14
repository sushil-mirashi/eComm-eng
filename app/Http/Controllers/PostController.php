<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Post;
use App\Models\Content;
use App\Exceptions\Handler;

class PostController extends Controller
{
    function create_post()
    {
        // $post = new Post;
        // $post->title = "Post 2";
        // $post->description = bin2hex(random_bytes(20));
        // $post->created_at = date('Y-m-d H:i:s');
        // $post->save();
        // $res = $post::find(2);
        $post = Post::find(2);    //insert through relation only works through eloquent approach above post obj wont work
        // dd($res);
        $content = new Content;
        $content->description = "Hello World Decription Das23ewe 2 2 ef wer e\" sdasd";
        $post->contents()->save($content);

        dd("Data Stored In Database", 200);
    }
}