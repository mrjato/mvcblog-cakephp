<?php

namespace App\Controller;

class PostsController extends AppController
{
    public function index()
    {
        $posts = $this->Posts->find();
        $this->set(compact('posts'));
    }

    public function view($id)
    {
        $post = $this->Posts->get($id);
        $this->set(compact('post'));
    }
}
?>