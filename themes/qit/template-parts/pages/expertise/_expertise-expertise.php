<?php
/*
 * Expertise: Expertise
 */
defined( 'ABSPATH' ) || exit;

/**
 * Fields
 */
$field = get_query_var( 'expertise_field' );
$expertise = $field['expertise'];

?>
<section class="section section__expertise">
    <div class="container">
		<?php if ( $expertise ): ?>
			<?php foreach ( $expertise as $expert ): ?>
                <div class="section__expertise-row row justify-content-between <?= ($expert['group']['nested_expertise'] )?'have-nested':''?>">
                    <div class="col-sm-8 col-expertise px-sm-0">
                        <div class="section__expertise-row-title">
                            <h3><?= $expert['group']['title'] ?></h3>
                        </div>
                        <div class="section__expertise-row-text">
                            <?= $expert['group']['text'] ?>
                        </div>
                    </div>
                    <div class="col-lg-2 col-sm-3 px-0 col-expertise  list d-flex align-items-center justify-content-center">
                        <ul>
							<?php foreach ( $expert['group']['right_list'] as $item ) : ?>
                                <li><h5><?= $item['text'] ?></h5></li>
							<?php endforeach; ?>
                        </ul>
                    </div>
					<?php if ( $expert['group']['nested_expertise'] ): ?>
                        <div class="col-12 p-lg-0">
						<?php foreach ( $expert['group']['nested_expertise'] as $nested ): ?>
                                <div class="section__expertise-row-nested row justify-content-between">
                                    <div class="col-lg-9 col-sm-7 col-expertise px-0 ">
                                        <div class="section__expertise-row-nested-title">
                                            <h3><?= $nested['group']['title'] ?></h3>
                                        </div>
                                        <div class="section__expertise-row-nested-text">
											<?= $nested['group']['text'] ?>
                                        </div>
                                    </div>
                                    <div class="col-lg-2 col-sm-3 px-0 col-expertise list d-flex align-items-center justify-content-center">
                                        <ul>
											<?php foreach ( $nested['group']['right_list'] as $item ) : ?>
                                                <li><h5><?= $item['text'] ?></h5></li>
											<?php endforeach; ?>
                                        </ul>
                                    </div>
                            </div>
						<?php endforeach; ?>
                        </div>
					<?php endif; ?>
                </div>
			<?php endforeach; ?>
		<?php endif; ?>
    </div>
</section>