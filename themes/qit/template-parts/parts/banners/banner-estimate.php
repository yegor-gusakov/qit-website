<?php

$badge = get_field( 'estimate_badge', 'qit_banners' );
$title = get_field( 'estimate_title', 'qit_banners' );
$text  = get_field( 'estimate_text', 'qit_banners' );
$link  = get_field( 'estimate_button', 'qit_banners' );

?>


<section class="section section__banner-estimate">

    <div class="container py-5 ">
		<?php if ( $badge ): ?>

            <div class="section__banner-estimate-row row justify-content-center p-0">
                <h6 class="section__banner-estimate-row-badge  m-0 w-auto text-white text-uppercase"><?= $badge ?></h6>
            </div>
		<?php endif; ?>

		<?php if ( $title ): ?>

            <div class="section__banner-estimate-row row text-center p-0">
                <h2 class="section__banner-estimate-row-title"><?= $title ?></h2>
            </div>
		<?php endif; ?>

		<?php if ( $text ): ?>

            <div class="section__banner-estimate-row row text-center p-0 w-75 mx-auto">
                <p class="section__banner-estimate-row-text"><?= $text ?></p>
            </div>
		<?php endif; ?>

		<?php if ( $link ): ?>

            <div class="section__banner-estimate-row row text-center p-0">
                <button class="button btn w-auto mx-auto"
                        type="button" data-bs-toggle="modal"
                        data-bs-target="#globalModalQuote"><?= $link['title'] ?></button>
            </div>
		<?php endif; ?>
    </div>
</section>