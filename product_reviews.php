<?php
/* -----------------------------------------------------------------------------------------
   $Id: product_reviews.php 1238 2007-02-06 19:20:03 VaM $

   VaM Shop - open source ecommerce solution
   http://vamshop.ru
   http://vamshop.com

   Copyright (c) 2007 VaM Shop
   -----------------------------------------------------------------------------------------
   based on: 
   (c) 2000-2001 The Exchange Project  (earlier name of osCommerce)
   (c) 2002-2003 osCommerce(product_reviews.php,v 1.47 2003/02/13); www.oscommerce.com 
   (c) 2003	 nextcommerce (product_reviews.php,v 1.12 2003/08/17); www.nextcommerce.org
   (c) 2004	 xt:Commerce (product_reviews.php,v 1.12 2003/08/17); xt-commerce.com

   Released under the GNU General Public License 
   ---------------------------------------------------------------------------------------*/

include ('includes/application_top.php');
// create template elements
$vamTemplate = new vamTemplate;
// include boxes
require (DIR_FS_CATALOG.'templates/'.CURRENT_TEMPLATE.'/source/boxes.php');
// include needed functions
require_once (DIR_FS_INC.'vam_row_number_format.inc.php');
require_once (DIR_FS_INC.'vam_date_short.inc.php');
require_once (DIR_FS_INC.'vam_word_count.inc.php');
require_once (DIR_FS_INC.'vam_date_long.inc.php');

// lets retrieve all $HTTP_GET_VARS keys and values..
$get_params = vam_get_all_get_params();
$get_params_back = vam_get_all_get_params(array ('reviews_id')); // for back button
$get_params = substr($get_params, 0, -1); //remove trailing &
if (vam_not_null($get_params_back)) {
	$get_params_back = substr($get_params_back, 0, -1); //remove trailing &
} else {
	$get_params_back = $get_params;
}

$product_info_query = vam_db_query("select pd.products_name from ".TABLE_PRODUCTS_DESCRIPTION." pd left join ".TABLE_PRODUCTS." p on pd.products_id = p.products_id where pd.language_id = '".(int) $_SESSION['languages_id']."' and p.products_status = '1' and pd.products_id = '".(int) $_GET['products_id']."'");
if (!vam_db_num_rows($product_info_query))
	vam_redirect(vam_href_link(FILENAME_REVIEWS));
$product_info = vam_db_fetch_array($product_info_query);

$breadcrumb->add(NAVBAR_TITLE_PRODUCT_REVIEWS, vam_href_link(FILENAME_PRODUCT_REVIEWS, $get_params));

require (DIR_WS_INCLUDES.'header.php');

$vamTemplate->assign('PRODUCTS_NAME', $product_info['products_name']);

$vamTemplate->assign('PRODUCTS_REVIEWS_COUNT', $product->getReviewsCount());
$vamTemplate->assign('PRODUCTS_REVIEWS_RATING', $product->getReviewsRating());

$rating_count = 0;

if ($product->getReviewsCount() > 0) {

$star_rating = '';
for($i=0;$i<number_format($product->getReviewsRating());$i++)	{
$star_rating .= '<span class="rating"><i class="fa fa-star"></i></span> ';
}

$vamTemplate->assign('PRODUCTS_STAR_RATING', $star_rating);

}

