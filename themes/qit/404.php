<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link    https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package qit
 */

get_header();
$image = get_template_directory_uri() . '/assets/userfiles/image/404.svg';
?>

<section class="section section__404">
    <div class="container">
        <div class="section__404-row row justify-content-center align-items-center">

            <div class="col-lg-6 col-12 d-flex justify-content-center align-items-center flex-column text-center">
                <div class="section__404-row-image">
					<?= file_get_contents( $image ); ?>
                </div>
                <div class="section__404-row-title">
                    <h1><?= __( '404', 'qit' ) ?></h1>
                </div>
                <div class="section__404-row-subtitle">
                    <h2><?= __( 'Page not found', 'qit' ) ?></h2>
                </div>
                <div class="section__404-row-text">
                    <p><?= __( 'The page you were looking for was removed or does not exist. Try going back to the home page. ',
							'qit' ) ?></p>
                </div>
                <a href="<?= get_home_url()?>" class="button btn"><?= __('back to home','qit')?></a>
            </div>
        </div>
    </div>
</section>
<script type="text/javascript" src="/wp-content/themes/qit/assets/js/script/burger.js" id="burger-qit-js" defer=""></script>