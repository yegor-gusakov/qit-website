<?php
/**
 * A template partial to output pagination for the Twenty Twenty default theme.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage Twenty_Twenty
 * @since Twenty Twenty 1.0
 */

/**
$prev_text = sprintf(
	'%s <span class="nav-prev-text">%s</span>',
	'<span aria-hidden="true">&larr;</span>',

	__( 'Newer <span class="nav-short">Posts</span>', 'qit' );
);
$next_text = sprintf(
	'<span class="nav-next-text">%s</span> %s',

	__( 'Older <span class="nav-short">Posts</span>', 'qit' ),
	'<span aria-hidden="true">&rarr;</span>'
);
**/
$posts_pagination = get_the_posts_pagination(
	array(
		'mid_size'  => 1,

	)
);

// If we're not outputting the previous page link, prepend a placeholder with `visibility: hidden` to take its place.
if ( strpos( $posts_pagination, 'prev page-numbers' ) === false ) {
	$posts_pagination = str_replace( '<div class="nav-links">', '<div class="section__blog-row__pagination"><span class="prev page-numbers" aria-hidden="true"></span>', $posts_pagination );
}

// If we're not outputting the next page link, append a placeholder with `visibility: hidden` to take its place.
if ( strpos( $posts_pagination, 'next page-numbers' ) === false ) {
	$posts_pagination = str_replace( '</div>', '<span class="next page-numbers" aria-hidden="true"></span></div>', $posts_pagination );
}

if ( $posts_pagination ) { ?>

	<div class="pagination-wrapper section-inner">

		<hr class="styled-separator pagination-separator is-style-wide" aria-hidden="true" />

		<?php echo $posts_pagination; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- already escaped during generation. ?>

	</div><!-- .pagination-wrapper -->

	<?php
}
