<?php
/**
 * Blog notes Block Template.
 *
 * @param array  $block      The block settings and attributes.
 * @param string $content    The block inner HTML (empty).
 * @param bool   $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'blog-notes-' . $block['id'];
if ( ! empty( $block['anchor'] ) ) {
	$id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'blog-notes';
if ( ! empty( $block['className'] ) ) {
	$className .= ' ' . $block['className'];
}
if ( ! empty( $block['align'] ) ) {
	$className .= ' align' . $block['align'];
}

// Load values and assing defaults.
$text      = get_field( 'blog_notes' ) ?: 'Blog note here...';
$title     = get_field( 'blog_notes_heading' ) ?: 'Blog note title here...';
$lamp_icon = get_stylesheet_directory()
             . '/assets/userfiles/icons/notes.svg';
?>
<aside id="<?= $id ?>" class="<?= $className ?>">
	<?= file_get_contents( $lamp_icon ) ?>
    <div class="wrapper">
        <h4><?= $title ?></h4>
        <?= $text ?>
    </div>

</aside>