=== Add menu separators to navigation ===
Contributors: markhowellsmead
Donate link: https://www.paypal.me/mhmli
Tags: separator, menu, navigation, wp_nav_menu, sayhellogmbh
Requires at least: 5.0
Tested up to: 6.6.1
Requires PHP: 5.6
Stable tag: trunk
License: GPLv3
License URI: http://www.gnu.org/licenses/gpl-3.0.html

== Description ==

Allow separator (`HR` / line) and unlinked, text-only entries in WordPress' classic navigation menus.

=== Block editor ===

**This plugin does not support the Block Editor or the navigation block**. It is intended for use with the [classic menus](https://codex.wordpress.org/WordPress_Menu_User_Guide) (e.g. `wp_nav_menu`).

== Usage ==

1. Upload the plugin folder to the `/wp-content/plugins/` directory
2. Activate the plugin through the 'Plugins' menu in WordPress
3. Edit your menu in the “Appearance” section of WordPress Admin. Add a custom link entry, then use `---` (three dashes) as link text for a horizontal line or use `#` as a URL for an unlinked menu entry.

== Filters ==

Version 2.1.0 of the plugin added two filters, with which developers can customise the output.

-   `mhm-menu-separator/separator` allows customisation of a separator output. Receives the arguments `'<hr class="mhm-menu-separator">'` (the uncustomised HTML) and `$item` (the menu item).
-   `mhm-menu-separator/title` allows customisation of an unlinked menu entry. Receives the arguments `$item->post_title` (the plain, unlinked menu item text) and `$item` (the menu item).

== Changelog ==

= 2.1.3 =

-   Fix post title comparison for correct output of HR tag.

= 2.1.2 =

-   Fix version number. Sorry!

= 2.1.1 =

-   Add plugin assets for plugin repository. (Not part of functional code.)

= 2.1.0 =

-   Add filters for customisation of HTML output.

= 2.0.1 =

-   Confirms compatibility up to WordPress 5.3.2.

= 2.0.0 =

-   Confirms functionality up to WordPress 5.2.0.
-   Use short syntax for PHP arrays.
-   Code tidying (no functional changes).
-   Demands PHP 5.6.

= 1.2.0 =

-   Add CSS class name to the menu separator HTML tag.
-   Confirmation of compatibility up to WordPress 4.9.8.

= 1.1.4.1 =

-   Confirmation of compatibility with WordPress 4.7.4.

= 1.1.4 =

-   Confirmation of compatibility with WordPress 4.7.
-   Swap out “key” variable for inline text domain keys, as recommended by the WordPress Translation team.
-   No functional changes.

= 1.1.3 =

-   Confirmation of compatibility with WordPress 4.6.

= 1.1.2 =

-   Remove unnecessary explicit translation entries for plugin name and description from the PHP source code.

= 1.1.1 =

-   Add missing text domain definition for localization.

= 1.1 =

-   Add plugin localization.
-   Add WordPress version checks.

= 1.0 =

-   Initial public version.
