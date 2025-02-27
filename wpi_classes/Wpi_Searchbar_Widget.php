<?php
/**
 * Created by PhpStorm.
 * User: Artur
 * Date: 30.10.2017
 * Time: 10:59
 */

namespace wpi\wpi_classes;

class Wpi_Searchbar_Widget extends \WP_Widget {

	/**
	 * Register widget with WordPress.
	 */
	function __construct() {
		parent ::__construct(
			'searchfilter', // Base ID
			esc_html__( 'WPI Suchfilter', WPI_PLUGIN_NAME ), // Name
			array( 'description' => esc_html__( 'Immobilien Suchfilter', WPI_PLUGIN_NAME ), ) // Args
		);
	}

	/**
	 * Front-end display of widget.
	 *
	 * @see WP_Widget::widget()
	 *
	 * @param array $args Widget arguments.
	 * @param array $instance Saved values from database.
	 */
	public function widget( $args, $instance ) {
		echo $args[ 'before_widget' ];
		if ( ! empty( $instance[ 'title' ] ) ) {
			echo $args[ 'before_title' ] . apply_filters( 'widget_title', $instance[ 'title' ] ) . $args[ 'after_title' ];
		}
		echo '<div id="widget-searchfilter">';
		echo do_shortcode( '[search_filter_form]' );
		echo '</div>';
		echo $args[ 'after_widget' ];
	}

	/**
	 * Back-end widget form.
	 *
	 * @see WP_Widget::form()
	 *
	 * @param array $instance Previously saved values from database.
	 */
	public function form( $instance ) {
		$title = ! empty( $instance[ 'title' ] ) ? $instance[ 'title' ] : esc_html__( 'New title', 'text_domain' );
		?>
		<p>
			<label for="<?php echo esc_attr( $this -> get_field_id( 'title' ) ); ?>"><?php esc_attr_e( 'Title:', 'text_domain' ); ?></label>
			<input class="widefat" id="<?php echo esc_attr( $this -> get_field_id( 'title' ) ); ?>"
			       name="<?php echo esc_attr( $this -> get_field_name( 'title' ) ); ?>" type="text"
			       value="<?php echo esc_attr( $title ); ?>">
		</p>
		<?php
	}

	/**
	 * Sanitize widget form values as they are saved.
	 *
	 * @see WP_Widget::update()
	 *
	 * @param array $new_instance Values just sent to be saved.
	 * @param array $old_instance Previously saved values from database.
	 *
	 * @return array Updated safe values to be saved.
	 */
	public function update( $new_instance, $old_instance ) {
		$instance            = array();
		$instance[ 'title' ] = ( ! empty( $new_instance[ 'title' ] ) ) ? strip_tags( $new_instance[ 'title' ] ) : '';

		return $instance;
	}
}