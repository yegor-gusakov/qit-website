<?php

$left             = get_field( 'yegor_left', 'qit_banners' );
$right            = get_field( 'yegor_right', 'qit_banners' );
$bg_image         = get_field( 'yegor_background', 'qit_banners' );
$title            = $left['yegor_title'];
$comment_name     = $left['yegor_comment_name'];
$comment_image    = $left['yegor_comment_image'];
$comment_position = $left['yegor_comment_position'];
$link             = $left['yegor_link'];

$yegor_right_image = $right['yegor_right_image'];
?>


<section class="section section__banner-yegor pt-3"
         style="background-image:url( <?= $bg_image['url'] ?>)">
    <div class="container">
        <div class="section__banner-yegor-row row align-items-center">
            <div class="col-lg-7">
                <h3><?= $title ?></h3>
                <div class="card mb-3 border-0 bg-transparent"
                     style="max-width: 540px;">
                    <div class="row g-0 align-items-center mb-3">
                        <div class="col-lg-4 section__banner-yegor-comment-img rounded-circle bg-white">
                            <img src="<?= $comment_image['url'] ?>"
                                 class="img-fluid rounded-circle"
                                 alt="<?= $yegor_right_image['alt'] ?>">
                        </div>
                        <div class="col-lg-8">
                            <div class="card-body px-3">
                                <h6 class="card-title m-0 text-white"><?= $comment_name ?></h6>
                                <p class="card-text">
                                    <?= $comment_position ?>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <button class="button btn"
                        type="button"><?= $link['title'] ?></button>
            </div>
            <div class="col-lg-3 offset-md-1">
                <img src="<?= $yegor_right_image['url'] ?>"
                     alt="<?= $yegor_right_image['alt'] ?>">
            </div>
        </div>
    </div>
</section>