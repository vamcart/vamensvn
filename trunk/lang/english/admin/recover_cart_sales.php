<?php
/* --------------------------------------------------------------
   $Id: recover_cart_sales.php 899 2007-02-07 17:36:57 VaM $

   VaM Shop - open source ecommerce solution
   http://vamshop.ru
   http://vamshop.com

   Copyright (c) 2007 VaM Shop
   --------------------------------------------------------------
   based on: 
   (c) 2003	 JM Ivler (recover_cart_sales.php,v 1.4 2003/08/14); oscommerce.com

   Released under the GNU General Public License 
   --------------------------------------------------------------*/

define('MESSAGE_STACK_CUSTOMER_ID', 'Cart for Customer-ID ');
define('MESSAGE_STACK_DELETE_SUCCESS', ' deleted successfully');
define('HEADING_TITLE_RECOVER', 'Recover Cart Sales');
define('HEADING_EMAIL_SENT', 'E-mail Sent Report');
define('EMAIL_SEPARATOR', '------------------------------------------------------');
define('EMAIL_TEXT_SUBJECT', 'Inquiry from '.  STORE_NAME );
define('DAYS_FIELD_PREFIX', 'Show for last ');
define('DAYS_FIELD_POSTFIX', ' days ');
define('DAYS_FIELD_BUTTON', 'Go');
define('TABLE_HEADING_DATE', 'DATE');
define('TABLE_HEADING_CONTACT', 'CONTACTED');
define('TABLE_HEADING_CUSTOMER', 'CUSTOMER NAME');
define('TABLE_HEADING_EMAIL', 'E-MAIL');
define('TABLE_HEADING_PHONE', 'PHONE');
define('TABLE_HEADING_MODEL', 'ITEM');
define('TABLE_HEADING_DESCRIPTION', 'DESCRIPTION');
define('TABLE_HEADING_QUANTY', 'QTY');
define('TABLE_HEADING_PRICE', 'PRICE');
define('TABLE_HEADING_TOTAL', 'TOTAL');
define('TABLE_GRAND_TOTAL', 'Grand Total: ');
define('TABLE_CART_TOTAL', 'Cart Total: ');
define('TEXT_CURRENT_CUSTOMER', 'CUSTOMER');
define('TEXT_SEND_EMAIL', 'Send E-mail');
define('TEXT_RETURN', '[Click Here To Return]');
define('TEXT_NOT_CONTACTED', 'Uncontacted');
define('PSMSG', 'Additional PS Message: ');
?>