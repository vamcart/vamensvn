<?php
/* -----------------------------------------------------------------------------------------
   $Id: selfpickup.php 899 2007/02/07 13:24:46 VaM $

   VaM Shop - open source ecommerce solution
   http://vamshop.ru
   http://vamshop.com

   Copyright (c) 2007 VaM Shop
   -----------------------------------------------------------------------------------------
   based on: 
   (c) 2000-2001 The Exchange Project  (earlier name of osCommerce)
   (c) 2002-2003 osCommerce( freeamount.php,v 1.01 2002/01/24 03:25:00); www.oscommerce.com 
   (c) 2003	 nextcommerce (freeamount.php,v 1.4 2003/08/13); www.nextcommerce.org
   (c) 2004	 xt:Commerce (selfpickup.php,v 1.4 2003/08/13); xt-commerce.com

   Released under the GNU General Public License 
   -----------------------------------------------------------------------------------------
   Third Party contributions:
   selfpickup         	Autor:	sebthom

   Released under the GNU General Public License 
   ---------------------------------------------------------------------------------------*/

define('MODULE_SHIPPING_SELFPICKUP_TEXT_TITLE', 'Self Pickup');
define('MODULE_SHIPPING_SELFPICKUP_TEXT_DESCRIPTION', 'Pickup By The Customer');
define('MODULE_SHIPPING_SELFPICKUP_SORT_ORDER', 'Sort Order');

define('MODULE_SHIPPING_SELFPICKUP_TEXT_TITLE', 'Self Pickup.');
define('MODULE_SHIPPING_SELFPICKUP_TEXT_WAY', 'Self Pickup at our Company.');
define('MODULE_SHIPPING_SELFPICKUP_ALLOWED_TITLE' , 'Allowed Zones');
define('MODULE_SHIPPING_SELFPICKUP_ALLOWED_DESC' , 'Please enter the zones <b>separately</b> which should be allowed to use this modul (e. g. AT,DE (leave empty if you want to allow all zones))');
define('MODULE_SHIPPING_SELFPICKUP_STATUS_TITLE', 'Enable Self Pickup');
define('MODULE_SHIPPING_SELFPICKUP_STATUS_DESC', 'Do you want to offer pickup by the customer?');
define('MODULE_SHIPPING_SELFPICKUP_TAX_CLASS_TITLE' , 'Tax Class');
define('MODULE_SHIPPING_SELFPICKUP_TAX_CLASS_DESC' , 'Use the following tax class on the shipping fee.');
define('MODULE_SHIPPING_SELFPICKUP_ZONE_TITLE' , 'Shipping Zone');
define('MODULE_SHIPPING_SELFPICKUP_ZONE_DESC' , 'If a zone is selected, only enable this shipping method for that zone.');
define('MODULE_SHIPPING_SELFPICKUP_SORT_ORDER_TITLE', 'Sort Order');
define('MODULE_SHIPPING_SELFPICKUP_SORT_ORDER_DESC', 'Sort order of display.');
?>