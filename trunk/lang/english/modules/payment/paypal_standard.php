<?php
/*
  $Id: paypal_standard.php 1778 2008-01-09 23:37:44Z hpdl $

  osCommerce, Open Source E-Commerce Solutions
  http://www.oscommerce.com

  Copyright (c) 2008 osCommerce

  Released under the GNU General Public License
*/

  define('MODULE_PAYMENT_PAYPAL_STANDARD_TEXT_TITLE', 'PayPal (Visa, MasterCard)');
  define('MODULE_PAYMENT_PAYPAL_STANDARD_TEXT_PUBLIC_TITLE', 'PayPal (Visa, MasterCard)');
  define('MODULE_PAYMENT_PAYPAL_STANDARD_TEXT_DESCRIPTION', '');

  define('MODULE_PAYMENT_PAYPAL_STANDARD_STATUS_TITLE', 'Enable PayPal Website Payments Standard');
  define('MODULE_PAYMENT_PAYPAL_STANDARD_STATUS_DESC', 'Do you want to accept PayPal Website Payments Standard payments?');
  define('MODULE_PAYMENT_PAYPAL_STANDARD_ALLOWED_TITLE', 'Allowed zones');
  define('MODULE_PAYMENT_PAYPAL_STANDARD_ALLOWED_DESC', 'Please enter the zones <b>separately</b> which should be allowed to use this modul (e. g. AT,DE (leave empty if you want to allow all zones))');
  define('MODULE_PAYMENT_PAYPAL_STANDARD_ID_TITLE', 'E-Mail Address');
  define('MODULE_PAYMENT_PAYPAL_STANDARD_ID_DESC', 'The PayPal seller e-mail address to accept payments for');
  define('MODULE_PAYMENT_PAYPAL_STANDARD_SORT_ORDER_TITLE', 'Sort order of display.');
  define('MODULE_PAYMENT_PAYPAL_STANDARD_SORT_ORDER_DESC', 'Sort order of display. Lowest is displayed first.');
  define('MODULE_PAYMENT_PAYPAL_STANDARD_ZONE_TITLE', 'Payment Zone');
  define('MODULE_PAYMENT_PAYPAL_STANDARD_ZONE_DESC', 'If a zone is selected, only enable this payment method for that zone.');
  define('MODULE_PAYMENT_PAYPAL_STANDARD_PREPARE_ORDER_STATUS_ID_TITLE', 'Set Preparing Order Status');
  define('MODULE_PAYMENT_PAYPAL_STANDARD_PREPARE_ORDER_STATUS_ID_DESC', 'Set the status of prepared orders made with this payment module to this value');
  define('MODULE_PAYMENT_PAYPAL_STANDARD_ORDER_STATUS_ID_TITLE', 'Set PayPal Acknowledged Order Status');
  define('MODULE_PAYMENT_PAYPAL_STANDARD_ORDER_STATUS_ID_DESC', 'Set the status of orders made with this payment module to this value');
  define('MODULE_PAYMENT_PAYPAL_STANDARD_GATEWAY_SERVER_TITLE', 'Gateway Server');
  define('MODULE_PAYMENT_PAYPAL_STANDARD_GATEWAY_SERVER_DESC', 'Use the testing (sandbox) or live gateway server for transactions?');
  define('MODULE_PAYMENT_PAYPAL_STANDARD_TRANSACTION_METHOD_TITLE', 'Transaction Method');
  define('MODULE_PAYMENT_PAYPAL_STANDARD_TRANSACTION_METHOD_DESC', 'The processing method to use for each transaction.');
  define('MODULE_PAYMENT_PAYPAL_STANDARD_PAGE_STYLE_TITLE', 'Page Style');
  define('MODULE_PAYMENT_PAYPAL_STANDARD_PAGE_STYLE_DESC', 'The page style to use for the transaction procedure (defined at your PayPal Profile page)');
  define('MODULE_PAYMENT_PAYPAL_STANDARD_DEBUG_EMAIL_TITLE', 'Debug E-Mail Address');
  define('MODULE_PAYMENT_PAYPAL_STANDARD_DEBUG_EMAIL_DESC', 'All parameters of an Invalid IPN notification will be sent to this email address if one is entered.');
  define('MODULE_PAYMENT_PAYPAL_STANDARD_EWP_STATUS_TITLE', 'Enable Encrypted Web Payments');
  define('MODULE_PAYMENT_PAYPAL_STANDARD_EWP_STATUS_DESC', 'Do you want to enable Encrypted Web Payments?');
  define('MODULE_PAYMENT_PAYPAL_STANDARD_EWP_PRIVATE_KEY_TITLE', 'Your Private Key');
  define('MODULE_PAYMENT_PAYPAL_STANDARD_EWP_PRIVATE_KEY_DESC', 'The location of your Private Key to use for signing the data. (*.pem)');
  define('MODULE_PAYMENT_PAYPAL_STANDARD_EWP_PUBLIC_KEY_TITLE', 'Your Public Certificate');
  define('MODULE_PAYMENT_PAYPAL_STANDARD_EWP_PUBLIC_KEY_DESC', 'The location of your Public Certificate to use for signing the data. (*.pem)');
  define('MODULE_PAYMENT_PAYPAL_STANDARD_EWP_PAYPAL_KEY_TITLE', 'PayPals Public Certificate');
  define('MODULE_PAYMENT_PAYPAL_STANDARD_EWP_PAYPAL_KEY_DESC', 'The location of the PayPal Public Certificate for encrypting the data.');
  define('MODULE_PAYMENT_PAYPAL_STANDARD_EWP_CERT_ID_TITLE', 'Your PayPal Public Certificate ID');
  define('MODULE_PAYMENT_PAYPAL_STANDARD_EWP_CERT_ID_DESC', 'The Certificate ID to use from your PayPal Encrypted Payment Settings Profile.');
  define('MODULE_PAYMENT_PAYPAL_STANDARD_EWP_WORKING_DIRECTORY_TITLE', 'Working Directory');
  define('MODULE_PAYMENT_PAYPAL_STANDARD_EWP_WORKING_DIRECTORY_DESC', 'The working directory to use for temporary files. (trailing slash needed)');
  define('MODULE_PAYMENT_PAYPAL_STANDARD_EWP_OPENSSL_TITLE', 'OpenSSL Location');
  define('MODULE_PAYMENT_PAYPAL_STANDARD_EWP_OPENSSL_DESC', 'The location of the openssl binary file.');

?>