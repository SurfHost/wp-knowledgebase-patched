<?php

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) exit;



/**
 * Includes the files needed for the Getting Started page
 *
 */
function kbe_include_files_admin_promo() {

    // Get legend admin dir path
    $dir_path = plugin_dir_path( __FILE__ );

    // Include submenu pages
    if( file_exists( $dir_path . 'class-submenu-page-search-analytics.php' ) )
        include $dir_path . 'class-submenu-page-search-analytics.php';

    if( file_exists( $dir_path . 'class-submenu-page-article-feedback.php' ) )
        include $dir_path . 'class-submenu-page-article-feedback.php';

}
add_action( 'kbe_include_files', 'kbe_include_files_admin_promo' );


/**
 * Register the Article Feedback admin submenu page
 *
 */
function kbe_register_submenu_page_promo_article_feedback( $submenu_pages ) {

    if( ! is_array( $submenu_pages ) )
        return $submenu_pages;

    if( kbe_is_website_registered() )
        return $submenu_pages;

    $submenu_pages['article_feedback'] = array(
        'class_name' => 'KBE_Submenu_Page_Article_Feedback',
        'data'       => array(
            'page_title' => __( 'Article Feedback', 'wp-knowledgebase' ),
            'menu_title' => __( 'Article Feedback', 'wp-knowledgebase' ),
            'capability' => 'manage_options',
            'menu_slug'  => 'kbe-article-feedback'
        )
    );

    return $submenu_pages;

}
add_filter( 'kbe_register_submenu_page', 'kbe_register_submenu_page_promo_article_feedback', 45 );


/**
 * Register the Search Analytics admin submenu page
 *
 */
function kbe_register_submenu_page_promo_search_analytics( $submenu_pages ) {

    if( ! is_array( $submenu_pages ) )
        return $submenu_pages;

    if( kbe_is_website_registered() )
        return $submenu_pages;

    $submenu_pages['search_analytics'] = array(
        'class_name' => 'KBE_Submenu_Page_Search_Analytics',
        'data'       => array(
            'page_title' => __( 'Search Analytics', 'wp-knowledgebase' ),
            'menu_title' => __( 'Search Analytics', 'wp-knowledgebase' ),
            'capability' => 'manage_options',
            'menu_slug'  => 'kbe-search-analytics'
        )
    );

    return $submenu_pages;

}
add_filter( 'kbe_register_submenu_page', 'kbe_register_submenu_page_promo_search_analytics', 50 );


/**
 * Adds a promotional card to the bottom of the settings page to promote
 * the content restriction add-on
 *
 */
// Content restriction promo removed — no longer linking to external site.