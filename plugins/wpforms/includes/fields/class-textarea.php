<?php

/**
 * Paragraph text field.
 *
 * @since 1.0.0
 */
class WPForms_Field_Textarea extends WPForms_Field {

	/**
	 * Primary class constructor.
	 *
	 * @since 1.0.0
	 */
	public function init() {

		// Define field type information.
		$this->name  = esc_html__( 'Paragraph Text', 'wpforms-lite' );
		$this->type  = 'textarea';
		$this->icon  = 'fa-paragraph';
		$this->order = 50;
		add_action( 'wpforms_frontend_js', array( $this, 'frontend_js' ) );
	}

	/**
	 * Get the value, that is used to prefill via dynamic or fallback population.
	 * Based on field data and current properties.
	 *
	 * @since 1.6.4
	 *
	 * @param string $raw_value  Value from a GET param, always a string.
	 * @param string $input      Represent a subfield inside the field. May be empty.
	 * @param array  $properties Field properties.
	 * @param array  $field      Current field specific data.
	 *
	 * @return array Modified field properties.
	 */
	protected function get_field_populated_single_property_value( $raw_value, $input, $properties, $field ) {

		if ( ! is_string( $raw_value ) ) {
			return $properties;
		}

		if (
			! empty( $input ) &&
			isset( $properties['inputs'][ $input ] )
		) {
			$properties['inputs'][ $input ]['attr']['value'] = wpforms_sanitize_textarea_field( wp_unslash( $raw_value ) );
		}

		return $properties;
	}

	/**
	 * Field options panel inside the builder.
	 *
	 * @since 1.0.0
	 *
	 * @param array $field Field data and settings.
	 */
	public function field_options( $field ) {
		/*
		 * Basic field options.
		 */

		// Options open markup.
		$this->field_option(
			'basic-options',
			$field,
			array(
				'markup' => 'open',
			)
		);

		// Label.
		$this->field_option( 'label', $field );

		// Description.
		$this->field_option( 'description', $field );

		// Required toggle.
		$this->field_option( 'required', $field );

		// Options close markup.
		$this->field_option(
			'basic-options',
			$field,
			array(
				'markup' => 'close',
			)
		);

		/*
		 * Advanced field options.
		 */

		// Options open markup.
		$args = array(
			'markup' => 'open',
		);
		$this->field_option( 'advanced-options', $field, $args );

		// Size.
		$this->field_option( 'size', $field );

		// Placeholder.
		$this->field_option( 'placeholder', $field );

		// Limit length.
		$args = array(
			'slug'    => 'limit_enabled',
			'content' => $this->field_element(
				'toggle',
				$field,
				array(
					'slug'    => 'limit_enabled',
					'value'   => isset( $field['limit_enabled'] ) ? '1' : '0',
					'desc'    => esc_html__( 'Limit Length', 'wpforms-lite' ),
					'tooltip' => esc_html__( 'Check this option to limit text length by characters or words count.', 'wpforms-lite' ),
				),
				false
			),
		);
		$this->field_element( 'row', $field, $args );

		$count = $this->field_element(
			'text',
			$field,
			array(
				'type'  => 'number',
				'slug'  => 'limit_count',
				'attrs' => array(
					'min'     => 1,
					'step'    => 1,
					'pattern' => '[0-9]',
				),
				'value' => ! empty( $field['limit_count'] ) ? $field['limit_count'] : 1,
			),
			false
		);

		$mode = $this->field_element(
			'select',
			$field,
			array(
				'slug'    => 'limit_mode',
				'value'   => ! empty( $field['limit_mode'] ) ? esc_attr( $field['limit_mode'] ) : 'characters',
				'options' => array(
					'characters' => esc_html__( 'Characters', 'wpforms-lite' ),
					'words'      => esc_html__( 'Words', 'wpforms-lite' ),
				),
			),
			false
		);
		$args = array(
			'slug'    => 'limit_controls',
			'class'   => ! isset( $field['limit_enabled'] ) ? 'wpforms-hide' : '',
			'content' => $count . $mode,
		);
		$this->field_element( 'row', $field, $args );

		// Default value.
		$this->field_option( 'default_value', $field );

		// Custom CSS classes.
		$this->field_option( 'css', $field );

		// Hide label.
		$this->field_option( 'label_hide', $field );

		// Options close markup.
		$this->field_option(
			'advanced-options',
			$field,
			[
				'markup' => 'close',
			]
		);
	}

