<?php

namespace App\Model\Table;

use Cake\ORM\Table;
use Cake\Validation\Validator;
use Cake\ORM\RulesChecker;

class CommentsTable extends Table
{
    public function initialize(array $config): void
    {
        $this->belongsTo('Users')
            ->setForeignKey('author')
            ->setProperty('author_data')
            ->setDependent(true);
        
        $this->belongsTo('Posts')
            ->setForeignKey('post')
            ->setProperty('post_data')
            ->setDependent(true);
    }

    public function validationDefault(Validator $validator): Validator
    {
        $validator
            ->requirePresence('content')
            ->notEmptyString('content')
            ->maxLength('content', 255);

        return $validator;
    }

    public function buildRules(RulesChecker $rules): RulesChecker
    {
        $rules
            ->add($rules->existsIn('author', 'Users'))
            ->add($rules->existsIn('post', 'Posts'));

        return $rules;
    }
}
?>
