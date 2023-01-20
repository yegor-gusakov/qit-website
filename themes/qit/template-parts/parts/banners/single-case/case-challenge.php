<?php
$left       = $args['flawed_left'];
$right      = $args['flawed_right'];
$dot        = get_template_directory_uri() . '/assets/userfiles/icons/dot.svg';
$image_text = $args['flawed_right']['image_or_text'];
?>
<section class="section section__flawed"
         style="background-image:url( <?= $args['flawed_background_image'] ?>); background-position:center center;">
    <div class="container">
        <div class="section__flawed-row row">
            <div class="<?= ( $image_text == 'text' ) ? 'col-lg-8'
				: 'col-lg-7' ?> col-12">
                <div class="section__flawed-row-title">
                    <h3> <?= $left['flawed_title'] ?></h3>
                </div>
                <div class="section__flawed-row-text">
					<?= $left['flawed_text'] ?>
                </div>
            </div>
			<?php if ( $image_text == 'repeater' ): ?>
                <div class="col-lg-4 col-12">
                    <h4 class="section__flawed-row-heading"><?= $right['flawed_right_heading'] ?></h4>
					<?php if ( $right['flawed_right_repeater'] ) :echo '<ul class="section__flawed-row-list">';
						foreach ( $right['flawed_right_repeater'] as $short ) :
							echo '<li class="section__flawed-row-list-short">'
							     . file_get_contents( $dot ) . '<p>'
							     . $short['title'] . '</p></li>';endforeach;
						echo '</ul>';endif; ?>
                </div>
			<?php endif ?><?php if ( $image_text == 'text' ): ?>
                <div class="col-lg-4 col-12">
                    <h4 class="section__flawed-row-heading"><?= $right['flawed_right_heading'] ?></h4>
                    <div class="section__flawed-row-text"><?= $right['text']?></div>
                </div>
			<?php endif ?>
			<?php if ( $image_text == 'image' ): ?>
                <div class="col-lg-5 col-12">
                    <img src="<?= $args['flawed_right']['flawed_right_image']['url'] ?>"
                         alt="<?= $args['flawed_right']['flawed_right_image']['alt'] ?>">
                </div>
			<?php endif ?>
        </div>
    </div>
</section>