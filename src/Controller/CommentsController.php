<?php

namespace App\Controller;

class CommentsController extends AppController
{
    public function initialize(): void
    {
        parent::initialize();

        $this->loadComponent('Flash');
    }

    public function add()
    {
        $comment = $this->Comments->newEmptyEntity();

        if ($this->request->is('post')) {
            $comment = $this->Comments->patchEntity($comment, $this->request->getData());

            $user = $this->Authentication->getIdentity();
            $comment->author = $user->username;

            if ($this->Comments->save($comment)) {
                $this->Flash->success('El comentario ha sido almacenado.');
            } else {
                $this->Flash->error('El comentario no se ha podido almacenar.');
            }

            return $this->redirect(['controller' => 'Posts', 'action' => 'view', $comment->post]);
        }

        return $this->redirect('/');
    }
}
?>