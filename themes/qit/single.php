<?php
 get_header();?>

    <article id="content post-<?= get_the_id() ?>" class="post-<?= get_the_id() ?>">

		<?php while (have_posts()) : the_post(); ?>
			<?php get_template_part('template-parts/pages/single-post/single', get_post_type()); ?>
		<?php endwhile; ?>

    </article>

<?php get_footer(); ?>