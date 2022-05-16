<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package qit
 */

?>


<?php
/**
 * footer_parts hook
 *
 * @hooked qit_footer_TagFooterForm - 10
 * @hooked qit_footer_TagFooterOpen - 20
 * @hooked qit_footer_TagFooterInner - 30
 * @hooked qit_footer_TagFooterClose - 100
 *
 */
do_action('footer_parts');
?>

</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
