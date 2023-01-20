<?php
get_header();
?>

<?php
global $wp_query; // you can remove this line if everything works for you

$post_type  = 'qit_cases';
$taxonomies = get_object_taxonomies( (object) array(
	'post_type'  => $post_type,
	'hide_empty' => true,
	'orderby'    => 'menu_order',
	'order'      => 'DESC',
), 'object' );
$exclude    = array( 'qit_cases_technologies', 'qit_cases_tags' );
$arrow      = get_template_directory_uri()
              . '/assets/userfiles/icons/Arrow.svg';

$args = array(
	'post_type'      => 'qit_cases',
	'posts_per_page' => 6,
	'orderby'        => 'date',
	'order'          => 'DESC',
);

$query  = new WP_Query( $args );
$badge  = __( 'user stories', 'qit' );
$title  = __( 'Our clients success stories speak better about us', 'qit' );
$text   = false;
$button = false;

?>

    <section class="section section__hero">
        <div class="container ">
            <div class="section__hero-row row align-items-center justify-content-center">
                <div class="col-12 col-sm-10">
					<?php if ( $badge ): ?>
                        <div class="section__hero-row">
                            <h6 class="section__hero-row-badge   m-0 w-auto text-uppercase"><?= $badge ?></h6>
                        </div>
					<?php endif ?>
					<?php if ( $title ): ?>
                        <div class="section__hero-row-title">
                            <h1><?= $title ?></h1>
                        </div>
					<?php endif ?>
					<?php if ( $text ): ?>
                        <div class="section__hero-row-text">
                            <p><?= $text ?></p>
                        </div>
					<?php endif ?>
					<?php if ( $button ): ?>
                        <div class="section__hero-row-button">
                            <button class="button btn-outline globalModalQuote"
                                    type="button"><?= $button['title'] ?></button>
                        </div>
					<?php endif ?>
                </div>
            </div>
        </div>
    </section>
    <section class="section section__cases">
        <div class="container">
			<?php if ( $query->have_posts() ) : ?>
                <div class="section__cases-row row">
                    <form action="<?php echo site_url() ?>/wp-admin/admin-ajax.php"
                          method="POST" id="cases_filter"
                          class="section__cases-row-form">
                        <div class="row">
                            <div class="col-sm-9 col-12 d-flex row ">
								<?php foreach ( $taxonomies as $taxonomy ) :
									if ( in_array( $taxonomy->name,
										$exclude )
									) :continue;endif;
									$terms
										= get_terms( [ $taxonomy->name ] ); ?>
                                    <div class="col-6 p-sm-0 col-sm-4 col-filter">
                                        <div class="filter-select <?= $taxonomy->label ?> ">
                                            <label for="<?= $taxonomy->label ?>-filter"><?= $taxonomy->label ?></label>
                                            <select id="select<?= $taxonomy->label ?>"
                                                    name="<?= $taxonomy->label ?>-filter"
                                                    class="selectpicker">
                                                <option value=""><?= $taxonomy->labels->all_items ?></option>
												<?php foreach (
													$terms as $term
												):
													?>
                                                    <option value="<?= $term->term_id ?>"><?= $term->name ?></option>
												<?php endforeach; ?>
                                            </select>
                                        </div>
                                    </div>
								<?php endforeach; ?>
                                <div class="col-6 d-flex d-sm-none align-items-end flex-column justify-content-center">
                                    <a href="javascript:void(0)"
                                       class="btn-clear-all"
                                       id="clearCaseFilter"><?= __( 'Clear all',
											'qit' ) ?>
                                    </a>
                                </div>
                            </div>
                            <div class="col d-none d-sm-flex col d-flex align-items-sm-end flex-column justify-content-center">
                                <label for="clearCaseFilter"
                                       style="height: 27px;"></label>
                                <a href="javascript:void(0)"
                                   class="btn-clear-all"
                                   id="clearCaseFilter"><?= __( 'Clear all',
										'qit' ) ?></a>
                            </div>
                        </div>
                        <input type="hidden" name="action" value="cases_filter">
                    </form>
                </div>
			<?php endif; ?>
            <div class="section__cases-row row" id="cases">
				<?php if ( $query->have_posts() ) :
					while ( $query->have_posts() ):$query->the_post();
						get_template_part( 'template-parts/parts/cases/cases' );
					endwhile;
				else:
					get_template_part( 'template-parts/parts/not-found/not-found',
						'cases' );

				endif; ?>
            </div>
			<?php
			/**
			 * echo '<div id="cases_loadmore">More posts</div>';
			 **/ ?>
        </div>
    </section>
<?php
get_footer();