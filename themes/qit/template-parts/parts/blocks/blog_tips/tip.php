<?php
/**
* Blog tip Block Template.
*
* @param   array $block The block settings and attributes.
* @param   string $content The block inner HTML (empty).
* @param   bool $is_preview True during AJAX preview.
* @param   (int|string) $post_id The post ID this block is saved to.
*/

// Create id attribute allowing for custom "anchor" value.
$id = 'blog-tip-' . $block['id'];
if( !empty($block['anchor']) ) {
$id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'blog-tip';
if( !empty($block['className']) ) {
$className .= ' ' . $block['className'];
}
if( !empty($block['align']) ) {
$className .= ' align' . $block['align'];
}

// Load values and assing defaults.
$text = get_field('blog_tip_text') ?: 'Blog tip here...';
$lamp_icon =get_stylesheet_directory()
            . '/assets/userfiles/icons/tips.svg';
?>
<aside id="<?=$id?>" class="<?=$className ?>" >
   <?= file_get_contents($lamp_icon)?>
    <p> <?=$text?></p>
</aside>