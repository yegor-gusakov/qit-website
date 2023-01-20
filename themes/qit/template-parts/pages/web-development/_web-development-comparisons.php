<?php
/*
 * WebDevelopment: comparisons
 */
defined( 'ABSPATH' ) || exit;

/**
 * Fields
 */
$field     = get_query_var( 'web_development_field' );
$badge     = $field['badge'];
$title     = $field['title'];
$logo_icon = get_field( 'logo', 'theme_settings' );

$checkmark = get_template_directory_uri() . '/assets/userfiles/icons/Check.svg';
$closemark = get_template_directory_uri() . '/assets/userfiles/icons/Close.svg';
?>

<section class="section section__comparisons">
    <div class="container">
		<?php if ( $badge ): ?>
            <div class="section__comparisons-row row justify-content-center">
                <h6 class="section__comparisons-row-badge m-0  w-auto text-white text-uppercase"><?= $badge ?></h6>
            </div>
		<?php endif; ?>
		<?php if ( $title ): ?>
            <div class="section__comparisons-row row text-center">
                <h2 class="section__comparisons-row-title"><?= $title ?></h2>
            </div>
		<?php endif; ?>
        <div class="section__comparisons-row row d-none d-sm-none d-md-flex row flex-column">
            <div class="col">
                <ul class="row">
                    <li class="legend"><?=__('Getting started','qit')?></li>
                    <li><?=__('Freelance Platforms','qit')?></li>
                    <li><?= file_get_contents( $logo_icon['url'] ) ?></li>
                    <li><?= __('In-house','qit')?></li>
                </ul>
                <ul class="row row-after-gap">
                    <li class="legend"><p><?=__('Hiring time','qit')?></p></li>
                    <li><p><?=__('1 - 3 weeks','qit')?></p></li>
                    <li><p><?=__('1 - 3 weeks','qit')?></p></li>
                    <li><p><?=__('3 - 8 weeks','qit')?></p></li>
                </ul>
                <ul class="row">
                    <li class="legend"><p><?=__('Recruiting expenses','qit')?></p></li>
                    <li><p><?=__('~$3000','qit')?></p></li>
                    <li><p><?=__('0','qit')?></p></li>
                    <li><p><?=__('$5000+','qit')?></p></li>
                </ul>
                <ul class="row row-before-gap">
                    <li class="legend"><p><?=__('Retention','qit')?></p></li>
                    <li><p><?=__('Low','qit')?></p></li>
                    <li><p><?=__('High','qit')?></p></li>
                    <li><p><?=__('Average','qit')?></p></li>
                </ul>
                <ul class="row row-gap">
                    <li class="legend"><?=__('Pricing','qit')?></li>
                    <li></li>
                    <li></li>
                    <li></li>
                </ul>
                <ul class="row row-after-gap">
                    <li class="legend"><p><?=__('Average hourly rate','qit')?></p></li>
                    <li><p><?=__('$35','qit')?></p></li>
                    <li><p><?=__('$40','qit')?></p></li>
                    <li><p><?=__('$70','qit')?></p></li>
                </ul>
                <ul class="row">
                    <li class="legend"><p><?=__('Payment method','qit')?></p></li>
                    <li><p><?=__('Hourly (rate includes platform fees)','qit')?></p></li>
                    <li><p><?=__('Monthly invoicing','qit')?></p></li>
                    <li><p><?=__('Monthly salary + taxes, backoffice overhead','qit')?></p></li>
                </ul>
                <ul class="row">
                    <li class="legend"><p><?=__('Annual saving','qit')?></p></li>
                    <li><p><?=__('At least $20,000','qit')?></p></li>
                    <li><p><?=__('At least $40,000','qit')?></p></li>
                    <li><p><?=__('At least $10,000','qit')?></p></li>
                </ul>
                <ul class="row row-before-gap">
                    <li class="legend"><p><?=__('Additional costs included (office expenses, taxes, perks, etc.)','qit')?></p></li>
                    <li><p><?= file_get_contents( $checkmark ) ?></p></li>
                    <li><p><?= file_get_contents( $checkmark ) ?></p></li>
                    <li><p><?= file_get_contents( $closemark ) ?></p></li>
                </ul>
                <ul class="row row-gap">
                    <li class="legend"><?=__('what you get','qit')?></li>
                    <li></li>
                    <li></li>
                    <li></li>
                </ul>
                <ul class="row row-after-gap">
                    <li class="legend"><p><?=__('Focus on your task only','qit')?></p>
                    </li>
                    <li><p><?= file_get_contents( $closemark ) ?></p></li>
                    <li><p><?= file_get_contents( $checkmark ) ?></p></li>
                    <li><p><?= file_get_contents( $checkmark ) ?></p></li>
                </ul>
                <ul class="row">
                    <li class="legend"><p><?=__('Team scalability','qit')?></p>
                    </li>
                    <li><p><?=__('Low','qit')?></p></li>
                    <li><p><?=__('High','qit')?></p></li>
                    <li><p><?=__('Average','qit')?></p></li>
                </ul>
                <ul class="row">
                    <li class="legend"><p><?=__('Cooperation termination risks','qit')?></p></li>
                    <li><p><?=__('Low','qit')?></p></li>
                    <li><p><?=__('Low','qit')?></p></li>
                    <li><p><?=__('High (notice period > 3 months)','qit')?></p></li>
                </ul>
                <ul class="row row-before-gap">
                    <li class="legend"><p><?=__('Security level (Data Protection)','qit')?></p></li>
                    <li><p><?=__('Relatively safe (if NDA is signed)','qit')?></p></li>
                    <li><p><?=__('Safe','qit')?></p></li>
                    <li><p><?=__('Very safe','qit')?></p></li>
                </ul>
            </div>
        </div>
        <div class="section__comparisons-row-mobile row swiperComparisons d-flex d-sm-flex d-md-none row flex-column">
            <div class="swiper-wrapper p-0">
                <div class="swiper-slide qit-software flex-column p-0">
                    <ul class="row">
                        <li><?= file_get_contents( $logo_icon['url'] ) ?></li>
                        <li class="legend"><?=__('Getting started','qit')?></li>
                    </ul>
                    <ul class="row row-after-gap">
                        <li><p><?=__('Hiring time','qit')?></p></li>
                        <li><p><?=__('1 - 3 weeks','qit')?></p></li>
                    </ul>
                    <ul class="row">
                        <li><p><?=__('Recruiting expenses','qit')?></p></li>
                        <li><p><?=__('0','qit')?></p></li>
                    </ul>
                    <ul class="row row-before-gap">
                        <li><p><?=__('Retention','qit')?></p></li>
                        <li><p><?=__('High','qit')?></p></li>
                    </ul>
                    <ul class="row row-gap">
                        <li class="legend"><?=__('Pricing','qit')?></li>
                    </ul>
                    <ul class="row row-after-gap">
                        <li><p><?=__('Average hourly rate','qit')?></p></li>
                        <li><p><?=__('$40','qit')?></p></li>
                    </ul>
                    <ul class="row">
                        <li><p><?=__('Payment method','qit')?></p></li>
                        <li><p><?=__('Monthly invoicing','qit')?></p></li>
                    </ul>
                    <ul class="row">
                        <li><p><?=__('Annual saving','qit')?></p></li>
                        <li><p><?=__('At least $40,000','qit')?></p></li>
                    </ul>
                    <ul class="row row-before-gap">
                        <li><p><?=__('Additional costs included (office expenses, taxes, perks, etc.)','qit')?></p></li>
                        <li><p><?= file_get_contents( $checkmark ) ?></p></li>
                    </ul>
                    <ul class="row row-gap">
                        <li class="legend"><?=__('what you get')?></li>
                    </ul>
                    <ul class="row row-after-gap">
                        <li><p><?=__('Focus on your task only','qit')?></p></li>
                        <li><p><?= file_get_contents( $checkmark ) ?></p>
                        </li>
                    </ul>
                    <ul class="row">
                        <li><p><?=__('Team scalability','qit')?></p></li>
                        <li><p><?=__('High','qit')?></p></li>
                    </ul>
                    <ul class="row">
                        <li><p><?=__('Cooperation termination risks','qit')?></p></li>
                        <li><p><?=__('Low','qit')?></p></li>
                    </ul>
                    <ul class="row row-before-gap">
                        <li><p><?=__('Security level (Data Protection)','qit')?></p></li>
                        <li><p><?=__('Safe','qit')?></p></li>
                    </ul>
                </div>
                <div class="swiper-slide flex-column p-0">
                    <ul class="row">
                        <li><?=__('Freelance Platforms','qit')?></li>
                        <li class="legend"><?=__('Getting started','qit')?></li>
                    </ul>
                    <ul class="row row-after-gap">
                        <li><p><?=__('Hiring time','qit')?></p></li>
                        <li><p><?=__('1 - 3 weeks','qit')?></p></li>
                    </ul>
                    <ul class="row">
                        <li><p><?=__('Recruiting expenses','qit')?></p></li>
                        <li><p><?=__('~$3000','qit')?></p></li>
                    </ul>
                    <ul class="row row-before-gap">
                        <li><p><?=__('Retention','qit')?></p></li>
                        <li><p><?=__('Low','qit')?></p></li>
                    </ul>
                    <ul class="row row-gap">
                        <li class="legend"><?=__('Pricing','qit')?></li>
                    </ul>
                    <ul class="row row-after-gap">
                        <li><p><?=__('Average hourly rate','qit')?></p></li>
                        <li><p><?=__('$35','qit')?></p></li>
                    </ul>
                    <ul class="row">
                        <li><p><?=__('Payment method','qit')?></p></li>
                        <li><p><?=__('Hourly (rate includes platform fees)','qit')?></p></li>
                    </ul>
                    <ul class="row">
                        <li><p><?=__('Annual saving','qit')?></p></li>
                        <li><p><?=__('At least $20,000','qit')?></p></li>
                    </ul>
                    <ul class="row row-before-gap">
                        <li><p><?=__('Additional costs included (office expenses, taxes, perks, etc.)','qit')?></p></li>
                        <li><p><?= file_get_contents( $checkmark ) ?></p></li>
                    </ul>
                    <ul class="row row-gap">
                        <li class="legend"><?=__('what you get','qit')?>
                        </li>
                    </ul>
                    <ul class="row row-after-gap">
                        <li><p><?=__('Focus on your task only','qit')?></p></li>
                        <li><p><?= file_get_contents( $closemark ) ?></p>
                        </li>
                    </ul>
                    <ul class="row">
                        <li><p><?=__('Team scalability','qit')?></p></li>
                        <li><p><?=__('Low','qit')?></p></li>
                    </ul>
                    <ul class="row">
                        <li><p><?=__('Cooperation termination risks','qit')?></p></li>
                        <li><p><?=__('Low','qit')?></p></li>
                    </ul>
                    <ul class="row row-before-gap">
                        <li><p><?=__('Security level (Data Protection)','qit')?></p></li>
                        <li><p><?=__('Relatively safe (if NDA is signed)','qit')?></p></li>
                    </ul>
                </div>
                <div class="swiper-slide flex-column p-0">
                    <ul class="row">
                        <li><?=__('In-house','qit')?></li>
                        <li class="legend"><?=__('Getting started','qit')?></li>
                    </ul>
                    <ul class="row row-after-gap">
                        <li><p><?=__('Hiring time','qit')?></p></li>
                        <li><p><?=__('3 - 8 weeks','qit')?></p></li>
                    </ul>
                    <ul class="row">
                        <li><p><?=__('Recruiting expenses','qit')?></p></li>
                        <li><p><?=__('$5000+','qit')?></p></li>
                    </ul>
                    <ul class="row row-before-gap">
                        <li><p><?=__('Retention','qit')?></p></li>
                        <li><p><?=__('Average','qit')?></p></li>
                    </ul>
                    <ul class="row row-gap">
                        <li class="legend"><?=__('Pricing','qit')?></li>
                    </ul>
                    <ul class="row row-after-gap">
                        <li><p><?=__('Average hourly rate','qit')?></p></li>
                        <li><p><?=__('$70','qit')?></p></li>
                    </ul>
                    <ul class="row">
                        <li><p><?=__('Payment method','qit')?></p></li>
                        <li><p><?=__('Monthly salary + taxes, backoffice overhead','qit')?></p></li>
                    </ul>
                    <ul class="row">
                        <li><p><?=__('Annual saving','qit')?></p></li>
                        <li><p><?=__('At least $10,000','qit')?></p></li>
                    </ul>
                    <ul class="row row-before-gap">
                        <li><p><?=__('Additional costs included (office expenses, taxes, perks, etc.)','qit')?></p></li>
                        <li><p><?= file_get_contents( $closemark ) ?></p></li>
                    </ul>
                    <ul class="row row-gap">
                        <li class="legend"><?=__('what you get','qit')?>
                        </li>
                    </ul>
                    <ul class="row row-after-gap">
                        <li><p><?=__('Focus on your task only','qit')?></p></li>
                        <li><p><?= file_get_contents( $checkmark ) ?></p></li>
                    </ul>
                    <ul class="row">
                        <li><p><?=__('Team scalability','qit')?></p></li>
                        <li><p><?=__('Average','qit')?></p></li>
                    </ul>
                    <ul class="row">
                        <li><p><?=__('Cooperation termination risks','qit')?></p></li>
                        <li><p><?=__('High (notice period > 3 months)','qit')?></p></li>
                    </ul>
                    <ul class="row row-before-gap">
                        <li><p><?=__('Security level (Data Protection)','qit')?></p></li>
                        <li><p><?=__('Very safe','qit')?></p></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="swiper-pagination d-sm-none d-flex"></div>
    </div>
</section>