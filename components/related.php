<?php if ($this->options->recommendation && $this->options->recommendation > 0): ?>
    <?php $this->related($this->options->recommendation, null)->to($relatedPosts); ?>
    <?php if ($relatedPosts->have()): ?>
        <h2><?php _e("相关推荐"); ?></h2>
        <ol class="list-group list-group-numbered ps-0">
            <?php while ($relatedPosts->next()): ?>
                <li class="list-group-item d-flex justify-content-between align-items-center border-0 m-0 py-1 px-2">
                    <a href="<?php $relatedPosts->permalink() ?>" class="flex-grow-1 ps-2" title="<?php $relatedPosts->title() ?>">
                        <?php $relatedPosts->title() ?>
                    </a>
                    <small class="text-secondary">
                        <?php $relatedPosts->date('Y-m-d') ?>
                    </small>
                </li>
            <?php endwhile; ?>
        </ol>
    <?php endif; ?>
<?php endif; ?>