<?php

namespace App\Controller\PublicRest;

class PostsController extends PublicRestController
{
    public function index()
    {
        $posts = $this->Posts->find();
        $this->set(compact('posts'));
        $this->viewBuilder()->setOption('serialize', ['posts']);
    }

    public function view($id)
    {
        $post = $this->Posts->get($id, ['contain' => ['Comments']]);
        $this->set(compact('post'));
        $this->viewBuilder()->setOption('serialize', ['post']);
    }
}
?>
