<?php Typecho\Widget::widget(Widget\Stat::class)->to($stat); ?>
<ul class="stat list-unstyled row mt-2 m-0 py-1 text-center bg-white rounded w-100 fw-bolder text-secondary" style="font-size: 0.9rem;">
    <li class="col d-flex flex-column">
        <span><?php $stat->publishedPostsNum() ?></span>
        <span><?php _e('文章'); ?></span>
    </li>
    <li class="col d-flex flex-column">
        <span><?php $stat->categoriesNum() ?></span>
        <span><?php _e('分类'); ?></span>
    </li>
    <li class="col d-flex flex-column">
        <span><?php $stat->publishedCommentsNum() ?></span>
        <span><?php _e('评论'); ?></span>
    </li>
</ul>