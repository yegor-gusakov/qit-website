<?php
$text     = $args['phrase_text'];
$subtitle = $args['phrase_subtitle'];
?>
<section class="section section__phrase">
    <div class="container">
        <div class="section__phrase-row row">
            <div class="section__phrase-row-text">
                <p><?= $text ?></p>
            </div>
            <div class="section__phrase-row-heading">
                <h5><?= $subtitle ?></h5>
            </div>
        </div>
    </div>
</section>