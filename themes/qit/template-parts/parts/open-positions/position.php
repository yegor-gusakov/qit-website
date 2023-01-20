<?php
$terms_technologies = wp_get_post_terms( get_the_id(), array( 'qit_cases_technologies' ) );
$terms_tags         = wp_get_post_terms( get_the_id(), array( 'qit_open_position_tags' ) );
$arrow_right        = get_template_directory_uri() . '/assets/userfiles/icons/arrow-right-small.svg';
?>
<div class="col-12 position">
    <div class="card">
        <a href="<?php the_permalink()?>">
            <div class="card-body">
                <h3 class="card-title"><?= get_the_title() ?></h3>
                <div class="excerpt">
                    <p class="card-text "><?= get_the_excerpt() ?></p>
                    <ul class="card-technologies d-flex  ">
						<?php foreach ( $terms_technologies as $term ) :$tax_icon = get_field( 'technology_icon', $term ); ?>
                            <li class="technology technology-<?= $term->slug ?>"><?= file_get_contents( $tax_icon ) ?></li>
						<?php endforeach; ?>
                    </ul>
                </div>
                <div class="card-bottom">
                    <?php /**?>
                    <p class="card-text tags ">
						<?php foreach ( $terms_tags as $term ) : ?>
                            <span class="tag-<?= $term->slug ?>"><?= $term->name ?></span>
						<?php endforeach; ?>
                    </p>
                      <?php */?>

                    <p class="card-text details"><?= __( 'View details' ,'qit') . file_get_contents( $arrow_right ) ?></p>
                </div>
            </div>
        </a>
    </div>
</div>