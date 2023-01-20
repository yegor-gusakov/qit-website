<?php
/*
 * Work at qit: Banners
 */
defined( 'ABSPATH' ) || exit;

/**
 * Fields
 */
$field                 = get_query_var( 'work_at_qit_field' );
get_template_part( 'template-parts/parts/banners/banner', $field['banner'],array('information'=>$field));
?>


