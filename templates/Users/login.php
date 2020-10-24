<h1>Login</h1>
<div class="users form content">
    <?= $this->Form->create() ?>
    <fieldset>
        <legend>Por favor, introduce tu usuario y password</legend>
        <?= $this->Form->control('username', ['label' => 'Usuario']) ?>
        <?= $this->Form->control('passwd', ['label' => 'Contraseña']) ?>
    </fieldset>
    <?= $this->Form->button('Login'); ?>
    <?= $this->Html->link('Registrarse', ['controller' => 'Users', 'action' => 'register'], ['class' => 'button']) ?>
    <?= $this->Form->end() ?>
</div>