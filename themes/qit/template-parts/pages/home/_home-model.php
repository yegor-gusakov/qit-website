<?php
/*
 * Home: Coop Model
 */
defined( 'ABSPATH' ) || exit;

/**
 * Fields
 */
$field               = get_query_var( 'home_field' );
$badge               = $field['badge'];
$title               = $field['title'];
$coop_model_repeater = $field['coop_model_repeater'];

?>

<section class="section__models section ">
    <div class="container ">
            <div class="section__models-row row justify-content-center"><h6
                        class="section__models-row-badge m-0  w-auto text-white text-uppercase"><?= $badge ?></h6>
            </div>
            <div class="section__models-row row text-center">
                <h2 class="section__models-row-title"><?= $title ?></h2>
            </div>
			<?php
			// Check rows exists.
			if ( $coop_model_repeater ):

				?>
                <div class="section__models-row row card-deck">

					<?php
					// Loop through rows.
					foreach ( $coop_model_repeater as $model ):
						$model_bg_model = $model['background_image'];
						$model_title = $model['title'];
						$model_text = $model['text'];
						?>
                        <div class="col-md-4">
                            <div class="card bg-dark text-white border-0">
                                <img src="<?=$model_bg_model['url']?>" class="card-img border-0" alt="<?=$model_bg_model['alt']?>">
                                <div class="card-img-overlay bottom-0 top-unset">
                                    <h5 class="card-title"><?=$model_title?></h5>
                                    <p class="card-text"><?=$model_text?></p>

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