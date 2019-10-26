<?php
/**
 * Customizer Control: SC_Control shop customizer main control
 *
 * @package     Bstone
 * @author      StackThemes
 * @copyright   Copyright (c) 2018, Bstone
 * @link        https://wpbstone.com/
 * @since       1.1.6
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class SC_Control extends WP_Customize_Control {

	/**
	 * Colum class width
	 *
	 * @access public
	 * @var $column
	 */
	public $column = 'bst-col-12';

	/**
	 * Input group text
	 *
	 * @access public
	 * @var $text
	 */
	public $text = false;

	/**
	 * Input group icon
	 *
	 * @access public
	 * @var $icon
	 */
	public $icon = false;

	/**
	 * Input group unit
	 *
	 * @access public
	 * @var $unit
	 */
	public $unit = false;

	/**
	 * Input group label type
	 *
	 * @access public
	 * @var $label_type
	 */
	public $label_type = 'simple';

	/**
	 * Input group color
	 *
	 * @access public
	 * @var $color
	 */
	public $color = '';

	/**
	 * Input condition
	 *
	 * @access public
	 * @var $condition
	 */
	public $condition = array();

	/**
	 * Normalize method arguments.
	 *
	 * @param array $args Method arguments associative array.
	 */
	protected function normalize_args( $args = array() ) {

		$normalized = array();

		$args = wp_parse_args(
			$args, array(
				'choices' => null,
				'input_attrs' => null,
				'id' => null,
				'text' => null,
				'icon' => null,
				'unit' => null,
				'wrap_class' => null,
				'link' => 'default',
			)
		);

		foreach ( $args as $key => $value ) {
			$normalized[ $key ] = ( isset( $this->{$key} ) && is_null( $args[ $key ] ) ) ? $this->{$key} : $value;
		}

		return $normalized;
	}

	/**
	 * Build wrap class for element
	 *
	 * @param array $args Method arguments associative array.
	 */
	protected function wrap_class( $args = array() ) {

		$classes = '';

		// Check if element has addon: text, icon, unit.
		foreach ( array( 'text', 'icon', 'unit' ) as $addon ) {
			if ( ! empty( $args[ $addon ] ) ) {
				$classes .= 'sc-element-has-' . $addon . ' ';
			}
		}

		// Check if element has custom wrap class.
		if ( ! empty( $args['wrap_class'] ) ) {
			$classes .= $args['wrap_class'] . ' ';
		}

		return $classes;

	}

	/**
	 * Renders the control wrapper and calls $this->render_content() for the internals.
	 *
	 * @since 1.1.6
	 */
	public function render() {
		$class = 'customize-control customize-control-' . $this->type . ' ' . $this->column;
		
		$bst_control_id = str_replace("]","", $this->id);
		$bst_control_id = str_replace("[","-", $bst_control_id);
		?>
		<li id="<?php echo esc_attr( $bst_control_id ); ?>" class="<?php echo esc_attr( $class ); ?>">
			<?php
			$this->render_content();
			$this->render_condition();
			?>
		</li>
		<?php
	}

	/**
	 * Renders the logical visibility condition
	 *
	 * @since 1.1.6
	 */
	protected function render_condition() {
		if ( ! count( $this->condition ) ) {
			return;
		}

		$condition = $this->condition;
		$relation  = 'AND';

		if ( isset( $condition['relation'] ) && ! empty( $condition['relation'] ) ) {
			$relation = strtoupper( $condition['relation'] );
			unset( $condition['relation'] );
		}

		?>
		<script>
			scControlVisibilityCondition( '<?php echo esc_attr( $this->id ); ?>', <?php echo wp_json_encode( $condition ); ?>, '<?php echo esc_attr( $relation ); ?>' );
		</script>
		<?php
	}

	/**
	 * Render the control's label.
	 *
	 * @param string $label Set the custom label value.
	 */
	protected function render_label( $label = null ) {
		if ( is_null( $label ) ) {
			$label = $this->label;
		}
		if ( ! empty( $label ) ) {
		?>
		<span class="customize-control-title"><?php echo esc_html( $label ); ?></span>
		<?php
		}
	}

	/**
	 * Render the control's description.
	 */
	protected function render_description() {
		if ( ! empty( $this->description ) ) {
		?>
		<span class="description customize-control-description"><?php echo esc_html( $this->description ); ?></span>
		<?php
		}
	}

	/**
	 * Render the control's input group text.
	 *
	 * @param string $text Set the custom input group text value.
	 */
	protected function render_input_group_text( $text = null ) {
		if ( is_null( $text ) ) {
			$text = $this->text;
		}
		if ( ! empty( $text ) ) {
		?>
		<span class="sc-input-group-text">
			<?php echo esc_html( $text ); ?>
		</span>
		<?php
		}
	}

	/**
	 * Render the control's input group icon.
	 *
	 * @param string $icon Set the custom input group icon value.
	 */
	protected function render_input_group_icon( $icon = null ) {
		if ( is_null( $icon ) ) {
			$icon = $this->icon;
		}
		if ( ! empty( $icon ) ) {
		?>
		<span class="sc-input-group-icon">
			<img src="<?php echo esc_attr( BSTONE_SC_URI ) . 'assets/icons/' . esc_attr( $icon ); ?>.svg">
		</span>
		<?php
		}
	}

	/**
	 * Render the control's input group unit.
	 *
	 * @param string $unit Set the custom input group unit value.
	 */
	protected function render_input_group_unit( $unit = null ) {
		if ( is_null( $unit ) ) {
			$unit = $this->unit;
		}
		if ( ! empty( $unit ) ) {
		?>
		<span class="sc-input-group-unit">
			<?php echo esc_attr( $unit ); ?>
		</span>
		<?php
		}
	}

	/**
	 * Render the control's input attributes
	 *
	 * @param array $input_attrs Method arguments associative array.
	 */
	protected function render_input_attrs( $input_attrs = array() ) {
		foreach ( $input_attrs as $attr => $value ) {
			echo esc_html( $attr ) . '="' . esc_attr( $value ) . '" ';
		}
	}

	/**
	 * Render the control's form input element.
	 *
	 * @param array $args Method arguments associative array.
	 * @see   self::normalize_args();
	 */
	protected function render_input( $args = array() ) {

		$args = $this->normalize_args(
			wp_parse_args(
				$args,
				array(
					'input_type' => 'text',
					'value' => $this->value(),
				)
			)
		);
		?>
		<div class="sc-element sc-element-input sc-element-input-<?php echo esc_attr( $args['input_type'] ); ?> <?php echo esc_attr( $this->wrap_class( $args ) ); ?>">
			<?php
			$this->render_input_group_text( $args['text'] );
			$this->render_input_group_icon( $args['icon'] );
			?>
			<input type="<?php echo esc_attr( $args['input_type'] ); ?>" <?php $this->render_input_attrs( $args['input_attrs'] ); ?> value="<?php echo esc_attr( $args['value'] ); ?>" <?php $this->link( $args['link'] ); ?> placeholder="<?php echo esc_attr( $args['value'] ); ?>"/>
			<?php
			$this->render_input_group_unit( $args['unit'] );
			?>
		</div>
		<?php
	}

	/**
	 * Render the control's form select element.
	 *
	 * @param array $args Method arguments associative array.
	 * @see   self::normalize_args();
	 */
	protected function render_select( $args = array() ) {

		$args = $this->normalize_args(
			wp_parse_args(
				$args,
				array(
					'selected' => $this->value(),
				)
			)
		);

		?>
		<div class="sc-element sc-element-select <?php echo esc_attr( $this->wrap_class( $args ) ); ?>">
			<?php
			$this->render_input_group_text( $args['text'] );
			$this->render_input_group_icon( $args['icon'] );
			?>
			<select <?php $this->link( $args['link'] ); ?> <?php $this->render_input_attrs( $args['input_attrs'] ); ?>>
				<?php
				foreach ( $args['choices'] as $value => $label ) {
					echo '<option';
					if ( is_array( $label ) ) {
						foreach ( $label as $option_data_key => $option_data_value ) {
							if ( 'label' !== $option_data_key ) {
								echo ' ' . esc_html( $option_data_key ) . '="' . esc_attr( $option_data_value ) . '"';
							}
						}
						$label = isset( $label['label'] ) ? $label['label'] : $value;
					}
					echo ' value="' . esc_attr( $value ) . '"' . selected( $args['selected'], $value, false ) . '>' . esc_attr( $label ) . '</option>';
				}
				?>
			</select>
			<?php
			$this->render_input_group_unit( $args['unit'] );
			?>
		</div>
		<?php
	}

	/**
	 * Render the control's form checkbox element.
	 *
	 * @param string $input_type type of checkbox.
	 * @param string $choices options for checkbox.
	 */
	protected function render_checkbox( $input_type = 'button', $choices = array() ) {
		$multi_values = ! is_array( $this->value() ) ? explode( ',', $this->value() ) : $this->value();
		$classes = 'sc-checkbox-' . $input_type;
	?>
		<div class="<?php echo esc_attr( $classes ); ?>">
			<?php foreach ( $choices as $value => $label ) { ?>
				<?php if ( 'button' === $input_type ) { ?>
					<div class="sc-checkbox-item">
						<label>
							<input type="checkbox" <?php $this->input_attrs(); ?> value="<?php echo esc_attr( $value ); ?>" <?php checked( in_array( $value, $multi_values, true ) ); ?> />
							<span class="sc-checkbox-hidden"></span>
							<span class="sc-checkbox-label"><?php echo esc_html( $label ); ?></span>
						</label>
					</div>
				<?php continue; } ?>
					<div class="sc-checkbox-item">
						<label>
							<img src="<?php echo esc_attr( $label ); ?>">
							<input type="checkbox" <?php $this->input_attrs(); ?> value="<?php echo esc_attr( $value ); ?>" <?php checked( in_array( $value, $multi_values, true ) ); ?> />
							<span class="sc-checkbox-hidden"></span>
						</label>
					</div>
				<?php } ?>
			<input type="hidden" <?php $this->link(); ?> value="<?php echo esc_attr( implode( ',', $multi_values ) ); ?>" />
		</div>
	<?php
	}

	/**
	 * Render the control's radio element.
	 *
	 * @param array $args Method arguments associative array.
	 * @see   self::normalize_args();
	 */
	protected function render_radio( $args = array() ) {

		$args = $this->normalize_args(
			wp_parse_args(
				$args,
				array(
					'selected' => $this->value(),
					'input_type' => 'button',
				)
			)
		);

		?>
		<div class="sc-element sc-element-radio sc-element-radio-<?php echo esc_attr( $args['input_type'] ); ?> <?php echo esc_attr( $this->wrap_class( $args ) ); ?>">
			<?php
			foreach ( $args['choices'] as $value => $label ) {
				$class = ' sc-radio-item ';
				if ( $value === $args['selected'] ) {
					$class .= ' sc-selected ';
				}
				echo '<a class="' . esc_attr( $class ) . '" data-value="' . esc_attr( $value ) . '" ';
				if ( is_array( $label ) ) {
					foreach ( $label as $option_data_key => $option_data_value ) {
						if ( 'label' !== $option_data_key ) {
							echo ' ' . esc_html( $option_data_key ) . '="' . esc_attr( $option_data_value ) . '"';
						}
					}
					$label = isset( $label['label'] ) ? $label['label'] : $value;
				}
				echo '>';
				switch ( $args['input_type'] ) {
					case 'image':
						echo '<img src="' . esc_attr( $label ) . '" >';
						break;

					case 'icon':
						echo '<img src="' . esc_attr( BSTONE_SC_URI ) . 'assets/icons/' . esc_attr( $label ) . '.svg">';
						break;

					default:
						echo esc_html( $label );
						break;
				}
				echo '</a>';
			}
			?>
		</div>
		<input class="sc-radio-value" type="hidden" value="<?php echo esc_attr( $args['selected'] ); ?>" <?php $this->link( $args['link'] ); ?> <?php $this->render_input_attrs( $args['input_attrs'] ); ?> />
		<?php
	}

	/**
	 * Render the control's toggle element.
	 *
	 * @param array $sublable Label for the toggle.
	 */
	public function render_toggle( $sublable = '' ) {
	?>
		<div class="sc-toggle-group">
			<?php
			if ( ! empty( $sublable ) ) {
				echo '<span class="sc-sublabel">' . esc_html( $sublable ) . '</span>';
			}
			?>
			<div class="sc-toggle">
				<span class="sc-toggle-bullet">
				<input type="hidden" class="sc-toggle-value" value="<?php echo esc_attr( $this->value() ); ?>" <?php $this->link(); ?> >
			</div>
		</div>
	<?php
	}

	/**
	 * Render the control's textarea element.
	 *
	 * @param array $args Method arguments associative array.
	 * @see   self::normalize_args();
	 */
	public function render_textarea( $args = array() ) {

		$args = $this->normalize_args(
			wp_parse_args(
				$args,
				array(
					'value' => $this->value(),
				)
			)
		);

		?>
		<div class="sc-element sc-element-textarea <?php echo esc_attr( $this->wrap_class( $args ) ); ?>">
			<?php
			$this->render_input_group_text( $args['text'] );
			?>
			<textarea <?php $this->link( $args['link'] ); ?> <?php $this->render_input_attrs( $args['input_attrs'] ); ?>>
				<?php echo esc_attr( $args['value'] ); ?>
			</textarea>
		</div>
		<?php
	}

	/**
	 * Render the control's button element.
	 *
	 * @param array $args Method arguments associative array.
	 * @see   self::normalize_args();
	 */
	public function render_button( $args = array() ) {

		$args = $this->normalize_args(
			wp_parse_args(
				$args,
				array(
					'value' => $this->value(),
				)
			)
		);

		?>
		<div class="sc-element sc-element-button <?php echo esc_attr( $this->wrap_class( $args ) ); ?>">
			<button class="sc-button" <?php $this->render_input_attrs( $args['input_attrs'] ); ?>>
				<?php
				if ( ! empty( $args['icon'] ) ) {
					echo '<span class="sc-button-icon"><img src="' . esc_attr( BSTONE_SC_URI ) . 'assets/icons/' . esc_attr( $args['icon'] ) . '.svg"></span>';
				}

				if ( ! empty( $args['text'] ) ) {
					echo esc_html( $args['text'] );
				}
				?>
			</button>
		</div>
		<?php
	}
}
