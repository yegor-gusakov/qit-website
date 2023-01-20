<?php
/*
 * WebDevelopment: Coop Model
 */
defined( 'ABSPATH' ) || exit;

/**
 * Fields
 */
$field               = get_query_var( 'web_development_field' );
$badge               = $field['badge'];
$title               = $field['title'];
$coop_model_repeater = $field['coop_model_repeater'];
$learnMoreIcon       = get_template_directory_uri()
                       . '/assets/userfiles/icons/learn-more.svg';
?>

<section class="section__models section ">
    <div class="container ">
		<?php if ( $badge ): ?>
            <div class="section__models-row row justify-content-center">
                <h6 class="section__models-row-badge m-0  w-auto text-white text-uppercase"><?= $badge ?></h6>
            </div>
		<?php endif; ?>
		<?php if ( $title ): ?>
            <div class="section__models-row row text-center">
                <h2 class="section__models-row-title"><?= $title ?></h2>
            </div>
		<?php endif; ?>
		<?php if ( $coop_model_repeater ): ?>
            <div class="section__models-row row card-deck justify-content-center g-4 mb-4 ">
				<?php foreach ( $coop_model_repeater as $model ):
					$model_bg_model = $model['background_image'];
					$model_title = $model['title'];
					$model_text = $model['text'];
					$model_link = $model['link_to_page'];
					?>

                    <div class="col-lg-4 col-sm-6 col-md-6 col-12">
						<?= ( $model_link ) ? '<a href="' . $model_link . '">'
							: '' ?>
                        <div class="card bg-dark text-white border-0">
                            <img src="<?= $model_bg_model['url'] ?>"
                                 class="card-img border-0"
                                 alt="<?= $model_bg_model['alt'] ?>" width="350"
                                 height="350">
                            <div class="card-img-overlay bottom-0 top-unset">
                                <h4 class="card-title"><?= $model_title ?></h4>
                                <p class="card-text"><?= $model_text ?></p>
								<?php if ( $model_link ): ?>
                                    <div class="learn-more">
                                        <span class="learn-more-divider"></span>
                                        <div>
                                        <span class="learn-more-text"><?= __( 'Learn more',
			                                    'qit' ) ?></span><?= file_get_contents( $learnMoreIcon ) ?>
                                        </div>
                                    </div>
								<?php endif; ?>
                            </div>
                        </div>
						<?= ( $model_link ) ? '</a>' : '' ?>

                    </div>
				<?php endforeach; ?>
            </div>
		<?php endif; ?>
    </div>
</section>