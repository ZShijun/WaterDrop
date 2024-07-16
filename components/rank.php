<?php if (!empty($this->options->sidebarBlock) && in_array('ShowRank', $this->options->sidebarBlock)) : ?>
    <?php if (\Typecho\Plugin::exists('LZStat')) : ?>

        <section class="rank bg-white rounded shadow-sm mt-3">
            <?php $rank = \TypechoPlugin\LZStat\Plugin::getRank(); ?>
            <h3 class="px-3 py-2 m-0 fs-6 rounded-top" style="background-color:#e9ecef;"> <i class="iconfont icon-rank text-danger me-2"></i><?= $rank["title"]; ?></h3>
            <?php if (empty($rank["posts"])) : ?>
                <div class="p-3 text-center text-body-secondary">暂无数据</div>
            <?php else : ?>
                <ul class="list-group rounded-bottom p-1">
                    <?php
                    $posts = $rank["posts"];
                    $googleAd = getGoogleAd();
                    ?>
                    <?php while ($posts->next()) : ?>
                        <li class="list-group-item border-0">
                            <a href="<?php $posts->permalink() ?>" class="<?php if (!$googleAd['showAd']) : ?>pjax <?php endif; ?>d-inline-block mw-100 link-dark text-decoration-none text-truncate" title="<?php $posts->title() ?>">
                                <?php $posts->title() ?>
                            </a>
                            <div class="text-secondary small d-flex justify-content-between align-items-center">
                                <small style="margin-left: 0.75rem;"><?php $posts->date('Y-m-d') ?></small>
                                <div class="d-flex align-items-center gap-2">
                                    <?php if (\Typecho\Plugin::exists('LZStat')) : ?>
                                        <small><i class="iconfont icon-view" style="font-size: 1em;"></i><span class="ms-1"><?php $posts->viewsNum(); ?></span></small>
                                        <small><i class="iconfont icon-like-fill" style="font-size: 1em;"></i><span class="get-likes ms-1" data-cid="<?php $posts->cid(); ?>"><?php $posts->likesNum(); ?></span></small>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </li>
                    <?php endwhile; ?>
                </ul>
            <?php endif; ?>
        </section>
    <?php endif; ?>
<?php endif; ?>