<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>

<?php $this->need('header.php'); ?>
<section>
    <div class="container">
        <div class="text-center mt-3 py-5 bg-light shadow rounded">
            <h2 class="text-danger" style="font-size: 8rem; letter-spacing: 1rem">404</h2>
            <p class="lead"><?php _e('抱歉，没有找到你要的内容...'); ?></p>
            <div>
                <a href="javascript:history.back()" class="btn btn-outline-secondary me-5"><?php _e('返回上一页'); ?></a>
                <a class="btn btn-danger" href="/"><?php _e('返回首页'); ?></a>
            </div>
        </div>
    </div>
</section>
<?php $this->need('footer.php'); ?>