<?php

namespace app\Controllers;

use app\Models\Post;
use core\Request;

class PostController extends Controller
{
    private ?Post $model;
    public function __construct()
    {
        $this->model = new Post();
    }


    public function index()
    {
        
        return view('post.index', [
            'posts' => $this->model->all(),
        ]);
    }

    public function create()
    {
        return view('post.create');
    }


    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'content'=> 'required',
        ]);
        $this->model->create([
            'user_id' => $this->auth->id(),
            'title'=>$request->title,
            'content'=>$request->content,
            'created_at'=>date('Y-m-d H:s i'),
        ]);
        redirect(route('posts.index'));
    }
}
