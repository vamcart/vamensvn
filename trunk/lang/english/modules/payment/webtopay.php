<?php
/* -----------------------------------------------------------------------------------------
   $Id: webtopay.php 998 2008/12/07 13:24:46 VaM $

   VaM Shop - open source ecommerce solution
   http://vamshop.ru
   http://vamshop.com

   Copyright (c) 2007 VaM Shop
   -----------------------------------------------------------------------------------------
   based on: 
   (c) 2000-2001 The Exchange Project  (earlier name of osCommerce)
   (c) 2002-2003 osCommerce(moneyorder.php,v 1.8 2003/02/16); www.oscommerce.com 
   (c) 2003	 nextcommerce (moneyorder.php,v 1.4 2003/08/13); www.nextcommerce.org
   (c) 2004	 xt:Commerce (webmoney.php,v 1.4 2003/08/13); xt-commerce.com

   Released under the GNU General Public License 
   ---------------------------------------------------------------------------------------*/

  define('MODULE_PAYMENT_WEBTOPAY_TEXT_TITLE', 'WebToPay');
  define('MODULE_PAYMENT_WEBTOPAY_TEXT_PUBLIC_TITLE', 'WebToPay');
  define('MODULE_PAYMENT_WEBTOPAY_TEXT_DESCRIPTION', '');

define('MODULE_PAYMENT_WEBTOPAY_STATUS_TITLE' , 'Enable WebToPay Module');
define('MODULE_PAYMENT_WEBTOPAY_STATUS_DESC' , 'Do you want to accept WebToPay as payments?');
define('MODULE_PAYMENT_WEBTOPAY_ALLOWED_TITLE' , 'Allowed zones');
define('MODULE_PAYMENT_WEBTOPAY_ALLOWED_DESC' , 'Please enter the zones <b>separately</b> which should be allowed to use this modul (e. g. AT,DE (leave empty if you want to allow all zones))');
define('MODULE_PAYMENT_WEBTOPAY_ID_TITLE' , 'WebToPay ID');
define('MODULE_PAYMENT_WEBTOPAY_ID_DESC' , 'Your ID number.');
define('MODULE_PAYMENT_WEBTOPAY_SORT_ORDER_TITLE' , 'Sort order of display');
define('MODULE_PAYMENT_WEBTOPAY_SORT_ORDER_DESC' , 'Sort order of display. Lowest is displayed first.');
define('MODULE_PAYMENT_WEBTOPAY_ZONE_TITLE' , 'Payment Zone');
define('MODULE_PAYMENT_WEBTOPAY_ZONE_DESC' , 'If a zone is selected, only enable this payment method for that zone.');
define('MODULE_PAYMENT_WEBTOPAY_PREPARE_ORDER_STATUS_ID_TITLE' , 'Prepare order status');
define('MODULE_PAYMENT_WEBTOPAY_PREPARE_ORDER_STATUS_ID_DESC' , 'Prepare order status.');
define('MODULE_PAYMENT_WEBTOPAY_ORDER_STATUS_ID_TITLE' , 'Confirmed order status');
define('MODULE_PAYMENT_WEBTOPAY_ORDER_STATUS_ID_DESC' , 'Confirmed order status.');
  
?>