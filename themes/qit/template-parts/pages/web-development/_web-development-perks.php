<?php
/*
 * WebDevelopment: Perks
 */
defined( 'ABSPATH' ) || exit;

/**
 * Fields
 */
$field     = get_query_var( 'web_development_field' );
$badge     = $field['badge'];
$title     = $field['title'];
$text      = $field['text'];
$perks_row = $field['perks_row'];
$button = $field['button'];

$checkmark = get_template_directory_uri()
             . '/assets/userfiles/icons/checkmark2.svg';
?>
<section class="section section__perks">
    <div class="container">
		<?php if ( $badge ): ?>
            <div class="section__perks-row row justify-content-center">
                <h6 class="section__perks-row-badge m-0  w-auto text-white text-uppercase"><?= $badge ?></h6>
            </div>
		<?php endif; ?>
		<?php if ( $title ): ?>
            <div class="section__perks-row row text-center">
                <h2 class="section__perks-row-title"><?= $title ?></h2>
            </div>
		<?php endif; ?>
		<?php if ( $text ): ?>
            <div class="section__perks-row row justify-content-center">
                <p class="section__perks-row-text m-0"><?= $text ?></p>
            </div>
		<?php endif; ?>
		<?php if ( $perks_row ): ?>
            <div class="section__perks-row row mt-0 ">
				<?php
				foreach ( $perks_row as $item ):
					$item_part = $item['acf_fc_layout'];

					switch ( $item_part ):
						case 'image':
							$image = $item['perk_image']; ?>
                            <div class="col-lg-5 col-12  perk-img">
                                <img src="<?= $image['url'] ?>"
                                     alt="<?= $image['alt'] ?>">
                            </div>
							<?php
							break;
						case 'list':
							$perk_list_repeater = $item['perk_list_repeater'];
							?>
                            <div class="col-lg-7 col-12 perk-list">
                                <ul>
									<?php
									foreach ( $perk_list_repeater as $list ):
										echo '<li>'
										     . file_get_contents( $checkmark )
										     . $list['text'] . '</li>';
									endforeach;
									?>
                                </ul>
                            </div>

							<?php
							break;endswitch;
				endforeach;
				?>
            </div>
		<?php endif; ?>
	    <?php if ( $button ): ?>
            <div class="section__perks-row row justify-content-center">
                <div class="col-12 col-md-12">
                    <button class="btn button globalModalQuote"><?= $button['title'] ?></button>
                </div>
            </div>
	    <?php endif; ?>


    </div>
</section>
