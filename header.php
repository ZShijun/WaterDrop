<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<!DOCTYPE HTML>
<html>

<head>
    <meta charset="<?php $this->options->charset(); ?>">
    <meta name="renderer" content="webkit">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <title><?php $this->archiveTitle([
                'category' => _t('分类 %s 下的文章'),
                'search'   => _t('包含关键字 %s 的文章'),
                'tag'      => _t('标签 %s 下的文章'),
                'author'   => _t('%s 发布的文章')
            ], '', ' - '); ?><?php $this->options->title(); ?></title>

    <?php if ($this->options->faviconUrl) : ?>
        <link rel="icon" href="<?php $this->options->faviconUrl(); ?>" />
    <?php endif; ?>
    <!-- 使用url函数转换相关路径 -->
    <link rel="stylesheet" href="<?php $this->options->themeUrl('static/bootstrap/bootstrap.min.css'); ?>">
    <link rel="stylesheet" href="<?php $this->options->themeUrl('static/iconfont/iconfont.css'); ?>" rel="preload">
    <link rel="stylesheet" href="<?php $this->options->themeUrl('static/css/github-markdown-light.css'); ?>">
    <link rel="stylesheet" href="<?php $this->options->themeUrl('static/css/common.css'); ?>">

    <script src="<?php $this->options->themeUrl('static/bootstrap/bootstrap.bundle.min.js'); ?>"></script>

    <!-- 通过自有函数输出HTML头部信息 -->
    <?php $this->header(); ?>
</head>

<body class="bg-light d-flex flex-column justify-content-between min-vh-100" style="min-width: 360px;">
    <div id="loader">
        <?php
        $text = _t('数据加载中');

        for ($i = 0; $i < mb_strlen($text, 'UTF-8'); $i++) : ?>
            <span><?= mb_substr($text, $i, 1, 'UTF-8'); ?></span>
        <?php endfor; ?>
        <span>...</span>
    </div>
    <header class="pjax navbar navbar-expand-lg shadow-sm bg-white p-0 sticky-top">
        <nav class="container" aria-label="Main navigation">
            <button class="navbar-toggler border-0 shadow-none" type="button" data-bs-toggle="offcanvas" data-bs-target="#navbarOffcanvas" aria-controls="navbarOffcanvas" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon fs-6"></span>
            </button>
            <a class="no-pjax navbar-brand d-none d-sm-block" href="<?php $this->options->siteUrl(); ?>" title="<?php $this->options->title() ?>">
                <?php if ($this->options->logoUrl) : ?>
                    <img style="height: 2rem;" src="<?php $this->options->logoUrl() ?>" alt="<?php $this->options->title() ?>" />
                <?php else : ?>
                    <?php $this->options->title() ?>
                <?php endif; ?>
            </a>
            <div class="offcanvas offcanvas-start w-25 bg-light" data-bs-scroll="true" tabindex="-1" id="navbarOffcanvas" aria-labelledby="offcanvasNavbarLabel" style="min-width: 240px;">
                <div class="offcanvas-header flex-column justify-content-center mt-4">
                    <a href="<?php $this->options->siteUrl(); ?>" class="no-pjax offcanvas-title avatar" id="offcanvasNavbarLabel">
                        <img height="80" class="shadow rounded-circle border border-white" src="<?php $this->options->avatar() ?>" onerror="this.onerror=null; this.src='<?= getDefaultGravatar() ?>'" alt="<?php $this->options->title() ?>" />
                    </a>
                    <h5 class="text-muted mt-2"><?php $this->author(); ?></h5>
                    <?php $this->need('components/stat.php'); ?>
                    <?php $this->need('components/social.php'); ?>
                </div>
                <div class="offcanvas-body pt-0">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <?php \Widget\Contents\Page\Rows::alloc()->to($pages); ?>
                        <?php while ($pages->next()) : ?>
                            <li class="nav-item">
                                <?php if ($this->is('page', $pages->slug)) : ?>
                                    <a class="nav-link active" aria-current="page" href="<?php $pages->permalink(); ?>"><?php $pages->title(); ?></a>
                                <?php else : ?>
                                    <a class="nav-link" href="<?php $pages->permalink(); ?>"><?php $pages->title(); ?></a>
                                <?php endif; ?>
                            </li>
                        <?php endwhile; ?>
                    </ul>
                </div>
            </div>
            <div class="d-flex align-items-center py-2">
                <form method="post" class="position-relative me-2" action="<?php $this->options->siteUrl(); ?>" role="search">
                    <input type="text" class="form-control" name="s" placeholder="<?php _e('请输入关键字'); ?>" style="font-size: 0.9rem;" />
                    <button type="submit" class="btn border-0 position-absolute top-0 end-0"><i class="iconfont icon-search" style="font-size: 0.9rem;"></i></button>
                </form>
                <a href="/admin/login.php" class="no-pjax link-dark link-underline-opacity-0" title="<?php _e('登录'); ?>"><i class="iconfont icon-user fs-4"></i></a>
            </div>
        </nav>
    </header>
    <div id="body" class="flex-grow-1" style="display: none;">
        <div class="container">
            <div class="row mt-4">