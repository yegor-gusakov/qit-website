<?php
/*
 * Work at qit: defines
 */
defined( 'ABSPATH' ) || exit;

/**
 * Fields
 */
$field             = get_query_var( 'work_at_qit_field' );
$badge             = $field['badge'];
$title             = $field['title'];
$definess_repeater = $field['defines_repeater'];

?>

<section class="section__defines section ">
    <div class="container ">
		<?php if ( $badge ): ?>
            <div class="section__defines-row row justify-content-center">
                <h6 class="section__defines-row-badge m-0 w-auto text-white text-uppercase"><?= $badge ?></h6>
            </div>
		<?php endif;  if ( $title ): ?>
            <div class="section__defines-row row text-center">
                <h2 class="section__defines-row-title"><?= $title ?></h2>
            </div>
		<?php endif;
		if ( $definess_repeater ):?>
            <div class="section__defines-row row card-deck">
				<?php
				foreach ( $definess_repeater as $defines ):	$defines_icon = $defines['icon'];	$defines_title = $defines['title'];$defines_text = $defines['text'];?>
                    <div class="col-lg-3 col-sm-6 card-defines">
                        <div class="card border-0">
                            <div class="row">
                                <div class="card-header border-0 bg-transparent row align-items-center">
									<?php if ( $defines_icon ): ?>
                                        <div class="col-lg-3 col-md-3 col-3 card-icon">
                                            <img src="<?= $defines_icon['url'] ?>" class="card-img-top" alt="<?= $defines_icon['alt'] ?>">
                                        </div>
									<?php endif; ?>
									<?php if ( $defines_title ): ?>
                                        <div class="col-lg-9 col-md-9 col-9 card-title">
                                            <h4 class="title"><?= $defines_title ?></h4>
                                        </div>
									<?php endif; ?>
                                </div>
								<?php if ( $defines_text ): ?>
                                    <div class="col-12 col-sm-12 ">
                                        <div class="card-body">
                                            <p class="card-text"><?= $defines_text ?></p>
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