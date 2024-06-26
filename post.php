<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<?php $this->need('header.php'); ?>

<div class="col-12 col-lg-8 col-xl-9" id="main" role="main">
    <?php $googleAd = getGoogleAd(); ?>
    <article class="<?php if (!$googleAd['showAd']) : ?>pjax <?php endif; ?>post bg-white rounded shadow-sm p-3" itemscope itemtype="http://schema.org/BlogPosting">
        <h1 class="text-dark text-center"><?php $this->title() ?></h1>
        <div class="d-flex justify-content-center align-items-center pb-3 mb-4 gap-3 border-bottom small">
            <p class="m-0"><i class="iconfont icon-time"></i><span class="ms-1"><?php $this->date('Y-m-d') ?></span></p>
            <?php if (\Typecho\Plugin::exists('LZStat')) : ?>
                <p class="m-0"><i class="iconfont icon-view"></i><span class="ms-1"><?php $this->viewsNum() ?></span></small>
                <p class="m-0"><i class="set-likes iconfont icon-like-fill" data-cid="<?php $this->cid(); ?>"></i><span class="get-likes ms-1" data-cid="<?php $this->cid(); ?>"><?php $this->likesNum() ?></span></p>
            <?php endif; ?>
        </div>

        <?php if ($googleAd['showAd'] && !empty($googleAd['post1'])) : ?>
            <ins class="adsbygoogle" style="display:block;text-align:center;overflow:hidden;" data-ad-client="ca-<?= $googleAd['publisher']; ?>" data-ad-slot="<?= $googleAd['post1']; ?>" data-ad-format="auto" data-full-width-responsive="true"></ins>
            <script>
                (adsbygoogle = window.adsbygoogle || []).push({});
            </script>
        <?php endif; ?>
        <div class="markdown-body post-content" itemprop="articleBody">
            <?php $this->content(); ?>
        </div>
        <?php if ($googleAd['showAd'] && !empty($googleAd['post2'])) : ?>
            <ins class="adsbygoogle" style="display:block;text-align:center;overflow:hidden;" data-ad-client="ca-<?= $googleAd['publisher']; ?>" data-ad-slot="<?= $googleAd['post2']; ?>" data-ad-format="auto" data-full-width-responsive="true"></ins>
            <script>
                (adsbygoogle = window.adsbygoogle || []).push({});
            </script>
        <?php endif; ?>
        <div class="post-copyright my-3 p-3 text-bg-light small border rounded-1">
            <p class="mb-1">
                <strong><?php _e("本文作者："); ?></strong>
                <a class="fw-bold" href="<?php $this->options->siteUrl(); ?>" title="<?php $this->options->title() ?>" target="_blank"><?php $this->author(); ?></a>
            </p>
            <p class="mb-1">
                <strong><?php _e("原文链接："); ?></strong>
                <a href="<?php $this->permalink() ?>" title="<?php $this->title() ?>" target="_blank"><?php $this->title() ?></a>
            </p>
            <p class="mb-1">
                <strong><?php _e("版权声明："); ?></strong>
                <span>
                    <?php _e("本站所有文章除特别声明外，均采用"); ?>
                    <a target="_blank" rel="noopener" href="https://creativecommons.org/licenses/by-nc-sa/4.0/deed.zh">BY-NC-SA</a>
                    <?php _e("许可协议。转载请注明出处！"); ?>
                </span>
            </p>
            <p class="mb-0">
                <strong><?php _e("免责声明："); ?></strong>
                <span>
                    <?php _e("文中如涉及第三方资源，均来自互联网，仅供学习研究，禁止商业使用，如有侵权，联系我们24小时内删除！"); ?>
                </span>
            </p>
        </div>
        <p itemprop="keywords" class="pjax tags mt-3"><i class="iconfont icon-tags-fill text-primary"></i><?php $this->tags(' ', true, ''); ?></p>
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