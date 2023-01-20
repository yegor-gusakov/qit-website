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
$worldwide_text_2   = $field['worldwide_text_2'];
?>
<section class="section__worldwide section">
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
		<?php if ( $worldwide_text_2 ): ?>
            <div class="section__worldwide-row row ">
                <div class="col">
                    <p class="section__worldwide-row-text"><?= $worldwide_text_2 ?></p>
                    <div class="divider"></div>
                </div>
            </div>
		<?php endif; ?>
		<?php if ( $countries_repeater ): ?>
            <div class="section__worldwide-row row">
                <div class="col">
                    <ul class="list-group list-group-horizontal">
						<?php foreach ( $countries_repeater as $country ):$country_flag = $country['country_flag'];$country_name = $country['country_name']; ?>
                            <li class="list-group-item border-0 bg-transparent">
                                <p><?=file_get_contents( $country_flag['url'] )?><?=$country_name?></p>
                            </li>
						<?php endforeach ?>
                    </ul>
                </div>
            </div>
		<?php endif; ?>
		<?php if ( $worldwide_image ): ?>
            <div class="section__worldwide-row row ">
                <div class="col-12">
                    <img src="<?= $worldwide_image['url'] ?>" alt="<?= $worldwide_image['alt'] ?>">
                </div>
            </div>
		<?php endif; ?>
		<?php if ( $worldwide_text ): ?>
            <div class="section__worldwide-row row">
                <div class="col">
                    <p><?= $worldwide_text ?></p>
                </div>
            </div>
		<?php endif ?>
    </div>
</section>