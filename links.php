<?php

/**
 * 友情链接页面模板
 *
 * @package custom
 *
 **/
if (!defined('__TYPECHO_ROOT_DIR__')) exit;
?>
<?php $this->need('header.php'); ?>

<div class="col-12 col-lg-8 col-xl-9" id="main" role="main">
    <article class="links p-3 bg-white shadow-sm rounded">
        <h4 class="text-dark pb-3 border-bottom"><?php $this->title() ?></h4>
        <?php $this->content(); ?>
    </article>
    <?php $this->need('comments.php'); ?>
</div><!-- end #main-->

<?php $this->need('sidebar.php'); ?>
<?php $this->need('footer.php'); ?>