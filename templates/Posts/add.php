<h1><?= __('Crear artículo') ?></h1>
<?php
    echo $this->Form->create($post);
    echo $this->Form->control('title', ['label' => __('Título')]);
    echo $this->Form->control('content', ['label' => __('Contenido'), 'rows' => '3']);
    echo $this->Form->button(__('Guardar artículo'));
    echo $this->Form->end();
?>