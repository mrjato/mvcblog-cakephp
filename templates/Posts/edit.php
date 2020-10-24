<h1>Editar artículo</h1>
<?php
    echo $this->Form->create($post);
    echo $this->Form->control('author', ['type' => 'hidden']);
    echo $this->Form->control('title');
    echo $this->Form->control('content', ['rows' => '3']);
    echo $this->Form->button('Guardar artículo');
    echo $this->Form->end();
?>