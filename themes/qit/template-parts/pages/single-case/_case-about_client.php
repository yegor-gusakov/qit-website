<?php
/*
 * Single case: About Client
 */
defined( 'ABSPATH' ) || exit;

/**
 * Fields
 */
$field        = get_query_var( 'case_single_field' );
$title        = $field['title'];
$text         = $field['text'];
$tags         = $field['tags'];
$logotype     = $field['logotype'];
$terms_technologies = wp_get_post_terms( get_the_id(), array( 'qit_cases_technologies' ) );
?>

<section class="section section__client">
    <div class="container ">
        <div class="section__client-row row">
            <div class="col-lg-8 column-left">
                <div class="row ">
                    <div class="col-12">
                        <div class="section__client-row-title">
                            <h3><?= $title ?></h3>
                        </div>
                        <div class="section__client-row-text">
							<?= $text ?>
                        </div>
                    </div>
                    <div class="col-12 d-flex align-items-center justify-content-center">
                        <ul class="section__client-row-tags list-group list-group-horizontal flex-wrap">
		                    <?php foreach ( $tags as $tag ):$repeater_tag = $tag['repeater_tag'];$repeater_text = $tag['repeater_text']; ?>
                                <li class="section__client-row-tags-item list-group-item border-0">
                                    <p class="d-flex">
                                        <span class="section__client-row-tags-item-name"><?= $repeater_tag ?></span>
                                        <span class="section__client-row-tags-item-text"><?= $repeater_text ?></span>
                                    </p>
                                </li>
		                    <?php endforeach; ?>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 column-right">
                <div class="row ">
                    <?php if( $logotype):?>
                    <div class="col-12 d-flex justify-content-lg-end justify-content-center">
                        <img src="<?= $logotype['url'] ?>" alt="<?= $logotype['alt'] ?>">
                    </div>
                    <?php endif;?>
                    <div class="col-12 d-flex justify-content-lg-end justify-content-center">
                        <ul class="section__client-row-technologies list-group list-group-horizontal flex-wrap justify-content-center  justify-content-md-end">
		                    <?php foreach ( $terms_technologies as $term ) :$tax_icon = get_field( 'technology_icon', $term ); ?>
                                <li class="section__client-row-technologies-item list-group-item border-0 bg-transparent p-0 technology technology-<?= $term->slug ?>"><?= file_get_contents( $tax_icon ) ?></li>
		                    <?php endforeach; ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>