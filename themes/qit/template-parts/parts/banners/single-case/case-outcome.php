<?php
/*
 * Single Case: Curious
 */
defined( 'ABSPATH' ) || exit;

/**
 * Fields
 */
$left  = $args['outcome_left'];
$right = $args['outcome_right'];

$title = $left['title'];
$text  = $left['text'];
$text2  = $left['text_2'];
$repeater = $left['repeater'];
$img   = $right['img'];

$dot = get_template_directory_uri().'/assets/userfiles/icons/dot.svg';

?>
<section class="section section__outcome">
    <div class="container">
        <div class="section__outcome-row row">
            <div class="col-lg-6 col-12 column-text">
                <div class="section__outcome-row-title">
                    <h3><?= $title ?></h3>
                </div>
                <div class="section__outcome-row-text">
                    <p><?= $text ?></p>
                </div>
	            <?php if ( $repeater): ?><?php foreach ( $repeater  as $outcome ):?>
                        <div class="section__outcome-row-outcome">
                            <h4 class="section__outcome-row-outcome-heading">
					            <?= $outcome['heading'] ?>
                            </h4>
				            <?php if ( $outcome['outcome'] ): ?>
                                <ul class="section__outcome-row-outcome-list">
						            <?php foreach ( $outcome['outcome'] as $el): ?>
							            <?php echo '<li class="section__outcome-row-outcome-list-item">'.file_get_contents($dot).'<p>'.$el['text'].'</p></li>'?>
						            <?php endforeach ?>
                                </ul>
				            <?php endif; ?>
                        </div>
		            <?php endforeach; ?>
	            <?php endif; ?>
                <?php if($text2):?>
                <div class="section__outcome-row-text">
                    <?= $text2?>
                </div>
                <?php endif;?>
            </div>
            <div class="col-lg-5 offset-lg-1 col-12 column-image">
                <img src="<?= $img['url'] ?>" alt="<?= $img['alt'] ?>">
            </div>
        </div>
    </div>
</section>
