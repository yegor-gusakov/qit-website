<?php
$thumbnail = get_the_post_thumbnail_url( $args['id'] );
$title     = get_the_title( $args['id'] );
?>
<div class="col-md-2 mb-5 technology-col">
    <div class="card mb-3 h-100 justify-content-between">
        <div class="card-img w-100 h-100">

            <img src="<?= $thumbnail ?>"
                 class="card-img-top w-50 h-100 mx-auto my-0"
                 alt="<?= $title ?>"></div>

        <div class="card-body">
            <h5 class="card-title text-center m-0"><?= $title ?></h5>
        </div>
    </div>
</div>