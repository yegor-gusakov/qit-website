<?php
/*
 * Staff Augmentation: Banners
 */
defined( 'ABSPATH' ) || exit;

/**
 * Fields
 */
$field = get_query_var( 'staff_augmentation_field' );
$contact_image_of_text = $field['contact_image_of_text'];
$image = $field['contact_image'];

get_template_part( 'template-parts/parts/banners/banner', $field['banner'],
	array(
		'contact_image_of_text' => $contact_image_of_text,
		'information'           => $field,
		'image'=>$image

	) );
?>


