<?php
/*
Plugin Name: Automatic Subdomains
Plugin URI: http://www.thejakegroup.com/wordpress/
Description: Automatically maps subdomains to page and post permalinks.
Version: 1.2
Author: Tyler Bruffy & Mark Wahl
Author URI: http://www.thejakegroup.com
License: GPL2
*/

/*  Copyright 2012  Mark Wahl  (email : markwahl99@yahoo.com)

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License, version 2, as 
    published by the Free Software Foundation.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/

//	Add the function tjg_as_get_subdomain when wordpress is initialized.
add_action('init','tjg_as_get_subdomain');

function tjg_as_get_subdomain()
{
	//	Get the URL that was entered
	$URL = $_SERVER['HTTP_HOST'];
	//	Extract the subdomain component
	$fulldomain = explode('.',$URL);
	$subdomain = $fulldomain[0];
	//	Check whether there was a subdomain
	$domaindepth = count($fulldomain);
	//	Get the siteURl to check against
	$siteurl = site_url();
	$strippedURL = str_replace('http://','',$siteurl);
	$editedSiteurl = explode('.',$strippedURL);

	
	//	If there is a subdomain, and that subdomain isn't the siteURL
	if ($domaindepth > 2 AND $fulldomain != $editedSiteurl) {
		//	Run a SQL query on the Wordpress DB for posts where
		//	the subdomain is the same as the post_name.
		global $wpdb;
		$object = $wpdb->get_results(
			"SELECT * FROM $wpdb->posts WHERE post_name = '$subdomain'");

		//	If the query had a result
		if (!empty($object))	{
			//	Get the post Object with that ID
			$post = get_post($object[0]->ID);
			//	Get the permalink for that post
			$permalink = get_permalink($post);
			//	And take us there
			header("Location: $permalink");
		}
		//	Otherwise, go to the homepage
		else {
			header("Location: $siteurl");
		}
	}
}

?>