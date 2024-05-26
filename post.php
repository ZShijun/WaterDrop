<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<?php $this->need('header.php'); ?>

<div class="col-12 col-lg-8 col-xl-9" id="main" role="main">
    <article class="pjax post bg-white rounded shadow-sm p-3" itemscope itemtype="http://schema.org/BlogPosting">
        <h1 class="text-dark text-center"><?php $this->title() ?></h1>
        <div class="d-flex justify-content-center align-items-center pb-3 mb-4 gap-3 border-bottom small">
            <p class="m-0"><i class="iconfont icon-time"></i><span class="ms-1"><?php $this->date('Y-m-d') ?></span></p>
            <?php if (\Typecho\Plugin::exists('LZStat')) : ?>
                <p class="m-0"><i class="iconfont icon-view"></i><span class="ms-1"><?php $this->viewsNum() ?></span></small>
                <p class="m-0"><i class="set-likes iconfont icon-like-fill" data-cid="<?php $this->cid(); ?>"></i><span class="get-likes ms-1" data-cid="<?php $this->cid(); ?>"><?php $this->likesNum() ?></span></p>
            <?php endif; ?>
        </div>
        <div class="markdown-body post-content" itemprop="articleBody">
            <?php $this->content(); ?>
        </div>
        <p itemprop="keywords" class="tags mt-3"><i class="iconfont icon-tags-fill text-primary"></i><?php $this->tags(', ', true, ''); ?></p>
        <ul class="post-near mt-4 pt-2 list-unstyled d-flex justify-content-between align-items-center border-top">
            <li class="d-flex flex-column">
                <span class="text-secondary"><?php _e('« 上一篇'); ?></span><?php $this->thePrev('%s', _t('没有了')); ?>
            </li>
            <li class="d-flex flex-column align-items-end">
                <span class="text-secondary"><?php _e('下一篇 »'); ?></span><?php $this->theNext('%s', _t('没有了')); ?>
            </li>
        </ul>
    </article>

    <?php $this->need('comments.php'); ?>
</div><!-- end #main-->

<?php $this->need('sidebar.php'); ?>
<?php $this->need('footer.php'); ?>