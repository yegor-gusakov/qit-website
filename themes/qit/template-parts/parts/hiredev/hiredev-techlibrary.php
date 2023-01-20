<?php

$icon  = $args['icon'];
$title = $args['title'];
?>
<div class="card col-12 col-md-6 col-lg-3 section__library-row-library-card border-0">
    <div class="card-body">
		<?php if ( $icon ): ?>
            <img src="<?= $icon['url'] ?>" alt="<?= $icon['alt'] ?>"
                 class="card-icon">
		<?php endif; ?>
		<?php if ( $title ): ?>

            <h5 class="card-title"><?= $title ?></h5>
		<?php endif; ?>

    </div>
</div>