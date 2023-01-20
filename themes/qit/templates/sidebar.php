<?php /* Template Name: Sidebar */ ?>
<?php
get_header();
?>

    <section class="section section__heading">
        <div class="container">
            <div class="section__heading-row row">
                <div class="col-lg-10 col-sm-12 col-12">
					<?php if ( get_the_title() ): ?>
                        <div class="section__heading-row-title">
                            <h1><?php the_title() ?></h1></div>
					<?php endif; ?>
                    <div class="section__heading-row-text">
                        <p><?= __( 'Last updated ', 'qit' )
						       . get_the_modified_date( 'M, Y' ) ?></p></div>
                </div>
				<?php if ( get_the_content() ): ?>
                    <div class="col-12 col-hr">
                        <hr>
                    </div>
				<?php endif; ?>

            </div>
        </div>
    </section>
<?php if ( get_the_content() ): ?>

    <section class="section section__page section__page-<?php the_ID() ?>">
        <div class="container">
            <div class="section__content-row row">
				<?php
				$content = get_the_content();
				echo insert_table_of_contents( $content );
				?>
            </div>
        </div>
    </section>
<?php endif; ?>
<?php
get_footer();