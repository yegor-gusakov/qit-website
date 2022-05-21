<?php
/**
 * Modern file upload template.
 *
 * @var int    $field_id        Field ID.
 * @var int    $form_id         Form ID.
 * @var string $value           Field value.
 * @var string $input_name      Field name.
 * @var string $extensions      Allowed extensions.
 * @var int    $max_size        Max file size.
 * @var int    $max_file_number Max file number.
 * @var int    $post_max_size   Max size for POST request.
 * @var int    $chunk_size      Chunk size.
 * @var string $preview_hint    Preview hint.
 * @var string $required        Is the field required?
 * @var bool   $is_full         Is the field has maximum uploaded files?
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

?>
<div
		class="wpforms-uploader"
		data-field-id="<?php echo absint( $field_id ); ?>"
		data-form-id="<?php echo absint( $form_id ); ?>"
		data-input-name="<?php echo esc_attr( $input_name ); ?>"
		data-extensions="<?php echo esc_attr( $extensions ); ?>"
		data-max-size="<?php echo absint( $max_size ); ?>"
		data-max-file-number="<?php echo absint( $max_file_number ); ?>"
		data-post-max-size="<?php echo absint( $post_max_size ); ?>"
		data-max-parallel-uploads="4"
		data-parallel-uploads="true"
		data-file-chunk-size="<?php echo absint( $chunk_size ); ?>">
	<div class="dz-message<?php echo $is_full ? ' hide' : ''; ?>">
        <span class="modern-title"><?=__('Message','qit')?></span>

        <svg width="18" height="20" viewBox="0 0 18 20" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M16.0797 10.4202L9.89967 16.6102C9.08949 17.3302 8.03482 17.7135 6.95139 17.6816C5.86797 17.6497 4.83767 17.2051 4.07124 16.4386C3.30482 15.6722 2.86018 14.6419 2.82829 13.5585C2.7964 12.4751 3.17966 11.4204 3.89967 10.6102L11.8997 2.61021C12.3773 2.15651 13.0109 1.90354 13.6697 1.90354C14.3284 1.90354 14.962 2.15651 15.4397 2.61021C15.905 3.0818 16.1659 3.71768 16.1659 4.38021C16.1659 5.04274 15.905 5.67862 15.4397 6.15021L8.53967 13.0402C8.47138 13.1138 8.38928 13.1731 8.29805 13.2149C8.20682 13.2567 8.10824 13.2802 8.00796 13.2839C7.90767 13.2876 7.80763 13.2715 7.71356 13.2366C7.61948 13.2016 7.53321 13.1485 7.45967 13.0802C7.38613 13.0119 7.32676 12.9298 7.28495 12.8386C7.24314 12.7474 7.21971 12.6488 7.216 12.5485C7.21228 12.4482 7.22836 12.3482 7.2633 12.2541C7.29825 12.16 7.35138 12.0738 7.41967 12.0002L12.5497 6.88021C12.738 6.69191 12.8438 6.43651 12.8438 6.17021C12.8438 5.90391 12.738 5.64852 12.5497 5.46021C12.3614 5.27191 12.106 5.16612 11.8397 5.16612C11.5734 5.16612 11.318 5.27191 11.1297 5.46021L5.99967 10.6002C5.74298 10.8549 5.53924 11.1579 5.4002 11.4917C5.26117 11.8256 5.18959 12.1836 5.18959 12.5452C5.18959 12.9068 5.26117 13.2649 5.4002 13.5987C5.53924 13.9325 5.74298 14.2355 5.99967 14.4902C6.52404 14.9897 7.22048 15.2683 7.94467 15.2683C8.66886 15.2683 9.3653 14.9897 9.88967 14.4902L16.7797 7.59021C17.5746 6.73716 18.0073 5.60888 17.9867 4.44308C17.9662 3.27727 17.4939 2.16496 16.6694 1.34048C15.8449 0.516003 14.7326 0.0437313 13.5668 0.023162C12.401 0.00259272 11.2727 0.435332 10.4197 1.23021L2.41967 9.23021C1.34087 10.425 0.7647 11.9901 0.811205 13.5992C0.85771 15.2083 1.5233 16.7374 2.66931 17.868C3.81532 18.9985 5.35335 19.6433 6.96296 19.6679C8.57256 19.6925 10.1296 19.0951 11.3097 18.0002L17.4997 11.8202C17.5929 11.727 17.6669 11.6163 17.7173 11.4945C17.7678 11.3726 17.7938 11.2421 17.7938 11.1102C17.7938 10.9784 17.7678 10.8478 17.7173 10.726C17.6669 10.6041 17.5929 10.4935 17.4997 10.4002C17.4064 10.307 17.2957 10.233 17.1739 10.1826C17.0521 10.1321 16.9215 10.1061 16.7897 10.1061C16.6578 10.1061 16.5272 10.1321 16.4054 10.1826C16.2836 10.233 16.1729 10.307 16.0797 10.4002V10.4202Z" fill="#363636"/>
        </svg>


		<?php if ( (int) $max_file_number > 1 ) : ?>
			<span class="modern-hint"><?php echo esc_html( $preview_hint ); ?></span>
		<?php endif; ?>
	</div>
</div>
<input
		type="text"
		autocomplete="off"
		class="dropzone-input"
		style="position:absolute!important;clip:rect(0,0,0,0)!important;height:1px!important;width:1px!important;border:0!important;overflow:hidden!important;padding:0!important;margin:0!important;"
		id="wpforms-<?php echo absint( $form_id ); ?>-field_<?php echo absint( $field_id ); ?>"
		name="<?php echo esc_attr( $input_name ); ?>" <?php echo esc_attr( $required ); ?>
		value="<?php echo esc_attr( $value ); ?>">
