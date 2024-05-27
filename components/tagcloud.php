<?php if (!empty($this->options->sidebarBlock) && in_array('ShowTagCloud', $this->options->sidebarBlock)) : ?>
    <section class="bg-white rounded shadow-sm mt-3">
        <h3 class="px-3 py-2 m-0 fs-6 text-bg-light rounded-top"> <i class="iconfont icon-tags-fill me-2"></i><?php _e('标签云'); ?></h3>
        <canvas id="tag-cloud" height="300" style="width: 100%;"></canvas>
        <div id="side-tags" class="pjax" style="display: none;">
            <?php \Widget\Metas\Tag\Cloud::alloc()
                ->parse('<a href="{permalink}">{name}</a>'); ?>
        </div>
    </section>
    <script src="<?php $this->options->themeUrl('static/js/tagcanvas.min.js'); ?>"></script>
    <script>
        TagCanvas.Start('tag-cloud', 'side-tags', {
            textColour: '#6c757d',
            outlineColour: '#49b1f5',
            outlineThickness: 1,
            maxSpeed: 0.03,
            depth: 0.75,
            wheelZoom: false,
            noTagsMessage: false
        });
    </script>
<?php endif; ?>