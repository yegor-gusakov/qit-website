<?php
/*
 * Dedicated: Portfolio
 */
defined( 'ABSPATH' ) || exit;

/**
 * Fields
 */
$field = get_query_var( 'dedicated_team_field' );
$badge = $field['badge'];
$title = $field['title'];
$angle = get_template_directory_uri() . '/assets/userfiles/icons/angle.svg';
/**
 * Query cases
 */
$args = array(
	'post_type'      => 'qit_cases',
	'posts_per_page' => 2,
	'orderby'        => 'date',
	'order'          => 'DESC'
);
$query = new WP_Query( $args );
?>
<section class="section__portfolio section" id="timeline">
    <div class="container ">
		<?php if ( $badge ): ?>
            <div class="section__portfolio-row row justify-content-center">
                <h6 class="section__portfolio-row-badge m-0 w-auto text-white text-uppercase">
					<?= $badge ?>
                </h6>
            </div>
		<?php endif ?>
		<?php if ( $title ): ?>
            <div class="section__portfolio-row row text-center">
                <h2 class="section__portfolio-row-title"><?= $title ?></h2>
            </div>
		<?php endif ?>
		<?php if ( $query->have_posts() ) : ?>
            <div class="section__portfolio-row row row-cols-1 row-cols-md-3 g-4 justify-content-center">
				<?php while ( $query->have_posts() ) :$query->the_post();get_template_part( 'template-parts/parts/cases/cases' );endwhile;wp_reset_postdata(); ?>
            </div>
		<?php endif; ?>
        <div class="section__portfolio-row-more row justify-content-end">
            <div class="col-lg-2 w-auto">
                <a href="<?php echo get_post_type_archive_link( 'qit_cases' ); ?>"><?= __( 'All cases', 'qit' )  . file_get_contents( $angle ) ?></a>
            </div>
        </div>
    </div>
</section>