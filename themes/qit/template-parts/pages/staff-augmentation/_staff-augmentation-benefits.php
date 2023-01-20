<?php
/*
 * Staff Augmentation: Benefits
 */
defined( 'ABSPATH' ) || exit;

/**
 * Fields
 */
$field             = get_query_var( 'staff_augmentation_field' );
$badge             = $field['badge'];
$title             = $field['title'];
$benefits_repeater = $field['benefit_repeater'];

?>
<section class="section__benefits section ">
    <div class="container ">
		<?php if ( $badge ): ?>
            <div class="section__benefits-row row justify-content-center">
                <h6 class="section__benefits-row-badge m-0 w-auto text-white text-uppercase"><?= $badge ?></h6>
            </div>
		<?php endif; ?>
		<?php if ( $title ): ?>
            <div class="section__benefits-row row text-center">
                <h2 class="section__benefits-row-title"><?= $title ?></h2>
            </div>
		<?php endif; ?>
		<?php if ( $benefits_repeater ):?>
            <div class="section__benefits-row row card-deck">
				<?php
				foreach ( $benefits_repeater as $benefit ):$benefit_icon = $benefit['icon'];$benefit_title = $benefit['title'];$benefit_text = $benefit['text']; ?>
                    <div class="col-lg-4  col-md-6 col-sm-6 card-benefit">
                        <div class="card border-0">
                            <div class="row m-0">
                                <div class="card-header border-0 bg-transparent row align-items-center">
									<?php if ( $benefit_icon ): ?>
                                        <div class="col-lg-3 col-md-3 col-3 card-icon">
                                            <img src="<?= $benefit_icon['url'] ?>" class="card-img-top" alt="<?= $benefit_icon['alt'] ?>">
                                        </div>
									<?php endif; ?>
									<?php if ( $benefit_title ): ?>
                                        <div class="col-lg-9 col-md-9 col-9 card-title">
                                            <h4 class="title m-0"><?= $benefit_title ?></h4>
                                        </div>
									<?php endif; ?>
                                </div>
								<?php if ( $benefit_text ): ?>
                                    <div class="col-12 col-sm-12 ">
                                        <div class="card-body">
                                            <p class="card-text"><?= $benefit_text ?></p>
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
</section>