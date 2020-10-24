<?php

namespace App\Model\Entity;

use Cake\ORM\Entity;

class Post extends Entity
{
    protected $_accesible = [
        '*' => true,
        'id' => false    # Al ser autogenerado se excluye de la asignación automática
    ];
}

?>