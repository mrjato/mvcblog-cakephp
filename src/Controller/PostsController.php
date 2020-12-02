<?php

namespace App\Controller;

use Cake\Datasource\Exception\RecordNotFoundException;

class PostsController extends AppController
{
    public function initialize(): void
    {
        parent::initialize();

        $this->Authentication->allowUnauthenticated(['index', 'view']);
    }

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
    }

    public function add()
    {
        $post = $this->Posts->newEmptyEntity();

        if ($this->request->is('post')) {
            $post = $this->Posts->patchEntity($post, $this->request->getData());

            $user = $this->Authentication->getIdentity();
            $post->author = $user->username;

            if ($this->Posts->save($post)) {
                $this->Flash->success(__('El artículo ha sido almacenado.'));
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('El artículo no se ha podido almacenar.'));
        }

        $this->set('post', $post);
    }

    public function edit($id)
    {
        $post = $this->Posts->get($id);

        if ($this->request->is(['post', 'put'])) {
            $this->Posts->patchEntity($post, $this->request->getData());

            $user = $this->Authentication->getIdentity();
            if ($post->author !== $user->username) {
                $this->Flash->error(__('El usuario actual no es propietario del artículo.'));
            } else if ($this->Posts->save($post)) {
                $this->Flash->success(__('El artículo ha sido actualizado.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('El artículo no se ha podido modificar.'));
            }
        }

        $this->set('post', $post);
    }

    public function delete($id)
    {
        $this->request->allowMethod(['post', 'delete']);

        try {
            $post = $this->Posts->get($id);
            $user = $this->Authentication->getIdentity();

            if ($post->author !== $user->username) {
                $this->Flash->error(__('El usuario actual no es propietario del artículo.'));
            } else if ($this->Posts->delete($post)) {
                $this->Flash->success(__('El artículo {0} ha sido eliminado.', $post->title));
            } else {
                $this->Flash->error(__('El artículo {0} no ha podido ser eliminado.', $post->title));
            }
        } catch (RecordNotFoundException $exception) {
            $this->Flash->error(__('No se ha encontrado un artículo con id {0}.', $id));
        }

        return $this->redirect(['action' => 'index']);
    }
}
?>