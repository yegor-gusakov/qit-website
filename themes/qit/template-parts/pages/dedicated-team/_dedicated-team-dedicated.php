<?php
/*
 * Dedicated: Dedicated
 */
defined( 'ABSPATH' ) || exit;

/**
 * Fields
 */
$field              = get_query_var( 'dedicated_team_field' );
$badge              = $field['badge'];
$title              = $field['title'];
$dedicated_repeater = $field['dedicated_repeater'];
?>
<section class="section section__dedicated">
    <div class="container">
		<?php if ( $badge ): ?>
            <div class="section__dedicated-row row text-center">
                <h6 class="section__dedicated-row-badge m-0 w-auto text-white text-uppercase"><?= $badge ?></h6>
            </div>
		<?php endif; ?>
		<?php if ( $title ): ?>

            <div class="section__dedicated-row row text-center">
                <h2 class="section__dedicated-row-title"><?= $title ?></h2>
            </div>
		<?php endif; ?>
		<?php if ( $dedicated_repeater ):$i = 1; ?>
            <div class="section__dedicated-row row text-center">
                <div class="col">
                    <ul class="timeline row m-0">
						<?php foreach ( $dedicated_repeater as $dedicated ):
							$title = $dedicated['title'];
							$text  = $dedicated['text'] ?>
                            <li data-year="<?= $i ?>" class="col p-0">
                                <div class="content">
                                    <div class="title">
                                        <h4><?= $title?></h4>
                                    </div>
                                    <div class="text">
		                                <?=$text?>
                                    </div>
                                </div>

                            </li>
						<?php
							$i ++;

						endforeach; ?>
                    </ul>

                </div>
            </div>
		<?php endif; ?>
    </div>
</section>