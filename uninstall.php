<?php
//if uninstall not called from WordPress exit
if ( ! defined( 'WP_UNINSTALL_PLUGIN' ) ) {
	exit();
}

$options = get_option( 'kbe_wipe_uninstall' );
if ( ! isset( $options ) || false == $options ) {
	return;
}


global $wpdb;

//=========> Delete Plugin Settings From options Table
delete_option( 'kbe_settings' );
delete_option( 'kbe_bgcolor' );
delete_option( 'kbe_plugin_slug' );
delete_option( 'kbe_article_qty' );
delete_option( 'kbe_sidebar_home' );
delete_option( 'kbe_sidebar_inner' );
delete_option( 'kbe_search_setting' );
delete_option( 'kbe_comments_setting' );
delete_option( 'kbe_taxonomy_children' );
delete_option( 'kbe_breadcrumbs_setting' );
delete_option( 'widget_kbe_tags_widgets' );
delete_option( 'widget_kbe_search_widget' );
delete_option( 'widget_kbe_article_widget' );
delete_option( 'widget_kbe_category_widget' );

//=========> Delete `terms_order` Column From trms Table
$wpdb->query( "ALTER TABLE {$wpdb->terms} DROP COLUMN `terms_order`" );

//=========> Get Knowledgebase page and Delete all relivent Data
$kbe_get_page = $wpdb->get_results( $wpdb->prepare(
	"SELECT * FROM {$wpdb->posts} WHERE post_content LIKE %s AND post_type = %s",
	'%[kbe_knowledgebase]%',
	'page'
) );

foreach ( $kbe_get_page as $get_page ) {
	$kbe_page_ID = absint( $get_page->ID );

	//Delete all Knowledgebase page Relivent data from `postmeta` Table
	$wpdb->query( $wpdb->prepare( "DELETE FROM {$wpdb->postmeta} WHERE post_id = %d", $kbe_page_ID ) );

	//Delete all Knowledgebase page Child data from `posts` Table
	$wpdb->query( $wpdb->prepare( "DELETE FROM {$wpdb->posts} WHERE post_parent = %d", $kbe_page_ID ) );

	//Delete Knowledgebase page from `posts` Table
	$wpdb->query( $wpdb->prepare( "DELETE FROM {$wpdb->posts} WHERE ID = %d", $kbe_page_ID ) );
}

//=========> Get all Images of `kbe_knowledgebase` post type and Delete all Images Data
$kbe_get_post_images = $wpdb->get_results( $wpdb->prepare(
	"SELECT * FROM {$wpdb->posts} WHERE post_type = %s",
	'kbe_knowledgebase'
) );

$kbe_upload_dir = wp_upload_dir();

foreach ( $kbe_get_post_images as $get_post_images ) {
	$kbe_posts_img_ID = absint( $get_post_images->ID );

	$kbe_post_imgs_qry = $wpdb->get_results( $wpdb->prepare(
		"SELECT * FROM {$wpdb->posts} WHERE post_parent = %d AND post_type = %s AND post_mime_type = %s",
		$kbe_posts_img_ID,
		'attachment',
		'image/jpeg'
	) );
	foreach ( $kbe_post_imgs_qry as $get_post_img ) {
		$kbe_img_ID = absint( $get_post_img->ID );

		// Extract path from images
		$kbe_img_path      = get_post_meta( $kbe_img_ID, '_wp_attached_file', true );
		$kbe_main_img_name = substr( $kbe_img_path, strrpos( $kbe_img_path, '/' )+1 );
		$kbe_sub_path      = substr( $kbe_img_path, 0, strrpos( $kbe_img_path, '/' ) );

		$kbe_img_meta = get_post_meta( $kbe_img_ID, '_wp_attachment_metadata', true );

		$kbe_thumbnail      = $kbe_img_meta['sizes']['thumbnail']['file'];
		$kbe_medium         = $kbe_img_meta['sizes']['medium']['file'];
		$kbe_post_thumbnail = $kbe_img_meta['sizes']['post-thumbnail']['file'];

		$kbe_upload_path = $kbe_upload_dir['basedir'];

		unlink( $kbe_upload_path . '/' . $kbe_sub_path . '/' . $kbe_main_img_name );
		unlink( $kbe_upload_path . '/' . $kbe_sub_path . '/' . $kbe_thumbnail );
		unlink( $kbe_upload_path . '/' . $kbe_sub_path . '/' . $kbe_medium );
		unlink( $kbe_upload_path . '/' . $kbe_sub_path . '/' . $kbe_post_thumbnail );

		//Delete all Knowledgebase Posts from `posts` Table
		$wpdb->query( $wpdb->prepare( "DELETE FROM {$wpdb->postmeta} WHERE post_id = %d", $kbe_img_ID ) );
	}
}

//=========> Get all Posts of `kbe_knowledgebase` post type and Delete all relevant Data
$kbe_get_posts = $wpdb->get_results( $wpdb->prepare(
	"SELECT * FROM {$wpdb->posts} WHERE post_type = %s",
	'kbe_knowledgebase'
) );

foreach ( $kbe_get_posts as $get_posts ) {
	$kbe_posts_ID = absint( $get_posts->ID );

	//Delete all Comments of `kbe_knowledgebase` posts from `comments` Table
	$wpdb->query( $wpdb->prepare( "DELETE FROM {$wpdb->comments} WHERE comment_post_ID = %d", $kbe_posts_ID ) );

	//Delete all Meta Data of `kbe_knowledgebase` posts from `postmeta` Table
	$wpdb->query( $wpdb->prepare( "DELETE FROM {$wpdb->postmeta} WHERE post_id = %d", $kbe_posts_ID ) );

	//Delete all `kbe_knowledgebase` posts Realtion Data from `term_relationships` Table
	$wpdb->query( $wpdb->prepare( "DELETE FROM {$wpdb->term_relationships} WHERE object_id = %d", $kbe_posts_ID ) );

	//Delete all `kbe_knowledgebase` Child data from `posts` Table
	$wpdb->query( $wpdb->prepare( "DELETE FROM {$wpdb->posts} WHERE post_parent = %d", $kbe_posts_ID ) );

	//Delete all Knowledgebase Posts from `posts` Table
	$wpdb->query( $wpdb->prepare( "DELETE FROM {$wpdb->posts} WHERE ID = %d", $kbe_posts_ID ) );
}

//=========> Delete All Categories and Tags of Knowledgebase
$kbe_get_terms = $wpdb->get_results( $wpdb->prepare(
	"SELECT kbe_term.*, kbe_tax.*
	FROM {$wpdb->terms} AS kbe_term
	INNER JOIN {$wpdb->term_taxonomy} AS kbe_tax
	ON kbe_term.term_id = kbe_tax.term_id
	WHERE kbe_tax.taxonomy = %s
	OR kbe_tax.taxonomy = %s",
	'kbe_taxonomy',
	'kbe_tags'
) );

foreach ( $kbe_get_terms as $get_term ) {
	$kbe_term_ID = absint( $get_term->term_id );

	$wpdb->query( $wpdb->prepare( "DELETE FROM {$wpdb->terms} WHERE term_id = %d", $kbe_term_ID ) );
}

//=========> Delete All Taxonomies and Tags of Knowledgebase
$wpdb->query( $wpdb->prepare( "DELETE FROM {$wpdb->term_taxonomy} WHERE taxonomy = %s", 'kbe_taxonomy' ) );

$wpdb->query( $wpdb->prepare( "DELETE FROM {$wpdb->term_taxonomy} WHERE taxonomy = %s", 'kbe_tags' ) );
