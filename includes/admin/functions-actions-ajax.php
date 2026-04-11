<?php

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) exit;


/**
 * License registration — no longer phones home to external server
 *
 */
function kbe_action_ajax_register_website() {

	wp_die(0);

}
add_action( 'wp_ajax_kbe_action_ajax_register_website', 'kbe_action_ajax_register_website' );


/**
 * License deregistration — no longer phones home to external server
 *
 */
function kbe_action_ajax_deregister_website() {

	wp_die(0);

}
add_action( 'wp_ajax_kbe_action_ajax_deregister_website', 'kbe_action_ajax_deregister_website' );


/**
 * Returns a user friendly error message for the provided API action and error code,
 * when we are connecting to WP Knowledgebase website's API
 *
 * @param string $action
 * @param string $error_code
 *
 * @return string
 *
 */
function kbe_get_api_action_response_error( $action, $error_code ) {

    $error_messages = array(
        'register_website' => array(
            'license_is_null'          => __( "The provided license key does not exist or is invalid.", 'wp-knowledgebase' ),
            'license_inactive'         => __( "The provided license key is inactive.", 'wp-knowledgebase' ),
            'license_expired'          => __( "The provided license key is expired.", 'wp-knowledgebase' ),
            'activation_limit_reached' => __( "Your activation limit for this license key has been reached. Please upgrade your account if you'd like to register more websites.", 'wp-knowledgebase' ),
            'register_website_failed'  => __( "Something went wrong. Could not activate the website. Please try again.", 'wp-knowledgebase' )
        ),
        'deregister_website' => array(
            'license_is_null'           => __( "The provided license key does not exist or is invalid.", 'wp-knowledgebase' ),
            'website_is_null'           => __( "This website is not registered on our system.", 'wp-knowledgebase' ),
            'deregister_website_failed' => __( "Something went wrong. Could not activate the website. Please try again.", 'wp-knowledgebase' )
        )
    );

    return ( ! empty( $error_messages[$action][$error_code] ) ? $error_messages[$action][$error_code] : '' );

}