<?php

namespace App\Controller;

use Cake\Datasource\Exception\RecordNotFoundException;

class PostsController extends AppController
{
    public function initialize(): void
    {
        parent::initialize();

        $this->loadComponent('Flash');
    }

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

    public function add() {
        $post = $this->Posts->newEmptyEntity();

        if ($this->request->is('post')) {
            $post = $this->Posts->patchEntity($post, $this->request->getData());
    
            $post->author = 'profesor'; // Deberemos cambiarlo en el futuro
    
            if ($this->Posts->save($post)) {
                $this->Flash->success('El artículo ha sido almacenado.');
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error('El artículo no se ha podido almacenar.');
        }

        $this->set('post', $post);
    }

    public function edit($id)
    {
        $post = $this->Posts->get($id);

        if ($this->request->is(['post', 'put'])) {
            $this->Posts->patchEntity($post, $this->request->getData());

            if ($this->Posts->save($post)) {
                $this->Flash->success('El artículo ha sido actualizado.');
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error('El artículo no se ha podido modificar.');
        }

        $this->set('post', $post);
    }

    public function delete($id)
    {
        $this->request->allowMethod(['post', 'delete']);

        try {
            $post = $this->Posts->get($id);
            
            if ($this->Posts->delete($post)) {
                $this->Flash->success("El artículo {$post->title} ha sido eliminado.");
            } else {
                $this->Flash->error("El artículo {$post->title} no ha podido ser eliminado.");
            }
        } catch (RecordNotFoundException $exception) {
            $this->Flash->error("No se ha encontrado un artículo con id {$id}.");
        }

        return $this->redirect(['action' => 'index']);
    }
}
?>