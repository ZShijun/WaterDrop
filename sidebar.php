<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<div class="d-none d-lg-block col-lg-4 col-xl-3" id="secondary" role="complementary">
    <aside style="position: sticky;top:5rem;">
        <section class="d-flex flex-column justify-content-center align-items-center py-3 bg-white shadow-sm rounded">
            <a href="<?php $this->options->siteUrl(); ?>" class="mt-3 avatar">
                <img height="80" class="shadow rounded-circle border border-white" src="<?php $this->options->avatar() ?>" onerror="this.onerror=null; this.src='<?= getDefaultGravatar() ?>'" alt="<?php $this->options->title() ?>" />
            </a>
            <h5 class="text-muted mt-2"><?php $this->author(); ?></h5>
            <?php $this->need('components/stat.php'); ?>
            <?php $this->need('components/social.php'); ?>
        </section>
        <?php $this->need('components/rank.php'); ?>
        <?php if (!empty($this->options->sidebarBlock) && in_array('ShowRecentComments', $this->options->sidebarBlock)) : ?>
            <section class="bg-white rounded shadow-sm mt-3">
                <h3 class="px-3 py-2 m-0 fs-6 text-bg-light rounded-top"> <i class="iconfont icon-comments me-2"></i><?php _e('最新评论'); ?></h3>
                <div class="list-group">
                    <?php \Widget\Comments\Recent::alloc()->to($comments); ?>
                    <?php while ($comments->next()) : ?>
                        <a href="<?php $comments->permalink(); ?>" class="list-group-item border-0 list-group-item-action d-flex" title="<?php $comments->title() ?>">
                            <img class="rounded-circle border border-white shadow-sm" src="<?= getGravatar($comments->mail); ?>" onerror="this.onerror=null; this.src='<?= getDefaultGravatar() ?>'" style="width: 48px;height:48px;" alt="<?php $comments->author(false); ?>" />
                            <div class="ms-3 overflow-hidden flex-fill">
                                <div class="d-flex justify-content-between align-items-end">
                                    <h2 class="mb-0 fs-6"><?php $comments->author(false); ?></h2>
                                    <small class="text-body-secondary"><?php $comments->date('Y-m-d') ?></small>
                                </div>
                                <small class="d-block text-body-secondary text-truncate pt-1"><?php $comments->excerpt(20, '...'); ?></small>
                            </div>
                        </a>
                    <?php endwhile; ?>
                </div>
            </section>
        <?php endif; ?>
        <?php if (!empty($this->options->sidebarBlock) && in_array('ShowCategory', $this->options->sidebarBlock)) : ?>
            <section class="bg-white rounded shadow-sm mt-3">
                <h3 class="px-3 py-2 m-0 fs-6 text-bg-light rounded-top"> <i class="iconfont icon-category me-2"></i><?php _e('文章分类'); ?></h3>
                <div class="pjax list-group list-group-flush rounded-bottom">
                    <?php \Widget\Metas\Category\Rows::alloc()
                        ->parse('<a href="{permalink}" class="list-group-item list-group-item-action d-flex justify-content-between align-items-center">{name} <span class="badge text-bg-light rounded-pill">{count}</span></a>');  ?>
                </div>
            </section>
        <?php endif; ?>
        <?php $this->need('components/tagcloud.php'); ?>
    </aside>
</div><!-- end #sidebar -->