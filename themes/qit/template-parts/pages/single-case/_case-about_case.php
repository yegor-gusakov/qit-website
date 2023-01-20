<?php
/*
 * Single case: About Case
 */
defined( 'ABSPATH' ) || exit;

/**
 * Fields
 */
$field   = get_query_var( 'case_single_field' );
$wrapper = $field['wrapper'];
?>

<section class="section section__about_case">
    <div class="container ">
		<?php if ( $wrapper ): ?>
            <div class="section__about_case-row row">
				<?php foreach ( $wrapper as $item ): ?>
                    <div class="col-lg-12 row mx-0 px-0">
						<?php
						$content = $item['content'];
						foreach ( $content as $el ):?>
							<?php
							switch ( $el['acf_fc_layout'] ):
								case 'image':$image = $el['image']; ?>
                                    <div class="col-lg-6 col-12 d-flex  col-img flex-column justify-content-center ">
                                        <img src="<?= $image['url'] ?>" alt="<?= $image['alt'] ?>">
                                    </div>
									<?php
									break;
								case 'text_group':
									$title = $el['title'];;
									$text = $el['text']; ?>
                                    <div class="col-lg-6 col-12 d-flex   col-text flex-column">
										<?php if ( $title ): ?>
                                            <div class="section__about_case-row-el">
                                                <h3 class="section__about_case-row-el-title"><?= $title ?></h3>
                                            </div>
										<?php endif;
										if ( $text ): ?>
                                            <div class="section__about_case-row-el-text ">
												<?= $text ?>
                                            </div>
										<?php endif; ?>
                                    </div>
									<?php break;endswitch; ?>
						<?php endforeach; ?>
                    </div>
				<?php endforeach; ?>
            </div>
		<?php endif; ?>
    </div>
</section>