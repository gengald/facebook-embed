<?php
/*
Plugin Name: Facebook Embed
Plugin Script: fb-e.php
Description: Embed Facebook Post / Images
Version: 1.0
License: GPL
Author: fb-embed.reloado.com/en/
Author URI: http://fb-embed.reloado.com/en/

=== RELEASE NOTES ===
2013-07-31 - v1.0 - first version

This program is free software; you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation; either version 2 of the License, or
(at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program; if not, write to the Free Software
Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA 02111-1307 USA
Online: http://www.gnu.org/licenses/gpl.txt
*/

add_shortcode("fb-e", "fbe_handler");
function fbe_handler($a) {
$url = $a[url];
return "<center><div id=\"fb-root\"></div>
<script>(function(d, s, id) { var js, fjs = d.getElementsByTagName(s)[0]; if (d.getElementById(id)) return; js = d.createElement(s); js.id = id; js.src = \"//connect.facebook.net/en_US/all.js#xfbml=1\"; fjs.parentNode.insertBefore(js, fjs); }(document, 'script', 'facebook-jssdk'));</script>
<fb:post href=\"".$url."\"></fb:post></center>";
}
add_action('admin_menu', 'my_plugin_menu_fbe');
function my_plugin_menu_fbe() {
add_options_page('Preferences', 'Facebook Embed', 'manage_options', 'fbe', 'my_plugin_options_fbe');
}
function my_plugin_options_fbe() {
if (!current_user_can('manage_options'))
{
wp_die( __('You do not have sufficient permissions to access this page.') );
}
?>
<div class="wrap">
<h2>Facebook Embed: Information</h2>
Usage:
<ol>
<li>Open a post or image on facebook.com.</li>
<li>Click on the date / time.</li>
<li>Copy the URL (https://www.facebook.com/NAME/posts/000).</li>
<li>Insert the following code [fb-e url="URL"] in articles (HTML-Editor).</li>
</ol>
<hr>
Do you like this plugin? Please <a href="http://fb-embed.reloado.com/donation.php" target="_blank">donate</a> and visit <a href="http://fb-embed.reloado.com/en/" target="_blank">fb-embed.reloado.com/en/</a> for more information.
</div>
<?php } ?>