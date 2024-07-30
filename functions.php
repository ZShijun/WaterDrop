<?php

use Typecho\Widget;
use Widget\Options;
use Typecho\Widget\Helper\Form\Element\Text;
use Typecho\Widget\Helper\Form\Element\Radio;
use Typecho\Widget\Helper\Form\Element\Checkbox;
use Typecho\Widget\Helper\Form\Element\Textarea;

if (!defined('__TYPECHO_ROOT_DIR__')) exit;

function themeConfig($form)
{
    $faviconUrl = new \Typecho\Widget\Helper\Form\Element\Text(
        'faviconUrl',
        null,
        null,
        _t('站点图标'),
        _t('请填写站点图标地址, 如果不填则默认获取站点根路径的favicon.ico')
    );
    $form->addInput($faviconUrl);

    $logoUrl = new Text(
        'logoUrl',
        null,
        null,
        _t('网站 LOGO'),
        _t('请填写网站 LOGO 图片地址, 如果不填则显示文本标题')
    );
    $form->addInput($logoUrl);

    $avatar = new Text(
        'avatar',
        null,
        '/usr/themes/WaterDrop/static/images/avatar.png',
        _t('作者头像'),
        _t('请填写一个图片 URL 地址, 以修改作者头像')
    );
    $form->addInput($avatar);

    $showEmail = new Radio(
        'showEmail',
        [
            0    => _t('隐藏'),
            1    => _t('显示')
        ],
        0,
        _t('显示邮箱')
    );
    $form->addInput($showEmail);

    $github = new Text(
        'github',
        null,
        null,
        _t('Github 主页'),
        _t('请填写你的 Github 主页地址')
    );
    $form->addInput($github);

    $weibo = new Text(
        'weibo',
        null,
        null,
        _t('微博 主页'),
        _t('请填写你的 微博 主页地址')
    );
    $form->addInput($weibo);

    $bilibili = new Text(
        'bilibili',
        null,
        null,
        _t('哔哩哔哩 主页'),
        _t('请填写你的 哔哩哔哩 主页地址')
    );
    $form->addInput($bilibili);

    $youtube = new Text(
        'youtube',
        null,
        null,
        _t('YouTube 主页'),
        _t('请填写你的 YouTube 主页地址')
    );
    $form->addInput($youtube);

    $notice = new Text(
        'notice',
        null,
        null,
        _t('公告设置'),
        _t('显示在首页的公告文本，为空则不显示公告')
    );
    $form->addInput($notice);

    $banners = new Textarea(
        'banners',
        null,
        '[]',
        _t('Banner 设置'),
        _t('格式：[{"img":"图片地址1", "link":"跳转链接1"},{"img":"图片地址2", "link":"跳转链接2"}]，其中，img为必填，link为选填，link为空则不跳转')
    );
    $form->addInput($banners);

    $defaultCovers = new Textarea(
        'defaultCovers',
        null,
        '[
    "/usr/themes/WaterDrop/static/images/cover1.png",
    "/usr/themes/WaterDrop/static/images/cover2.png",
    "/usr/themes/WaterDrop/static/images/cover3.png",
    "/usr/themes/WaterDrop/static/images/cover4.png"
]',
        _t('文章默认封面'),
        _t('当文章没有设置封面，且内容中也没有图片时，显示的默认封面，不填则使用主题内置的封面，建议使用网络稳定的图片地址')
    );
    $form->addInput($defaultCovers);

    $sidebarBlockValue = [
        'ShowRecentComments' => _t('显示最新评论'),
        'ShowCategory'       => _t('显示文章分类'),
        'ShowTagCloud'        => _t('显示标签云')
    ];

    if (\Typecho\Plugin::exists('LZStat')) {
        $sidebarBlockValue['ShowRank'] = _t('显示文章榜单');
    }

    $sidebarBlock = new Checkbox(
        'sidebarBlock',
        $sidebarBlockValue,
        ['ShowRecentComments', 'ShowCategory', 'ShowTagCloud'],
        _t('侧边栏显示')
    );

    $form->addInput($sidebarBlock->multiMode());

    $beian = new Text(
        'beian',
        null,
        null,
        _t('备案号'),
        _t('请填入形如"粤ICP备xxx号-1"的备案号')
    );
    $form->addInput($beian);

    $googleAd = new Textarea(
        'googleAd',
        null,
        null,
        _t('谷歌广告'),
        _t('主题预设了三个Google AdSense广告位，不填则不显示广告，格式：{"publisher":"pub-xxx", "sidebar":"xxx","post1":"xxx", "post2":"xxx"}，注意：由于SPA与Google Ads的兼容性存在问题，所以当使用Google Ads时，会禁用打开文章详情页的PJAX功能，需要牺牲一定的性能，请自行权衡')
    );
    $form->addInput($googleAd);

    $footerJs = new Textarea(
        'footerJs',
        null,
        null,
        _t('底部JS'),
        _t('请填入包括script标签JS代码，主要是统计、广告等相关的代码')
    );
    $form->addInput($footerJs);
}

