<?php
/*
 * Home: Benefits
 */
defined( 'ABSPATH' ) || exit;

/**
 * Fields
 */
$field             = get_query_var( 'home_field' );
$badge             = $field['badge'];
$title             = $field['title'];
$benefits_repeater = $field['benefit_repeater'];

?>

<section class="section__benefits section ">
    <div class="container ">
            <div class="section__benefits-row row justify-content-center"><h6
                        class="section__benefits-row-badge m-0 w-auto text-white text-uppercase"><?= $badge ?></h6>
            </div>
            <div class="section__benefits-row row text-center">
                <h2 class="section__benefits-row-title"><?= $title ?></h2>
            </div>
			<?php
			// Check rows exists.
			if ( $benefits_repeater ):

				?>
                <div class="section__benefits-row row card-deck">

					<?php
					// Loop through rows.
					foreach ( $benefits_repeater as $benefit ):
						$benefit_icon = $benefit['icon'];
						$benefit_title = $benefit['title'];
						$benefit_text = $benefit['text'];
						?>
                        <div class="col-md-4 mb-5">
                            <div class="card border-0">
                                <div class="row">
                                    <div class="card-header border-0 bg-transparent row align-items-center">
                                        <div class="col-md-3"><img
                                                    src="<?= $benefit_icon['url'] ?>"
                                                    class="card-img-top"
                                                    alt="<?= $benefit_icon['alt'] ?>">
                                        </div>
                                        <div class="col-md-9">
                                            <h5 class="m-0"><?= $benefit_title ?></h5>
                                        </div>
                                    </div>
                                    <div class="col-md-12 ">
                                        <div class="card-body">
                                            <p class="card-text"><?= $benefit_text ?></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

					<?php endforeach; ?>

                </div>
			<?php endif; ?>

    </div>
</section>