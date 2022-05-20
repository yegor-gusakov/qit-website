<?php
/*
 * About us: Our Mission
 */
defined( 'ABSPATH' ) || exit;

/**
 * Fields
 */
$field   = get_query_var( 'about_us_field' );
$wrapper = $field['wrapper'];
?>

<section class="section__our_mission section" id="timeline">
    <div class="container ">
		<?php if ( $wrapper ): ?>
            <div class="section__our_mission-row">
				<?php foreach (
					$wrapper

					as $item
				): ?>
                    <div class="col-lg-12 section__our_mission-row-row row">
						<?php
						$content           = $item['content'];
						//						print_r($content);
						foreach (
							$content

							as $el
						):
							?>
							<?php
							switch ( $el['acf_fc_layout'] ):
								case 'image':
									$image = $el['image'];
									?>
                                    <div class="col-lg-6 d-flex  col-img flex-column justify-content-center ">

                                        <img src="<?= $image['url'] ?>"
                                             alt="<?= $image['alt'] ?>">
                                    </div>
									<?php
									break;
								case 'text_group':
									$badge = $el['badge'];
									$title = $el['title'];;
									$text = $el['text']; ?>

                                    <div class="col-lg-6 d-flex col-text flex-column justify-content-center ">
										<?php
										if ( $badge ): ?>
                                            <div class="section__our_mission-row-el-badge  row justify-content-center">
                                                <h6 class="section__worldwide-row-badge m-0 w-auto text-white text-uppercase"><?= $badge ?></h6>
                                            </div>
										<?php endif;
										if ( $title ): ?>
                                            <div class="section__our_mission-row-el-title row text-center">
                                                <h2 class="section__our_mission-row-title"><?= $title ?></h2>
                                            </div>
										<?php endif;
										if ( $text ): ?>
                                            <div class="section__our_mission-row-el-text text-center">
                                                <p class="section__our_mission-row-text"><?= $text ?></p>
                                            </div>
										<?php endif;
										?>                            </div>
									<?php
									break;
							endswitch;
							?>


						<?php endforeach; ?>

                    </div>
				<?php endforeach; ?>

            </div>
		<?php endif; ?>

    </div>
</section>