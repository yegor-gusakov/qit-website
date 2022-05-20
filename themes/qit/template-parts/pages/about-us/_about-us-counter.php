<?php
/*
 * About us: Counter
 */
defined( 'ABSPATH' ) || exit;

/**
 * Fields
 */
$field            = get_query_var( 'about_us_field' );
$badge            = $field['badge'];
$title            = $field['title'];
$counter_repeater = $field['counter_repeater'];
?>

<section class="section__counter section" id="timeline">
    <div class="container ">
		<?php if ( $badge ): ?>
            <div class="section__counter-row row justify-content-center">
                <h6 class="section__counter-row-badge m-0 w-auto text-white text-uppercase">
					<?= $badge ?>
                </h6>
            </div>
		<?php endif ?>
		<?php if ( $title ): ?>
            <div class="section__counter-row row text-center">
                <h2 class="section__counter-row-title"><?= $title ?></h2>
            </div>
		<?php endif ?>
		<?php

		// Check rows exists.
		if ( $counter_repeater ):
			?>
            <div class="section__counter-row row text-center">

				<?php
				// Loop through rows.
				foreach ( $counter_repeater as $counter ) :
					$count_number = $counter['count_number'];
					$count_text = $counter['count_text']
					?>
                    <div class="col-lg-3 col-12 col-sm-6 section__counter-row-count">
                        <h2 class="section__counter-row-count-number"><?= $count_number ?></h2>
                        <h4 class="section__counter-row-count-text"><?= $count_text ?></h4>
                    </div>

				<?php
				endforeach;
				?>
            </div>

		<?php
		else :
			// Do something...
		endif; ?>
    </div>
</section>