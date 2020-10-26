<?php

namespace App\Controller;

class LocalesController extends AppController
{
    public function initialize(): void
    {
        parent::initialize();
        
        $this->Authentication->allowUnauthenticated(['change']);
    }

    public function change($locale = 'es')
    {
        $this->request->getSession()->write('Config.locale', $locale);

        return $this->redirect($this->referer());
    }
}
?>