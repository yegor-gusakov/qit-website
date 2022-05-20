<?php
/*
 * About Us: Banners
 */
defined( 'ABSPATH' ) || exit;

/**
 * Fields
 */
$field = get_query_var( 'about_us_field' );
$contact_image_of_text = $field['contact_image_of_text'];
get_template_part( 'template-parts/parts/banners/banner', $field['banner'],array( 'contact_image_of_text' => $contact_image_of_text )  );
?>


