<?php
/*
 * Case: Job done by
 */
defined( 'ABSPATH' ) || exit;

/**
 * Fields
 */
$field = get_query_var( 'case_single_field' );
$left  = $field['left'];
$right = $field['right'];
$dot = get_template_directory_uri().'/assets/userfiles/icons/dot.svg';

?>
<section class="section section__qit_software">
	<div class="container">
		<div class="section__qit_software-row row">
			<div class="col-12 column-text">
				<div class="section__qit_software-row-title">
					<h3><?= $left['title'] ?></h3>
				</div>
				<div class="section__qit_software-row-text <?= ( $left['solutions_repeater'] )?'':'mb-0' ?>">
					<?= $left['text'] ?>
				</div>
				<?php if ( $left['solutions_repeater'] ): ?>
					<?php foreach ( $left['solutions_repeater'] as $solution ):?>
						<div class="section__qit_software-row-solutions">
							<h4 class="section__qit_software-row-solutions-heading">
								<?= $solution['heading'] ?>
							</h4>
							<?php if ( $solution['Solution'] ): ?>
								<ul class="section__qit_software-row-solutions-list">
									<?php foreach ( $solution['Solution'] as $el): ?>
										<?php echo '<li class="section__qit_software-row-solutions-list-item">'.file_get_contents($dot).'<p>'.$el['solution'].'</p></li>'?>
									<?php endforeach ?>
								</ul>
							<?php endif; ?>
						</div>
					<?php endforeach; ?>
				<?php endif; ?>
			</div>
		</div>
	</div>
</section>