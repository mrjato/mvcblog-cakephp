<?php

namespace App\Controller\PrivateRest;

use Cake\Http\Exception\BadRequestException;
use Cake\Http\Exception\ForbiddenException;

class PostsController extends PrivateRestController
{

    public function add()
    {
        $post = $this->Posts->newEntity($this->request->getData());

        $user = $this->Authentication->getIdentity();
        $post->author = $user->username;

        if ($this->Posts->save($post)) {
            $this->set(compact('post'));
            $this->viewBuilder()->setOption('serialize', ['post']);
        } else {
            throw new BadRequestException(__('Datos de artículo incorrectos.'));
        }
    }

    public function edit($id)
    {
        $post = $this->Posts->get($id);

        $user = $this->Authentication->getIdentity();
        if ($post->author !== $user->username) {
            throw new ForbiddenException(__('No puedes modificar el artículo.'));
        } else {
            $post = $this->Posts->patchEntity($post, $this->request->getData());

            if ($this->Posts->save($post)) {
                $this->set(compact('post'));
                $this->viewBuilder()->setOption('serialize', ['post']);
            } else {
                throw new BadRequestException(__('Datos de artículo incorrectos.'));
            }
        }
    }

    public function delete($id)
    {
        $post = $this->Posts->get($id);

        $user = $this->Authentication->getIdentity();
        if ($post->author !== $user->username) {
            throw new ForbiddenException(__('No puedes eliminar el artículo.'));
        } else {
            if ($this->Posts->delete($post)) {
                $message = __('Artículo eliminado.');
                $this->set(compact('message'));
                $this->viewBuilder()->setOption('serialize', ['message']);
            } else {
                throw new BadRequestException(__('No se ha podido eliminar el artículo.'));
            }
        }
    }
}
?>