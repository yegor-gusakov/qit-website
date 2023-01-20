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
$linkedin          = get_template_directory_uri()
                     . '/assets/userfiles/icons/linkedin.svg';
?>

<section class="section section__banner-yegor" style="background-image:url( <?= $bg_image['url'] ?>)">
    <div class="container">
        <div class="section__banner-yegor-row row align-items-center">
            <div class="col-sm-7 left">
				<?php if ( $title ): ?>
                    <div class="section__banner-yegor-row">
                        <h3 class="section__banner-yegor-row-title"><?= $title ?></h3>
                    </div>
				<?php endif; ?>
                <div class="card  border-0 bg-transparent">
                    <div class="row g-0 align-items-center">
                        <div class="col-4 col-lg-4  section__banner-yegor-comment-img rounded-circle bg-white">
                            <img src="<?= $comment_image['url'] ?>" class="img-fluid" alt="<?= $yegor_right_image['alt'] ?>" width="300" height="500">
                        </div>
                        <div class="col-auto  col-lg-8">
                            <div class="card-body">
                                <a href="https://www.linkedin.com/in/yegor-gusakov" target="_blank"><h6 class="card-title text-white"><?= $comment_name ?><?= file_get_contents( $linkedin ) ?></h6></a>
                                <p class="card-text">
									<?= $comment_position ?>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <button class="button btn black globalModalQuote"
                        type="button" ><?= $link['title'] ?></button>
            </div>
            <div class="col-lg-4 col-sm-5 col-12 right align-self-end">
                <img src="<?= $yegor_right_image['url'] ?>" alt="<?= $yegor_right_image['alt'] ?>">
            </div>
        </div>
    </div>
</section>