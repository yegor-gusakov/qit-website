<?php
$terms_technologies = wp_get_post_terms( get_the_id(), array( 'qit_cases_technologies' ) );
$terms_tags         = wp_get_post_terms( get_the_id(), array( 'qit_cases_tags' ) );
$arrow_right        = get_template_directory_uri() . '/assets/userfiles/icons/arrow-right-small.svg';
$post_id = get_the_ID(); //specify post id here
$post = get_post($post_id);
$slug = $post->post_name;
?>
<div class="col-lg-6 col-sm-6 col-md-6 col-12 case case-<?= $slug?>">
    <div class="card ">
        <a href="<?php the_permalink(); ?>">
            <img src="<?= get_the_post_thumbnail_url() ?>" class="card-img-top" alt="<?= get_the_title() ?>" width="550" height="250">
            <div class="card-body">
                <div class="card-body-top d-flex justify-content-between">
                    <p class="card-text mb-lg-0 ">
						<?php foreach ( $terms_tags as $term ) : ?>
                            <span class="tags tags-<?= $term->slug ?>"><?= $term->name ?></span>
						<?php endforeach; ?>
                    </p>
                    <ul class="card-technologies d-flex">
						<?php foreach ( $terms_technologies as $term ) :
							$tax_icon = get_field( 'technology_icon', $term ); ?>
                            <li class="technology technology-<?= $term->slug ?>"><?= file_get_contents( $tax_icon ) ?></li>
						<?php endforeach; ?>
                    </ul>
                </div>
                <h3 class="card-title"><?= get_the_title() ?></h3>
                <div class="excerpt">
                    <p class="card-text "><?= excerpt( 10 ); ?></p>
                </div>
				<?php /**?>
				 * <p class="card-text detail">
				 * __( 'View details' )
				 * . file_get_contents( $arrow_right ) ?></p>
				 *  **/ ?>
            </div>
        </a>
    </div>
</div>