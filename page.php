<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<?php $this->need('header.php'); ?>

<div class="col-12 col-lg-8 col-xl-9" id="main" role="main">
    <article class="post p-3 bg-white shadow-sm rounded" itemscope itemtype="http://schema.org/BlogPosting">
        <h4 class="text-dark pb-3 mb-3 border-bottom d-flex justify-content-between">
            <span>
                <?php $this->title() ?>
            </span>
            <div class="d-flex justify-content-center align-items-center gap-3 fs-6">
                <?php if (\Typecho\Plugin::exists('LZStat')) : ?>
                    <p class="m-0 small"><i class="iconfont icon-view"></i><span class="ms-1"><?php $this->viewsNum() ?></span></p>
                    <p class="m-0 small"><i class="set-likes iconfont icon-like-fill" data-cid="<?php $this->cid(); ?>"></i><span class="get-likes ms-1" data-cid="<?php $this->cid(); ?>"><?php $this->likesNum() ?></span></p>
                <?php endif; ?>
                <p class="m-0 small"><i class="iconfont icon-time"></i><span class="ms-1"><?php $this->date('Y-m-d') ?></span></p>
            </div>
        </h4>
        <div class="markdown-body post-content" itemprop="articleBody">
            <?php $this->content(); ?>
        </div>
    </article>
    <?php $this->need('comments.php'); ?>
</div><!-- end #main-->

<?php $this->need('sidebar.php'); ?>
<?php $this->need('footer.php'); ?>