$data_reviews = array ();
$module_content = array();
$reviews_query = vam_db_query("select r.reviews_id, r.products_id, rd.reviews_text, rd.reviews_answer, r.reviews_rating, r.date_added, p.*, pd.*, r.customers_name, r.customers_id from ".TABLE_REVIEWS." r, ".TABLE_REVIEWS_DESCRIPTION." rd, ".TABLE_PRODUCTS." p, ".TABLE_PRODUCTS_DESCRIPTION." pd where r.products_id = '".(int) $_GET['products_id']."' and p.products_status = '1' and p.products_id = r.products_id and r.reviews_id = rd.reviews_id and p.products_id = pd.products_id and pd.language_id = '".(int) $_SESSION['languages_id']."' and rd.languages_id = '".(int) $_SESSION['languages_id']."' order by r.reviews_id DESC");
if (vam_db_num_rows($reviews_query)) {

	$star_rating = '';
	while ($reviews = vam_db_fetch_array($reviews_query)) {

		$star_rating = '';
		for($i=0;$i<number_format($reviews['reviews_rating']);$i++)	{
		$star_rating .= '<span class="rating"><i class="fa fa-star"></i></span> ';
		}
				
		$module_content[] = array ( 
		
		'PRODUCT' => $product->buildDataArray($reviews),

		'REVIEW' => array(

		'PRODUCTS_LINK' => vam_href_link(FILENAME_PRODUCT_INFO, 'products_id='.$reviews['products_id']), 
		'REVIEWS_LINK' => vam_href_link(FILENAME_PRODUCT_REVIEWS_INFO, 'products_id='.$reviews['products_id'].'&reviews_id='.$reviews['reviews_id']), 
		'REVIEWS_ALL_LINK' => vam_href_link(FILENAME_PRODUCT_REVIEWS, 'products_id='.$reviews['products_id']), 
		'PRODUCTS_NAME' => $reviews['products_name'], 
		'AUTHOR' => $reviews['customers_name'], 
		'CUSTOMER' => $product->getReviewsCustomer((int)$reviews['products_id'],(int)$reviews['customers_id']), 
		'REVIEWS_IMAGES' => $product->getReviewsImages((int)$reviews['reviews_id'],(int)$reviews['customers_id']), 
		'ID' => $reviews['reviews_id'], 
		'URL' => vam_href_link(FILENAME_PRODUCT_REVIEWS_INFO, 'products_id='.$reviews['products_id'].'&reviews_id='.$reviews['reviews_id']), 
		'DATE' => vam_date_short($reviews['date_added']), 
		'TEXT_COUNT' => '('.sprintf(TEXT_REVIEW_WORD_COUNT, vam_word_count($reviews['reviews_text'], ' ')).')<br />'.vam_break_string(htmlspecialchars($reviews['reviews_text']), 60, '-<br />').'..', 
		'TEXT' => $reviews['reviews_text'], 
		'ANSWER' => $reviews['reviews_answer'], 
		'RATING' => $reviews['reviews_rating'],
		'STAR_RATING' => $star_rating,
		'RATING_IMG' => vam_image('templates/'.CURRENT_TEMPLATE.'/img/stars_'.$reviews['reviews_rating'].'.png', sprintf(TEXT_OF_5_STARS, $reviews['reviews_rating']))
		
		)
		);		
		
	}
	
}
$vamTemplate->assign('module_content', $module_content);

$vamTemplate->assign('REVIEWS_ALL_LINK', vam_href_link(FILENAME_REVIEWS));
$vamTemplate->assign('REVIEWS_TOTAL', vam_db_num_rows($reviews_query));

$vamTemplate->assign('BUTTON_BACK', '<a class="btn btn-inverse" href="'.vam_href_link(FILENAME_PRODUCT_INFO, $get_params_back).'">'.vam_image_button('back.png', IMAGE_BUTTON_BACK).'</a>');
$vamTemplate->assign('BUTTON_WRITE', '<a class="btn btn-inverse btn-block" href="'.vam_href_link(FILENAME_PRODUCT_REVIEWS_WRITE, $get_params).'">'.vam_image_button('add.png', IMAGE_BUTTON_WRITE_REVIEW).'</a>');

if ($_GET['products_id'] > 0) {

$rating_count = $product->getReviewsCount();

$one_star_query = vamDBquery("select count(*) as total from ".TABLE_REVIEWS." r, ".TABLE_REVIEWS_DESCRIPTION." rd where r.products_id = '".(int)$_GET['products_id']."' and r.reviews_rating = 1 and r.reviews_id = rd.reviews_id and rd.languages_id = '".$_SESSION['languages_id']."'");
$one_star = vam_db_fetch_array($one_star_query,true);
$one_star_count = $one_star['total'];

$vamTemplate->assign('PRODUCTS_RATING_ONE', $one_star_count);
$vamTemplate->assign('PRODUCTS_RATING_ONE_PERCENT', number_format(($one_star_count*100)/$rating_count));

$two_star_query = vamDBquery("select count(*) as total from ".TABLE_REVIEWS." r, ".TABLE_REVIEWS_DESCRIPTION." rd where r.products_id = '".(int)$_GET['products_id']."' and r.reviews_rating = 2 and r.reviews_id = rd.reviews_id and rd.languages_id = '".$_SESSION['languages_id']."'");
$two_star = vam_db_fetch_array($two_star_query,true);
$two_star_count = $two_star['total'];

$vamTemplate->assign('PRODUCTS_RATING_TWO', $two_star_count);
$vamTemplate->assign('PRODUCTS_RATING_TWO_PERCENT', number_format(($two_star_count*100)/$rating_count));

$three_star_query = vamDBquery("select count(*) as total from ".TABLE_REVIEWS." r, ".TABLE_REVIEWS_DESCRIPTION." rd where r.products_id = '".(int)$_GET['products_id']."' and r.reviews_rating = 3 and r.reviews_id = rd.reviews_id and rd.languages_id = '".$_SESSION['languages_id']."'");
$three_star = vam_db_fetch_array($three_star_query,true);
$three_star_count = $three_star['total'];

$vamTemplate->assign('PRODUCTS_RATING_THREE', $three_star_count);
$vamTemplate->assign('PRODUCTS_RATING_THREE_PERCENT', number_format(($three_star_count*100)/$rating_count));

$four_star_query = vamDBquery("select count(*) as total from ".TABLE_REVIEWS." r, ".TABLE_REVIEWS_DESCRIPTION." rd where r.products_id = '".(int)$_GET['products_id']."' and r.reviews_rating = 4 and r.reviews_id = rd.reviews_id and rd.languages_id = '".$_SESSION['languages_id']."'");
$four_star = vam_db_fetch_array($four_star_query,true);
$four_star_count = $four_star['total'];

$vamTemplate->assign('PRODUCTS_RATING_FOUR', $four_star_count);
$vamTemplate->assign('PRODUCTS_RATING_FOUR_PERCENT', number_format(($four_star_count*100)/$rating_count));

$five_star_query = vamDBquery("select count(*) as total from ".TABLE_REVIEWS." r, ".TABLE_REVIEWS_DESCRIPTION." rd where r.products_id = '".(int)$_GET['products_id']."' and r.reviews_rating = 5 and r.reviews_id = rd.reviews_id and rd.languages_id = '".$_SESSION['languages_id']."'");
$five_star = vam_db_fetch_array($five_star_query,true);
$five_star_count = $five_star['total'];
		
$vamTemplate->assign('PRODUCTS_RATING_FIVE', $five_star_count);
$vamTemplate->assign('PRODUCTS_RATING_FIVE_PERCENT', number_format(($five_star_count*100)/$rating_count));

}

