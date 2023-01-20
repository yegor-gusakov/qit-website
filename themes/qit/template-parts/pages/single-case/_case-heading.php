<?php
/*
 * Case: Heading
 */
defined( 'ABSPATH' ) || exit;

/**
 * Fields
 */
$field = get_query_var( 'case_single_field' );
$title = $field['title'];
$text  = $field['text'];
$arrow = get_template_directory_uri().'/assets/userfiles/icons/arrow-left-small.svg';
?>

<section class="section section__heading">
    <div class="container">
        <div class="section__heading-row row">
            <div class="col-lg-10 col-sm-12 col-12">
                <a href="<?= get_post_type_archive_link( get_post_type( get_the_ID() ) ) ?>" class="return-back">
                    <?= file_get_contents($arrow). __( 'All cases', 'qit' ) ?>
                </a>
                <h1 class="section__heading-row-title"><?= $title ?></h1>
                <p class="section__heading-row-text"><?= $text ?></p>
            </div>
        </div>
    </div>
</section>