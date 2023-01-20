<?php
/**
 * Blog post insert Block Template.
 *
 * @param array  $block      The block settings and attributes.
 * @param string $content    The block inner HTML (empty).
 * @param bool   $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'blog-post-insert-' . $block['id'];
if ( ! empty( $block['anchor'] ) ) {
	$id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'blog-post-insert';
if ( ! empty( $block['className'] ) ) {
	$className .= ' ' . $block['className'];
}
if ( ! empty( $block['align'] ) ) {
	$className .= ' align' . $block['align'];
}

// Load values and assing defaults.

$post_insert_checkbox = get_field( 'blog_post_insert' );
$posts_insert         = get_field( 'post_insert' );
$cases_insert         = get_field( 'case_insert' );

if ( $post_insert_checkbox === 'post' ):
	$post_id = $posts_insert;
else:
	$post_id = $cases_insert;
endif;
?>
<article id="<?= $id ?>" class="<?= $className ?>">
    <a href="<?= get_the_permalink( $post_id ); ?>">
        <img src="<?= get_the_post_thumbnail_url( $post_id ) ?>"
             alt="<?= get_the_title( $post_id ) ?>"
             class="blog-post-insert__img">
    </a>

    <div class="blog-post-insert__text">
		<?php if ( $post_insert_checkbox === 'post' ): ?>
            <a href="<?= get_category_link( get_cat_ID( get_the_category( $post_id )[0]->name ) ) ?>"
               class="blog-post-insert__category">
                <h6><?= get_the_category( $post_id )[0]->name ?></h6>
            </a>
		<?php
		else: ?>
            <a href="<?= get_the_permalink( $post_id ); ?>"><h6><?= __( 'Read our case', 'qit' ) ?></h6></a>

		<?php
		endif;
		?>
        <a href="<?= get_the_permalink( $post_id ); ?>"
           class="blog-post-insert__title">
            <h4><?= get_the_title( $post_id ) ?></h4>
        </a>
    </div>
	<?php


	?>

</article>