$vamTemplate->assign('language', $_SESSION['language']);

$products_price = $vamPrice->GetPrice($product->data['products_id'], $format = true, 1, $product->data['products_tax_class_id'], $product->data['products_price'], 1);
		
$vamTemplate->assign('PRODUCTS_PRICE', $products_price['formated']);
$vamTemplate->assign('PRODUCTS_PRICE_PLAIN', $products_price['plain']);
if ($product->data['products_vpe_status'] == 1 && $product->data['products_vpe_value'] != 0.0 && $products_price['plain'] > 0)
$vamTemplate->assign('PRODUCTS_VPE', $vamPrice->Format($products_price['plain'] * (1 / $product->data['products_vpe_value']), true).TXT_PER.vam_get_vpe_name($product->data['products_vpe']));
$vamTemplate->assign('PRODUCTS_ID', $product->data['products_id']);
if ($vamPrice->CheckSpecial($product->data['products_id']) > 0) {
$vamTemplate->assign('PRODUCTS_SPECIAL', 100-($vamPrice->CheckSpecial($product->data['products_id'])*100/$vamPrice->GetPprice($product->data['products_id'])));
}
$vamTemplate->assign('LABEL_ID', $product->data['label_id']);
$vamTemplate->assign('PRODUCT_LABEL', vam_get_label_name($product->data['label_id']));
$vamTemplate->assign('PRODUCTS_NAME', vam_parse_input_field_data($product->data['products_name'], array('"' => '&quot;')));
if ($_SESSION['customers_status']['customers_status_show_price'] != 0) {
// price incl tax
$tax_rate = $vamPrice->TAX[$product->data['products_tax_class_id']];				
$tax_info = $main->getTaxInfo($tax_rate);
$vamTemplate->assign('PRODUCTS_TAX_INFO', $tax_info);
$vamTemplate->assign('PRODUCTS_SHIPPING_LINK',$main->getShippingLink());
}
$vamTemplate->assign('PRODUCTS_MODEL', $product->data['products_model']);
$vamTemplate->assign('PRODUCTS_URL_INFO', vam_href_link(FILENAME_PRODUCT_INFO, vam_product_link($product->data['products_id'], $product->data['products_name'])));
$vamTemplate->assign('PRODUCTS_REVIEWS_URL', vam_href_link(FILENAME_PRODUCT_REVIEWS, 'products_id='.$product->data['products_id']));
$vamTemplate->assign('PRODUCTS_EAN', $product->data['products_ean']);
$vamTemplate->assign('PRODUCTS_QUANTITY', $product->data['products_quantity']);
$vamTemplate->assign('PRODUCTS_LENGTH', $product->data['products_length']);
$vamTemplate->assign('PRODUCTS_WIDTH', $product->data['products_width']);
$vamTemplate->assign('PRODUCTS_HEIGHT', $product->data['products_height']);
$vamTemplate->assign('PRODUCTS_VOLUME', $product->data['products_volume']);
$vamTemplate->assign('PRODUCTS_WEIGHT', $product->data['products_weight']);
$vamTemplate->assign('PRODUCTS_STATUS', $product->data['products_status']);
$vamTemplate->assign('PRODUCTS_ORDERED', $product->data['products_ordered']);
$vamTemplate->assign('PRODUCTS_PRINT', '<img src="images/icons/buttons/print.png" alt="" />');
$vamTemplate->assign('PRODUCTS_PRINT_LINK', vam_href_link(FILENAME_PRINT_PRODUCT_INFO, 'products_id='.$product->data['products_id']));      
if ($_SESSION['customers_status']['customers_status_id'] == 0) $vamTemplate->assign('PRODUCTS_EDIT_LINK', vam_href_link_admin(FILENAME_EDIT_PRODUCTS, 'cPath=' . $cPath . '&amp;pID=' . $product->data['products_id'] . '&amp;action=new_product'));      
$vamTemplate->assign('PRODUCTS_DESCRIPTION', stripslashes($product->data['products_description']));
$vamTemplate->assign('PRODUCTS_SHORT_DESCRIPTION', stripslashes($product->data['products_short_description']));

