<?php
/*
Plugin Name: Internet Explorer Alert!
Plugin URI: http://shariarbd.com/
Description: Internet Explorer Alert is created to Alert visitor to use Mozilla Firefox or Google Chrome. That is if anyone browse your site with Internet Explorer, he/she will alert by your site to use Mozilla Firefox or Google Chrome. Plugin is created by <cite><a href="http://shariarbd.com" title="Md. Sahriar">Md. Shariar</a>.</cite>
Version: 1.5
Author: Md. Shariar
Author URI: http://shariarbd.com/
*/

$newwindownote= <<<FFOOT
window.open('http://shariarbd.com/download-web-browser/','','scrollbars=Yes,menubar=no,height=600,width=800,resizable=yes,toolbar=no,location=no,status=no');
FFOOT;
function ie_alert() 
{
global $newwindownote;
if (strpos($_SERVER['HTTP_USER_AGENT'], 'MSIE') !== FALSE) {
echo "
<script type=\"text/javascript\">
alert(\"You are using Internet Explorer.\\nPlease Click OK to get the Recommended Browser Download Link.\");
\n $newwindownote 
</script>
";
}

}

add_action('wp_footer', 'ie_alert');
?>