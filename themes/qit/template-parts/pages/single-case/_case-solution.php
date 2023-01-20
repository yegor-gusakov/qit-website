<?php
/*
 * Case: Solution
 */
defined( 'ABSPATH' ) || exit;

/**
 * Fields
 */
$field = get_query_var( 'case_single_field' );
$left  = $field['left'];
$right = $field['right'];
$dot   = get_template_directory_uri() . '/assets/userfiles/icons/dot.svg';

?>
<section class="section section__solution">
    <div class="container">
        <div class="section__solution-row row">
            <div class="col-lg-6 col-md-10 column-image">
                <img src="<?= $left['img']['url'] ?>" alt="<?= $left['img']['alt'] ?>">
            </div>
            <div class="col-lg-6 col-12 col-sm-12 column-text">
                <div class="section__solution-row-title">
                    <h3><?= $right['title'] ?></h3>
                </div>
                <div class="section__solution-row-text">
					<?= $right['text'] ?>
                </div>
				<?php if ( $right['solutions_repeater'] ): ?><?php foreach ( $right['solutions_repeater'] as $solution ):?>
                        <div class="section__solution-row-solutions">
                            <h4 class="section__solution-row-solutions-heading">
								<?= $solution['heading'] ?>
                            </h4>
							<?php if ( $solution['Solution'] ): ?>
                                <ul class="section__solution-row-solutions-list">
									<?php foreach ( $solution['Solution'] as $el ): ?><?php echo '<li class="section__solution-row-solutions-list-item">' . file_get_contents( $dot ) . '<p>' . $el['solution'] . '</p></li>' ?><?php endforeach ?>
                                </ul>
							<?php endif; ?>
                        </div>
					<?php endforeach; ?>
				<?php endif; ?>
            </div>
        </div>
    </div>
</section>