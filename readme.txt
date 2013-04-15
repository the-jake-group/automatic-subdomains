=== Automatic Subdomains ===
Contributors: The Jake Group
Donate link: http://www.thejakegroup.com/
Tags: subdomains, permalinks, landing pages
Requires at least: 2.3
Tested up to: 3.4.1
Stable tag: 1.3
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

Automatically maps subdomains to page and post permalinks based on post slug.

== Description ==

The purpose of this plugin is to facilitate deployment of subdomain links to 
landing pages on a WordPress website. The plugin automatically maps subdomains 
to page and post permalinks based on the post_name field in the database. 
There are no administrative settings. 

This plugin DOES NOT edit DNS zone files. Subdomain DNS records themselves 
either need to be set up individually or as a wildcard record in the DNS zone 
file to map to the website directory. Once the request reaches the WordPress 
system, the plugin will automatically check to see if the subdomain matches a 
page or post name. If so, the WordPress query is edited to get that page/post 
at its permalink. The WordPress siteurl is excluded, as is the naked 
second-level domain.

Example mappings:

URL &rarr; Mapping  
http://example.com &rarr; default homepage (no remapping)  
http://www.example.com &rarr; default homepage (no remapping)  
http://test-page.example.com &rarr; example.com/test-page/  
http://mypost.example.com &rarr; example.com/mypost/

== Installation ==

1. Upload the `automatic-subdomains` directory to the `/wp-content/plugins/` 
directory.
2. Activate the plugin through the "Plugins" menu in WordPress.

== Frequently Asked Questions ==

= Does this plugin edit my domain's DNS zone file? =

No. You must first edit your zone file to create the subdomains or a wildcard 
subdomain to resolve to your WordPress site.

= Must I have certain permalink settings? =

No. You may use any permalink settings.

= To what page/post will my subdomain map? =

Subdomains will map to pages and posts based on the post_name field in the 
database. The subdomain must match the post_name exactly in order to map, or 
it will redirect to the homepage.

= What if I have a fourth, fifth, etc. level domain? =

The mapping will be made based on the deepest (left-most) element of the full 
domain name.

== Screenshots ==

None (yet!).

== Changelog ==

= 1.3 =
* Bug Fix: Fixes potential compatibility issue with other plugins.

= 1.2 =
* Bug Fix: Fixes potential redirect loop issue.

= 1.1 =
* Rewrite to rely on post_name instead of page-name and name.
* Fixed bug causing child level pages not to map appropriately.

= 1.0 =
* Initial launch.
