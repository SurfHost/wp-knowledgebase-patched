=== WP Knowledgebase ===
Contributors: surfhost, iova.mihai
Tags: knowledgebase, knowledge base, documentation, wiki, faq
Tested up to: 6.9.4
Stable tag: 2.0.0
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

Simple and flexible knowledge base plugin for WordPress.

== Description ==

Create a professional knowledge base or documentation site. WP Knowledgebase is easy to use, easy to customize, and works with any theme.

= Features =

* Fully responsive template files
* Live search with predictive text
* Sidebar widgets (search, categories, tags, articles)
* Breadcrumbs (on/off)
* Comments on articles (on/off)
* Drag & drop ordering for articles and categories
* Customizable slug, colors, and layout
* Template override system (like WooCommerce)
* Shortcodes: [kbe_knowledgebase], [kbe_breadcrumbs], [kbe_live_search]

= Template Customization =

Copy the `template` folder from the plugin directory into your active theme and rename it to `wp_knowledgebase`. The plugin will automatically use your theme's templates instead of the defaults.

= Languages =

English, German, Dutch, Bulgarian, Spanish, Brazilian Portuguese, Swedish, Polish, Danish, and Indonesian.

== Installation ==

1. Upload `wp-knowledgebase` to `/wp-content/plugins/`
2. Activate through the Plugins menu
3. Configure via the Knowledgebase menu in wp-admin

The plugin creates a "Knowledgebase" page with the `[kbe_knowledgebase]` shortcode. Change the slug via Knowledgebase > Settings.

== Frequently Asked Questions ==

= I'm getting a 404 error =

Go to Settings > Permalinks and resave your permalink structure.

= How can I customize the design? =

Basic settings are available under Knowledgebase > Settings. For advanced customization, copy the plugin's `template` folder to your theme as `wp_knowledgebase` and modify the templates there.

= Can I restrict access to the knowledge base? =

Yes, any content restriction plugin that supports Custom Post Types will work.

= Can I import/export data? =

Yes, use the built-in WordPress import/export under Tools.

== Screenshots ==

1. Knowledge base home view
2. Article view
3. Settings screen
4. Available widgets

== Changelog ==

= 2.0.0 =
Security hardening release. Forked and maintained by SurfHost. Originally created by Mihai Iova.

* Security: Fixed SQL injection in uninstall queries (all queries now use $wpdb->prepare())
* Security: Fixed SQL injection in settings page query
* Security: Fixed SQL injection in category/article order updates
* Security: Fixed SQL injection in template taxonomy count queries
* Security: Fixed XSS in legacy template term/category/tag outputs
* Security: Fixed XSS in breadcrumb separator output
* Security: Added CSRF protection to order forms (nonce verification)
* Security: Added capability checks to order form processing
* Security: Added nonce verification to live search AJAX
* Security: Added capability checks to license AJAX handlers
* Security: Fixed widget input sanitization
* Security: Removed disabled SSL verification on external API calls
* Security: Replaced unsafe scandir() with glob() for file inclusion
* Security: Added path traversal protection to theme support inclusion
* Security: Removed unsafe regex modification of $_GET superglobal
* Change: Version bumped to 2.0.0
* Change: Author updated to SurfHost

= 1.3.4 =
* New: Added [kbe_breadcrumbs] and [kbe_live_search] shortcodes
* Fixed: Sorting articles and categories not working
* Misc: Article icon styles no longer depend on wrapper

= 1.3.3 =
* Fixed: Image upload not working in media library
* Fixed: Main page not showing sidebar

= 1.3.2 =
* Fixed: Getting Started page taking over other admin pages

= 1.3.1 =
* New: Added kbe_live_search_results_count filter
* New: Added wp_knowledgebase JS global variable
* New: Added Getting Started admin page
* Fixed: Twenty Nineteen theme compatibility
* Fixed: SVG icon issues on certain themes

= 1.3.0 =
* New: New template system for front-end
* Misc: Refactored admin pages

= 1.2.5 =
* Misc: Patch release for 1.3.0

= 1.2.4 =
* New: Added Danish language
* Misc: Updated translations
* Misc: Refactored main plugin file

= 1.2.3 =
* New: Option to disable CSS output
* Enhancement: Removed unwanted H1 from archive templates
* Fixed: JSON error when saving page with shortcode

= 1.2.2 =
* Enhancement: Updated admin page design
* New: Search excerpt in live search results
* New: Customizable search placeholder text
* New: Customizable no-results message
* New: Customizable breadcrumbs separator

= 1.2.1 =
* Fixed: Knowledgebase page creation from admin notice
* Enhancement: CSS fixes

= 1.2.0 =
* Gutenberg compatibility

= 1.1.9 =
* Search fix

= 1.1.8 =
* Excerpt support in search results

= 1.1.7 =
* Divi theme fixes

= 1.1.6 =
* Responsive CSS updates

= 1.1.5 =
* Multiple bug fixes, code cleanup, migration system added

= 1.0 - 1.1.4 =
* Initial releases and iterative improvements
