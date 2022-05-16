<?php
/*
 * Home: Advantages
 */
defined( 'ABSPATH' ) || exit;

/**
 * Fields
 */
$field         = get_query_var( 'home_field' );
$badge         = $field['badge'];
$title         = $field['title'];
$tags_repeater = $field['tags_repeater'];
//print_r( $tags_repeater );
?>
<section class="section section__advantages">

    <div class="container">
        <div class="section__advantages-row row justify-content-center"><h6
                    class="section__advantages-row-badge  w-auto text-white text-uppercase"><?= $badge ?></h6>
        </div>
        <div class="section__advantages-row row text-center">
            <h2 class="section__advantages-row-title"><?= $title ?></h2>
        </div>
		<?php
		// Check rows exists.
		if ( $tags_repeater ):

			?>
            <div class="section__advantages-row row row-cols-1 row-cols-md-4 g-4">

				<?php
				// Loop through rows.
				foreach ( $tags_repeater as $tag ):
					$tag_title = $tag['title'];
					$tag_text = $tag['text'];
					$tag_image = $tag['image'];
					?>
                    <div class="section__advantages-row-advantage col">
                        <div class="card border-0">
                            <div class="card-body text-center pt-5">
                                <h5 class="card-title"><?= $tag_title ?></h5>
                                <p class="card-text"><?= $tag_text ?></p>
                            </div>
                            <img src="<?= $tag_image['url'] ?>"
                                 class="card-img-top" alt="...">

                        </div>
                    </div>
				<?php endforeach; ?>

            </div>
		<?php endif; ?>

    </div>
</section>
