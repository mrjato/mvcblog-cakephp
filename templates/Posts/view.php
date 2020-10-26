<div>
    <h1>Artículo: <?= $post->title ?></h1>
    <em>por <?= $post->author ?></em>
    <p>
        <?= $post->content ?>
    </p>
</div>

<div>
    <div>
        <h2>Comentarios</h2>
        <?php if (empty($post->comments)) : ?>
            <p>Ningún comentario</p>
        <?php else : ?>
            <?php foreach ($post->comments as $comment) : ?>
                <hr />
                <?= $comment->author ?> ha comentado...
                <p>
                    <?= $comment->content ?>
                </p>
            <?php endforeach; ?>
        <?php endif; ?>
    </div>

    <?php if ($user) : ?>
    <div>
        <h3>Escribe un comentario</h3>
        <?php
        echo $this->Form->create(null, [
            'url' => [
                'controller' => 'Comments',
                'action' => 'add'
            ]
        ]);
        echo $this->Form->control('post', ['type' => 'hidden', 'value' => $post->id]);
        echo $this->Form->control('content', ['label' => 'Comentario', 'rows' => '3']);
        echo $this->Form->button('Comentar');
        echo $this->Form->end();
        ?>
    </div>
    <?php endif; ?>
</div>