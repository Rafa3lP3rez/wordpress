<?php
/**
 * Blocks Initializer
 *
 * Enqueue CSS/JS of all the blocks.
 *
 * @since   1.0.0
 * @package CGB
 */

// Exit if accessed directly.
if (! defined('ABSPATH')) {
    exit;
}

if (! defined('SUPERBBLOCKS_VERSION')) {
    exit;
}

/**
 * Enqueue Gutenberg block assets for both frontend + backend.
 *
 * Assets enqueued:
 * 1. blocks.style.build.css - Frontend + Backend.
 * 2. blocks.build.js - Backend.
 * 3. blocks.editor.build.css - Backend.
 *
 * @uses {wp-blocks} for block type registration & related functions.
 * @uses {wp-element} for WP Element abstraction — structure of blocks.
 * @uses {wp-i18n} to internationalize the block's text.
 * @uses {wp-editor} for WP editor styles.
 * @since 1.0.0
 */
function superb_blocks_cgb_block_assets()
{ // phpcs:ignore
    // Register block styles for both frontend + backend.
    wp_register_style(
        'superb_blocks-cgb-style-css', // Handle.
        plugins_url('dist/blocks.style.build.css', dirname(__FILE__)), // Block style CSS.
        is_admin() ? array( 'wp-editor' ) : null, // Dependency to include the CSS after it.
        SUPERBBLOCKS_VERSION // filemtime( plugin_dir_path( __DIR__ ) . 'dist/blocks.style.build.css' ) // Version: File modification time.
    );

    wp_register_style(
        'superb_blocks-cgb-fontawesome-css', // Handle.
        plugins_url('lib/fontawesome/css/all.min.css', dirname(__FILE__)), // Block style CSS.
        is_admin() ? array( 'wp-editor' ) : null, // Dependency to include the CSS after it.
        SUPERBBLOCKS_VERSION // filemtime( plugin_dir_path( __DIR__ ) . 'dist/blocks.style.build.css' ) // Version: File modification time.
    );

    // Register block editor script for backend.
    wp_register_script(
        'superb_blocks-cgb-block-js', // Handle.
        plugins_url('dist/blocks.build.js', dirname(__FILE__)), // Block.build.js: We register the block here. Built with Webpack.
        array( 'wp-blocks', 'wp-i18n', 'wp-element', 'wp-editor' ), // Dependencies, defined above.
        SUPERBBLOCKS_VERSION, // filemtime( plugin_dir_path( __DIR__ ) . 'dist/blocks.build.js' ), // Version: filemtime — Gets file modification time.
        true // Enqueue the script in the footer.
    );

    // Register block editor styles for backend.
    wp_register_style(
        'superb_blocks-cgb-block-editor-css', // Handle.
        plugins_url('dist/blocks.editor.build.css', dirname(__FILE__)), // Block editor CSS.
        array( 'wp-edit-blocks' ), // Dependency to include the CSS after it.
        SUPERBBLOCKS_VERSION // filemtime( plugin_dir_path( __DIR__ ) . 'dist/blocks.editor.build.css' ) // Version: File modification time.
    );

    // WP Localized globals. Use dynamic PHP stuff in JavaScript via `cgbGlobal` object.
    /*wp_localize_script(
        'superb_blocks-cgb-block-js',
        'cgbGlobal', // Array containing dynamic data for a JS Global.
        [
            'pluginDirPath' => plugin_dir_path(__DIR__),
            'pluginDirUrl'  => plugin_dir_url(__DIR__),
            // Add more data here that you want to access from `cgbGlobal` object.
        ]
    );*/

    /**
     * Register Gutenberg block on server-side.
     *
     * Register the block on server-side to ensure that the block
     * scripts and styles for both frontend and backend are
     * enqueued when the editor loads.
     *
     * @link https://wordpress.org/gutenberg/handbook/blocks/writing-your-first-block-type#enqueuing-block-scripts
     * @since 1.16.0
     */
    register_block_type(
        'superb-blocks/superb-blocks',
        array(
            // Enqueue blocks.style.build.css on both frontend & backend.
            'style'         => array('superb_blocks-cgb-fontawesome-css','superb_blocks-cgb-style-css'),
            // Enqueue blocks.build.js in the editor only.
            'editor_script' => 'superb_blocks-cgb-block-js',
            // Enqueue blocks.editor.build.css in the editor only.
            'editor_style'  => 'superb_blocks-cgb-block-editor-css',
        )
    );
}

// Hook: Block assets.
add_action('init', 'superb_blocks_cgb_block_assets');

add_action('admin_init', 'superb_blocks_spbThemesNotification', 9);
function superb_blocks_spbThemesNotification()
{
    $notifications = include(plugin_dir_path(__FILE__).'/admin_notification/Autoload.php');
    $options = array("delay"=> "+3 days");
    $notifications->Add("superb_blocks_admin_notification", "Unlock All Features with Superb Blocks Premium", "
		
            Take advantage of the up to <span style='font-weight:bold;'>45% discount</span> and unlock all features for Superb Blocks Premium. 
            The discount is only available for a limited time.
    
            <div>
            <a style='margin-bottom:15px;' class='button button-large button-secondary' target='_blank' href='https://superbthemes.com/plugins/superb-blocks/'>Read more</a> <a style='margin-bottom:15px;' class='button button-large button-primary' target='_blank' href='https://superbthemes.com/plugins/superb-blocks/'>Buy now</a>
            </div>
    
            ", "info", $options);
    $notifications->Boot();
}
