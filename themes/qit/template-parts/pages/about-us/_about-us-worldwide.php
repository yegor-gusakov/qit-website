<?php
/*
 * About us: Worldwide
 */
defined( 'ABSPATH' ) || exit;

/**
 * Fields
 */
$field              = get_query_var( 'about_us_field' );
$badge              = $field['badge'];
$title              = $field['title'];
$countries_repeater = $field['countries_repeater'];
$worldwide_image    = $field['worldwide_image'];
$worldwide_text     = $field['worldwide_text'];
?>

<section class="section__worldwide section" id="timeline">
    <div class="container ">
		<?php if ( $badge ): ?>
            <div class="section__worldwide-row row justify-content-center">
                <h6 class="section__worldwide-row-badge m-0 w-auto text-white text-uppercase">
					<?= $badge ?>
                </h6>
            </div>
		<?php endif ?>
		<?php if ( $title ): ?>
            <div class="section__worldwide-row row text-center">
                <h2 class="section__worldwide-row-title"><?= $title ?></h2>
            </div>
		<?php endif ?>
		<?php if ( $countries_repeater ): ?>
            <div class="section__worldwide-row">
                <ul class="list-group list-group-horizontal justify-content-between">
					<?php foreach ( $countries_repeater as $country ):
						$country_flag = $country['country_flag'];
						$country_name = $country['country_name'];
						?>
                        <li class="list-group-item border-0 bg-transparent">
                            <span><?= file_get_contents( $country_flag['url'] ) ?></span><span><?= $country_name ?></span>
                        </li>

					<?php endforeach ?>
                </ul>
            </div>
		<?php endif; ?>
		<?php if ( $worldwide_image ): ?>
            <img src="<?= $worldwide_image['url'] ?>"
                 alt="<?= $worldwide_image['alt'] ?>">
		<?php endif; ?>
		<?php if ( $worldwide_text ): ?>
        <div class="section__worldwide-row">
            <div class="col-lg-10 mx-auto text-center">
                <p><?= $worldwide_text ?></p>
				<?php endif ?>
            </div>
        </div>
    </div>
</section>