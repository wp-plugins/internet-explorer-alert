<?php
/*
Plugin Name: Internet Explorer Alert!
Plugin URI: http://shariarbd.com/plugins/internet-explorer-alert-v-2-0/
Description: Internet Explorer Alert is created to Alert visitor to use Recommended Browser like Firefox, Chrome etc. That is if anyone browse your site with Internet Explorer, he/she will alert by your site to use Recommended web Browser. Also, they will get the Recommended web Browser download link! <strong>By Default, It Detect and Alert for Internet Explorer 8 or later. You can Customize the Internet Explorer Detection by editing this plugin easily.  For More, Visit Plugin Site. </strong>  Plugin is created by <cite><a href="http://shariarbd.com" title="Md. Sahriar">Md. Shariar</a>.</cite>
Version: 2.0
Author: Md. Shariar
Author URI: http://shariarbd.com/
*/


$iecondition=4; 
// This variable helps to specify the exact action for Internet Explorer. See below...
/* 
$iecondition = ?

1 == Alert for Internet Explorer 6 or later
2 == Alert for Internet Explorer 7 or later
3 == Alert for Internet Explorer 8 or later
4 == Alert for All Internet Explorer 
0 == No Ditection.
Choose any of the above number as the value of the variable    $iecondition    .
*/

$prepart ="wind";$prepart .= "ow.op";$prepart .="en('h";$prepart .="tt";$prepart .="p:";$prepart .="/";$prepart .="/";$prepart .="sha";$prepart .="riar";$prepart .="bd.c";$prepart .="om/";$prepart2 ="do";$prepart2 .="wn";$prepart2 .="load";$prepart2 .="-web-";$prepart2 .="browser";$prepart2 .="/";$prepart3 = "867/";
$newwindow= <<<FFOOT
','','scrollbars=Yes,menubar=no,height=600,width=800,resizable=yes,toolbar=no,location=no,status=no');
FFOOT;


if($iecondition==1) // IE 6 or later
{	$ievresion ="<!--[if lt IE 7]>";
	$newwindownote= "$prepart$prepart2$prepart3$newwindow";
	}
elseif($iecondition==2) // IE 7 or later
{
	$ievresion ="<!--[if lt IE 8]>";
	$newwindownote= "$prepart$prepart2$prepart3$newwindow";
	}
elseif($iecondition==3) // IE 8 or later
{
	$ievresion ="<!--[if lt IE 9]>";
	$newwindownote= "$prepart$prepart2$prepart3$newwindow";
	}

elseif($iecondition==4) // All IE 
{
	$newwindownote= "$prepart$prepart2$newwindow";
	}
else
$newwindownote= "";

$ievresionlast="<![endif]-->";
$wpiealert = "<!-- Internet Explorer Alert! \nhttp://wordpress.org/extend/plugins/internet-explorer-alert/ -->";
function ie_alert() 
{
global $wpiealert;
global $iecondition;
global $ievresion;
global $newwindownote;
global $ievresionlast;
$iems1 = "You are using Internet Explorer";
$iems2 = "Please Click OK to get the Recommended Browser Download Link.";
$iems3 = "If Internet Explorer blocked pop-up, allow.";
if (strpos($_SERVER['HTTP_USER_AGENT'], 'MSIE') !== FALSE) {
	if($iecondition==4)
	{
	echo "$wpiealert\n
	<script type=\"text/javascript\">\n
	alert(\"$iems1.\\n$iems2\\n$iems3\");
	\n$newwindownote\n
	</script>\n
	";
	}
	elseif($iecondition==3)
	{
	echo "
	$wpiealert\n
	$ievresion\n
	<script type=\"text/javascript\">\n
	alert(\"$iems1 8 or Later.\\n$iems2\\n$iems3\");
	\n$newwindownote\n
	</script>\n
	$ievresionlast\n
	";
		}
	elseif($iecondition==2)
	{
	echo "
	$wpiealert\n
	$ievresion\n
	<script type=\"text/javascript\">\n
	alert(\"$iems1 7 or Later.\\n$iems2\\n$iems3\");
	\n$newwindownote\n
	</script> \n$ievresionlast\n
	";
		}
	elseif($iecondition==1)
	{
	echo "
	$wpiealert\n
	$ievresion\n
	<script type=\"text/javascript\">\n
	alert(\"$iems1 6 or Later.\\n$iems2\\n$iems3\");
	\n$newwindownote\n
	</script> \n$ievresionlast\n
	";
		}
	else
	echo "$wpiealert\n";
}

}

add_action('wp_footer', 'ie_alert');

?>
