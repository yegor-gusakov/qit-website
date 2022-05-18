<?php
/*
 * Home: comparisons
 */
defined( 'ABSPATH' ) || exit;

/**
 * Fields
 */
$field     = get_query_var( 'home_field' );
$badge     = $field['badge'];
$title     = $field['title'];
$logo_icon = get_field( 'logo', 'theme_settings' );

$checkmark = get_stylesheet_directory() . '/assets/userfiles/icons/Check.svg';
$closemark = get_stylesheet_directory() . '/assets/userfiles/icons/Close.svg';
?>

<section class="section__comparisons section">
    <div class="container">
        <div class="section__comparisons-row row justify-content-center"><h6
                    class="section__comparisons-row-badge m-0  w-auto text-white text-uppercase"><?= $badge ?></h6>
        </div>
        <div class="section__comparisons-row row text-center">
            <h2 class="section__comparisons-row-title"><?= $title ?></h2>
        </div>
        <div class="section__comparisons-row d-none d-sm-none d-md-flex row flex-column">
            <ul class="row">
                <li class="legend">Getting started</li>
                <li>Freelance Platforms</li>
                <li><?= file_get_contents( $logo_icon['url'] ) ?></li>
                <li>In-house</li>
            </ul>

            <ul class="row row-after-gap">
                <li class="legend"><p>Hiring time</p></li>
                <li><p>2 - 4 weeks</p></li>
                <li><p>1 - 3 weeks</p></li>
                <li><p>3 - 8 weeks</p></li>
            </ul>

            <ul class="row">
                <li class="legend"><p>Recruiting expenses</p></li>
                <li><p>~$3000</p></li>
                <li><p>0</p></li>
                <li><p>$5000+</p></li>
            </ul>

            <ul class="row row-before-gap">
                <li class="legend"><p>Retention</p></li>
                <li><p>Low</p></li>
                <li><p>High</p></li>
                <li><p>Average</p></li>
            </ul>


            <ul class="row row-gap">
                <li class="legend">Pricing</li>
                <li></li>
                <li></li>
                <li></li>
            </ul>


            <ul class="row row-after-gap">
                <li class="legend"><p>Average hourly rate</p></li>
                <li><p>$35</p></li>
                <li><p>$40</p></li>
                <li><p>$70</p></li>
            </ul>


            <ul class="row">
                <li class="legend"><p class="h-100">Payment method</p></li>
                <li><p class="h-100">Hourly (rate includes platfrom fees)</p>
                </li>
                <li><p class="h-100">Monthly invoicing</p></li>
                <li><p class="h-100">Monthly salary + taxes, backoffice
                        overhead</p></li>
            </ul>


            <ul class="row">
                <li class="legend"><p>Annual saving</p></li>
                <li><p>At least $20,000</p></li>
                <li><p>At least $40,000</p></li>
                <li><p>At least $10,000</p></li>
            </ul>


            <ul class="row row-before-gap">
                <li class="legend"><p>Additional costs included (office
                        expenses,
                        taxes, perks, etc.)</p>
                </li>
                <li><p><?= file_get_contents( $checkmark ) ?></p></li>

                <li><p><?= file_get_contents( $checkmark ) ?></p></li>
                <li><p><?= file_get_contents( $closemark ) ?></p></li>

            </ul>
            <ul class="row row-gap">
                <li class="legend">what you get
                </li>
                <li></li>
                <li></li>
                <li></li>
            </ul>
            <ul class="row row-after-gap">
                <li class="legend"><p class="h-100">Focus on your task only</p>
                </li>
                <li><p><?= file_get_contents( $closemark ) ?></p></li>
                <li><p><?= file_get_contents( $checkmark ) ?></p></li>
                <li><p><?= file_get_contents( $checkmark ) ?></p></li>
            </ul>
            <ul class="row">
                <li class="legend"><p>Team scalability</p>
                </li>
                <li><p>Low</p></li>
                <li><p>High</p></li>
                <li><p>Average</p></li>
            </ul>
            <ul class="row">
                <li class="legend"><p class="h-100">Cooperation termination
                        risks</p>
                </li>
                <li><p class="h-100">Low</p></li>
                <li><p class="h-100">Low</p></li>
                <li><p class="h-100">High (notice period > 3 months)</p></li>
            </ul>
            <ul class="row row-before-gap">
                <li class="legend"><p>Security level (Data Protection)</p>
                </li>
                <li><p>Relatively safe (if NDA is signed)</p></li>
                <li><p>Safe</p></li>
                <li><p>Very safe</p></li>
            </ul>
        </div>
        <div class="section__comparisons-row-mobile d-flex d-sm-flex d-md-none row flex-column">
            <ul class="row">
                <li><?= file_get_contents( $logo_icon['url'] ) ?></li>

                <li class="legend">Getting started</li>
            </ul>

            <ul class="row row-after-gap">
                <li><p>Hiring time</p></li>
                <li><p>1 - 3 weeks</p></li>
            </ul>

            <ul class="row">
                <li><p>Recruiting expenses</p></li>
                <li><p>0</p></li>
            </ul>

            <ul class="row row-before-gap">
                <li><p>Retention</p></li>
                <li><p>High</p></li>
            </ul>


            <ul class="row row-gap">
                <li class="legend">Pricing</li>
            </ul>


            <ul class="row row-after-gap">
                <li><p>Average hourly rate</p></li>
                <li><p>$40</p></li>
            </ul>


            <ul class="row">
                <li><p class="h-100">Payment method</p></li>
                <li><p class="h-100">Monthly invoicing</p></li>
            </ul>


            <ul class="row">
                <li><p>Annual saving</p></li>
                <li><p>At least $40,000</p></li>
            </ul>


            <ul class="row row-before-gap">
                <li><p>Additional costs included (office
                        expenses,
                        taxes, perks, etc.)</p>
                </li>

                <li><p><?= file_get_contents( $checkmark ) ?></p></li>

            </ul>
            <ul class="row row-gap">
                <li class="legend">what you get
                </li>
            </ul>
            <ul class="row row-after-gap">
                <li><p>Focus on your task only</p>
                </li>
                <li><p><?= file_get_contents( $checkmark ) ?></p></li>
            </ul>
            <ul class="row">
                <li><p>Team scalability</p>
                </li>
                <li><p>High</p></li>
            </ul>
            <ul class="row">
                <li><p >Cooperation termination
                        risks</p>
                </li>
                <li><p >Low</p></li>
            </ul>
            <ul class="row row-before-gap">
                <li><p>Security level (Data Protection)</p>
                </li>
                <li><p>Safe</p></li>
            </ul>
        </div>
    </div>
</section>