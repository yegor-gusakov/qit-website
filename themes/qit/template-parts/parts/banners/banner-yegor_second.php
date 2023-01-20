<?php

$left              = get_field( 'yegor_left_second', 'qit_banners' );
$right             = get_field( 'yegor_right_second', 'qit_banners' );
$bg_image          = get_field( 'yegor_background_second', 'qit_banners' );
$title             = $right['yegor_title'];
$text              = $right['yegor_text'];
$comment_name      = $right['yegor_comment_name'];
$comment_image     = $right['yegor_comment_image'];
$comment_position  = $right['yegor_comment_position'];
$link              = $right['yegor_link'];
$yegor_right_image = $left['yegor_right_image'];
$linkedin          = get_template_directory_uri()
                     . '/assets/userfiles/icons/linkedin.svg';
?>


<section class="section section__banner-yegor second"
         style="background-image:url( <?= $bg_image['url'] ?>);">
    <div class="container">
        <div class="section__banner-yegor-row row align-items-center">
            <div class=" col-lg-4  col-12 left align-self-end">
                <img src="<?= $yegor_right_image['url'] ?>" alt="<?= $yegor_right_image['alt'] ?>">
            </div>
            <div class="col-lg-7 right">
				<?php if ( $title ): ?>
                    <div class="section__banner-yegor-row">
                        <h3 class="section__banner-yegor-row-title"><?= $title ?></h3>
                    </div>
				<?php endif; ?>
				<?php if ( $text ): ?>
                    <div class="section__banner-yegor-row-text">
                        <?= $text ?>
                    </div>
				<?php endif; ?>
                <div class="card  border-0 bg-transparent">
                    <div class="row g-0 align-items-center">
                        <div class="col-4 col-lg-4  section__banner-yegor-comment-img rounded-circle bg-white">
                            <img src="<?= $comment_image['url'] ?>" class="img-fluid" alt="<?= $yegor_right_image['alt'] ?>">
                        </div>
                        <div class="col-auto  col-lg-8">
                            <div class="card-body">
                                <a href="https://www.linkedin.com/in/yegor-gusakov" target="_blank">
                                    <h6 class="card-title text-white"><?= $comment_name ?><?= file_get_contents( $linkedin ) ?></h6>
                                </a>
                                <p class="card-text"><?= $comment_position ?></p>
                            </div>
                        </div>
                    </div>
                </div>
                <button class="button btn black globalModalQuote" type="button" ><?= $link['title'] ?></button>
            </div>
        </div>
    </div>
</section>