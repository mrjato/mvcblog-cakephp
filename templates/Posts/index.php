<h1>Artículos</h1>
<table>
    <tr>
        <th>Título</th>
        <th>Autor</th>
        <th>Acciones</th>
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
                        echo $this->Html->link('Editar', ['action' => 'edit', $post->id]);
                        echo '&nbsp;';
                        echo $this->Form->postLink('Eliminar', ['action' => 'delete', $post->id], ['confirm' => '¿Estás seguro?']);
                    }
                ?>
            </td>
        </tr>
    <?php endforeach; ?>
</table>

<?php
if ($user)
{
    echo $this->Html->link('Crear artículo', ['action' => 'add']);
}
?>