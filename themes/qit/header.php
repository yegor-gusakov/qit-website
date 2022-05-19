<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package qit
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">
    <link rel="shortcut icon" href="<?php echo get_stylesheet_directory_uri(); ?>/favicon.ico" />

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

	<?php
	/**
	 * header_parts hook
	 *
	 * @hooked qit_header_TagHeaderOpen - 10
	 * @hooked qit_header_TagHeaderInner - 20
	 * @hooked qit_header_TagHeaderClose - 30
	 *
	 */
	do_action('header_parts');
	?>
    <!-- CONTENT -->
    <main id="fullpage">