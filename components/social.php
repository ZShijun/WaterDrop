<div class="social d-flex gap-3 mt-2">
    <?php if ($this->options->showEmail) : ?>
        <a href="mailto:<?php $this->author->mail(); ?>" class="link-primary text-decoration-none" target="_blank" title="mailto:<?php $this->author->mail(); ?>">
            <i class="iconfont icon-email-fill fs-5"></i>
        </a>
    <?php endif; ?>
    <?php if ($this->options->github) : ?>
        <a href="<?php $this->options->github(); ?>" class="link-dark text-decoration-none" target="_blank" title="<?php $this->options->github(); ?>">
            <i class="iconfont icon-GitHub fs-5"></i>
        </a>
    <?php endif; ?>
    <?php if ($this->options->weibo) : ?>
        <a href="<?php $this->options->weibo(); ?>" class="link-danger text-decoration-none" target="_blank" title="<?php $this->options->weibo(); ?>">
            <i class="iconfont icon-weibo-circle-fill fs-5"></i>
        </a>
    <?php endif; ?>
    <?php if ($this->options->bilibili) : ?>
        <a href="<?php $this->options->bilibili(); ?>" class="link-info text-decoration-none" target="_blank" title="<?php $this->options->bilibili(); ?>">
            <i class="iconfont icon-bilibili fs-5"></i>
        </a>
    <?php endif; ?>
    <?php if ($this->options->youtube) : ?>
        <a href="<?php $this->options->youtube(); ?>" class="link-danger text-decoration-none" target="_blank" title="<?php $this->options->youtube(); ?>">
            <i class="iconfont icon-youtube fs-5"></i>
        </a>
    <?php endif; ?>
</div>