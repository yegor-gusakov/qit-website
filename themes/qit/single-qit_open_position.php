<?php
global $post;

get_header();
$post_slug   = $post->post_name;
$terms_tags  = wp_get_post_terms( get_the_id(),
	array( 'qit_open_position_tags' ) );
$tags        = get_field( 'tags', get_the_ID() );
$information = get_field( 'position_information', get_the_ID() );
$dot         = get_template_directory_uri() . '/assets/userfiles/icons/dot.svg';

get_template_part( 'template-parts/pages/single-position/_position',
	'heading' ); ?>
    <section
            class="section section__position section__position-<?= $post_slug ?>">
        <div class="container">
            <div class="section__position-row row">
                <div class="col-12 col-lg-8">
					<?php /**?>
					 * <div class="section__position-row-tags">
					 * <p>
					 * <?php foreach ( $terms_tags as $term ) : ?>
					 * <span class="tag tag-<?= $term->slug ?>"><?= $term->name ?></span>
					 * <?php endforeach; ?>
					 * </p>
					 * </div>
					 * <?php */ ?>
                    <div class="section__position-row-title">
                        <h1><?php the_title() ?></h1>
                    </div>
                    <div class="section__position-row-excerpt">
						<?php the_excerpt(); ?>
                    </div>
                    <ul class="section__position-row-tags list-group list-group-horizontal flex-wrap">
						<?php foreach ( $tags as $tag ):
							$repeater_tag = $tag['repeater_tag'];
							$repeater_text = $tag['repeater_text']; ?>
                            <li class="section__position-row-tags-item list-group-item border-0">
                                <p class="d-flex">
                                    <span class="section__position-row-tags-item-name"><?= $repeater_tag ?></span>
                                    <span class="section__position-row-tags-item-text"><?= $repeater_text ?></span>
                                </p>
                            </li>
						<?php endforeach; ?>
                    </ul>
                    <div class="section__position-row-hr"></div>
					<?php if ( $information ):
						foreach ( $information as $info ):
							$title = $info['position_title'];
							$position_list = $info['position_list']; ?>
                            <div class="section__position-row-requirements">
                                <h4 class="section__position-row-requirements-heading">
									<?= $title ?>
                                </h4>
								<?php if ( $position_list ): ?>
                                    <ul class="section__position-row-requirements-list">
										<?php foreach (
											$position_list as $item
										):$heading = $item['heading']; ?>
											<?php echo '<li class="section__position-row-requirements-list-item">'
											           . file_get_contents( $dot )
											           . '<p>' . $heading
											           . '</p></li>' ?>
										<?php endforeach ?>
                                    </ul>
								<?php endif; ?>
                            </div>
						<?php endforeach; ?>
					<?php endif; ?>
                </div>
                <div class="col-12 col-lg-4 position-form" id="position-form">
                    <h3><?= __( 'Please fill in form to apply', 'qit' ) ?></h3>
					<?= do_shortcode( '[contact-form-7 id="1710" title="Open position"]' ) ?>
                </div>
            </div>
        </div>
    </section>
<?php
get_footer();