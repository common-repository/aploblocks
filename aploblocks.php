<?php
/**
 * Plugin Name:       AploBlocks
 * Description:       Extra design features for the block editor.  Animate, transform, move, mask & filter blocks with no coding necessary!
 * Requires at least: 6.1
 * Requires PHP:      7.4
 * Version:           1.0.2
 * Author:            AploWeb
 * Author URI:        https://www.aploweb.com
 * License:           GPL-2.0-or-later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain:       aploblocks
 *
 */

define("APLOBLOCKS_PLUGIN_VERSION","1.0.2");

/**
 * Enqueue frontend assets.
 *
 * @return void
 */
function aploblocks_plugin_styles() {

    // Register block-styles
    wp_register_style(
        'aploblocks-block-styles',
        plugin_dir_url(__FILE__) . '/assets/css/block-styles.css',
        array(),
        APLOBLOCKS_PLUGIN_VERSION
    );

    // Enqueue block styles
    wp_enqueue_style( 'aploblocks-block-styles' );	

    // Enqueue site.js for entrance anaimations
    wp_enqueue_script(
        'aploblocks-js',
        plugin_dir_url(__FILE__) . '/assets/js/site.js',
        array(),
        APLOBLOCKS_PLUGIN_VERSION 
    );


}

/**
 * Enqueue editor assets.
 *
 * @return void
 */
function aploblocks_plugin_editor_support() {

    wp_enqueue_script(
        'aploblocks-extensions',
        plugin_dir_url(__FILE__) . '/assets/js/index.js',
        ['lodash', 'react', 'react-dom', 'wp-api-fetch', 'wp-autop', 'wp-block-editor', 'wp-blocks', 'wp-components', 'wp-compose', 'wp-core-data', 'wp-data', 'wp-edit-post', 'wp-edit-site', 'wp-element', 'wp-hooks', 'wp-i18n', 'wp-notices', 'wp-plugins', 'wp-primitives'],
        APLOBLOCKS_PLUGIN_VERSION
    );

    wp_localize_script( 
        'aploblocks-filters', 
        'aploblocksplugindirurl', 
        plugin_dir_url(__FILE__) 
    );

    wp_enqueue_script(
        'aploblocks-patterninserter',
        plugin_dir_url(__FILE__) . '/assets/js/patterninserter.js',
        ['lodash', 'react', 'react-dom', 'wp-api-fetch', 'wp-autop', 'wp-block-editor', 'wp-blocks', 'wp-components', 'wp-compose', 'wp-core-data', 'wp-data', 'wp-edit-post', 'wp-edit-site', 'wp-element', 'wp-hooks', 'wp-i18n', 'wp-notices', 'wp-plugins', 'wp-primitives'],
        APLOBLOCKS_PLUGIN_VERSION
    );

    wp_enqueue_script(
        'aploblocks-site',
        plugin_dir_url(__FILE__) . '/assets/js/site.js',
        ['wp-blocks','wp-i18n','wp-element','wp-editor'],
        APLOBLOCKS_PLUGIN_VERSION
    );

    wp_enqueue_style( 
        'aploblocks-extensions-css', 
        plugin_dir_url(__FILE__) . '/assets/css/editor.css',
        array(),
        APLOBLOCKS_PLUGIN_VERSION 
    );

    wp_enqueue_style( 
        'aploblocks-patterninserter-css', 
        plugin_dir_url(__FILE__) . '/assets/css/patterninserter.css',
        array(),
        APLOBLOCKS_PLUGIN_VERSION 
    );

    wp_enqueue_style( 
        'aploblocks-patternconverter-css', 
        plugin_dir_url(__FILE__) . '/assets/css/pattern-color-convert.css',
        array(),
        APLOBLOCKS_PLUGIN_VERSION 
    );

    wp_enqueue_style( 
        'aploblocks-block-styles-css', 
        plugin_dir_url(__FILE__) . '/assets/css/block-styles.css'
        ,array(),APLOBLOCKS_PLUGIN_VERSION 
    );

}


add_action( 'wp_enqueue_scripts', 'aploblocks_plugin_styles' );
add_action('enqueue_block_editor_assets', 'aploblocks_plugin_editor_support');

require_once(__DIR__ . "/inc/rest-api.php");
require_once(__DIR__ . "/inc/register_styles.php");