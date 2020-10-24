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
                <?= $this->Html->link('Editar', ['action' => 'edit', $post->id]) ?>
            </td>
        </tr>
    <?php endforeach; ?>
</table>

<?= $this->Html->link('Crear artículo', ['action' => 'add']) ?>