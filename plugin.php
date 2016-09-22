<?php
/**
 * Plugin Name: The Events Calendar — Show More than Ten Events in Advanced List Widget
 * Description: This extension lets you override widget settings, and force a specific number of events to show in Events Calendar Pro's Advanced List Widget.
 * Version: 1.0.0
 * Author: Modern Tribe, Inc.
 * Author URI: http://m.tri.be/1971
 * License: GPLv2 or later
 */
defined( 'WPINC' ) or die;

class TEC__More_than_Ten_Events_in_Advanced_List_Widget {

	const VERSION = '1.0.0';

	public $plugins_required = array(
	    'Tribe__Events__Main'      => '4.2',
	    'Tribe__Events__Pro__Main' => '4.2'
	);

	public function __construct() {
		add_action( 'plugins_loaded', array( $this, 'init' ), 100 );
	}

	public function init() {
	    
	    if ( ! function_exists( 'tribe_register_plugin' ) || ! tribe_register_plugin( __FILE__, __CLASS__, self::VERSION, $this->plugins_required ) ) {
	    	return;
	    }

	    add_filter( 'widget_display_callback', array( $this, 'increase_maximum' ), 10, 2 );
	}

	public function increase_maximum( array $instance, $widget ) {

		if ( is_a( $widget, 'Tribe__Events__Pro__Advanced_List_Widget' ) ) {
			$instance['limit'] = 30;
		}

		return $instance;
	}
}

new TEC__More_than_Ten_Events_in_Advanced_List_Widget();
