<?php

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) exit;


Class KBE_Submenu_Page_Search_Analytics extends KBE_Submenu_Page {

	/**
	 * Helper init method that runs on parent __construct
	 *
	 */
	protected function init() {

	}


	/**
	 * Callback for the HTML output for the Settings page
	 *
	 */
	public function output() {

		?>

			<div class="wrap kbe-wrap kbe-wrap-promo-search-analytics">

				<div id="kbe-promo-content-wrapper">

					<img src="<?php echo KBE_PLUGIN_DIR_URL; ?>/assets/images/kbe-logo.png" />

					<h1>Search Analytics</h1>
					<h2>This feature is not available in this version.</h2>

				</div>

		    </div>

		<?php

	}

}