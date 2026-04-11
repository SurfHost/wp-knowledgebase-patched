# WP Knowledgebase

Simple and flexible knowledge base plugin for WordPress. Security hardened fork, maintained by [SurfHost](https://surfhost.nl). Originally created by Mihai Iova.

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

### 2.0.0 — Security Hardening
- Fixed SQL injection in uninstall, settings, order, and template queries
- Fixed XSS in legacy templates, widgets, and breadcrumbs
- Added CSRF protection to order forms
- Added capability checks and nonce verification to AJAX handlers
- Fixed widget input sanitization
- Replaced unsafe `scandir()` with `glob()` for file inclusion
- Added path traversal protection to theme support inclusion

See [CHANGELOG.md](CHANGELOG.md) for full history.

## License

GPLv2 or later