	/**
	 * Field preview inside the builder.
	 *
	 * @since 1.0.0
	 *
	 * @param array $field Field data and settings.
	 */
	public function field_preview( $field ) {

		// Label.
		$this->field_preview_option( 'label', $field );

		// Primary input.
		$placeholder = ! empty( $field['placeholder'] ) ? $field['placeholder'] : '';

		echo '<textarea placeholder="' . esc_attr( $placeholder ) . '" class="primary-input" readonly></textarea>';

		// Description.
		$this->field_preview_option( 'description', $field );
	}

	/**
	 * Field display on the form front-end.
	 *
	 * @since 1.0.0
	 *
	 * @param array $field      Field data and settings.
	 * @param array $deprecated Deprecated.
	 * @param array $form_data  Form data and settings.
	 */
	public function field_display( $field, $deprecated, $form_data ) {

		// Define data.
		$primary = $field['properties']['inputs']['primary'];
		$value   = '';

		if ( isset( $primary['attr']['value'] ) ) {
			$value = wpforms_sanitize_textarea_field( $primary['attr']['value'] );
			unset( $primary['attr']['value'] );
		}

		if ( isset( $field['limit_enabled'] ) ) {
			$limit_count = isset( $field['limit_count'] ) ? absint( $field['limit_count'] ) : 0;
			$limit_mode  = isset( $field['limit_mode'] ) ? sanitize_key( $field['limit_mode'] ) : 'characters';

			$primary['data']['form-id']  = $form_data['id'];
			$primary['data']['field-id'] = $field['id'];

			if ( 'characters' === $limit_mode ) {
				$primary['class'][]            = 'wpforms-limit-characters-enabled';
				$primary['attr']['maxlength']  = $limit_count;
				$primary['data']['text-limit'] = $limit_count;
			} else {
				$primary['class'][]            = 'wpforms-limit-words-enabled';
				$primary['data']['text-limit'] = $limit_count;
			}
		}

		// Primary field.
		printf(
			'<textarea %s %s rows="1">%s</textarea><svg width="18" height="20" viewBox="0 0 18 20" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M16.0797 10.4202L9.89967 16.6102C9.08949 17.3302 8.03482 17.7135 6.95139 17.6816C5.86797 17.6497 4.83767 17.2051 4.07124 16.4386C3.30482 15.6722 2.86018 14.6419 2.82829 13.5585C2.7964 12.4751 3.17966 11.4204 3.89967 10.6102L11.8997 2.61021C12.3773 2.15651 13.0109 1.90354 13.6697 1.90354C14.3284 1.90354 14.962 2.15651 15.4397 2.61021C15.905 3.0818 16.1659 3.71768 16.1659 4.38021C16.1659 5.04274 15.905 5.67862 15.4397 6.15021L8.53967 13.0402C8.47138 13.1138 8.38928 13.1731 8.29805 13.2149C8.20682 13.2567 8.10824 13.2802 8.00796 13.2839C7.90767 13.2876 7.80763 13.2715 7.71356 13.2366C7.61948 13.2016 7.53321 13.1485 7.45967 13.0802C7.38613 13.0119 7.32676 12.9298 7.28495 12.8386C7.24314 12.7474 7.21971 12.6488 7.216 12.5485C7.21228 12.4482 7.22836 12.3482 7.2633 12.2541C7.29825 12.16 7.35138 12.0738 7.41967 12.0002L12.5497 6.88021C12.738 6.69191 12.8438 6.43651 12.8438 6.17021C12.8438 5.90391 12.738 5.64852 12.5497 5.46021C12.3614 5.27191 12.106 5.16612 11.8397 5.16612C11.5734 5.16612 11.318 5.27191 11.1297 5.46021L5.99967 10.6002C5.74298 10.8549 5.53924 11.1579 5.4002 11.4917C5.26117 11.8256 5.18959 12.1836 5.18959 12.5452C5.18959 12.9068 5.26117 13.2649 5.4002 13.5987C5.53924 13.9325 5.74298 14.2355 5.99967 14.4902C6.52404 14.9897 7.22048 15.2683 7.94467 15.2683C8.66886 15.2683 9.3653 14.9897 9.88967 14.4902L16.7797 7.59021C17.5746 6.73716 18.0073 5.60888 17.9867 4.44308C17.9662 3.27727 17.4939 2.16496 16.6694 1.34048C15.8449 0.516003 14.7326 0.0437313 13.5668 0.023162C12.401 0.00259272 11.2727 0.435332 10.4197 1.23021L2.41967 9.23021C1.34087 10.425 0.7647 11.9901 0.811205 13.5992C0.85771 15.2083 1.5233 16.7374 2.66931 17.868C3.81532 18.9985 5.35335 19.6433 6.96296 19.6679C8.57256 19.6925 10.1296 19.0951 11.3097 18.0002L17.4997 11.8202C17.5929 11.727 17.6669 11.6163 17.7173 11.4945C17.7678 11.3726 17.7938 11.2421 17.7938 11.1102C17.7938 10.9784 17.7678 10.8478 17.7173 10.726C17.6669 10.6041 17.5929 10.4935 17.4997 10.4002C17.4064 10.307 17.2957 10.233 17.1739 10.1826C17.0521 10.1321 16.9215 10.1061 16.7897 10.1061C16.6578 10.1061 16.5272 10.1321 16.4054 10.1826C16.2836 10.233 16.1729 10.307 16.0797 10.4002V10.4202Z" fill="#363636"/</svg>',
			wpforms_html_attributes( $primary['id'], $primary['class'], $primary['data'], $primary['attr'] ),
			$primary['required'], // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
			$value // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
		);
	}

