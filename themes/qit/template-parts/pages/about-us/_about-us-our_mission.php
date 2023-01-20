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

<section class="section__our_mission section">
    <div class="container ">
		<?php if ( $wrapper ): ?>
            <div class="section__our_mission-row row">
				<?php foreach ( $wrapper as $item ): ?>
                    <div class="col-lg-12  row mx-0 px-0">
						<?php $content           = $item['content'];foreach ( $content as $el ):?>
							<?php switch ( $el['acf_fc_layout'] ):
								case 'image':$image = $el['image']; ?>
                                    <div class="col-lg-6 d-flex  col-img flex-column justify-content-center ">
                                        <img src="<?= $image['url'] ?>" alt="<?= $image['alt'] ?>">
                                    </div>
									<?php
									break;
								case 'text_group':
									$badge = $el['badge'];
									$title = $el['title'];;
									$text = $el['text']; ?>
                                    <div class="col-lg-6 d-flex   col-text flex-column justify-content-center ">
										<?php if ( $badge ): ?>
                                            <div class="section__our_mission-row-el   justify-content-center">
                                                <h6 class="section__our_mission-row-el-badge "><?= $badge ?></h6>
                                            </div>
										<?php endif;if ( $title ): ?>
                                            <div class="section__our_mission-row-el">
                                                <h2 class="section__our_mission-row-el-title"><?= $title ?></h2>
                                            </div>
										<?php endif;if ( $text ): ?>
                                            <div class="section__our_mission-row-el ">
                                                <p class="section__our_mission-row-el-text"><?= $text ?></p>
                                            </div>
										<?php endif; ?></div>
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