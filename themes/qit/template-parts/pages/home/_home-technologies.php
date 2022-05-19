<?php
/*
 * Home: Technologies
 */
defined( 'ABSPATH' ) || exit;

/**
 * Fields
 */
$field      = get_query_var( 'home_field' );
$badge      = $field['badge'];
$title      = $field['title'];
$directions = $field['directions'];

?>

<section class="section section__technologies">
    <div class="container">
		<?php if ( $badge ): ?>

            <div class="section__technologies-row row justify-content-center">
                <h6 class="section__technologies-row-badge m-0 w-auto text-white text-uppercase"><?= $badge ?></h6>
            </div>
		<?php endif; ?>
		<?php if ( $title ): ?>

            <div class="section__technologies-row row text-center">
                <h2 class="section__technologies-row-title"><?= $title ?></h2>
            </div>
		<?php endif; ?>
		<?php if ( $directions ): ?>

            <div class="section__technologies-row row">

                <ul class="section__technologies-nav nav nav-tabs border-0 flex-nowrap"
                    id="technologiesDirection" role="tablist">
					<?php
					foreach ( $directions as $key => $direction ):
						switch ( $key ):
							case "front-end":
								?>
                                <li class="section__technologies-nav-item nav-item"
                                    role="presentation">
                                    <button class="section__technologies-nav-link nav-link active text-uppercase"
                                            id="<?= $key ?>-tab"
                                            data-bs-toggle="tab"
                                            data-bs-target="#<?= $key ?>-tab-pane"
                                            type="button" role="tab"
                                            aria-controls="<?= $key ?>-tab-pane"
                                            aria-selected="true"><?= $key ?></button>
                                </li>
								<?php
								break;
							case "mobile":
								?>
                                <li class="section__technologies-nav-item nav-item"
                                    role="presentation">
                                    <button class="section__technologies-nav-link nav-link text-uppercase"
                                            id="<?= $key ?>-tab"
                                            data-bs-toggle="tab"
                                            data-bs-target="#<?= $key ?>-tab-pane"
                                            type="button" role="tab"
                                            aria-controls="<?= $key ?>-tab-pane"
                                            aria-selected="true"><?= $key ?></button>
                                </li>
								<?php break;
							case "back-end":
								?>
                                <li class="section__technologies-nav-item nav-item"
                                    role="presentation">
                                    <button class="section__technologies-nav-link nav-link text-uppercase"
                                            id="<?= $key ?>-tab"
                                            data-bs-toggle="tab"
                                            data-bs-target="#<?= $key ?>-tab-pane"
                                            type="button" role="tab"
                                            aria-controls="<?= $key ?>-tab-pane"
                                            aria-selected="true"><?= $key ?></button>
                                </li>
								<?php break;
							case "infrastructure":
								?>
                                <li class="section__technologies-nav-item nav-item"
                                    role="presentation">
                                    <button class="section__technologies-nav-link nav-link text-uppercase"
                                            id="<?= $key ?>-tab"
                                            data-bs-toggle="tab"
                                            data-bs-target="#<?= $key ?>-tab-pane"
                                            type="button" role="tab"
                                            aria-controls="<?= $key ?>-tab-pane"
                                            aria-selected="true"><?= $key ?></button>
                                </li>
								<?php break;
						endswitch;

					endforeach;
					?>
                </ul>

                <div class="section__technologies-tab tab-content p-sm-0"
                     id="technologiesDirectionContent">
					<?php
					foreach ( $directions as $key => $direction ):
						switch ( $key ):
							case "front-end":
								?>
                                <div class="tab-pane fade show active"
                                     id="<?= $key ?>-tab-pane"
                                     role="tabpanel"
                                     aria-labelledby="<?= $key ?>-tab"
                                     tabindex="0">
                                    <div class="row align-items-stretch">

										<?php
										foreach ( $direction as $lang ):
											get_template_part( 'template-parts/parts/technologies/technologies',
												null, array( 'id' => $lang ) );
										endforeach;
										?>
                                    </div>
                                </div>
								<?php
								break;

							case "mobile":
								?>
                                <div class="tab-pane fade"
                                     id="<?= $key ?>-tab-pane"
                                     role="tabpanel"
                                     aria-labelledby="<?= $key ?>-tab"
                                     tabindex="0">
                                    <div class="row align-items-stretch">

										<?php
										foreach ( $direction as $lang ):
											get_template_part( 'template-parts/parts/technologies/technologies',
												null, array( 'id' => $lang ) );
										endforeach;
										?>
                                    </div>
                                </div>
								<?php break;
							case "back-end":
								?>

                                <div class="tab-pane fade"
                                     id="<?= $key ?>-tab-pane"
                                     role="tabpanel"
                                     aria-labelledby="<?= $key ?>-tab"
                                     tabindex="0">
                                    <div class="row align-items-stretch">

										<?php
										foreach ( $direction as $lang ):
											get_template_part( 'template-parts/parts/technologies/technologies',
												null, array( 'id' => $lang ) );
										endforeach;
										?>
                                    </div>
                                </div>
								<?php break;
							case "infrastructure":
								?>
                                <div class="tab-pane fade"
                                     id="<?= $key ?>-tab-pane"
                                     role="tabpanel"
                                     aria-labelledby="<?= $key ?>-tab"
                                     tabindex="0">
                                    <div class="row align-items-stretch">

										<?php
										foreach ( $direction as $lang ):
											get_template_part( 'template-parts/parts/technologies/technologies',
												null, array( 'id' => $lang ) );
										endforeach;
										?>
                                    </div>
                                </div>
								<?php break;
						endswitch;

					endforeach;
					?>

                </div>
            </div>
		<?php endif; ?>

    </div>
</section>