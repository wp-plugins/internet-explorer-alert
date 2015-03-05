<?php
/*
Plugin Name: Internet Explorer Alert!
Plugin URI: http://shariarbd.com/plugins/internet-explorer-alert-v-2_5/
Description: <strong>Internet Explorer Alert</strong> is created to Alert visitor to use Recommended Browser like Firefox, Chrome etc. That is if anyone browse your site with Internet Explorer, he/she will get alert by your site to use Recommended web Browser. Also, they will get the Recommended web Browser download link! <strong>By Default, It Detect and Alert for Internet Explorer 7 or Older. You can Customize the Internet Explorer Detection Easily from Settings of your Admin Panel. Also you can set the alert message if you wish; otherwise it will display the Default Alert Message.  For More, Visit Plugin Site. </strong>  Plugin is created by <cite><a href="http://shariarbd.com" title="Md. Shariar">Md. Shariar</a>.</cite> 
Version: 4.0
Author: Md. Shariar
Author URI: http://shariarbd.com/
*/
if(get_option('IEA_Version_Select')){
	$iecondition = get_option('IEA_Version_Select');
}
else {
	$iecondition = 2;
} 

$wp_IEA_Alert_Method = get_option('IEA_Alert_Method');
 

$prepart ="window.open('";
$prepart2="http://shariarbd.com/download-web-browser/";
$newwindow= <<<FFOOT
','','scrollbars=Yes,menubar=no,height=600,width=800,resizable=yes,toolbar=no,location=no,status=no');
FFOOT;

if($wp_IEA_Alert_Method=="3")
{
	$newwindownote= "$prepart$prepart2$newwindow";
	if($iecondition==1) // IE 6 or Older
	{	$ievresion ="<!--[if lt IE 7]>";
		}
	elseif($iecondition==2) // IE 7 or Older
	{
		$ievresion ="<!--[if lt IE 8]>";
		}
	elseif($iecondition==3) // IE 8 or Older
	{
		$ievresion ="<!--[if lt IE 9]>";
		}
	elseif($iecondition==4) // All IE 
	{
		$ievresion ="";
		}
}
else
{
	$newwindownote= "$prepart2";
	if($iecondition==1) // IE 6 or Older
	{	$ievresion ="<!--[if lt IE 7]>";
		}
	elseif($iecondition==2) // IE 7 or Older
	{
		$ievresion ="<!--[if lt IE 8]>";
		}
	elseif($iecondition==3) // IE 8 or Older
	{
		$ievresion ="<!--[if lt IE 9]>";
		}
	elseif($iecondition==4) // IE 9 or Older 
	{
		$ievresion ="<!--[if lte IE 9]>";
		}
}



