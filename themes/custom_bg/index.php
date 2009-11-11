<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<?php 
require_once(dirname(__FILE__) . '../../../../../../wp-load.php'); 
/** PLUGIN URL PATH **/
// Pre-2.6 compatibility
if ( !defined('WP_CONTENT_URL') )
    define( 'WP_CONTENT_URL', get_option('siteurl') . '/wp-content');
if ( !defined('WP_CONTENT_DIR') )
    define( 'WP_CONTENT_DIR', ABSPATH . 'wp-content' );
// Guess the location
$sp_plugin_url = WP_CONTENT_URL.'/plugins/'.plugin_basename(dirname(__FILE__)).'';
function sptop($mykey){
global $wpdb;
$cj_splash_plugin_name = "CJ Splash Page";
$shortname = strtolower(str_replace(" ", "_", $cj_splash_plugin_name)."_");
$settingsname = $shortname."settings";
	$sopt = get_option($settingsname);
	$mykey = $shortname.$mykey;
	foreach($sopt as $key=>$opt){
		if($key == $mykey){
			return $opt;
		}
	}
}
?>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title> <?php echo sptop('head_title'); ?> </title>
<link rel="stylesheet" type="text/css" href="<?php echo $sp_plugin_url ?>/style.css" media="screen" />
<script type="text/javascript" src="<?php echo $sp_plugin_url ?>/js/jquery.js"></script>
<script type="text/javascript" src="<?php echo $sp_plugin_url ?>/js/countdown.js"></script>
<script type="text/javascript" src="<?php echo $sp_plugin_url ?>/js/rounded.js"></script>
<script type="text/javascript" src="<?php echo $sp_plugin_url ?>/js/custom.js"></script>
<!--[if lte IE 6]>
<link rel="stylesheet" type="text/css" href="<?php echo $sp_plugin_url ?>/styleie6.css" media="screen" />
<script type="text/javascript"> DD_roundies.addRule('.pngfix'); </script>
<![endif]-->
<!--[if lte IE 7]>
<link rel="stylesheet" type="text/css" href="<?php echo $sp_plugin_url ?>/styleie7.css" media="screen" />
<![endif]-->
<link rel="shortcut icon" href="<?php echo $sp_plugin_url ?>/images/favicon.ico" />
<script type="text/javascript">
$(function(){
    var liftoffTime = new Date(<?php echo sptop('launch_year'); ?>, <?php echo sptop('launch_month'); ?> - 1, <?php echo sptop('launch_day'); ?>, 0, 0);
    $("#countdown").countdown({
        until: liftoffTime,
        layout: "{dn} {dl}, {hn} {hl}, {mn} {ml}, {sn} {sl}"
    });
});
</script>
<style type="text/css">
body{
	background:<?php echo sptop('custom_bg'); ?> <?php echo sptop('custom_bg_img'); ?>;
}
</style>
<?php wp_head(); ?>
<meta name="description" content="<?php echo sptop('head_description'); ?>" />
<meta name="keywords" content="<?php echo sptop('head_keywords'); ?>" />
<?php echo sptop('head_tags')."\n"; ?>
</head>
<body>
<div id="wrapper">
<div id="logo">
	<a href="<?php bloginfo('home'); ?>" title="<?php bloginfo('description'); ?>">
		<img class="pngfix" src="<?php if(sptop('logo_url') == "yoursite.com/images/logo.png") {echo $sp_plugin_url.'/images/logo.png';} else { echo sptop('logo_url');} ?>" alt="<?php bloginfo('description'); ?>" />
	</a>
</div><!-- /logo -->
<div id="content" class="pngfix">
    <div class="topsection">
	<h1 class="heading"><?php echo sptop('page_heading'); ?></h1><!-- /heading -->
	<p class="msg"><?php echo sptop('page_msg'); ?></p><!-- /message -->
    </div>
	<div id="countdown">54 Days, 21 Hours, 11 Minutes, 23 Seconds</div><!-- /countdown -->
	<div id="subscribeform">
		<form action="<?php echo $sp_plugin_url; ?>/mail.php#smessage" method="post" class="aform" id="sendsubscriber">
			<input type="text" class="inputbox" id="semail" name="semail" value="Enter your email address"  onfocus="if ( this.value == this.defaultValue ) this.value = '';" onblur="if ( this.value == '' ) this.value = this.defaultValue" />
			<input type="hidden" name="sto" value="<?php echo sptop('email_id'); ?>" />
			<input type="hidden" name="ssubject" value="<?php echo sptop('email_subject'); ?>" />
			<input type="hidden" name="sthankyou" value="<?php echo sptop('email_thankyou'); ?>" />
			<input type="submit" value="" name="sendsinfo" class="submit" />
		</form>
	</div><!-- /subscribeform -->
	<p id="smessage" class="spammsg">Your email is safe with us. We hate spam as much as you do.</p>
	<p class="connect">
		<?php
		if(sptop('twitter_username') == "" && sptop('facebook_username') == ""){
			$connect_via = "";
		}elseif(sptop('twitter_username') != "" && sptop('facebook_username') != ""){
			$connect_via = "Connect via: ";
			$or = " or ";
		}
		else{
			$connect_via = "Connect via: ";
		}
		if(sptop('twitter_username') != ""){
			$twitter = '<a href="http://www.twitter.com/'.sptop('twitter_username').'" title="Follow on Twitter" target="_blank">Twitter</a>'.$or;
		}
		if(sptop('facebook_username') != ""){
			$facebook = ' <a href="http://www.facebook.com/'.sptop('facebook_username').'" title="Connect via Facebook" target="_blank">Facebook</a>';
		}
		if(sptop('rss_url') != ""){
			$rssurl = ' | <a href="'.sptop('rss_url').'" title="Subscribe" target="_blank">Subscribe via RSS</a>';
		}
                if(sptop('login_link') == "Yes"){
                    $loginlink = ' | <a href="'.get_bloginfo('wpurl').'/wp-admin" title="Login"> Login </a> ';
                }
		?>
		<?php echo $connect_via.$twitter.$facebook.$rssurl; ?>
	</p>
</div><!-- /content -->
<p class="credit">
	Powered by <a href="http://www.wordpress.org" title="WordPress.org">WordPress</a> | <a href="http://www.cssjockey.com" title="CSSJockey.com">CSSJockey</a>
        <?php echo $loginlink; ?>
</p>
</div><!-- /wrapper -->
</body>
</html>
<?php die(); ?>