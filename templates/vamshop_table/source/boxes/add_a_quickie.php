<?php
/* -----------------------------------------------------------------------------------------
   $Id: add_a_quickie.php 1262 2007-02-07 12:30:44 VaM $   

   VaM Shop - open source ecommerce solution
   http://vamshop.ru
   http://vamshop.com

   Copyright (c) 2007 VaM Shop
   -----------------------------------------------------------------------------------------
   based on: 
   (c) 2000-2001 The Exchange Project  (earlier name of osCommerce)
   (c) 2002-2003 osCommerce(add_a_quickie.php,v 1.10 2001/12/19); www.oscommerce.com 
   (c) 2004	 xt:Commerce (add_a_quickie.php,v 1.10 2003/08/13); xt-commerce.com 

   Released under the GNU General Public License 
   -----------------------------------------------------------------------------------------
   Third Party contribution:
   Add A Quickie v1.0 Autor  Harald Ponce de Leon
    
   Released under the GNU General Public License
   ---------------------------------------------------------------------------------------*/

// reset var
$box_smarty = new smarty;
$box_content='';
$box_smarty->assign('tpl_path','templates/'.CURRENT_TEMPLATE.'/');

$box_smarty->assign('FORM_ACTION','<form id="quick_add" method="post" action="' . vam_href_link(basename($PHP_SELF), vam_get_all_get_params(array('action')) . 'action=add_a_quickie', 'NONSSL') . '">');
$box_smarty->assign('INPUT_FIELD',vam_draw_input_field('quickie','','size="15" onkeyup="ajaxAddQuickieUp(this);" id="quick_add_quickie"'));
$box_smarty->assign('SUBMIT_BUTTON',vam_image_submit('button_add_quick.gif', BOX_HEADING_ADD_PRODUCT_ID));
$box_smarty->assign('FORM_END','</form>');



    $box_smarty->assign('BOX_CONTENT', $box_content);
	$box_smarty->assign('language', $_SESSION['language']);
	  // set cache ID
  if (!CacheCheck()) {
  $box_smarty->caching = 0;
  $box_add_a_quickie= $box_smarty->fetch(CURRENT_TEMPLATE.'/boxes/box_add_a_quickie.html');
  } else {
  $box_smarty->caching = 1;	
  $box_smarty->cache_lifetime=CACHE_LIFETIME;
  $box_smarty->cache_modified_check=CACHE_CHECK;
  $cache_id = $_SESSION['language'];
  $box_add_a_quickie= $box_smarty->fetch(CURRENT_TEMPLATE.'/boxes/box_add_a_quickie.html',$cache_id);
  }
  
    $smarty->assign('box_ADD_QUICKIE',$box_add_a_quickie);
    
    
 ?>