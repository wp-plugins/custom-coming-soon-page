<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title> Coming Soon </title>
<?php
require_once( dirname(__FILE__) . '../../../../../../wp-load.php');
if ( !defined('WP_CONTENT_URL') )define( 'WP_CONTENT_URL', get_option('siteurl') . '/wp-content');
if ( !defined('WP_CONTENT_DIR') )define( 'WP_CONTENT_DIR', ABSPATH . 'wp-content' );
/***********************
 * PLUGIN DIRECTORY PATH
***********************/
$plugin_path = WP_CONTENT_URL.'/plugins/'.plugin_basename(dirname(__FILE__));
?>
<link rel="stylesheet" media="screen" href="<?php echo $plugin_path; ?>/style.css" />
</head>
<body>
<br /><br /><br />
<h2 align="center">Coming Soon</h2>
<br />
<p align="center">
		Please paste your xHTML/CSS documents in <strong>wp-plugins/cj-coming-soon/themes/custom_xHTML/</strong> directory.
</p>
</body>
</html>
<?php die(); ?>