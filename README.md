# WP Knowledgebase

Simple and flexible knowledge base plugin for WordPress.

## Credits and upstream

This is a fork of [WP Knowledgebase](https://wordpress.org/plugins/wp-knowledgebase/) **1.3.4 by Mihai Iova**. The original plugin, its templates and its design are his work. This fork adds security hardening and removes the licensing / phone-home code, and is maintained by [SurfHost](https://surfhost.nl).

The fork is distributed under the GPL-2.0-or-later, the same license as the upstream plugin. See [LICENSE](LICENSE) for the full text.

The plugin's `Plugin URI` points at this fork's repository rather than at the upstream wordpress.org listing, on purpose: the listing is Mihai Iova's, and pointing there would both misattribute the fork and send site owners looking for updates that will never be published there.

## Features

- Fully responsive templates
- Live search with predictive text
- Sidebar widgets (search, categories, tags, articles)
- Breadcrumbs (on/off)
- Comments on articles (on/off)
- Drag & drop ordering for articles and categories
- Customizable slug, colors, and layout
- Template override system (like WooCommerce)
- Shortcodes: `[kbe_knowledgebase]`, `[kbe_breadcrumbs]`, `[kbe_live_search]`
- Multi-language: English, German, Dutch, Bulgarian, Spanish, Brazilian Portuguese, Swedish, Polish, Danish, Indonesian

## Installation

1. Upload `wp-knowledgebase` to `/wp-content/plugins/`
2. Activate through the Plugins menu
3. Configure via **Knowledgebase** in wp-admin

The plugin creates a "Knowledgebase" page with the `[kbe_knowledgebase]` shortcode. Change the slug via Knowledgebase > Settings.

## Template Customization

Copy the `template` folder from the plugin into your active theme and rename it to `wp_knowledgebase`. The plugin will automatically use your theme's templates instead of the defaults.

## Changelog

### 2.0.1
- Removed all external links to original author's site
- Disabled update checker, license registration, deactivation feedback
- Removed PRO upgrade links and promo content
- Sanitized all `$_GET` usage in admin functions

### 2.0.0 > Security Hardening
- Fixed SQL injection in uninstall, settings, order, and template queries
- Fixed XSS in legacy templates and breadcrumbs
- Added CSRF protection to order forms
- Added capability checks and nonce verification to AJAX handlers
- Sanitized widget settings on save, and escaped the widget heading on output
- Replaced unsafe `scandir()` with `glob()` for file inclusion
- Added path traversal protection to theme support inclusion

Note: widget output escaping is only partly done. The category widget still
echoes term names and term links unescaped. See the "Known issues" section in
[CHANGELOG.md](CHANGELOG.md) for the exact scope.

See [CHANGELOG.md](CHANGELOG.md) for full history.

## License

GPL-2.0-or-later. See [LICENSE](LICENSE).

Original WP Knowledgebase is copyright Mihai Iova and also GPL-2.0-or-later; the
fork inherits that license and cannot be relicensed.
