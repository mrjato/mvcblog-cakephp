<?php

namespace App\Model\Table;

use Cake\ORM\Table;
use Cake\Validation\Validator;

class PostsTable extends Table
{
    public function validationDefault(Validator $validator): Validator
    {
        $validator
            ->minLength('title', 3)
            ->maxLength('title', 255)

            ->notEmptyString('content')
            ->maxLength('content', 255);

        return $validator;
    }
}
?>
