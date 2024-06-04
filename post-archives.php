<?php

/**
 * 文章归档页面模板
 *
 * @package custom
 */

use Typecho\Db;
use Widget\Base\Contents;

if (!defined('__TYPECHO_ROOT_DIR__')) exit;

class PostArchives extends Contents
{
    private $total = 0; // 所有文章个数

    public function getTotal()
    {
        return $this->total;
    }

    /**
     * 执行函数
     *
     * @throws Db\Exception
     */
    public function execute()
    {
        $this->parameter->setDefault(['pageIndex' => 1, 'pageSize' => 25]);

        $select = $this->select(
            'table.contents.cid',
            'table.contents.title',
            'table.contents.slug',
            'table.contents.created',
            'table.contents.type',
            'table.contents.status',
        )
            ->where('table.contents.status = ?', 'publish')
            ->where('table.contents.created < ?', $this->options->time)
            ->where('table.contents.type = ?', 'post');

        // 记录总数
        $this->total = $this->size(clone $select);
        $this->db->fetchAll($select
            ->order('table.contents.created', Typecho\Db::SORT_DESC)
            ->page($this->parameter->pageIndex, $this->parameter->pageSize), [$this, 'push']);
    }
}
?>
<?php $this->need('header.php'); ?>

<div class="col-12 col-lg-8 col-xl-9" id="main" role="main">
    <?php
    $page = (int) $this->request->get('page', 1);
    $pageSize = 25;
    $archives = PostArchives::alloc(['pageIndex' => $page, 'pageSize' => $pageSize]);
    $total = $archives->getTotal();
    ?>
    <section class="pjax bg-white p-3 rounded shadow-sm">
        <div class="pb-3 border-bottom">共有 <?php _e($total); ?> 篇文章</div>
        <ul class="list-unstyled">
            <?php $groupYear = ''; ?>
            <?php while ($archives->next()) : ?>
                <?php if ($groupYear !== date('Y', $archives->created)) : ?>
                    <?php $groupYear = date('Y', $archives->created); ?>
                    <li>
                        <h3 class="mt-3"><?php _e($groupYear); ?></h3>
                    </li>
                <?php endif; ?>
                <li class="border-start ms-3 lh-lg">
                    <small class="text-muted ms-3">
                        <?php $archives->date('Y-m-d'); ?>
                    </small>
                    <a class="ms-2 link-dark link-offset-2 link-underline-opacity-0 link-underline-opacity-100-hover" href="<?php $archives->permalink(); ?>"><?php $archives->title(); ?></a>
                </li>
            <?php endwhile; ?>
        </ul>
        <?php
        if ($total > $pageSize) {
            //分页
            $query = $this->request->makeUriByRequest('page={page}');
            $pageNav = new Typecho\Widget\Helper\PageNavigator\Box($total, $page, $pageSize, $query);
            echo '<ul class="page-navigator">';
            $pageNav->render('&laquo;', '&raquo;', 3, '...', array(
                'itemTag'       =>  'li',
                'textTag'       =>  'span',
                'currentClass'  =>  'current',
                'prevClass'     =>  'prev',
                'nextClass'     =>  'next',
            ));
            echo '</ul>';
        }
        ?>
    </section>
</div><!-- end #main-->

<?php $this->need('sidebar.php'); ?>
<?php $this->need('footer.php'); ?>