<?php

namespace App\Controller\PrivateRest;

use Cake\Http\Exception\UnauthorizedException;

class UsersController extends PrivateRestController
{
    public function view($login)
    {
        $loggedUser = $this->Authentication->getIdentity();

        if ($loggedUser->username !== $login) {
            throw new UnauthorizedException(__('No puedes ver el usuario solicitado'));
        } else {
            $user = $this->Users->get($login);
    
            $this->set(compact('user'));
            $this->viewBuilder()->setOption('serialize', ['user']);
        }
    }
}
?>