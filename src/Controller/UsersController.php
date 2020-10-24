<?php

namespace App\Controller;

class UsersController extends AppController
{
    public function beforeFilter(\Cake\Event\EventInterface $event)
    {
        parent::beforeFilter($event);

        $this->Authentication->allowUnauthenticated(['login', 'register']);
    }

    public function login()
    {
        $result = $this->Authentication->getResult();
        
        if ($result->isValid()) {
            $target = $this->Authentication->getLoginRedirect() ?? '/';
            return $this->redirect($target);
        } else if ($this->request->is('post')) {
            $this->Flash->error('Usuario o password incorrectos');
        }
    }

    public function register()
    {
        $result = $this->Authentication->getResult();
        
        if ($result->isValid()) {
            return $this->redirect('/');
        } else {
            $user = $this->Users->newEmptyEntity();

            if ($this->request->is('post')) {
                $user = $this->Users->patchEntity($user, $this->request->getData());

                if ($this->Users->save($user)) {
                    $this->Flash->success('Usuario registrado con éxito.');
                    return $this->redirect(['action' => 'login']);
                }
                $this->Flash->error('No se ha podido completar el registro.');
            }

            $this->set('user', $user);
        }
    }

    public function logout()
    {
        $this->Authentication->logout();
        return $this->redirect('/');
    }
}
?>