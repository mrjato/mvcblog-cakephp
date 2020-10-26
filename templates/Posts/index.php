<h1><?= __('Artículos') ?></h1>
<table>
    <tr>
        <th><?= __('Título') ?></th>
        <th><?= __('Autor') ?></th>
        <th><?= __('Acciones') ?></th>
    </tr>

    <?php foreach ($posts as $post) : ?>
        <tr>
            <td>
                <?= $this->Html->link($post->title, ['action' => 'view', $post->id]) ?>
            </td>
            <td>
                <?= $post->author ?>
            </td>
            <td>
                <?php
                    if ($user && $post->author === $user->username) {
                        echo $this->Html->link(__('Editar'), ['action' => 'edit', $post->id]);
                        echo '&nbsp;';
                        echo $this->Form->postLink(__('Eliminar'), ['action' => 'delete', $post->id], ['confirm' => __('¿Estás seguro?')]);
                    }
                ?>
            </td>
        </tr>
    <?php endforeach; ?>
</table>

<?php
if ($user)
{
    echo $this->Html->link(__('Crear artículo'), ['action' => 'add']);
}
?>