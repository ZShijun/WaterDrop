<?php

/**
 * 一款简洁黑白灰风格的博客主题，前往 <a href="https://ilaozhu.com">老朱独立开发</a> 查看效果。
 *
 * @package WaterDrop
 * @author laozhu
 * @version 1.2.4
 * @link https://ilaozhu.com
 */

if (!defined('__TYPECHO_ROOT_DIR__')) exit;
$this->need('header.php');
?>
<div class="col-12 col-lg-8 col-xl-9" id="main" role="main">
    <?php if ($this->is('index') and $this->options->notice) : ?>
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
            <i class="iconfont icon-gonggao"></i><span class="ms-2"><?php $this->options->notice() ?></span>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php endif; ?>
    <?php $this->need('components/banner.php'); ?>
    <section class="bg-white rounded shadow-sm overflow-hidden">
        <?php if (!($this->is('index')) and !($this->is('post'))) : ?>
            <div class="py-3 mx-3 border-bottom"><?php $this->archiveTitle([
                                                        'category' => _t('分类 %s 下的文章'),
                                                        'search'   => _t('包含关键字 %s 的文章'),
                                                        'tag'      => _t('标签 %s 下的文章'),
                                                        'author'   => _t('%s 发布的文章')
                                                    ], '', ''); ?></div>
        <?php endif; ?>
        <div class="post-list list-group list-group-flush">
            <?php if ($this->have()) : ?>
                <?php $googleAd = getGoogleAd(); ?>
                <?php while ($this->next()) : ?>
                    <article class="<?php if (!$googleAd['showAd']) : ?>pjax <?php endif; ?>post list-group-item p-4" itemscope itemtype="http://schema.org/BlogPosting">
                        <div class="position-relative">
                            <a class="position-absolute t-0 start-0 w-100 h-100 rounded overflow-hidden" href="<?php $this->permalink() ?>" title="<?php $this->title() ?>">
                                <img class="object-fit-cover w-100 h-100" src="<?= getPostCover($this); ?>" alt="<?php $this->title() ?>" onerror="this.onerror=null; this.src='<?= getDefaultCover(); ?>'">
                            </a>
                            <div class="categories position-absolute t-0 my-1 mx-2">
                                <?php $this->category(''); ?>
                            </div>
                        </div>
                        <div class="d-flex flex-column align-items-start">
                            <h3 class="post-title text-dark">
                                <a title="<?php $this->title() ?>" href="<?php $this->permalink() ?>"><?php $this->title() ?></a>
                            </h3>
                            <div class="post-content text-secondary lh-lg small" itemprop="articleBody">
                                <?php $this->excerpt(200, '...'); ?>
                            </div>
                            <div class="align-self-stretch text-secondary mt-3 d-flex justify-content-between align-items-center">
                                <small><?php $this->date('Y-m-d') ?></small>
                                <div class="d-flex align-items-center gap-2">
                                    <?php if (\Typecho\Plugin::exists('LZStat')) : ?>
                                        <small><i class="iconfont icon-view"></i><span class="ms-1"><?php $this->viewsNum() ?></span></small>
                                        <small><i class="set-likes iconfont icon-like-fill" data-cid="<?php $this->cid(); ?>"></i><span class="get-likes ms-1" data-cid="<?php $this->cid(); ?>"><?php $this->likesNum() ?></span></small>
                                    <?php endif; ?>
                                    <small><i class="iconfont icon-comments"></i><a class="no-pjax ms-1 link-secondary link-offset-2 link-underline-opacity-0 link-underline-opacity-75-hover" href="<?php $this->permalink() ?>#comments"><?php $this->commentsNum() ?></a></small>
                                </div>
                            </div>
                        </div>
                    </article>
                <?php endwhile; ?>
            <?php else : ?>
                <article class="post bg-white rounded py-3">
                    <h2 class="post-title fs-4 text-center" style="grid-column: 1 / 3;"><?php _e('没有找到内容'); ?></h2>
                </article>
            <?php endif; ?>
        </div>
    </section>
    <nav aria-label="Page navigation" class="pjax">
        <?php $this->pageNav('&laquo;', '&raquo;'); ?>
    </nav>
</div><!-- end #main-->

<?php $this->need('sidebar.php'); ?>
<?php $this->need('footer.php'); ?>