function ie_alert() 
{
global $iecondition;
global $ievresion;
global $newwindownote;
$ievresionlast = "<![endif]-->";
$wpiealert = "<!-- Internet Explorer Alert!\nhttp://wordpress.org/extend/plugins/internet-explorer-alert/ \nAuthore: Shariar, http://shariarbd.com -->";
$iems1 = "You are using Internet Explorer";
$iems2 = "Please Click OK to get the Recommended Browser Download Link.";
$iems3 = "If Internet Explorer blocked pop-up, allow.";
$iems4 = "We Highly Recommended to ";

$wp_IEA_Alert_Message = get_option('IEA_Alert_Message');
$wp_IEA_Alert_DLink = get_option('IEA_Alert_DLink');
$wp_IEA_Alert_Method = get_option('IEA_Alert_Method');
$wp_IEA_JS_popup = get_option('IEA_JS_popup');



if (strpos($_SERVER['HTTP_USER_AGENT'], 'MSIE') !== FALSE) 
{
	if($wp_IEA_Alert_Method=="3") //JavaScript Alert
	{

		if($wp_IEA_Alert_DLink!="") //User Define Browser Download Link
		{
			$newwindownote= 
			"window.open('".$wp_IEA_Alert_DLink."','','scrollbars=Yes,menubar=no,height=600,width=800,resizable=yes,toolbar=no,location=no,status=no');";
		}

		if($wp_IEA_JS_popup==2) { $newwindownote= ""; } // Disable JavaScript popup


		if($wp_IEA_Alert_Message=="" || $wp_IEA_Alert_Message==" " || $wp_IEA_Alert_Message=="   ")
		{
			if($iecondition==4)
			{
				echo "$wpiealert\n<script type=\"text/javascript\">\nalert(\"$iems1 9 or Older.\\n$iems2\\n$iems3\");\n$newwindownote\n</script>\n";
				}
			elseif($iecondition==3)
			{
				echo "$wpiealert\n$ievresion\n<script type=\"text/javascript\">\nalert(\"$iems1 8 or Older.\\n$iems2\\n$iems3\");\n$newwindownote\n</script>\n$ievresionlast\n";
				}
			elseif($iecondition==2)
			{
				echo "$wpiealert\n$ievresion\n<script type=\"text/javascript\">\nalert(\"$iems1 7 or Older.\\n$iems2\\n$iems3\");\n$newwindownote\n</script>\n$ievresionlast\n";
				}
			elseif($iecondition==1)
			{
				echo "$wpiealert\n$ievresion\n<script type=\"text/javascript\">\nalert(\"$iems1 6 or Older.\\n$iems2\\n$iems3\");\n$newwindownote\n</script>\n$ievresionlast\n";
				}
			else
			{
				echo "$wpiealert\n";
				}
			}
		else
		{
			echo "$wpiealert\n$ievresion\n<script type=\"text/javascript\">\nalert(\"$wp_IEA_Alert_Message\");\n$newwindownote\n</script> \n$ievresionlast\n";
			}
		}
	else //HTML Alert
	{

		if($wp_IEA_Alert_DLink!="") //User Define Browser Download Link
		{
			$newwindownote=$wp_IEA_Alert_DLink;
			}

		//Select CSS
		if ($wp_IEA_Alert_Method=="2") {
			$IEA_style="ie_alert_bottom";
		}
		elseif ($wp_IEA_Alert_Method=="1") {
			$IEA_style="ie_alert_top";
		}

		//Chose Alert Message
		if($iecondition == "4"){
			$iems5 = "<a href=\"$newwindownote\">Change your Web Browser</a>";
		}
		else{
			$iems5 = "<a href=\"$newwindownote\">Update your Web Browser</a>";
		}

		

		if($wp_IEA_Alert_Message=="" || $wp_IEA_Alert_Message==" " || $wp_IEA_Alert_Message=="   ")
		{
			if($iecondition==4)
			{
				echo "$wpiealert\n<div id=\"IEAlerthtml\"><div  class=\"$IEA_style\">$iems1 9 or Older. $iems4 $iems5</div></div>\n";
				}
			elseif($iecondition==3)
			{
				echo "$wpiealert\n$ievresion\n<div id=\"IEAlerthtml\"><div  class=\"$IEA_style\">$iems1 8 or Older. $iems4 $iems5</div></div>\n$ievresionlast\n";
				}
			elseif($iecondition==2)
			{
				echo "$wpiealert\n$ievresion\n<div id=\"IEAlerthtml\"><div  class=\"$IEA_style\">$iems1 7 or Older. $iems4 $iems5</div></div>\n$ievresionlast\n";
				}
			elseif($iecondition==1)
			{
				echo "$wpiealert\n$ievresion\n<div id=\"IEAlerthtml\"><div  class=\"$IEA_style\">$iems1 6 or Older. $iems4 $iems5<</div></div>\n$ievresionlast\n";
				}
			else
			{
				echo "$wpiealert\n";
				}
			}
		else
		{
			echo "$wpiealert\n$ievresion\n<div id=\"IEAlerthtml\"><div  class=\"$IEA_style\">$wp_IEA_Alert_Message $iems5</div></div>\n$ievresionlast\n";
			}
		}

	}
}


