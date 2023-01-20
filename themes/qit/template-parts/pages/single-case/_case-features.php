<?php
/*
 * Single case: Features
 */
defined( 'ABSPATH' ) || exit;

/**
 * Fields
 */
$field             = get_query_var( 'case_single_field' );
$left = $field['left'];
$right = $field['right'];
$title             = $right['title'];
$features_repeater = $right['featured_repeater'];

?>

<section class="section__features section ">
	<div class="container ">
		<div class="section__features-row row">
            <div class="col-lg-6 column-image">
                <img src="<?=$left['img']['url']?>" alt="<?=$left['img']['alt']?>">
            </div>
            <div class="col-lg-6 column-text">
	            <?php if ( $title ): ?>
                        <h2 class="section__features-row-title"><?= $title ?></h2>
	            <?php endif; ?>
	            <?php if ( $features_repeater ):?><div class="section__features-row row card-deck">
			            <?php
			            foreach ( $features_repeater as $feature ):$feature_icon = $feature['icon'];$feature_title = $feature['title'];$feature_text = $feature['text']; ?>
                            <div class="col-sm-12  card-feature">
                                <div class="card border-0">
                                    <div class="row">
                                        <div class="card-header border-0 bg-transparent row align-items-center">
								            <?php if ( $feature_icon ): ?>
                                                <div class="col-lg-3 col-md-3 col-3 card-icon">
                                                    <img src="<?= $feature_icon['url'] ?>" class="card-img-top" alt="<?= $feature_icon['alt'] ?>">
                                                </div>
								            <?php endif; ?>
								            <?php if ( $feature_title ): ?>
                                                <div class="col-lg-9 col-md-9 col-9 card-title">
                                                    <h4 class="title m-0"><?= $feature_title ?></h4>
                                                </div>
								            <?php endif; ?>
                                        </div>
							            <?php if ( $feature_text ): ?>
                                            <div class="col-12 col-sm-12 ">
                                                <div class="card-body">
                                                    <p class="card-text"><?= $feature_text ?></p>
                                                </div>
                                            </div>
							            <?php endif; ?>
                                    </div>
                                </div>
                            </div>
			            <?php endforeach; ?>
                    </div>
	            <?php endif; ?>
            </div>
        </div>
	</div>
</section>