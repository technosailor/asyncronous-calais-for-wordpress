<?php
/**
 * Plugin Name: Asynchronous Calais for WordPress
 * Version: 1.0-alpha
 * Description: Uses Thompson-Reuters OpenCalais API for automatic suggestion of tags. Utilizes the <a href="https://github.com/techcrunch/wp-async-task/">TechCrunch Asynchronous Library</a> and takes inspiration from Dan Grossman's <a href="https://wordpress.org/plugins/calais-auto-tagger/">WP Calais Auto Tagger</a>.
 * Author: Aaron Brazell
 * Author URI: http://technosailor.com
 * Text Domains: asynccalais
 * Domain Path: /langs
 * License: MIT
 */

define( 'ASYNC_CALAIS_VERSION', '1.0-alpha' );
define( 'ASYNC_CALAIS_URL', plugin_dir_url( __FILE__ ) );
define( 'ASYNC_CALAIS_PATH', dirname( __FILE__ ) . '/' );
define( 'ASYNC_CALAIS_BASENAME', plugin_basename( __FILE__ ) );
define( 'ASYNC_CALAIS_CLASS_DIR', ASYNC_CALAIS_PATH . 'classes/' );

require_once( ASYNC_CALAIS_CLASS_DIR . 'async/class-wp-async-task.php' );

require_once( ASYNC_CALAIS_CLASS_DIR . 'api/class-opencalais.php' );