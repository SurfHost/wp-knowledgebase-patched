# Changelog

Fork of WP Knowledgebase 1.3.4 by Mihai Iova. Fork maintained by SurfHost.
Licensed GPL-2.0-or-later, same as the upstream plugin. See LICENSE.

## 2.0.1 > Cleanup Release

- Removed all external links to original author's site
- Disabled update checker (no longer phones home)
- Disabled license registration/deregistration
- Disabled deactivation feedback email to external address
- Removed PRO upgrade links and promo content
- Cleaned up and simplified readme
- Sanitized all `$_GET` usage in admin functions

## 2.0.0 > Security Hardening Release

### Security Fixes

- Fix: SQL injection vulnerabilities in uninstall queries > all queries now use `$wpdb->prepare()`
- Fix: SQL injection in settings page database query
- Fix: SQL injection in category/article order update operations
- Fix: SQL injection in legacy template taxonomy count queries
- Fix: Cross-site scripting (XSS) in legacy template term name outputs
- Fix: Cross-site scripting (XSS) in category and tag template outputs
- Fix: Cross-site scripting (XSS) in breadcrumb separator output
- Fix: Cross-site request forgery (CSRF) > added nonce verification to order forms
- Fix: Missing capability checks on order form processing
- Fix: Missing nonce verification on live search AJAX handler
- Fix: Missing capability checks on license registration AJAX handlers
- Fix: Widget settings are sanitized on save in all four widget classes
  (`sanitize_text_field()` / `absint()` in each `update()` method), and the
  widget heading is escaped with `esc_html()` on output in all four
- Fix: Insecure SSL verification disabled on external API calls
- Fix: Unsafe `scandir()` replaced with `glob()` for file inclusion
- Fix: Path traversal protection added to theme support file inclusion
- Fix: Removed unsafe input regex modification of `$_GET` superglobal

### Known issues, NOT fixed in 2.0.0

Earlier versions of this changelog described the widget work as an XSS fix
covering the widgets generally. That was too broad. Only the two paths listed
above were actually changed, and the following remain unescaped in the code as
shipped:

- `includes/widgets/kbe-widget-category.php` renders each category inside the
  loop as raw output: `$kbe_taxonomy->name` and the `get_term_link()` result are
  echoed without `esc_html()` / `esc_url()`, and both land in `href` and `title`
  attributes that are not even quoted. A term name containing markup is not
  escaped here.
- The `form()` method of all four widget classes echoes the stored setting into
  `value="..."` without `esc_attr()`. Values are sanitized on save, so this is
  the weaker of the two problems, but it is still unescaped output.

These are open findings, not fixed work. Do not read the entries above as
covering them.

### Changes

- Version bumped to 2.0.0
- Fork author set to SurfHost. Original plugin by Mihai Iova; upstream credit is
  retained in the plugin header, README.md and readme.txt
