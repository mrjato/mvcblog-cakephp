<?php

namespace App\Model\Entity;

use Cake\ORM\Entity;

class Comment extends Entity
{
    protected $_accesible = [
        '*' => true,
        'id' => false,    # Al ser autogenerado se excluye de la asignación automática
        'author' => false # El autor será el usuario logueado
    ];
}

?>