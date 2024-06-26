<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>

</div><!-- end .row -->
</div>
</div><!-- end #body -->
<div class="back-to-top"><i class="iconfont icon-up"></i></div>
<footer id="footer" role="contentinfo" class="bg-white mt-3 shadow position-relative bottom-0">
    <div class="container text-secondary text-center p-3 small">
        <p class="m-0">
            &copy; <?php echo date('Y'); ?> All rights reserved.
            <?php if ($this->options->beian) : ?>
                <a class="link-secondary link-offset-2 link-underline-opacity-0 link-underline-opacity-75-hover ms-3" href="http://beian.miit.gov.cn" target="_blank"><?php $this->options->beian() ?></a>
            <?php endif; ?>
        </p>
        <p class="m-0">
            Powered by <a class="link-secondary link-offset-2 link-underline-opacity-0 link-underline-opacity-75-hover" href="http://typecho.org" target="_blank">Typecho</a>
            Theme by <a class="link-secondary link-offset-2 link-underline-opacity-0 link-underline-opacity-75-hover" href="https://ilaozhu.com/archives/2069" target="_blank">WaterDrop</a>
        </p>
    </div>
</footer><!-- end #footer -->
<script src="<?php $this->options->themeUrl('static/js/pjax.min.js'); ?>"></script>
<?php
$googleAd = getGoogleAd();
if ($googleAd['showAd']) : ?>
    <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-<?= $googleAd['publisher']; ?>" crossorigin="anonymous"></script>
<?php endif; ?>
<?php $this->footer(); ?>
<?php
if ($this->options->footerJs) {
    $this->options->footerJs();
}
?>
<script>
    const loader = document.querySelector("#loader");
    const body = document.querySelector("#body");
    const loaderSpans = loader.children;
    for (let i = 0; i < loaderSpans.length; i++) {
        loaderSpans[i].style.animationDelay = i * 0.15 + 's';
    }

    loader.classList.add("hidden");
    body.style.display = "block";

    const pjax = new Pjax({
        elements: '.pjax a[href]:not([target="_blank"]):not(.no-pjax),.pjax form[action]:not(.no-pjax),a.pjax,form.pjax',
        selectors: [
            "title",
            "meta[charset]",
            "header",
            "#main"
        ],
        cacheBust: false
    });

    document.addEventListener('pjax:send', () => {
        body.style.display = "none";
        loader.classList.remove("hidden");
    });

    document.addEventListener('pjax:complete', (e) => {
        loader.classList.add("hidden");
        body.style.display = "block";
    });

    window.addEventListener('click', function(e) {
        const emojiBox = document.querySelector('#emoji-box');
        const emojiBtn = document.querySelector('#emoji-btn');
        const emojiList = document.querySelector('#emoji-list');
        const textarea = document.querySelector('#textarea');
        if (emojiBtn && emojiBtn.contains(e.target)) {
            emojiList.classList.toggle('d-none');
        }

        if (emojiBox && !emojiBox.contains(e.target)) {
            emojiList.classList.add('d-none');
        }

        if (emojiList && emojiList.contains(e.target)) {
            const emoji = e.target.dataset.emoji;
            if (emoji) {
                textarea.value += emoji;
                emojiList.classList.add('d-none');
            }
        }
    });

    const backToTop = document.querySelector(".back-to-top");
    window.addEventListener('scroll', () => {
        if (document.body.scrollTop > 100 || document.documentElement.scrollTop > 100) {
            backToTop.classList.add("show");
        } else {
            backToTop.classList.remove("show");
        }
    });

    backToTop.addEventListener("click", () => {
        document.body.scrollTop = 0;
        document.documentElement.scrollTop = 0;
    });
</script>
</body>

</html>