// Admin Portion
 function IEA_OPTION()
{
    if($_POST['IEA_Update']){
		update_option('IEA_Version_Select',$_POST['IEA_Version_Select']); 
		update_option('IEA_Alert_Message',$_POST['IEA_Alert_Message']);
		update_option('IEA_Alert_DLink',$_POST['IEA_Alert_DLink']);
		update_option('IEA_Alert_Method',$_POST['IEA_Alert_Method']);
		update_option('IEA_JS_popup',$_POST['IEA_JS_popup']);
        echo '<h3 style="color:green;">Your Site is now ready to Alert accordingly as Following Settings.</h3>';
	}
	$wp_IEA_Version_Select = get_option('IEA_Version_Select');
	$wp_IEA_Alert_Method = get_option('IEA_Alert_Method');
	$wp_IEA_JS_popup = get_option('IEA_JS_popup');
?>
	<div class="wrap">
	  <form method="post" id="IEA_OPTION" class="welcome-panel">
	  	<h2>Internet Explorer Alert Settings Page</h2>
	    <fieldset class="options">
	      <table class="form-table">
	        <tr valign="top">
	          	<td>
	          		<h4>Choose Internet Explorer Version</h4>
		            <div>
		              <input type="radio" id="IEA_Version_Select_1" name="IEA_Version_Select" value="1" <?php if($wp_IEA_Version_Select == 1) { echo('checked="checked"'); } ?> />
		              <label for="IEA_Version_Select_1">: Internet Explorer 6 or Older.</label>
		              <br/>
		              <input type="radio" id="IEA_Version_Select_2" name="IEA_Version_Select" value="2" <?php if($wp_IEA_Version_Select == 2) { echo('checked="checked"'); } if($wp_IEA_Version_Select != true) { echo('checked="checked"'); } ?> />
		              <label for="IEA_Version_Select_2">: Internet Explorer 7 or Older.</label>
		              <br/>
		              <input type="radio" id="IEA_Version_Select_3" name="IEA_Version_Select" value="3" <?php if($wp_IEA_Version_Select == 3) { echo('checked="checked"'); } ?> />
		              <label for="IEA_Version_Select_3">: Internet Explorer 8 or Older.</label>
		              <br/>
		              <input type="radio" id="IEA_Version_Select_4" name="IEA_Version_Select" value="4" <?php if($wp_IEA_Version_Select == 4) { echo('checked="checked"'); } ?> />
		              <label for="IEA_Version_Select_4">: Internet Explorer 9 or Older.</label>
		            </div>
		            <br>

		            <h4>Enter Alert Message Here </h4>
		            <input name="IEA_Alert_Message" type="text" id="IEA_Alert_Message" value="<?php echo get_option('IEA_Alert_Message') ;?>" size="60"/>
		            <br>
		            <span style="color: #09F;">If Empty, The Default Alert Message will be Displayed; Otherwise The Entered Text will be Displayed When User Browse Site With IE (Version Chosen Above).</span>
					<br><br>
					<h4>Enter Custom Browser Download Link </h4>
					<input name="IEA_Alert_DLink" type="text" id="IEA_Alert_DLink" value="<?php echo get_option('IEA_Alert_DLink') ;?>" size="60"/>
					<br><span style="color: #09F;">If Empty, The Default Browser Download Page will be Displayed; Otherwise the Entered Link will be Displayed.</span>
					<br><br>

					<h4>Choose Alert Method</h4>
		            <div>
		              <input type="radio" id="IEA_Alert_Method_1" name="IEA_Alert_Method" value="1" <?php if($wp_IEA_Alert_Method == 1) { echo('checked="checked"'); } if($wp_IEA_Alert_Method != true) { echo('checked="checked"'); } ?> />
		              <label for="IEA_Alert_Method_1">: HTML Alert, Position Top.</label>
		              <br/>
		              <input type="radio" id="IEA_Alert_Method_2" name="IEA_Alert_Method" value="2" <?php if($wp_IEA_Alert_Method == 2) { echo('checked="checked"'); } ?> />
		              <label for="IEA_Alert_Method_2">: HTML Alert, Position Bottom.</label>
		              <br/>
		              <input type="radio" id="IEA_Alert_Method_3" name="IEA_Alert_Method" value="3" <?php if($wp_IEA_Alert_Method == 3) { echo('checked="checked"'); } ?> />
		              <label for="IEA_Alert_Method_3">: JavaScript Alert.</label>
		            </div>
		            <br>


		            <h4>Enable/Disable Popup for JavaScript Alert</h4>
		            <div>
		              <input type="radio" id="IEA_JS_popup_1" name="IEA_JS_popup" value="1" <?php if($wp_IEA_JS_popup == 1) { echo('checked="checked"'); } if($wp_IEA_JS_popup != true) { echo('checked="checked"'); } ?> />
		              <label for="IEA_JS_popup_1">: Enable Popup Browser Download Link.</label>
		              <br/>
		              <input type="radio" id="IEA_JS_popup_2" name="IEA_JS_popup" value="2" <?php if($wp_IEA_JS_popup == 2) { echo('checked="checked"'); } ?> />
		              <label for="IEA_JS_popup_2">: Disable Popup Browser Download Link.</label> 
		              <br><span style="color: #09F;">If Disabled, Plugin will not show popup Browser download link page for JavaScript Alert Method.</span>
					  <br><br>
		            </div>
			  	</td>
	        </tr>
	        <tr>
	          <td>
	          	<input type="submit" name="IEA_Update" value="Update" class="button button-primary button-large" />
	         	<div style="float:right; color:#09F; font-size:14px; text-transform:uppercase;">
		  			<strong>If you love this plugin, <a href="http://wordpress.org/extend/plugins/internet-explorer-alert" target="_blank">Please Rate THIS Five Star.</a></strong>
		  		</div>
	          </td>
	        </tr>
	      </table>
	    </fieldset>
	  </form>  
	</div>
<?php
}


function iealert_Admin()
{
	if (function_exists('add_options_page')) {
		add_options_page('Internet Explorer Alert', 'Internet Explorer Alert', 9, basename(__FILE__),'IEA_OPTION');
	}
}

function iealert_actions( $links, $file ) {
		if( $file == 'internet-explorer-alert/iealert.php' && function_exists( "admin_url" ) ) {
			$settings_link = '<a href="' . admin_url( 'options-general.php?page=iealert.php' ) . '">' .'Settings' . '</a>';
			array_unshift( $links, $settings_link ); // before other links
		}
		return $links;
}


function iealert_stylesheet()
{
	global $wp_IEA_Alert_Method; 
	if($wp_IEA_Alert_Method!="3"){
 		echo '<link rel="stylesheet" type="text/css" href="'.plugins_url( 'internet-explorer-alert/ie_alert_style.css' , dirname(__FILE__) ). '" />';
 	}
}


add_action('wp_head', 'iealert_stylesheet');
add_action('wp_footer', 'ie_alert');
add_action('admin_menu','iealert_Admin',1);
add_filter('plugin_action_links', 'iealert_actions', 10, 2 );

?>
