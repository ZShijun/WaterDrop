<!DOCTYPE html>
<html>

<head>
    <meta charset="<?php $this->options->charset(); ?>">
    <meta name="renderer" content="webkit">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <title><?php $this->options->title(); ?></title>

    <?php if ($this->options->faviconUrl) : ?>
        <link rel="icon" href="<?php $this->options->faviconUrl(); ?>" />
    <?php endif; ?>
    <link rel="stylesheet" href="<?php $this->options->themeUrl('static/bootstrap/bootstrap.min.css'); ?>">
</head>

<body class="px-3 w-100 h-100">
    <?php $target = urldecode($_GET['target']); ?>
    <div class="card mx-auto" style="max-width: 500px; margin-top: 100px">
        <div class="card-body">
            <h2 class="card-title"><?php _e("离开" . $this->options->title); ?></h2>
            <p class="card-text mt-3"><?php _e("您即将离开" . $this->options->title . "，前往" . $target . "，请注意您的个人隐私和财产安全。") ?></p>
            <div class="text-end pt-3 border-top">
                <a href="<?php echo $target; ?>" class="btn btn-dark" rel="noopener noreferrer"><?php _e("继续访问"); ?></a>
            </div>
        </div>
    </div>
</body>

</html>