function getGravatar($email, $s = 96, $d = 'mp', $r = 'g')
{
    preg_match_all('/((\d)*)@qq.com/', $email, $vai);
    if (empty($vai['1']['0'])) {
        $url = 'https://cdn.sep.cc/avatar/';
        $url .= md5(strtolower(trim($email)));
        $url .= "?s=$s&d=$d&r=$r";
    } else {
        $url = 'https://q2.qlogo.cn/headimg_dl?dst_uin=' . $vai['1']['0'] . '&spec=100';
    }
    return $url;
}

function getDefaultGravatar()
{
    $options = Widget::widget(Options::class);
    return '/usr/themes/' . $options->theme . '/static/images/avatar.png';
}

/**
 * 获取文章封面
 */
function getPostCover($article)
{
    if ($article->fields->cover) {
        // 优先使用主动设置的文章封面
        return $article->fields->cover;
    }

    preg_match_all("/\<img.*?src\=(\'|\")(.*?)(\'|\")[^>]*>/i", $article->content, $matches);
    $imgCount = count($matches[0]);
    if ($imgCount >= 1) {
        // 如果没有设置封面，且文章内容中包含图片，使用第一张图片作为封面
        return $matches[2][0];
    }

    // 如果没有设置封面，且文章内容中不包含图片，使用默认封面
    return getDefaultCover();
}

/**
 * 获取默认文章封面
 * 
 * 如果主题配置中设置了默认文章封面，则随机使用一个配置中的默认文章封面；
 * 如果没有设置默认文章封面，则使用主题目录下的post-default-cover.png作为默认文章封面。
 * @return string 图片路径
 */
function getDefaultCover()
{
    $options = Widget::widget(Options::class);
    if ($options->defaultCovers) {
        $postCovers = json_decode($options->defaultCovers);
        if (!empty($postCovers)) {
            return $postCovers[array_rand($postCovers)];
        }
    }

    return '/usr/themes/' . $options->theme . '/static/images/post-default-cover.png';
}

function getGoogleAd()
{
    static $settings = [];
    if (!empty($settings)) {
        return $settings;
    }

    $options = Widget::widget(Options::class);
    if (empty($options->googleAd)) {
        $settings = [
            'showAd' => false
        ];
        return $settings;
    }

    $googleAd = json_decode($options->googleAd, true);
    if (!empty($googleAd) && !empty($googleAd['publisher']) && strpos($googleAd['publisher'], 'pub-') === 0) {
        $settings = [
            'showAd' => true,
            'publisher' => $googleAd['publisher'],
            'sidebar' => $googleAd['sidebar'],
            'post1' => $googleAd['post1'],
            'post2' => $googleAd['post2']
        ];
    } else {
        $settings = [
            'showAd' => false
        ];
    }
    return $settings;
}

function themeFields($layout)
{
    if (preg_match("/write-post.php/", $_SERVER['REQUEST_URI'])) {
        $icon = new \Typecho\Widget\Helper\Form\Element\Text(
            'cover',
            null,
            null,
            _t('封面'),
            _t('封面图片地址')
        );
        $layout->addItem($icon);
    }
}
