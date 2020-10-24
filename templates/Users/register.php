<h1>Registro</h1>
<div class="users form content">
    <?= $this->Form->create() ?>
    <fieldset>
        <legend>Por favor, introduce tu usuario y contraseña</legend>
        <?= $this->Form->control('username', ['label' => 'Usuario']) ?>
        <?= $this->Form->control('passwd', ['label' => 'Contraseña']) ?>
    </fieldset>
    <?= $this->Form->button('Registro'); ?>
    <?= $this->Html->link('Login', ['controller' => 'User', 'action' => 'login'], ['class' => 'button']) ?>
    <?= $this->Form->end() ?>
</div>