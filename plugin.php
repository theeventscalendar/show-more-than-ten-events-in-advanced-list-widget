<?php
/**
 * Plugin Name: The Events Calendar Extension: Show More than Ten Events in Advanced List Widget
 * Description: This extension lets you override widget settings, and force a specific number of events to show in Events Calendar Pro's Advanced List Widget.
 * Version: 1.0.0
 * Author: Modern Tribe, Inc.
 * Author URI: http://m.tri.be/1971
 * License: GPLv2 or later
 */
defined( 'WPINC' ) or die;

class Tribe__Extension__More_than_Ten_Events_in_Advanced_List_Widget {
	
	/**
	 * This extension's current version.
	 */
	const VERSION = '1.0.0';
       
	/**
	 * Each plugin required by this extension in 'main class' => 'minimum version #' format.
	 *
	 * @var array
	 */
	public $plugins_required = array(
	    'Tribe__Events__Main'      => '4.2',
	    'Tribe__Events__Pro__Main' => '4.2'
	);
	
        /**
	 * Tribe__Extension__More_than_Ten_Events_in_Advanced_List_Widget constructor.
	 */
	public function __construct() {
		add_action( 'plugins_loaded', array( $this, 'init' ), 100 );
	}
	
        /**
	 * Extension hooks and initialization.
	 */
	public function init() {
	    
	    if ( ! function_exists( 'tribe_register_plugin' ) || ! tribe_register_plugin( __FILE__, __CLASS__, self::VERSION, $this->plugins_required ) ) {
	    	return;
	    }

	    add_filter( 'widget_display_callback', array( $this, 'increase_maximum' ), 10, 2 );
	}
	
	/**
	 * Increase the maximum number of events allowed in the list widget output.
	 *
	 * @param array $instance
	 * @param object $widget
	 * @return array
	 */	
	public function increase_maximum( array $instance, $widget ) {

		if ( is_a( $widget, 'Tribe__Events__Pro__Advanced_List_Widget' ) ) {
			$instance['limit'] = 30;
		}

		return $instance;
	}
}

new Tribe__Extension__More_than_Ten_Events_in_Advanced_List_Widget();
