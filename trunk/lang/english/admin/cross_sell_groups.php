<?php
/* --------------------------------------------------------------
   $Id: cross_sell_groups.php 1231 2007-02-07 17:36:57 VaM $

   VaM Shop - open source ecommerce solution
   http://vamshop.ru
   http://vamshop.com

   Copyright (c) 2007 VaM Shop
   --------------------------------------------------------------
   based on: 
   (c) 2000-2001 The Exchange Project  (earlier name of osCommerce)
   (c) 2002-2003 osCommerce(orders_status.php,v 1.7 2002/01/30); www.oscommerce.com 
   (c) 2003	 nextcommerce (orders_status.php,v 1.4 2003/08/14); www.nextcommerce.org
   (c) 2004	 xt:Commerce (orders_status.php,v 1.4 2003/08/14); xt-commerce.com

   Released under the GNU General Public License 
   --------------------------------------------------------------*/

define('HEADING_TITLE', 'Cross-sell groups');

define('TABLE_HEADING_XSELL_GROUP_NAME', 'Groupname');
define('TABLE_HEADING_ACTION', 'Action');

define('TEXT_INFO_EDIT_INTRO', 'Please make any necessary changes');
define('TEXT_INFO_XSELL_GROUP_NAME', 'Groupname:');
define('TEXT_INFO_INSERT_INTRO', 'Please enter the new groupname with its related data');
define('TEXT_INFO_DELETE_INTRO', 'Are you sure you want to delete this order status?');
define('TEXT_INFO_HEADING_NEW_XSELL_GROUP', 'New gruppenname');
define('TEXT_INFO_HEADING_EDIT_XSELL_GROUP', 'Edit gruppenname');
define('TEXT_INFO_HEADING_DELETE_XSELL_GROUP', 'Delete gruppenname');

define('ERROR_STATUS_USED_IN_ORDERS', 'Error: This group is currently used in cross-sell articles.');
?>