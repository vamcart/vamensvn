<?php

include ('includes/application_top.php');

// create smarty elements
$smarty = new Smarty;

// include boxes
require (DIR_FS_CATALOG.'templates/'.CURRENT_TEMPLATE.'/source/boxes.php');

$breadcrumb->add(NAVBAR_TITLE_RSS2_INFO);

require (DIR_WS_INCLUDES.'header.php');

$smarty->assign('RSS2_INFO', TEXT_RSS2_INFO);

$smarty->assign('language', $_SESSION['language']);
$smarty->caching = 0;
$main_content = $smarty->fetch(CURRENT_TEMPLATE.'/module/xtc_rss2_info.html');
$smarty->assign('main_content', $main_content);
if (!defined(RM))
	$smarty->load_filter('output', 'note');
$smarty->display(CURRENT_TEMPLATE.'/index.html');

?>
