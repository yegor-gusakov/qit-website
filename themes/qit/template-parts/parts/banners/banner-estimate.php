<?php

$badge = get_field( 'estimate_badge', 'qit_banners' );
$title = get_field( 'estimate_title', 'qit_banners' );
$text  = get_field( 'estimate_text', 'qit_banners' );
$link  = get_field( 'estimate_button', 'qit_banners' );

?>


<section class="section section__banner-estimate">

    <div class="container py-5 ">
            <div class="section__banner-estimate-row row justify-content-center p-0">
                <h6
                        class="section__banner-estimate-row-badge  w-auto text-white text-uppercase"><?= $badge ?></h6>
            </div>
            <div class="section__banner-estimate-row row text-center p-0">
                <h2 class="section__banner-estimate-row-title"><?= $title ?></h2>
            </div>
            <div class="section__banner-estimate-row row text-center p-0 w-75 mx-auto">
                <p class="section__banner-estimate-row-text"><?= $text ?></p>
            </div>
            <div class="section__banner-estimate-row row text-center p-0">
                <button class="button btn w-auto mx-auto"
                        type="button"><?= $link['title'] ?></button>
            </div>
        </div>
</section>