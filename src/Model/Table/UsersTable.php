<?php

namespace App\Model\Table;

use Cake\ORM\Table;
use Cake\Validation\Validator;

class UsersTable extends Table
{
    public function initialize(array $config): void
    {
        $this->hasMany('Posts')
            ->setForeignKey('author')
            ->setProperty('posts');
    }

    public function validationDefault(Validator $validator): Validator
    {
        return $validator
            ->minLength('username', 4)
            ->maxLength('username', 255)

            ->minLength('passwd', 8)
            ->maxLength('passwd', 255);
    }
}
?>