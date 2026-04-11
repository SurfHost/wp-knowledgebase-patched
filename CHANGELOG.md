# Changelog

## 2.0.0 — Security Hardening Release

### Security Fixes
- Fix: SQL injection vulnerabilities in uninstall queries — all queries now use `$wpdb->prepare()`
- Fix: SQL injection in settings page database query
- Fix: SQL injection in category/article order update operations
- Fix: SQL injection in legacy template taxonomy count queries
- Fix: Cross-site scripting (XSS) in legacy template term name outputs
- Fix: Cross-site scripting (XSS) in category and tag template outputs
- Fix: Cross-site scripting (XSS) in breadcrumb separator output
- Fix: Cross-site request forgery (CSRF) — added nonce verification to order forms
- Fix: Missing capability checks on order form processing
- Fix: Missing nonce verification on live search AJAX handler
- Fix: Missing capability checks on license registration AJAX handlers
- Fix: Widget title and input sanitization in all widget classes
- Fix: Insecure SSL verification disabled on external API calls
- Fix: Unsafe `scandir()` replaced with `glob()` for file inclusion
- Fix: Path traversal protection added to theme support file inclusion
- Fix: Removed unsafe input regex modification of `$_GET` superglobal

### Changes
- Version bumped to 2.0.0
- Author updated to SurfHost (originally by Mihai Iova)
