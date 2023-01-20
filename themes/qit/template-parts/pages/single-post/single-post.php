<?php
/**
 * The template for displaying all single posts
 *
 * @link    https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package qit
 */
get_header();
$tags         = wp_get_post_terms( get_the_id(), array( 'qit_posts_tags' ) );

$arrow                 = get_template_directory_uri()
                         . '/assets/userfiles/icons/arrow-left-small.svg';
$calendar              = get_template_directory_uri()
                         . '/assets/userfiles/icons/calendar.svg';
$email_subscribe_image = get_template_directory_uri()
                         . '/assets/userfiles/icons/email_subscribe.svg';
$minread = get_field('minutes_to_read',get_the_ID());
$title             = get_field( 'blog_subscription_title', 'qit_banners' );
$text             = get_field( 'blog_subscription_text', 'qit_banners' );

?>
    <section class="section section__heading">
        <div class="container">
            <div class="section__heading-row row">
                <div class="col-lg-10 col-sm-12 col-12">
                    <a href="<?= get_post_type_archive_link( get_post_type( get_the_ID() ) ) ?>" class="return-back">
						<?= file_get_contents( $arrow ) . __( 'All posts', 'qit' ) ?>
                    </a>
                    <div class="section__heading-row__tags">
						<?php if ( $tags ):
							foreach ( $tags as $tag ):?>
                                <span class="tag"><?= $tag->name ?></span>
							<?php
							endforeach;
						endif; ?>
                    </div>
                    <div class="section__heading-row-title"><h1><?php the_title() ?></h1></div>
                </div>
                <div class="col-12 row justify-content-between section__heading-row-subtitle">
                    <div class="col-12 col-lg-3 col-md-5 d-flex align-items-center justify-content-center justify-content-sm-start">
						<?= file_get_contents( $calendar ) ?>
                        <span class="date"><?= get_the_date( 'M j, Y' ); ?></span>
                        <span class="read"><?=$minread?></span>
                    </div>
                    <div class="col-12 col-sm-auto d-flex justify-content-center justify-content-sm-end"></div>
                </div>
            </div>
        </div>
    </section>
    <section class="section section__thumbnail">
        <div class="container">
            <div class="section__thumbnail-row row justify-content-center">
                <div class="col-12">
					<?php the_post_thumbnail( 'full', 'alt="' . get_the_title() . '"' ); ?>
                </div>
            </div>
        </div>
    </section>
    <section class="section section__content">
        <div class="container">
            <div class="section__content-row row">
				<?php the_content();?>
                <div class="col-12 col-md-2 col-lg-1 sticky-sm-top post-share"><?= do_shortcode( '[rekki_socials]' ) ?></div>
            </div>
        </div>
    </section>
    <section class="section section__subscribe">
        <div class="container">
            <div class="section__subscribe-row row align-items-sm-center">
                <div class="col-lg-7 col-md-10 col-left ">
                    <div class="section__subscribe-row-title">
                        <h3><?= $title?></h3>
                    </div>
                    <div class="section__subscribe-row-text">
                        <p><?=$text?></p>
                    </div>
					<?= do_shortcode( '[wpforms id="1134"]' ) ?>
                </div>
                <div class="col-lg-4 col-md-8 offset-sm-1 p-0 col-right">
					<?= file_get_contents( $email_subscribe_image ) ?>
                </div>
            </div>
        </div>
    </section>
    <section class="section section__related">
        <div class="container">
            <div class="section__related-row row">
                <div class="section__related-row-title">
                    <h3><?= __( 'You may also like', 'qit' ) ?></h3>
                </div>
            </div>
            <div class="section__related-row row posts" style="row-gap: 60px">
				<?php rekki_related_posts() ?>
            </div>
        </div>
    </section>
<?php
get_sidebar();
get_footer();

