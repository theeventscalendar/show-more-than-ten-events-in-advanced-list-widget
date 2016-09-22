<?php
/**
 * Plugin Name: The Events Calendar — Show More than Ten Events in Advanced List Widget
 * Description: This snippet lets you override widget settings, and force a specific number of events to show in Events Calendar Pro's Advanced List Widget.
 * Version: 1.0.0
 * Author: Modern Tribe, Inc.
 * Author URI: http://m.tri.be/1x
 * License: GPLv2 or later
 */
defined( 'WPINC' ) or die;

add_filter( 'widget_display_callback', 'tribe_increase_maximum_in_advanced_list_widget', 10, 2 );
 
function tribe_increase_maximum_in_advanced_list_widget( array $instance, $widget ) {
	
	if ( is_a( $widget, 'Tribe__Events__Pro__Advanced_List_Widget' ) ) {
		$instance['limit'] = 30;
	}
	return $instance;
}
