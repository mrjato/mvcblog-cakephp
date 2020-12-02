<?php

namespace App\Model\Table;

use Cake\ORM\Table;
use Cake\Validation\Validator;
use Cake\ORM\RulesChecker;

class PostsTable extends Table
{
    public function initialize(array $config): void
    {
        $this->belongsTo('Users')
            ->setForeignKey('author')
            ->setProperty('author_data');
        
        $this->hasMany('Comments')
            ->setForeignKey('post')
            ->setProperty('comments')
            ->setDependent(true);
    }

    public function validationDefault(Validator $validator): Validator
    {
        $validator
            ->requirePresence('title')
            ->minLength('title', 3)
            ->maxLength('title', 255)

            ->requirePresence('content')
            ->notEmptyString('content')
            ->maxLength('content', 255);

        return $validator;
    }

    public function buildRules(RulesChecker $rules): RulesChecker
    {
        $rules
            ->add($rules->existsIn('author', 'Users'));

        return $rules;
    }
}
?>
