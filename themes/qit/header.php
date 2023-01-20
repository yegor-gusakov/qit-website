<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link    https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package qit
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
    <!-- Google Tag Manager -->
    <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
                new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
            j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
            'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
        })(window,document,'script','dataLayer','GTM-K79LVKT');</script>
    <!-- End Google Tag Manager -->
    <!-- Google Optimizer -->
    <script src="https://www.googleoptimize.com/optimize.js?id=OPT-KKPB4Q8"></script>
    <!-- End Google Optimizer -->
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="https://gmpg.org/xfn/11">
    <link rel="shortcut icon"
          href="<?php echo get_stylesheet_directory_uri(); ?>/favicon.ico"/>
    <meta name="facebook-domain-verification" content="c4a2ccz1qioayr791hapn9o15ymjlr" />
    <?php wp_head(); ?>

<!--    Google Analytics-->
        <script async src="https://www.googletagmanager.com/gtag/js?id=G-BP5C7BP22K"></script>
        <script>
            window.dataLayer = window.dataLayer || [];
            function gtag(){dataLayer.push(arguments);}
            gtag('js', new Date());

            gtag('config', 'G-BP5C7BP22K');
        </script>
        <!-- Hotjar Tracking Code for https://qit.software -->
        <script>
            (function(h,o,t,j,a,r){
                h.hj=h.hj||function(){(h.hj.q=h.hj.q||[]).push(arguments)};
                h._hjSettings={hjid:3063319,hjsv:6};
                a=o.getElementsByTagName('head')[0];
                r=o.createElement('script');r.async=1;
                r.src=t+h._hjSettings.hjid+j+h._hjSettings.hjsv;
                a.appendChild(r);
            })(window,document,'https://static.hotjar.com/c/hotjar-','.js?sv=');
        </script>

</head>

<body <?php body_class(); ?> ><!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-K79LVKT" height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->
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
do_action( 'header_parts' );
//get_template_part( 'template-parts/parts/modals/modal', 'thank-you' );
?>
<main id="fullpage">