	/**
	 * Enqueue frontend limit option js.
	 *
	 * @since 1.5.6
	 *
	 * @param array $forms Forms on the current page.
	 */
	public function frontend_js( $forms ) {

		// Get fields.
		$fields = array_map(
			function( $form ) {
				return empty( $form['fields'] ) ? array() : $form['fields'];
			},
			(array) $forms
		);

		// Make fields flat.
		$fields = array_reduce(
			$fields,
			function( $accumulator, $current ) {
				return array_merge( $accumulator, $current );
			},
			array()
		);

		// Leave only fields with limit.
		$fields = array_filter(
			$fields,
			function( $field ) {
				return $field['type'] === $this->type && isset( $field['limit_enabled'] );
			}
		);

		if ( count( $fields ) ) {
			$min = \wpforms_get_min_suffix();
			wp_enqueue_script( 'wpforms-text-limit', WPFORMS_PLUGIN_URL . "assets/js/text-limit{$min}.js", array(), WPFORMS_VERSION, true );
		}
	}

	/**
	 * Format and sanitize field.
	 *
	 * @since 1.5.6
	 *
	 * @param int   $field_id     Field ID.
	 * @param mixed $field_submit Field value that was submitted.
	 * @param array $form_data    Form data and settings.
	 */
	public function format( $field_id, $field_submit, $form_data ) {

		$field = $form_data['fields'][ $field_id ];
		if ( is_array( $field_submit ) ) {
			$field_submit = implode( "\r\n", array_filter( $field_submit ) );
		}

		$name = ! empty( $field['label'] ) ? sanitize_text_field( $field['label'] ) : '';

		// Sanitize but keep line breaks.
		$value = wpforms_sanitize_textarea_field( $field_submit );

		wpforms()->process->fields[ $field_id ] = array(
			'name'  => $name,
			'value' => $value,
			'id'    => absint( $field_id ),
			'type'  => $this->type,
		);
	}

	/**
	 * Validate field on form submit.
	 *
	 * @since 1.6.2
	 *
	 * @param int   $field_id     Field ID.
	 * @param mixed $field_submit Field value that was submitted.
	 * @param array $form_data    Form data and settings.
	 */
	public function validate( $field_id, $field_submit, $form_data ) {

		parent::validate( $field_id, $field_submit, $form_data );

		if ( empty( $form_data['fields'][ $field_id ] ) || empty( $form_data['fields'][ $field_id ]['limit_enabled'] ) ) {
			return;
		}

		if ( is_array( $field_submit ) ) {
			$field_submit = implode( "\r\n", array_filter( $field_submit ) );
		}

		$field = $form_data['fields'][ $field_id ];
		$limit = absint( $field['limit_count'] );
		$mode  = ! empty( $field['limit_mode'] ) ? sanitize_key( $field['limit_mode'] ) : 'characters';
		$value = wpforms_sanitize_textarea_field( $field_submit );

		if ( 'characters' === $mode ) {
			if ( mb_strlen( str_replace( "\r\n", "\n", $value ) ) > $limit ) {
				/* translators: %s - limit characters number. */
				wpforms()->process->errors[ $form_data['id'] ][ $field_id ] = sprintf( _n( 'Text can\'t exceed %d character.', 'Text can\'t exceed %d characters.', $limit, 'wpforms-lite' ), $limit );
				return;
			}
		} else {
			if ( wpforms_count_words( $value ) > $limit ) {
				/* translators: %s - limit words number. */
				wpforms()->process->errors[ $form_data['id'] ][ $field_id ] = sprintf( _n( 'Text can\'t exceed %d word.', 'Text can\'t exceed %d words.', $limit, 'wpforms-lite' ), $limit );
				return;
			}
		}
	}
}

new WPForms_Field_Textarea();
