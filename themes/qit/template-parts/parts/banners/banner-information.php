<?php

$group = $args['information']['section_information'];
$badge = $group['badge'];
$title = $group['title'];
$text  = $group['text'];
$button  = $group['button'];
?>
<section class="section__information section" id="areas">
    <div class="container">
		<?php if ( $badge ): ?>
            <div class="section__information-row row justify-content-center">
                <h6 class="section__information-row-badge m-0  w-auto text-white text-uppercase"><?= $badge ?></h6>
            </div>
		<?php endif; ?>
		<?php if ( $title ): ?>
            <div class="section__information-row row ">
                <h2 class="section__information-row-title"><?= $title ?></h2>
            </div>
		<?php endif; ?>
		<?php if ( $text ): ?>
            <div class="section__information-row row ">
                    <div class="section__information-row-text"><?= $text ?></div>
            </div>
		<?php endif ?>
	    <?php if ( $button ): ?>
            <div class="section__information-row row justify-content-center">
                <div class="col-12 col-md-6 text-center">
                    <a href="<?= $button['url'] ?>" class="btn button" style="cursor: pointer;"><?= $button['title'] ?></a>
                </div>
            </div>
	    <?php endif ?>

    </div>
</section>