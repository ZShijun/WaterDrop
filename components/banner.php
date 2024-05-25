<?php if ($this->is('index')) : ?>
    <?php $banners = $this->options->banners == null ? null : json_decode($this->options->banners, true);
    if (!empty($banners)) : ?>
        <div id="banner" class="banner carousel slide mb-3" data-bs-ride="carousel">
            <div class="carousel-inner bg-white shadow-sm rounded">
                <?php foreach ($banners as $key => $banner) : ?>
                    <div class="carousel-item<?php if ($key == 0) echo ' active'; ?>">
                        <?php if (isset($banner['link'])) : ?>
                            <a href="<?= $banner['link']; ?>" target="_blank">
                                <img src="<?= $banner['img']; ?>" class="d-block w-100">
                            </a>
                        <?php else : ?>
                            <img src="<?= $banner['img']; ?>" class="d-block w-100">
                        <?php endif; ?>
                    </div>
                <?php endforeach; ?>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#banner" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#banner" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    <?php endif; ?>
<?php endif; ?>