$manufacturer_query = vamDBquery("select m.manufacturers_id, m.manufacturers_name, m.manufacturers_image, mi.manufacturers_url from " . TABLE_MANUFACTURERS . " m left join " . TABLE_MANUFACTURERS_INFO . " mi on (m.manufacturers_id = mi.manufacturers_id and mi.languages_id = '" . (int)$_SESSION['languages_id'] . "'), " . TABLE_PRODUCTS . " p  where p.products_id = '" . $product->data['products_id'] . "' and p.manufacturers_id = m.manufacturers_id");
$manufacturer = vam_db_fetch_array($manufacturer_query,true);

$vamTemplate->assign('CATEGORY', $cat_data['categories_name']);
$vamTemplate->assign('CATEGORY_ID', $current_category_id);
$vamTemplate->assign('MANUFACTURER_ID',$manufacturer['manufacturers_id']);
$vamTemplate->assign('MANUFACTURER_IMAGE',$manufacturer['manufacturers_image']);
$vamTemplate->assign('MANUFACTURER_LINK',vam_href_link(FILENAME_DEFAULT, 'manufacturers_id='.$manufacturer['manufacturers_id']));
$vamTemplate->assign('MANUFACTURER',$manufacturer['manufacturers_name']);

if (AJAX_CART == 'true' && !vam_has_product_attributes($product->data['products_id'])) {
$link = '<a class="btn btn-add-to-cart btn-block" href="'.vam_href_link(basename($PHP_SELF), 'action=buy_now&BUYproducts_id='.$product->data['products_id'], 'NONSSL').'" onclick="doBuyNow(\''.$product->data['products_id'].'\',\'1\'); return false;"><i class="fa fa-shopping-cart"></i> '.IMAGE_BUTTON_IN_CART.'</a>';
} else {
$link = '<a class="btn btn-add-to-cart btn-block" href="'.vam_href_link(basename($PHP_SELF), 'action=buy_now&BUYproducts_id='.$product->data['products_id'], 'NONSSL').'"><i class="fa fa-shopping-cart"></i> '.IMAGE_BUTTON_IN_CART.'</a>';
}

$vamTemplate->assign('PRODUCTS_BUY_NOW',$link);

if ($product->data['products_image'] != '')
$image = DIR_WS_INFO_IMAGES.$product->data['products_image'];

if (!file_exists($image)) $image = DIR_WS_INFO_IMAGES.'../noimage.png';

$vamTemplate->assign('PRODUCTS_IMAGE', $image);
$vamTemplate->assign('PRODUCTS_IMAGE_DESCRIPTION', htmlentities(strip_tags($product->data['products_image_description'])));


// set cache ID
 if (!CacheCheck()) {
	$vamTemplate->caching = 0;
	$main_content = $vamTemplate->fetch(CURRENT_TEMPLATE.'/module/product_reviews.html');
} else {
	$vamTemplate->caching = 1;
	$vamTemplate->cache_lifetime = CACHE_LIFETIME;
	$vamTemplate->cache_modified_check = CACHE_CHECK;
	$cache_id = $_SESSION['language'].$_GET['products_id'];
	$main_content = $vamTemplate->fetch(CURRENT_TEMPLATE.'/module/product_reviews.html', $cache_id);
}

$vamTemplate->assign('language', $_SESSION['language']);
$vamTemplate->assign('main_content', $main_content);
$vamTemplate->caching = 0;
if (!defined(RM)) $vamTemplate->loadFilter('output', 'note');
$template = (file_exists('templates/'.CURRENT_TEMPLATE.'/'.FILENAME_PRODUCT_REVIEWS.'.html') ? CURRENT_TEMPLATE.'/'.FILENAME_PRODUCT_REVIEWS.'.html' : CURRENT_TEMPLATE.'/index.html');
$vamTemplate->display($template);
include ('includes/application_bottom.php');
?>