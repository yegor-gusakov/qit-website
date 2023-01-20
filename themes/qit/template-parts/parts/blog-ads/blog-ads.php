<?php
$id               = $args['id'];
$image_text       = get_field( 'image_text', $id );
$title            = get_the_title( $id );
$text             = get_field( 'text', $id );
$background_image = get_field( 'background_image', $id );
$header_text      = get_field( 'header_text', $id );
$header_image     = get_field( 'header_image', $id );
$button           = get_field( 'button', $id );
?>

<div class="card text-bg-dark col-content-post-banner">
    <img src="<?= $background_image ?>" class="card-img" alt="<?= $title ?>">
    <div class="card-img-overlay col-content-post-banner-background">
		<?php
		if ( $image_text ):
			if ( $image_text == 'image' ):?>

                <img src="<?= $header_image['url'] ?>"
                     alt="<?= $header_image['alt'] ?>" class="col-content-post-banner-header img">
			<?php
            elseif ( $image_text == 'text' ):

				?>
                <h6 class="col-content-post-banner-header text"><?= $header_text ?></h6>
			<?php
			endif;
		endif;
		?>
        <h3 class="card-title col-content-post-banner-title"><?= $title ?></h3>
        <p class="card-text col-content-post-banner-text"><?= $text ?></p>
        <a href="<?= $button['url'] ?>" class="button btn"
               ><?= $button['title'] ?>
        </a>
    </div>
</div>

