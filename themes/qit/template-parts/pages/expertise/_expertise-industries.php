<?php
/*
 * Expertise: Industries
 */
defined( 'ABSPATH' ) || exit;

/**
 * Fields
 */
$field      = get_query_var( 'expertise_field' );
$badge      = $field['badge'];
$title      = $field['title'];
$industries = $field['industries'];

?>
<section class="section section__industries">
    <div class="container">
		<?php if ( $badge ): ?>
            <div class="section__industries-row row justify-content-center">
                <h6 class="section__industries-row-badge m-0 w-auto text-white text-uppercase"><?= $badge ?></h6>
            </div>
		<?php endif; ?>
		<?php if ( $title ): ?>
            <div class="section__industries-row row text-center">
                <h2 class="section__industries-row-title"><?= $title ?></h2>
            </div>
		<?php endif; ?>
		<?php if ( $industries ): ?>
            <div class="section__industries-row row">
				<?php
				foreach ( $industries as $industry ):?>
                    <div class="col-lg-2 col-sm-6 col-md-3 col-12 industry-col <?= strtolower( $industry['text'] ) ?>">
                        <div class="card h-100 ">
                            <?php if( $industry['icon']):?>
                            <div class="card-img ">
                                <img src="<?= $industry['icon']['url'] ?>" alt="<?= $industry['icon']['alt'] ?>">
                            </div>
                            <?php endif;?>
                            <div class="card-body">
                                <h5 class="card-title text-center m-0"><?= $industry['text'] ?></h5>
                            </div>
                        </div>
                    </div>
				<?php endforeach; ?>
            </div>
		<?php endif; ?>
    </div>
</section>