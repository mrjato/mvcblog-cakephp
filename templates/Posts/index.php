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
                &nbsp; <!-- Aquí irán los botones de acción -->
            </td>
        </tr>
    <?php endforeach; ?>
</table>

<?= $this->Html->link('Crear artículo', ['action' => 'add']) ?>