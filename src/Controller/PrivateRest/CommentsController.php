<?php

namespace App\Controller\PrivateRest;

use Cake\Http\Exception\BadRequestException;

class CommentsController extends PrivateRestController
{
    public function add()
    {
        $comment = $this->Comments->newEntity($this->request->getData());

        $user = $this->Authentication->getIdentity();
        $comment->author = $user->username;

        if ($this->Comments->save($comment)) {
            $this->set(compact('comment'));
            $this->viewBuilder()->setOption('serialize', ['comment']);
        } else {
            throw new BadRequestException(__('Datos de comentario incorrectos.'));
        }
    }
}
?>