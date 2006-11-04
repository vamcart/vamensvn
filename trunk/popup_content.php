<?php

/* -----------------------------------------------------------------------------------------
   $Id: popup_content.php 1169 2005-08-22 16:07:09Z mz $   

   XT-Commerce - community made shopping
   http://www.xt-commerce.com

   Copyright (c) 2003 XT-Commerce
   -----------------------------------------------------------------------------------------
   based on:
   (c) 2003	 nextcommerce (content_preview.php,v 1.2 2003/08/25); www.nextcommerce.org
   
   Released under the GNU General Public License 
   ---------------------------------------------------------------------------------------*/

require ('includes/application_top.php');

$content_query = xtDBquery("SELECT
 					*
 					FROM ".TABLE_CONTENT_MANAGER."
 					WHERE content_group='".(int) $_GET['coID']."' and languages_id = '".$_SESSION['languages_id']."'");
$content_data = xtc_db_fetch_array($content_query, true);
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html <?php echo HTML_PARAMS; ?>>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=<?php echo $_SESSION['language_charset']; ?>" /> 
<meta http-equiv="Content-Style-Type" content="text/css" />
<title><?php echo $content_data['content_heading']; ?></title>
<base href="<?php echo (getenv('HTTPS') == 'on' ? HTTPS_SERVER : HTTP_SERVER) . DIR_WS_CATALOG; ?>" />
<link rel="stylesheet" type="text/css" href="<?php echo 'templates/'.CURRENT_TEMPLATE.'/stylesheet.css'; ?>" />
</head>
<body>
<div class="page">
<b class="b1"></b><b class="b2"></b><b class="b3"></b><b class="b4"></b>
<div class="pagecontent">
<p>
<span class="bold"><?php echo $content_data['content_heading']; ?></span>
</p>
<p>
 <?php

if ($content_data['content_file'] != '') {
	if (strpos($content_data['content_file'], '.txt'))
		echo '<pre>';

	include (DIR_FS_CATALOG.'media/content/'.$content_data['content_file']);

	if (strpos($content_data['content_file'], '.txt'))
		echo '</pre>';
} else {
	echo $content_data['content_text'];
}
?>
</p>
</div>
<b class="b4b"></b><b class="b3b"></b><b class="b2b"></b><b class="b1b"></b>
<div class="pagecontentfooter">
<a href="javascript:window.close()"><?php echo TEXT_CLOSE_WINDOW; ?></a>
</div>
</div>
</body>
</html>