<?php
/* -----------------------------------------------------------------------------------------
   $Id: freedownload.php 998 2007/10/24 13:24:46 VaM $

   VaM Shop - open source ecommerce solution
   http://vamshop.ru
   http://vamshop.com

   Copyright (c) 2007 VaM Shop
   -----------------------------------------------------------------------------------------
   based on: 
   (c) 2000-2001 The Exchange Project  (earlier name of osCommerce)
   (c) 2002-2003 osCommerce(cod.php,v 1.7 2002/04/17); www.oscommerce.com 
   (c) 2003	 nextcommerce (cod.php,v 1.5 2003/08/13); www.nextcommerce.org
   (c) 2004	 xt:Commerce (cod.php,v 1.5 2003/08/13); xt-commerce.com

   Released under the GNU General Public License 
   ---------------------------------------------------------------------------------------*/

define('MODULE_PAYMENT_TYPE_PERMISSION', 'freedownload');
define('MODULE_PAYMENT_FREEDOWNLOAD_TEXT_TITLE', 'Free download');
define('MODULE_PAYMENT_FREEDOWNLOAD_TEXT_DESCRIPTION', 'Free download');
define('MODULE_PAYMENT_FREEDOWNLOAD_TEXT_INFO','');
define('MODULE_PAYMENT_FREEDOWNLOAD_ZONE_TITLE' , 'Payment Zone');
define('MODULE_PAYMENT_FREEDOWNLOAD_ZONE_DESC' , 'If a zone is selected, only enable this payment method for that zone.');
define('MODULE_PAYMENT_FREEDOWNLOAD_ALLOWED_TITLE' , 'Allowed Zones');
define('MODULE_PAYMENT_FREEDOWNLOAD_ALLOWED_DESC' , 'Please enter the zones <b>separately</b> which should be allowed to use this modul (e. g. AT,DE (leave empty if you want to allow all zones))');
define('MODULE_PAYMENT_FREEDOWNLOAD_STATUS_TITLE' , 'Enable Free Download Module');
define('MODULE_PAYMENT_FREEDOWNLOAD_STATUS_DESC' , 'Do you want to accept Free Download?');
define('MODULE_PAYMENT_FREEDOWNLOAD_SORT_ORDER_TITLE' , 'Sort order of display');
define('MODULE_PAYMENT_FREEDOWNLOAD_SORT_ORDER_DESC' , 'Sort order of display. Lowest is displayed first.');
define('MODULE_PAYMENT_FREEDOWNLOAD_ORDER_STATUS_ID_TITLE' , 'Set Order Status');
define('MODULE_PAYMENT_FREEDOWNLOAD_ORDER_STATUS_ID_DESC' , 'Set the status of orders made with this payment module to this value');
?>