<?php
/*
 * * Work at qit: Team
 */
defined( 'ABSPATH' ) || exit;

/**
 * Fields
 */
$field         = get_query_var( 'work_at_qit_field' );
$badge         = $field['badge'];
$title         = $field['title'];
$tags_repeater = $field['tags_repeater'];
?>
<section class="section section__team">
    <div class="container">
		<?php if ( $badge ): ?>
            <div class="section__team-row row justify-content-center"><h6 class="section__team-row-badge m-0  w-auto text-white text-uppercase"><?= $badge ?></h6>
            </div>
		<?php endif; ?>
		<?php if ( $title ): ?>
            <div class="section__team-row row text-center">
                <h2 class="section__team-row-title"><?= $title ?></h2>
            </div>
		<?php endif; ?>
		<?php if ( $tags_repeater ):?>
            <div class="section__team-row row row-cols-1 row-cols-lg-4 row-cols-md-2 row-cols-sm-2 row-cols-1 justify-content-md-center justify-content-lg-start">
				<?php
				foreach ( $tags_repeater as $tag ):$tag_title = $tag['title'];$tag_text = $tag['text'];$tag_image = $tag['image']; ?>
                    <div class="section__team-row-col col col col-md-5 col-lg-3">
                        <div class="card border-0">
                            <div class="card-body text-center">
                                <h3 class="card-title"><?= $tag_title ?></h3>
                                <p class="card-text"><?= $tag_text ?></p>
                            </div>
                            <img src="<?= $tag_image ?>" class="card-img-top" alt="<?= $tag_title ?>">
                        </div>
                    </div>
				<?php endforeach; ?>
            </div>
		<?php endif; ?>
    </div>
</section>
