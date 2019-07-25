<?php
/* -----------------------------------------------------------------------------------------
   $Id: yandex.php 998 2007/02/07 13:24:46 VaM $

   VaM Shop - open source ecommerce solution
   http://vamshop.ru
   http://vamshop.com

   Copyright (c) 2007 VaM Shop
   -----------------------------------------------------------------------------------------
   based on: 
   (c) 2000-2001 The Exchange Project  (earlier name of osCommerce)
   (c) 2002-2003 osCommerce(moneyorder.php,v 1.8 2003/02/16); www.oscommerce.com 
   (c) 2003	 nextcommerce (moneyorder.php,v 1.4 2003/08/13); www.nextcommerce.org
   (c) 2004	 xt:Commerce (yandex.php,v 1.4 2003/08/13); xt-commerce.com

   Released under the GNU General Public License 
   ---------------------------------------------------------------------------------------*/

define('MODULE_PAYMENT_ETHEREUM_TEXT_TITLE', 'Ethereum');

define('MODULE_PAYMENT_ETHEREUM_TEXT_DESCRIPTION', 'Payment Info:<br /><br />Our Ethereum Wallet Number: ' . MODULE_PAYMENT_ETHEREUM_ID . '<br /><br />');
define('MODULE_PAYMENT_ETHEREUM_TEXT_EMAIL_FOOTER', "Payment Info:\n\nOur Ethereum Wallet Number: ". MODULE_PAYMENT_ETHEREUM_ID . "\n\n" . '');

define('MODULE_PAYMENT_ETHEREUM_TEXT_INFO','');
define('MODULE_PAYMENT_ETHEREUM_STATUS_TITLE' , 'Enable module Ethereum');
define('MODULE_PAYMENT_ETHEREUM_STATUS_DESC' , 'Do you want to enable this module?');
define('MODULE_PAYMENT_ETHEREUM_ALLOWED_TITLE' , 'Allowed zones');
define('MODULE_PAYMENT_ETHEREUM_ALLOWED_DESC' , 'Please enter the zones <b>separately</b> which should be allowed to use this modul (e. g. AT,DE (leave empty if you want to allow all zones))');
define('MODULE_PAYMENT_ETHEREUM_ID_TITLE' , 'ETH Wallet Number:');
define('MODULE_PAYMENT_ETHEREUM_ID_DESC' , 'Your wallet.');
define('MODULE_PAYMENT_ETHEREUM_SORT_ORDER_TITLE' , 'Sort order of display');
define('MODULE_PAYMENT_ETHEREUM_SORT_ORDER_DESC' , 'Sort order of display. Lowest is displayed first.');
define('MODULE_PAYMENT_ETHEREUM_ZONE_TITLE' , 'Payment Zone');
define('MODULE_PAYMENT_ETHEREUM_ZONE_DESC' , 'If a zone is selected, only enable this payment method for that zone.');
define('MODULE_PAYMENT_ETHEREUM_ORDER_STATUS_ID_TITLE' , 'Confirmed order status');
define('MODULE_PAYMENT_ETHEREUM_ORDER_STATUS_ID_DESC' , 'Confirmed order status');
?>