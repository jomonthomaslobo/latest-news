<?php
/* Plugin Name: Recent News
 * Plugin URI: https://example.com/plugins/recent-news/
 * Description: Display the latest news articles on your website.
 * Version: 1.0
 * Author: Jomon Thomas Lobo
 * License: GPL v2 or later
 * License URI: https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain: recent-news
 */

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 *  Register the "news" custom post type
 */

function latest_news_setup_post_type(){
    register_post_type('news',['public'=>true]) ;

}
add_action('init','latest_news_setup_post_type');

/** Activation Hook */
function latest_news_activated(){
    //Register latest news post type
    latest_news_setup_post_type() ;
    //Clear Permalinks after post type registration
    flush_rewrite_rules() ;
}

register_activation_hook(__FILE__, 'latest_news_activated' );

/** Deactivation Hook */
function latest_news_deactivated(){
    //Un Register Post Type
    unregister_post_type( 'news' );
    //Clear Permalinks 
    flush_rewrite_rules() ;
}

register_deactivation_hook( __FILE__, 'latest_news_deactivated' );
