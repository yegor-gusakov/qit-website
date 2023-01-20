<?php
$size = array('width' => 600, 'height' => 400, "crop" => true);
$total_width = 600 - $options['block_padding_left'] - $options['block_padding_right'];
$column_width = $total_width / 2 - 20;

$title_style = TNP_Composer::get_style($options, 'title', $composer, 'title', ['scale' => .8]);
$text_style = TNP_Composer::get_style($options, '', $composer, 'text');

$items = [];
?>
<style>
    .title {
        font-family: <?php echo $title_style->font_family ?>;
        font-size: <?php echo $title_style->font_size ?>px;
        font-weight: <?php echo $title_style->font_weight ?>;
        color: <?php echo $title_style->font_color ?>;
        line-height: 1.3em;
        padding: 15px 0 0 0;
    }

    .excerpt {
        font-family: <?php echo $text_style->font_family ?>;
        font-size: <?php echo $text_style->font_size ?>px;
        font-weight: <?php echo $text_style->font_weight ?>;
        color: <?php echo $text_style->font_color ?>;
        line-height: 1.4em;
        padding: 5px 0 0 0;
    }

    .meta {
        font-family: <?php echo $text_style->font_family ?>;
        color: <?php echo $text_style->font_color ?>;
        font-size: <?php echo round($text_style->font_size * 0.9) ?>px;
        font-weight: <?php echo $text_style->font_weight ?>;
        padding: 10px 0 0 0;
        font-style: italic;
        line-height: normal !important;
    }
    .button {
        padding: 15px 0;
    }
    .column-left {
        padding-right: 10px; 
        padding-bottom: 20px;
    }
    .column-right {
        padding-left: 10px; 
        padding-bottom: 20px;
    }

</style>


