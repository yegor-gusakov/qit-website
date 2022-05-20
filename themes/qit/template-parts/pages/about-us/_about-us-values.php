<?php
/*
 * About us: Values
 */
defined( 'ABSPATH' ) || exit;

/**
 * Fields
 */
$field             = get_query_var( 'about_us_field' );
$badge             = $field['badge'];
$title             = $field['title'];
$benefits_repeater = $field['values_repeater'];

?>

<section class="section__values section ">
	<div class="container ">
		<?php if ( $badge ): ?>

			<div class="section__values-row row justify-content-center"><h6
					class="section__values-row-badge m-0 w-auto text-white text-uppercase"><?= $badge ?></h6>
			</div>
		<?php endif; ?>
		<?php if ( $title ): ?>

			<div class="section__values-row row text-center">
				<h2 class="section__values-row-title"><?= $title ?></h2>
			</div>
		<?php endif; ?>

		<?php
		// Check rows exists.
		if ( $benefits_repeater ):

			?>
			<div class="section__values-row row card-deck">

				<?php
				// Loop through rows.
				foreach ( $benefits_repeater as $benefit ):
					$benefit_icon = $benefit['icon'];
					$benefit_title = $benefit['title'];
					$benefit_text = $benefit['text'];
					?>
					<div class="col-lg-4 mb-5 col-md-4 col-sm-6">
						<div class="card border-0">
							<div class="row">
								<div class="card-header border-0 bg-transparent row align-items-center">
									<div class="col-lg-3 col-md-3 col-3 card-icon">
										<img
											src="<?= $benefit_icon['url'] ?>"
											class="card-img-top"
											alt="<?= $benefit_icon['alt'] ?>">
									</div>
									<div class="col-lg-9 col-md-9 col-9">
										<h4 class="title m-0"><?= $benefit_title ?></h4>
									</div>
								</div>
								<div class="col-12 col-sm-12 ">
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