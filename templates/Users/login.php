<h1><?= __('Login') ?></h1>
<div class="users form content">
    <?= $this->Form->create() ?>
    <fieldset>
        <legend><?= __('Por favor, introduce tu usuario y contraseña') ?></legend>
        <?= $this->Form->control('username', ['label' => __('Usuario')]) ?>
        <?= $this->Form->control('passwd', ['label' => __('Contraseña')]) ?>
    </fieldset>
    <?= $this->Form->button(__('Login')); ?>
    <?= $this->Html->link(__('Registrarse'), ['controller' => 'Users', 'action' => 'register'], ['class' => 'button']) ?>
    <?= $this->Form->end() ?>
</div>