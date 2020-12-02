<?php
declare(strict_types=1);

namespace App\Controller\PublicRest;

use Cake\Controller\Controller;
use Cake\I18n\I18n;

class PublicRestController extends Controller
{
    public function initialize(): void
    {
        parent::initialize();

        $this->loadComponent('RequestHandler');

        if ($this->request->hasHeader('Accept-Language')) {
            I18n::setLocale($this->request->getHeader('Accept-Language')[0]);
        }
    }

    
}
