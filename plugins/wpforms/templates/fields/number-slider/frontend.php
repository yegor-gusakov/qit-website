<?php
/**
 * Number slider field frontend template.
 *
 * @var array  $atts          Additional HTML attributes.
 * @var array  $class         HTML classes.
 * @var array  $datas         Data attributes.
 * @var float  $default_value Default field value.
 * @var float  $max           Upper range limit.
 * @var float  $min           Lower range limit.
 * @var float  $step          Allowed step.
 * @var string $id            Element ID.
 * @var string $required      Is field required or not.
 * @var string $value_display Value output.
 * @var string $value_hint    Value hint output.
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>
<div class="wpforms-field-number-slider-hint"
     data-hint="<?php echo esc_attr( wp_kses_post( $value_display ) ); ?>">

	<?php echo wp_kses_post( $value_hint ); ?>
</div>

<div class="wpforms-field-number-slider-hint-month d-none" data-hint="<?php echo esc_attr( wp_kses_post( $value_display ) ); ?>">
    <b>1</b> month
</div>

<div class="wpforms-field-number-slider-hint-year d-none" data-hint="<?php echo esc_attr( wp_kses_post( $value_display ) ); ?>">
    <b>1+</b> years
</div>
<input
        type="range"<?php wpforms_html_attributes( $id, $class, $datas, $atts, true ); ?>
	<?php echo ! empty( $required ) ? 'required' : ''; ?>
        value="<?php echo esc_attr( $default_value ); ?>"
        min="<?php echo esc_attr( $min ); ?>"
        max="<?php echo esc_attr( $max ); ?>"
        step="<?php echo esc_attr( $step ); ?>"
        list="<?= $id . '-datalist' ?>">


<ul class="range__list" id="<?= $id . '-datalist' ?>">
	<?php for ( $i = $min; $i < $max+1; $i ++ ): ?>
        <li class="range__opt <?= ($i == $min?'active':'')?> <?=__('range__opt-'.$i)?>" data-month="<?=$i?>" value="<?= $i?>" >

			<?php if( $i ==1):?>
                <span class="number"><?php echo $i; ?></span>&nbsp;<span class="text"><?=__('month','qit')?></span>

			<?php elseif ($i >=12):?>
                <span class="number"><?php echo '1+' ?></span>&nbsp;<span class="text"><?=__('years','qit')?></span>

			<?php else:?>
                <span class="number"><?php echo $i; ?></span>&nbsp;<span class="text"><?=__('months','qit')?></span>

			<?php endif;?>

        </li>
	<?php endfor; ?>
</ul>