<?php foreach ($posts AS $p) { ?>
    <?php
    $media = null;
    if ($show_image) {
        $media = tnp_composer_block_posts_get_media($p, $size, $image_placeholder_url);
        if ($media) {
            $media->link = tnp_post_permalink($p);
            $media->set_width($column_width);
        }
    }

    $meta = [];

    if ($show_date) {
        $meta[] = tnp_post_date($p);
    }

    if ($show_author) {
        $author_object = get_user_by('id', $p->post_author);
        if ($author_object) {
            $meta[] = $author_object->display_name;
        }
    }
	if ( $show_rekki_tags ) {
		$post_term_tags_ = get_the_terms( $p->ID, 'qit_posts_tags' );
		if ( $post_term_tags_ ) {
			foreach ( $post_term_tags_ as $post_term_tag_ ):
				$post_term_tag[] = $post_term_tag_->name;
			endforeach;
		}
	}
	if ( $show_rekki_min_read ) :
		$post_rekki_min_read = get_post_meta( $p->ID, 'minutes_to_read' );

		if ( $post_rekki_min_read ):
			$rekki_min_read = $post_rekki_min_read[0];
		endif;
	endif;
    $button_options['button_url'] = tnp_post_permalink($p);
    ob_start();
    ?>
	<?php if ( $media ) { ?>
        <table width="100%" cellpadding="0" cellspacing="0" border="0"
               style="margin-bottom: 20px">
            <tr>
                <td align="center" style="position:relative!important;">
					<?php echo TNP_Composer::image( $media ) ?>
					<?php if ( $show_read_more_button ) { ?>
                     <?php echo TNP_Composer::button( $button_options ) ?>
					<?php } ?>
                </td>
            </tr>


        </table>
	<?php } ?>

    <table width="100%" cellpadding="0" cellspacing="0" border="0"
           class="responsive" style="margin: 0;">
        <tr>
            <td>

                <table border="0" cellspacing="0" cellpadding="0" width="100%">
                    <tr>

                        <td align="left">
			                <?php foreach ( $post_term_tag as $post_term_tag_name ):?>
                                <span class="tag" style="margin-right:5px;font-weight: 400;font-size: 14px;line-height: 20px;color: #363636;opacity: 0.5;"><?= $post_term_tag_name?></span>
			                <?php
			                endforeach; ?>
                        </td>
                    </tr>

                    <tr>
                        <td align="<?php echo $align_left ?>"
                            inline-class="title"
                            class="tnpc-row-edit tnpc-inline-editable"
                            data-type="title" data-id="<?php echo $p->ID ?>"
                            dir="<?php echo $dir ?>">

							<?php
							echo TNP_Composer::is_post_field_edited_inline( $options['inline_edits'],
								'title', $p->ID )
								?
								TNP_Composer::get_edited_inline_post_field( $options['inline_edits'],
									'title', $p->ID )
								:
								tnp_post_title( $p )
							?>
                        </td>

					<?php if ( $meta ) { ?>
                        <tr>
                            <td align="<?php echo $align_left ?>"
                                inline-class="meta">
                                <svg width="14" height="14" viewBox="0 0 14 14"
                                     fill="none"
                                     xmlns="https://www.w3.org/2000/svg">
                                    <path d="M7.0013 8.16667C7.11667 8.16667 7.22946 8.13245 7.32539 8.06836C7.42131 8.00426 7.49608 7.91316 7.54023 7.80657C7.58438 7.69998 7.59594 7.58269 7.57343 7.46953C7.55092 7.35637 7.49536 7.25243 7.41378 7.17085C7.3322 7.08927 7.22826 7.03372 7.11511 7.01121C7.00195 6.9887 6.88466 7.00025 6.77807 7.0444C6.67148 7.08855 6.58038 7.16332 6.51628 7.25925C6.45218 7.35518 6.41797 7.46796 6.41797 7.58333C6.41797 7.73804 6.47943 7.88642 6.58882 7.99581C6.69822 8.10521 6.84659 8.16667 7.0013 8.16667ZM9.91797 8.16667C10.0333 8.16667 10.1461 8.13245 10.2421 8.06836C10.338 8.00426 10.4127 7.91316 10.4569 7.80657C10.501 7.69998 10.5126 7.58269 10.4901 7.46953C10.4676 7.35637 10.412 7.25243 10.3304 7.17085C10.2489 7.08927 10.1449 7.03372 10.0318 7.01121C9.91862 6.9887 9.80133 7.00025 9.69474 7.0444C9.58815 7.08855 9.49704 7.16332 9.43295 7.25925C9.36885 7.35518 9.33464 7.46796 9.33464 7.58333C9.33464 7.73804 9.39609 7.88642 9.50549 7.99581C9.61489 8.10521 9.76326 8.16667 9.91797 8.16667ZM7.0013 10.5C7.11667 10.5 7.22946 10.4658 7.32539 10.4017C7.42131 10.3376 7.49608 10.2465 7.54023 10.1399C7.58438 10.0333 7.59594 9.91602 7.57343 9.80286C7.55092 9.68971 7.49536 9.58577 7.41378 9.50419C7.3322 9.42261 7.22826 9.36705 7.11511 9.34454C7.00195 9.32203 6.88466 9.33359 6.77807 9.37774C6.67148 9.42189 6.58038 9.49666 6.51628 9.59258C6.45218 9.68851 6.41797 9.80129 6.41797 9.91667C6.41797 10.0714 6.47943 10.2197 6.58882 10.3291C6.69822 10.4385 6.84659 10.5 7.0013 10.5ZM9.91797 10.5C10.0333 10.5 10.1461 10.4658 10.2421 10.4017C10.338 10.3376 10.4127 10.2465 10.4569 10.1399C10.501 10.0333 10.5126 9.91602 10.4901 9.80286C10.4676 9.68971 10.412 9.58577 10.3304 9.50419C10.2489 9.42261 10.1449 9.36705 10.0318 9.34454C9.91862 9.32203 9.80133 9.33359 9.69474 9.37774C9.58815 9.42189 9.49704 9.49666 9.43295 9.59258C9.36885 9.68851 9.33464 9.80129 9.33464 9.91667C9.33464 10.0714 9.39609 10.2197 9.50549 10.3291C9.61489 10.4385 9.76326 10.5 9.91797 10.5ZM4.08464 8.16667C4.20001 8.16667 4.31279 8.13245 4.40872 8.06836C4.50465 8.00426 4.57941 7.91316 4.62357 7.80657C4.66772 7.69998 4.67927 7.58269 4.65676 7.46953C4.63425 7.35637 4.5787 7.25243 4.49711 7.17085C4.41553 7.08927 4.31159 7.03372 4.19844 7.01121C4.08528 6.9887 3.96799 7.00025 3.8614 7.0444C3.75481 7.08855 3.66371 7.16332 3.59961 7.25925C3.53551 7.35518 3.5013 7.46796 3.5013 7.58333C3.5013 7.73804 3.56276 7.88642 3.67216 7.99581C3.78155 8.10521 3.92993 8.16667 4.08464 8.16667ZM11.0846 2.33333H10.5013V1.75C10.5013 1.59529 10.4398 1.44692 10.3304 1.33752C10.2211 1.22812 10.0727 1.16667 9.91797 1.16667C9.76326 1.16667 9.61489 1.22812 9.50549 1.33752C9.39609 1.44692 9.33464 1.59529 9.33464 1.75V2.33333H4.66797V1.75C4.66797 1.59529 4.60651 1.44692 4.49711 1.33752C4.38772 1.22812 4.23935 1.16667 4.08464 1.16667C3.92993 1.16667 3.78155 1.22812 3.67216 1.33752C3.56276 1.44692 3.5013 1.59529 3.5013 1.75V2.33333H2.91797C2.45384 2.33333 2.00872 2.51771 1.68053 2.8459C1.35234 3.17408 1.16797 3.6192 1.16797 4.08333V11.0833C1.16797 11.5475 1.35234 11.9926 1.68053 12.3208C2.00872 12.649 2.45384 12.8333 2.91797 12.8333H11.0846C11.5488 12.8333 11.9939 12.649 12.3221 12.3208C12.6503 11.9926 12.8346 11.5475 12.8346 11.0833V4.08333C12.8346 3.6192 12.6503 3.17408 12.3221 2.8459C11.9939 2.51771 11.5488 2.33333 11.0846 2.33333ZM11.668 11.0833C11.668 11.238 11.6065 11.3864 11.4971 11.4958C11.3877 11.6052 11.2393 11.6667 11.0846 11.6667H2.91797C2.76326 11.6667 2.61489 11.6052 2.50549 11.4958C2.39609 11.3864 2.33464 11.238 2.33464 11.0833V5.83333H11.668V11.0833ZM11.668 4.66667H2.33464V4.08333C2.33464 3.92862 2.39609 3.78025 2.50549 3.67085C2.61489 3.56146 2.76326 3.5 2.91797 3.5H11.0846C11.2393 3.5 11.3877 3.56146 11.4971 3.67085C11.6065 3.78025 11.668 3.92862 11.668 4.08333V4.66667ZM4.08464 10.5C4.20001 10.5 4.31279 10.4658 4.40872 10.4017C4.50465 10.3376 4.57941 10.2465 4.62357 10.1399C4.66772 10.0333 4.67927 9.91602 4.65676 9.80286C4.63425 9.68971 4.5787 9.58577 4.49711 9.50419C4.41553 9.42261 4.31159 9.36705 4.19844 9.34454C4.08528 9.32203 3.96799 9.33359 3.8614 9.37774C3.75481 9.42189 3.66371 9.49666 3.59961 9.59258C3.53551 9.68851 3.5013 9.80129 3.5013 9.91667C3.5013 10.0714 3.56276 10.2197 3.67216 10.3291C3.78155 10.4385 3.92993 10.5 4.08464 10.5Z"
                                          fill="#363636"></path>
                                </svg>
                                <span class="date"
                                      style="font-style: normal;font-weight: 400;font-size: 14px;line-height: 20px;color: #363636;border-right: 1px solid rgba(54,54,54,.15); padding-right: 24px;   margin-right: 24px;"><?php echo esc_html( implode( ' - ',
										$meta ) ) ?></span>

                                <span class="read"
                                      style="font-style: normal;font-weight: 400;font-size: 14px;line-height: 20px;color: #363636;opacity: 0.6;"><?= $rekki_min_read ?></span>

                            </td>
                        </tr>
					<?php } ?>

					<?php if ( $excerpt_length ) { ?>
                        <tr>
                            <td align="<?php echo $align_left ?>"
                                inline-class="excerpt"
                                class="tnpc-row-edit tnpc-inline-editable"
                                data-type="text"
                                data-id="<?php echo $p->ID ?>"
                                dir="<?php echo $dir ?>">
								<?php
								echo TNP_Composer::is_post_field_edited_inline( $options['inline_edits'],
									'text', $p->ID )
									?
									TNP_Composer::get_edited_inline_post_field( $options['inline_edits'],
										'text', $p->ID )
									:
									tnp_post_excerpt( $p, $excerpt_length )
								?>
                            </td>
                        </tr>
					<?php } ?>

                    <tr>
                        <td style="padding: 10px">&nbsp;</td>
                    </tr>
                </table>

            </td>
        </tr>
    </table>
    <?php
    $items[] = ob_get_clean();
}
?>


<?php echo TNP_Composer::grid($items, ['width' => $total_width, 'responsive' => true, 'padding' => 5]) ?>



