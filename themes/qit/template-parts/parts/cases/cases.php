<?php
$terms_technologies = wp_get_post_terms( get_the_id(),
	array( 'qit_cases_technologies' ) );
$terms_tags         = wp_get_post_terms( get_the_id(),
	array( 'qit_cases_tags' ) );
$arrow_right = get_stylesheet_directory() . '/assets/userfiles/icons/arrow-right-small.svg';
?>

<div class="col">
    <div class="card text-center p-4 border-0">
        <a href="<?= get_permalink() ?>">
            <img src="<?= get_the_post_thumbnail_url() ?>" class="card-img-top mb-4"
                 alt="<?= get_the_title() ?>">
            <div class="card-body p-0">
                <p class="card-text ">
					<?php foreach ( $terms_tags as $term ) :?>
                        <span class="tags tags-<?=$term->slug?>"><?= $term->name ?></span>
					<?php endforeach; ?>
                </p>

                <h6 class="card-title"><?= get_the_title() ?></h6>
                <p class="card-text excerpt mb-5"><?= get_the_excerpt() ?></p>
                <ul class="card-technologies d-flex justify-content-evenly mb-4 ">
					<?php foreach ( $terms_technologies as $term ) :
						$tax_icon = get_field( 'technology_icon', $term );
						?>
                        <li class="technology technology-<?=$term->slug?>"><?= file_get_contents( $tax_icon ) ?></li>

					<?php endforeach; ?>


                </ul>
                <p class="card-text detail"><?= __( 'View details' ).'&nbsp;' .file_get_contents($arrow_right)?></p>
            </div>
        </a>
    </div>
</div>