<?php
declare(strict_types=1);

namespace App\Controller\PrivateRest;

use Cake\Controller\Controller;
use Cake\I18n\I18n;

class PrivateRestController extends Controller
{
    public function initialize(): void
    {
        parent::initialize();

        $this->loadComponent('RequestHandler');
        $this->loadComponent('Authentication.Authentication');

        if ($this->request->hasHeader('Accept-Language')) {
            I18n::setLocale($this->request->getHeader('Accept-Language')[0]);
        }
    }
}
