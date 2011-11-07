<?php
/*
Plugin Name: Internet Explorer Alert!
Plugin URI: http://shariarbd.com/
Description: Internet Explorer Alert is created to Alert visitor to use Mozilla Firefox or Google Chrome. That is if anyone browse your site with Internet Explorer, he/she will alert by your site to use Mozilla Firefox or Google Chrome. Plugin is created by <cite><a href="http://shariarbd.com" title="Md. Sahriar">Md. Shariar</a>.</cite>
Version: 1.0
Author: Md. Shariar
Author URI: http://shariarbd.com/
*/

function ie_alert() 
{

if (strpos($_SERVER['HTTP_USER_AGENT'], 'MSIE') !== FALSE) {
echo "
<script type=\"text/javascript\">
alert(\"You are using Internet Explorer. \\nWe highly recommend to Browse this site with Mozilla Firefox or Google Chrome.\");
</script>";
}

}

add_action('wp_footer', 'ie_alert');
?>