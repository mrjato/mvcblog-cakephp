<div>
    <h1><?= __('Artículo: {0}', $post->title) ?></h1>
    <em><?= __('por {0}', $post->author) ?></em>
    <p>
        <?= $post->content ?>
    </p>
</div>

<div>
    <div>
        <h2><?= __('Comentarios') ?></h2>
        <?php if (empty($post->comments)) : ?>
            <p><?= __('Ningún comentario') ?></p>
        <?php else : ?>
            <?php foreach ($post->comments as $comment) : ?>
                <hr />
                <?= __('{0} ha comentado...', $comment->author) ?>
                <p>
                    <?= $comment->content ?>
                </p>
            <?php endforeach; ?>
        <?php endif; ?>
    </div>

    <?php if ($user) : ?>
    <div>
        <h3><?= __('Escribe un comentario') ?></h3>
        <?php
        echo $this->Form->create(null, [
            'url' => [
                'controller' => 'Comments',
                'action' => 'add'
            ]
        ]);
        echo $this->Form->control('post', ['type' => 'hidden', 'value' => $post->id]);
        echo $this->Form->control('content', ['label' => __('Comentario'), 'rows' => '3']);
        echo $this->Form->button(__('Comentar'));
        echo $this->Form->end();
        ?>
    </div>
    <?php endif; ?>
</div>