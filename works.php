<?php

/**
 * 作品列表页面模板
 *
 * @package custom
 *
 **/
if (!defined('__TYPECHO_ROOT_DIR__')) exit;
?>
<?php $this->need('header.php'); ?>

<div class="col-12 col-lg-8 col-xl-9" id="main" role="main">
    <article class="works p-3 bg-white shadow-sm rounded">
        <h4 class="text-dark pb-3 border-bottom"><?php $this->title() ?></h4>
        <div class="row row-cols-1 row-cols-sm-2 row-cols-xl-3">
            <?php $this->content(); ?>
        </div>
    </article>
    <script>
        (function() {
            let works = document.querySelector(".works ul");
            if (works) {
                let lis = works.querySelectorAll("li");
                let str = '';
                for (let i = 0; i <= lis.length - 4; i += 4) {
                    let title = lis[i].innerText;
                    let url = lis[i + 1].innerText;
                    let img = lis[i + 2].innerText;
                    let desc = lis[i + 3].innerHTML;
                    str += `<div class="col p-2"><a href="${url}" target="_blank" class="card">
                        <div class="card-body">
                            <img src="${img}" class="card-img" alt="${title}">
                            <p class="card-text text-bg-dark p-3">${desc}</p>
                        </div>
                        <h5 class="card-title text-truncate m-0 p-3" title="${title}">${title}</h5>
                    </a></div>`;
                }
                works.parentNode.innerHTML = str;
            }
        }())
    </script>
</div><!-- end #main-->

<?php $this->need('sidebar.php'); ?>
<?php $this->need('footer.php'); ?>