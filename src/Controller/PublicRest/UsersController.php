<?php

namespace App\Controller\PublicRest;

use Cake\Datasource\Exception\RecordNotFoundException;
use Cake\Http\Exception\BadRequestException;

class UsersController extends PublicRestController
{
    public function add()
    {
        $user = $this->Users->newEntity($this->request->getData());

        try {
            $this->Users->get($user->username);
            throw new BadRequestException(__('El usuario ya existe.'));
        } catch(RecordNotFoundException $e) {
            if ($this->Users->save($user)) {
                $this->set(compact('user'));
                $this->viewBuilder()->setOption('serialize', ['user']);
            } else {
                throw new BadRequestException(__('No se ha podido registrar al usuario.'));
            }
        } 
    }
}
?>