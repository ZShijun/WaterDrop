<?php Typecho\Widget::widget(Widget\Stat::class)->to($stat); ?>
<ul class="stat list-unstyled row mt-2 m-0 py-1 text-center bg-white rounded w-100">
    <li class="col d-flex flex-column">
        <span class="fw-bold"><?php $stat->publishedPostsNum() ?></span>
        <small><?php _e('文章'); ?></small>
    </li>
    <li class="col d-flex flex-column">
        <span class="fw-bold"><?php $stat->categoriesNum() ?></span>
        <small><?php _e('分类'); ?></small>
    </li>
    <li class="col d-flex flex-column">
        <span class="fw-bold"><?php $stat->publishedCommentsNum() ?></span>
        <small><?php _e('评论'); ?></small>
    </li>
</ul>