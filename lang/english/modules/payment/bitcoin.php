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

define('MODULE_PAYMENT_BITCOIN_TEXT_TITLE', 'BitCoin');

define('MODULE_PAYMENT_BITCOIN_TEXT_DESCRIPTION', 'Payment Info:<br /><br />Our BitCoin Wallet Number: ' . MODULE_PAYMENT_BITCOIN_ID . '<br /><br />');
define('MODULE_PAYMENT_BITCOIN_TEXT_EMAIL_FOOTER', "Payment Info:\n\nOur BitCoin Wallet Number: ". MODULE_PAYMENT_BITCOIN_ID . "\n\n" . '');

define('MODULE_PAYMENT_BITCOIN_TEXT_INFO','');
define('MODULE_PAYMENT_BITCOIN_STATUS_TITLE' , 'Enable module BitCoin');
define('MODULE_PAYMENT_BITCOIN_STATUS_DESC' , 'Do you want to enable this module?');
define('MODULE_PAYMENT_BITCOIN_ALLOWED_TITLE' , 'Allowed zones');
define('MODULE_PAYMENT_BITCOIN_ALLOWED_DESC' , 'Please enter the zones <b>separately</b> which should be allowed to use this modul (e. g. AT,DE (leave empty if you want to allow all zones))');
define('MODULE_PAYMENT_BITCOIN_ID_TITLE' , 'BTC Wallet Number:');
define('MODULE_PAYMENT_BITCOIN_ID_DESC' , 'Your Wallet Number.');
define('MODULE_PAYMENT_BITCOIN_SORT_ORDER_TITLE' , 'Sort order of display');
define('MODULE_PAYMENT_BITCOIN_SORT_ORDER_DESC' , 'Sort order of display. Lowest is displayed first.');
define('MODULE_PAYMENT_BITCOIN_ZONE_TITLE' , 'Payment Zone');
define('MODULE_PAYMENT_BITCOIN_ZONE_DESC' , 'If a zone is selected, only enable this payment method for that zone.');
define('MODULE_PAYMENT_BITCOIN_ORDER_STATUS_ID_TITLE' , 'Confirmed order status');
define('MODULE_PAYMENT_BITCOIN_ORDER_STATUS_ID_DESC' , 'Confirmed order status');
?>