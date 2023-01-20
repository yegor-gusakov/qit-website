<?php
/*
 * HireDev: Library
 */
defined( 'ABSPATH' ) || exit;

/**
 * Fields
 */
$field         = get_query_var( 'hire_dev_field' );
$badge         = $field['badge'];
$title         = $field['title'];
$text          = $field['text'];
$tech_repeater = $field['tech_repeater'];
$arrow_left    = get_template_directory_uri()
                 . '/assets/userfiles/icons/arrow-left.svg';
$arrow_right   = get_template_directory_uri()
                 . '/assets/userfiles/icons/arrow-right.svg';
?>
<section class="section section__library">
    <div class="container">
		<?php if ( $badge ): ?>
            <div class="section__library-row row justify-content-center">
                <h6 class="section__library-row-badge m-0  w-auto text-white text-uppercase"><?= $badge ?></h6>
            </div>
		<?php endif; ?>
		<?php if ( $title ): ?>
            <div class="section__library-row row text-center">
                <h2 class="section__library-row-title"><?= $title ?></h2>
            </div>
		<?php endif; ?>
		<?php if ( $text ): ?>
            <div class="section__library-row row justify-content-center">
                <p class="section__library-row-text m-0"><?= $text ?></p>
            </div>
		<?php endif; ?>
		<?php if ( $tech_repeater ): ?>
            <div class="section__library-row row justify-content-center">
					<?php foreach ( $tech_repeater as $tech ): ?>
						<?php get_template_part( 'template-parts/parts/hiredev/hiredev',
							'techlibrary', $tech ) ?>
					<?php endforeach; ?>

                </div>
		<?php endif; ?>

    </div>
</section>
