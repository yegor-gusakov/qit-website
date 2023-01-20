<?php
/*
 * Single Case: Curious
 */
defined( 'ABSPATH' ) || exit;

/**
 * Fields
 */
$left  = $args['curious_left'];
$right = $args['curious_right'];

$title  = $left['title'];
$text   = $left['text'];
$button = $left['button'];
$img    = $right['img'];

?>
<section class="section section__curious">
    <div class="container">
        <div class="section__curious-row row align-items-sm-center">
            <div class="col-lg-7 col-md-10 p-0 col-text">
				<?php if ( $title ): ?>
                    <div class="section__curious-row-title">
                        <h3><?= $title ?></h3>
                    </div>
				<?php endif; ?><?php if ( $title ): ?>
                    <div class="section__curious-row-text">
                        <p><?= $text ?></p>
                    </div>
				<?php endif; ?>
                <button class="button btn globalModalQuote" type="button" ><?= $button['title'] ?></button>
            </div>
            <div class="col-lg-5 col-md-8 p-0  col-image">
                <img src="<?= $img['url'] ?>" alt="<?= $img['alt'] ?>">
            </div>
        </div>
    </div>
</section>
