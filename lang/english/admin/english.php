<?php
/* --------------------------------------------------------------
   $Id: english.php 1231 2017-11-08 17:37:58 VaM $

   VaM Shop - open source ecommerce solution
   http://vamshop.ru
   http://vamshop.com

   Copyright (c) 2007 VaM Shop
   --------------------------------------------------------------
   based on: 
   (c) 2000-2001 The Exchange Project  (earlier name of osCommerce)
   (c) 2002-2003 osCommerce(german.php,v 1.99 2003/05/28); www.oscommerce.com 
   (c) 2003	 nextcommerce (german.php,v 1.24 2003/08/24); www.nextcommerce.org
   (c) 2004	 xt:Commerce (english.php,v 1.4 2003/08/1); xt-commerce.com

   Released under the GNU General Public License
   --------------------------------------------------------------
   Third Party contributions:
   Customers Status v3.x (c) 2002-2003 Copyright Elari elari@free.fr | www.unlockgsm.com/dload-osc/ | CVS : http://cvs.sourceforge.net/cgi-bin/viewcvs.cgi/elari/?sortby=date#dirlist

   Released under the GNU General Public License 
   --------------------------------------------------------------*/

// look in your $PATH_LOCALE/locale directory for available locales..
// on RedHat6.0 I used 'en_US'
// on FreeBSD 4.0 I use 'en_US.ISO_8859-1'
// this may not work under win32 environments..

@setlocale(LC_TIME, 'en_US');
define('DATE_FORMAT_SHORT', '%m/%d/%Y');  // this is used for strftime()
define('DATE_FORMAT_LONG', '%A %d %B, %Y'); // this is used for strftime()
define('DATE_FORMAT', 'm/d/Y');  // this is used for strftime()
define('PHP_DATE_TIME_FORMAT', 'm/d/Y H:i:s'); // this is used for date()
define('DATE_TIME_FORMAT', DATE_FORMAT_SHORT . ' %H:%M:%S');

// Global entries for the <html> tag
define('HTML_PARAMS','dir="ltr" lang="en"');

// page title
define('TITLE', 'Admin Panel - '. PROJECT_VERSION .' - '.STORE_NAME);

// header text in includes/header.php
define('HEADER_TITLE_TOP', 'Administration');
define('HEADER_TITLE_SUPPORT_SITE', 'Support Site');
define('HEADER_TITLE_DOCS', 'Manual');
define('HEADER_TITLE_ASK_A_QUESTION', 'Ask a question');
define('HEADER_TITLE_ONLINE_CATALOG', 'Store');
define('HEADER_TITLE_ADMINISTRATION', 'Administration');

// text for gender
define('MALE', 'Male');
define('FEMALE', 'Female');

// text for date of birth example
define('DOB_FORMAT_STRING', 'mm/dd/yyyy');

// configuration box text in includes/boxes/configuration.php

define('BOX_HEADING_CONFIGURATION','Configuration');
define('BOX_HEADING_CONFIGURATION_MAIN','General options');
define('BOX_HEADING_MODULES','Modules');
define('BOX_HEADING_ZONE','Zone / Tax');
define('BOX_HEADING_CUSTOMERS','Customers');
define('BOX_HEADING_PRODUCTS','Catalog');
define('BOX_HEADING_OTHER','Other');
define('BOX_HEADING_STATISTICS','Statistics');
define('BOX_HEADING_TOOLS','Tools');
define('BOX_HEADING_LOGOFF','Logoff');
define('BOX_HEADING_HELP','Help');

define('BOX_CONTENT','Content Manager');
define('TEXT_ALLOWED', 'Permission');
define('TEXT_ACCESS', 'Usable Area');
define('BOX_CONFIGURATION', 'General Options');
define('BOX_CONFIGURATION_1', 'My Shop');
define('BOX_CONFIGURATION_2', 'Minimum Values');
define('BOX_CONFIGURATION_3', 'Maximum Values');
define('BOX_CONFIGURATION_4', 'Image Options');
define('BOX_CONFIGURATION_5', 'Customer Details');
define('BOX_CONFIGURATION_6', 'Module Options');
define('BOX_CONFIGURATION_7', 'Shipping Options');
define('BOX_CONFIGURATION_8', 'Product Listing Options');
define('BOX_CONFIGURATION_9', 'Stock Options');
define('BOX_CONFIGURATION_10', 'Logging Options');
define('BOX_CONFIGURATION_11', 'Cache Options');
define('BOX_CONFIGURATION_12', 'eMail Options');
define('BOX_CONFIGURATION_13', 'Download Options');
define('BOX_CONFIGURATION_14', 'Gzip Compression');
define('BOX_CONFIGURATION_15', 'Sessions');
define('BOX_CONFIGURATION_16', 'Meta-Tags / Searchengines');
define('BOX_CONFIGURATION_17', 'Specialmodules');
define('BOX_CONFIGURATION_19', 'Counters');
define('BOX_CONFIGURATION_22', 'Search-Options');
define('BOX_CONFIGURATION_23', 'Yandex-Market');
define('BOX_CONFIGURATION_24', 'Quick Price Updates');
define('BOX_CONFIGURATION_25', 'Contribution Installer');
define('BOX_CONFIGURATION_27', 'Site Maintenance');
define('BOX_CONFIGURATION_29', 'Boxes');
define('BOX_CONFIGURATION_72', 'Order Editor');
define('BOX_CONFIGURATION_80', 'Smart Checkout');
define('BOX_CONFIGURATION_1610', 'Products Specifications');

define('BOX_MODULES', 'Payment-/Shipping-/Billing-Modules');
define('BOX_PAYMENT', 'Payment Systems');
define('BOX_SHIPPING', 'Shipping Methods');
define('BOX_ORDER_TOTAL', 'Order Total');
define('BOX_CATEGORIES', 'Categories / Products');
define('BOX_PRODUCTS_ATTRIBUTES', 'Product Options Value');
define('BOX_MANUFACTURERS', 'Manufacturers');
define('BOX_REVIEWS', 'Product Reviews');
define('BOX_CAMPAIGNS', 'Campaigns');
define('BOX_XSELL_PRODUCTS', 'Cross Marketing');
define('BOX_SPECIALS', 'Special Pricing');
define('BOX_PRODUCTS_EXPECTED', 'Expected Offers');
define('BOX_CUSTOMERS', 'Customers');
define('BOX_ACCOUNTING', 'Admin Permissions');
define('BOX_CUSTOMERS_STATUS','Customer Groups');
define('BOX_ORDERS', 'Orders');
define('BOX_COUNTRIES', 'Countries');
define('BOX_ZONES', 'Zones');
define('BOX_GEO_ZONES', 'Tax Zones');
define('BOX_TAX_CLASSES', 'Tax Classes');
define('BOX_TAX_RATES', 'Tax Rates');
define('BOX_HEADING_REPORTS', 'Reports');
define('BOX_PRODUCTS_VIEWED', 'Viewed Products');
define('BOX_STOCK_WARNING','Stock Info');
define('BOX_PRODUCTS_PURCHASED', 'Sold Products');
define('BOX_STATS_CUSTOMERS', 'Purchasing Statistics');
define('BOX_BACKUP', 'Database Manager');
define('BOX_BANNER_MANAGER', 'Banner Manager');
define('BOX_CACHE', 'Cache Control');
define('BOX_DEFINE_LANGUAGE', 'Language Definitions');
define('BOX_FILE_MANAGER', 'File-Manager');
define('BOX_MAIL', 'eMail Center');
define('BOX_NEWSLETTERS', 'Notification Manager');
define('BOX_SERVER_INFO', 'Server Info');
define('BOX_WHOS_ONLINE', 'Who is Online');
define('BOX_TPL_BOXES','Boxes Sort Order');
define('BOX_CURRENCIES', 'Currencies');
define('BOX_LANGUAGES', 'Languages');
define('BOX_ORDERS_STATUS', 'Order Status');
define('BOX_ATTRIBUTES_MANAGER','Attribute Manager');
define('BOX_PRODUCTS_ATTRIBUTES','Option-Groups');
define('BOX_MODULE_NEWSLETTER','Newsletter');
define('BOX_ORDERS_STATUS','Orders Status');
define('BOX_SHIPPING_STATUS','Shipping status');
define('BOX_SALES_REPORT','Sales Report');
define('BOX_MODULE_EXPORT','XT-Modules');
define('BOX_HEADING_GV_ADMIN', 'Vouchers/Coupons');
define('BOX_GV_ADMIN_QUEUE', 'Gift Voucher Queue');
define('BOX_GV_ADMIN_MAIL', 'Mail Gift Voucher');
define('BOX_GV_ADMIN_SENT', 'Gift Vouchers sent');
define('BOX_COUPON_ADMIN','Coupon Admin');
define('BOX_TOOLS_BLACKLIST','-CC-Blacklist');
define('BOX_IMPORT','Import/Export'); 
define('BOX_PRODUCTS_VPE','Packing unit');
define('BOX_CAMPAIGNS_REPORT','Campaign report');
define('BOX_ORDERS_XSELL_GROUP','Cross-sell groups');
define('BOX_SUPPORT_SITE','Support site');
define('BOX_SUPPORT_FAQ','FAQ');
define('BOX_SUPPORT_FORUM','Forum');
define('BOX_CONTRIBUTION_INSTALLER','Contrib Installer');

define('TXT_GROUPS','<b>Groups</b>:');
define('TXT_SYSTEM','System');
define('TXT_CUSTOMERS','Customers/Orders');
define('TXT_PRODUCTS','Products/Categories');
define('TXT_STATISTICS','Statistics');
define('TXT_TOOLS','Tools');
define('TEXT_ACCOUNTING','Admin-access for:');

//Dividers text for menu

define('BOX_HEADING_MODULES', 'Modules');
define('BOX_HEADING_LOCALIZATION', 'Languages/Currencies');
define('BOX_HEADING_TEMPLATES','Templates');
define('BOX_HEADING_TOOLS', 'Tools');
define('BOX_HEADING_LOCATION_AND_TAXES', 'Location / Tax');
define('BOX_HEADING_CUSTOMERS', 'Customers');
define('BOX_HEADING_CATALOG', 'Catalog');
define('BOX_MODULE_NEWSLETTER','Newsletter');

// javascript messages
define('JS_ERROR', 'Error have occured during the process of your form!\nPlease make the following corrections:\n\n');

define('JS_OPTIONS_VALUE_PRICE', '* The new product attribute needs a price value\n');
define('JS_OPTIONS_VALUE_PRICE_PREFIX', '* The new product attribute needs a price prefix (+/-)\n');

define('JS_PRODUCTS_NAME', '* The new product needs a name\n');
define('JS_PRODUCTS_DESCRIPTION', '* The new product needs a description\n');
define('JS_PRODUCTS_PRICE', '* The new product needs a price value\n');
define('JS_PRODUCTS_WEIGHT', '* The new product needs a weight value\n');
define('JS_PRODUCTS_QUANTITY', '* The new product needs a quantity value\n');
define('JS_PRODUCTS_MODEL', '* The new product needs a model value\n');
define('JS_PRODUCTS_IMAGE', '* The new product needs an image value\n');

define('JS_SPECIALS_PRODUCTS_PRICE', '* A new price for this product needs to be set\n');

define('JS_GENDER', '* The \'Gender\' value must be chosen.\n');
define('JS_FIRST_NAME', '* The \'First Name\' entry must have at least ' . ENTRY_FIRST_NAME_MIN_LENGTH . ' characters.\n');
define('JS_LAST_NAME', '* The \'Last Name\' entry must have at least ' . ENTRY_LAST_NAME_MIN_LENGTH . ' characters.\n');
define('JS_DOB', '* The \'Date of Birth\' entry must be in the format: xx/xx/xxxx (month/date/year).\n');
define('JS_EMAIL_ADDRESS', '* The \'eMail-Adress\' entry must have at least ' . ENTRY_EMAIL_ADDRESS_MIN_LENGTH . ' characters.\n');
define('JS_ADDRESS', '* The \'Street Adress\' entry must have at least ' . ENTRY_STREET_ADDRESS_MIN_LENGTH . ' characters.\n');
define('JS_POST_CODE', '* The \'Post Code\' entry must have at least ' . ENTRY_POSTCODE_MIN_LENGTH . ' characters.\n');
define('JS_CITY', '* The \'City\' entry must have at least ' . ENTRY_CITY_MIN_LENGTH . ' characters.\n');
define('JS_STATE', '* The \'State\' entry must be selected.\n');
define('JS_STATE_SELECT', '-- Select above --');
define('JS_ZONE', '* The \'State\' entry must be selected from the list for this country.');
define('JS_COUNTRY', '* The \'Country\' value must be chosen.\n');
define('JS_TELEPHONE', '* The \'Telephone Number\' entry must have at least ' . ENTRY_TELEPHONE_MIN_LENGTH . ' characters.\n');
define('JS_PASSWORD', '* The \'Password\' and \'Confirmation\' entries must match and have at least ' . ENTRY_PASSWORD_MIN_LENGTH . ' characters.\n');
define('JS_DISCOUNT', '* Manufacturer field must not match previous values.\n');

define('JS_ORDER_DOES_NOT_EXIST', 'Order Number %s does not exist!');

define('CATEGORY_PERSONAL', 'Personal');
define('CATEGORY_ADDRESS', 'Adress');
define('CATEGORY_CONTACT', 'Contact');
define('CATEGORY_COMPANY', 'Company');
define('CATEGORY_OPTIONS', 'More Options');

define('ENTRY_SECOND_NAME', 'Second Name:');
define('ENTRY_GENDER', 'Gender:');
define('ENTRY_GENDER_ERROR', '&nbsp;<span class="errorText">required</span>');
define('ENTRY_FIRST_NAME', 'First Name:');
define('ENTRY_FIRST_NAME_ERROR', '&nbsp;<span class="errorText">min. ' . ENTRY_FIRST_NAME_MIN_LENGTH . ' chars</span>');
define('ENTRY_LAST_NAME', 'Last Name:');
define('ENTRY_LAST_NAME_ERROR', '&nbsp;<span class="errorText">min. ' . ENTRY_LAST_NAME_MIN_LENGTH . ' chars</span>');
define('ENTRY_DATE_OF_BIRTH', 'Date of Birth:');
define('ENTRY_DATE_OF_BIRTH_ERROR', '&nbsp;<span class="errorText">(e.g. 05/21/1970)</span>');
define('ENTRY_EMAIL_ADDRESS', 'eMail Adress:');
define('ENTRY_EMAIL_ADDRESS_ERROR', '&nbsp;<span class="errorText">min. ' . ENTRY_EMAIL_ADDRESS_MIN_LENGTH . ' chars</span>');
define('ENTRY_EMAIL_ADDRESS_CHECK_ERROR', '&nbsp;<span class="errorText">Invalid eMail-Adress!</span>');
define('ENTRY_EMAIL_ADDRESS_ERROR_EXISTS', '&nbsp;<span class="errorText">This eMail-Adress already exists!</span>');
define('ENTRY_COMPANY', 'Company name:');
define('ENTRY_STREET_ADDRESS', 'Street Adress:');
define('ENTRY_STREET_ADDRESS_ERROR', '&nbsp;<span class="errorText">min. ' . ENTRY_STREET_ADDRESS_MIN_LENGTH . ' Chars</span>');
define('ENTRY_SUBURB', 'Suburb:');
define('ENTRY_POST_CODE', 'Post Code:');
define('ENTRY_POST_CODE_ERROR', '&nbsp;<span class="errorText">min. ' . ENTRY_POSTCODE_MIN_LENGTH . ' chars</span>');
define('ENTRY_CITY', 'City:');
define('ENTRY_CITY_ERROR', '&nbsp;<span class="errorText">min. ' . ENTRY_CITY_MIN_LENGTH . ' chars</span>');
define('ENTRY_STATE', 'State:');
define('ENTRY_STATE_ERROR', '&nbsp;<span class="errorText">required</font></small>');
define('ENTRY_COUNTRY', 'County:');
define('ENTRY_TELEPHONE_NUMBER', 'Telephone Number:');
define('ENTRY_TELEPHONE_NUMBER_ERROR', '&nbsp;<span class="errorText">min. ' . ENTRY_TELEPHONE_MIN_LENGTH . ' chars</span>');
define('ENTRY_FAX_NUMBER', 'Fax Number:');
define('ENTRY_NEWSLETTER', 'Newsletter:');
define('ENTRY_CUSTOMERS_STATUS', 'Customers status:');
define('ENTRY_NEWSLETTER_YES', 'Subscribed');
define('ENTRY_NEWSLETTER_NO', 'Unsubscribed');
define('ENTRY_MAIL_ERROR','&nbsp;<span class="errorText">Please choose an option</span>');
define('ENTRY_PASSWORD','Password (generated)');
define('ENTRY_PASSWORD_ERROR','&nbsp;<span class="errorText">min. ' . ENTRY_PASSWORD_MIN_LENGTH . ' chars</span>');
define('ENTRY_MAIL_COMMENTS','additional eMailtext:');

define('ENTRY_MAIL','Send eMail with password to customer?');
define('YES','yes');
define('NO','no');
define('SAVE_ENTRY','Save changes?');
define('TEXT_CHOOSE_INFO_TEMPLATE','Template for product details');
define('TEXT_CHOOSE_OPTIONS_TEMPLATE','Template for product options');
define('TEXT_SELECT','-- Please Select --');

// Icons
define('ICON_CROSS', 'False');
define('ICON_CURRENT_FOLDER', 'Current Folder');
define('ICON_DELETE', 'Delete');
define('ICON_ERROR', 'Error');
define('ICON_FILE', 'File');
define('ICON_FILE_DOWNLOAD', 'Download');
define('ICON_FOLDER', 'Folder');
define('ICON_LOCKED', 'Locked');
define('ICON_PREVIOUS_LEVEL', 'Previous Level');
define('ICON_PREVIEW', 'Select');
define('ICON_STATISTICS', 'Statistics');
define('ICON_SUCCESS', 'Success');
define('ICON_TICK', 'True');
define('ICON_UNLOCKED', 'Unlocked');
define('ICON_WARNING', 'Warning');

// constants for use in tep_prev_next_display 
define('TEXT_RESULT_PAGE', 'Page %s of %d');
define('TEXT_DISPLAY_NUMBER_OF_BANNERS', 'Displaying <b>%d</b> to <b>%d</b> (of <b>%d</b> Banners)');
define('TEXT_DISPLAY_NUMBER_OF_COUNTRIES', 'Displaying <b>%d</b> to <b>%d</b> (of <b>%d</b> Countries)');
define('TEXT_DISPLAY_NUMBER_OF_CUSTOMERS', 'Displaying <b>%d</b> to <b>%d</b> (of <b>%d</b> Customers)');
define('TEXT_DISPLAY_NUMBER_OF_CURRENCIES', 'Displaying <b>%d</b> to <b>%d</b> (of <b>%d</b> Currencies)');
define('TEXT_DISPLAY_NUMBER_OF_LANGUAGES', 'Displaying <b>%d</b> to <b>%d</b> (of <b>%d</b> Languages)');
define('TEXT_DISPLAY_NUMBER_OF_MANUFACTURERS', 'Displaying <b>%d</b> to <b>%d</b> (of <b>%d</b> Manufacturers)');
define('TEXT_DISPLAY_NUMBER_OF_NEWSLETTERS', 'Displaying <b>%d</b> to <b>%d</b> (of <b>%d</b> Newsletters)');
define('TEXT_DISPLAY_NUMBER_OF_ORDERS', 'Displaying <b>%d</b> to <b>%d</b> (of <b>%d</b> Orders)');
define('TEXT_DISPLAY_NUMBER_OF_ORDERS_STATUS', 'Displaying <b>%d</b> to <b>%d</b> (of <b>%d</b> Orders Status)');
define('TEXT_DISPLAY_NUMBER_OF_XSELL_GROUP', 'Displaying <b>%d</b> to <b>%d</b> (of <b>%d</b> Cross-sell groups)');
define('TEXT_DISPLAY_NUMBER_OF_PRODUCTS_VPE', 'Displaying <b>%d</b> to <b>%d</b> (of <b>%d</b> Packing Units)');
define('TEXT_DISPLAY_NUMBER_OF_SHIPPING_STATUS', 'Displaying <b>%d</b> to <b>%d</b> (of <b>%d</b> Shippingstatus)');
define('TEXT_DISPLAY_NUMBER_OF_PRODUCTS', 'Displaying <b>%d</b> to <b>%d</b> (of <b>%d</b> Products)');
define('TEXT_DISPLAY_NUMBER_OF_PRODUCTS_EXPECTED', 'Displaying <b>%d</b> to <b>%d</b> (of <b>%d</b> products expected)');
define('TEXT_DISPLAY_NUMBER_OF_REVIEWS', 'Displaying <b>%d</b> to <b>%d</b> (of <b>%d</b> Reviews)');
define('TEXT_DISPLAY_NUMBER_OF_SPECIALS', 'Displaying <b>%d</b> to <b>%d</b> (of <b>%d</b> products on special)');
define('TEXT_DISPLAY_NUMBER_OF_TAX_CLASSES', 'Displaying <b>%d</b> to <b>%d</b> (of <b>%d</b> Tax Classes)');
define('TEXT_DISPLAY_NUMBER_OF_TAX_ZONES', 'Displaying <b>%d</b> to <b>%d</b> (of <b>%d</b> Tax Zones)');
define('TEXT_DISPLAY_NUMBER_OF_TAX_RATES', 'Displaying <b>%d</b> to <b>%d</b> (of <b>%d</b> Tax Rates)');
define('TEXT_DISPLAY_NUMBER_OF_ZONES', 'Displaying <b>%d</b> to <b>%d</b> (of <b>%d</b> zones)');
define('TEXT_DISPLAY_NUMBER_OF_FEATURED', 'Displaying <b>%d</b> to <b>%d</b> (of <b>%d</b> products on featured)');
define('TEXT_DISPLAY_NUMBER_OF_FAQS', 'Displaying <b>%d</b> to <b>%d</b> (of <b>%d</b> faqs)');
define('TEXT_DISPLAY_NUMBER_OF_NEWS', 'Displaying <b>%d</b> to <b>%d</b> (of <b>%d</b> news)');
define('TEXT_DISPLAY_NUMBER_OF_ITEMS', 'Displaying <b>%d</b> to <b>%d</b> (of <b>%d</b> items)');

define('PREVNEXT_BUTTON_PREV', '&lt;&lt;');
define('PREVNEXT_BUTTON_NEXT', '&gt;&gt;');

define('TEXT_DEFAULT', 'Default');
define('TEXT_SET_DEFAULT', 'Set as default');
define('TEXT_FIELD_REQUIRED', '&nbsp;<span class="fieldRequired">* Required</span>');

define('ERROR_NO_DEFAULT_CURRENCY_DEFINED', 'Error: There is currently no default currency set. Please set one at: Administration Tool -> Localization -> Currencies');

define('TEXT_CACHE_CATEGORIES', 'Categories Box');
define('TEXT_CACHE_MANUFACTURERS', 'Manufacturers Box');
define('TEXT_CACHE_ALSO_PURCHASED', 'Also Purchased Module');

define('TEXT_NONE', '--none--');
define('TEXT_TOP', 'Top');

define('ERROR_DESTINATION_DOES_NOT_EXIST', 'Error: Destination does not exist.');
define('ERROR_DESTINATION_NOT_WRITEABLE', 'Error: Destination is not writeable.');
define('ERROR_FILE_NOT_SAVED', 'Error: File upload not saved.');
define('ERROR_FILETYPE_NOT_ALLOWED', 'Error: File upload type not allowed.');
define('SUCCESS_FILE_SAVED_SUCCESSFULLY', 'Success: File upload saved successfully.');
define('WARNING_NO_FILE_UPLOADED', 'Warnung: No file uploaded.');

define('DELETE_ENTRY','Delete entry?');
define('TEXT_PAYMENT_ERROR','<b>WARNING:</b><br />Please activate a Payment Module!');
define('TEXT_SHIPPING_ERROR','<b>WARNING:</b><br />Please activate a Shipping Module!');

define('TEXT_NETTO','no tax: ');

define('ENTRY_CID','Customer number:');
define('IP','Order IP:');
define('CUSTOMERS_MEMO','Memos:');
define('DISPLAY_MEMOS','Show/Write');
define('TITLE_MEMO','Customers MEMO');
define('ENTRY_LANGUAGE','Language:');
define('CATEGORIE_NOT_FOUND','Categorie not found!');

define('IMAGE_RELEASE', 'Redeem Gift Voucher');

define('_JANUARY', 'January');
define('_FEBRUARY', 'February');
define('_MARCH', 'March');
define('_APRIL', 'April');
define('_MAY', 'May');
define('_JUNE', 'June');
define('_JULY', 'July');
define('_AUGUST', 'August');
define('_SEPTEMBER', 'September');
define('_OCTOBER', 'October');
define('_NOVEMBER', 'November');
define('_DECEMBER', 'December');

define('TEXT_DISPLAY_NUMBER_OF_GIFT_VOUCHERS', 'Displaying <b>%d</b> to <b>%d</b> (of <b>%d</b> gift vouchers)');
define('TEXT_DISPLAY_NUMBER_OF_COUPONS', 'Displaying <b>%d</b> to <b>%d</b> (of <b>%d</b> coupons)');

define('TEXT_VALID_PRODUCTS_LIST', 'Products List');
define('TEXT_VALID_PRODUCTS_ID', 'Products ID');
define('TEXT_VALID_PRODUCTS_NAME', 'Products Name');
define('TEXT_VALID_PRODUCTS_MODEL', 'Products Model');

define('TEXT_VALID_CATEGORIES_LIST', 'Categories List');
define('TEXT_VALID_CATEGORIES_ID', 'Category ID');
define('TEXT_VALID_CATEGORIES_NAME', 'Category Name');

define('SECURITY_CODE_LENGTH_TITLE', 'Length of Gift Voucher Code');
define('SECURITY_CODE_LENGTH_DESC', 'Enter here the length of the Gift Voucher Code (max. 16 characters)');

define('NEW_SIGNUP_GIFT_VOUCHER_AMOUNT_TITLE', 'Welcome Gift Voucher Amount');
define('NEW_SIGNUP_GIFT_VOUCHER_AMOUNT_DESC', 'Welcome Gift Voucher Amount: If you do not wish to send a Gift Voucher in your create account eMail, put 0 for no amount, else place the amount here, i.e. 10.00 or 50.00, no currency signs');
define('NEW_SIGNUP_DISCOUNT_COUPON_TITLE', 'Welcome Discount Coupon Code');
define('NEW_SIGNUP_DISCOUNT_COUPON_DESC', 'Welcome Discount Coupon Code: if you do not want to send a Discount Coupon in your create account eMail ,leave this field blank, else place the coupon code here you wish to use');

define('TXT_ALL','All');

// UST ID
define('BOX_CONFIGURATION_18', 'Vat ID');
define('HEADING_TITLE_VAT','Vat-ID');
define('HEADING_TITLE_VAT','Vat-ID');
define('ENTRY_VAT_ID','Vat-ID');
define('TEXT_VAT_FALSE','<font color="FF0000">Checked/False!</font>');
define('TEXT_VAT_TRUE','<font color="FF0000">Checked/True!</font>');
define('TEXT_VAT_UNKNOWN_COUNTRY','<font color="FF0000">Not Checked/Unknown Country!</font>');
define('TEXT_VAT_UNKNOWN_ALGORITHM','<font color="FF0000">Not Checked/No Check available!</font>');
define('ENTRY_VAT_ID_ERROR', '<font color="FF0000">* Your Vat ID is False!</font>');

define('ERROR_GIF_MERGE','Missing GDlib Gif-Support, merge failed');
define('ERROR_GIF_UPLOAD','Missing GDlib Gif-Support, processing of Gif image failed');

define('TEXT_REFERER','Referer: ');

define('IMAGE_ICON_INFO','');
define('ERROR_IMAGE_DIRECTORY_CREATE', 'Error: Directory creation error ');
define('TEXT_IMAGE_DIRECTORY_CREATE', 'Success: Directory created ');

//Сборка VaM

define('BOX_EASY_POPULATE','Easypopulate');
define('BOX_CATALOG_QUICK_UPDATES', 'Quick Price Updates');

define('BOX_CATALOG_LATEST_NEWS', 'News');
define('IMAGE_NEW_NEWS_ITEM', 'Add news');

define('TABLE_HEADING_CUSTOMERS', 'Latest customers');
define('TABLE_HEADING_LASTNAME', 'Lastname');
define('TABLE_HEADING_FIRSTNAME', 'Firstname');
define('TABLE_HEADING_DATE', 'Date');

define('TABLE_HEADING_ORDERS', 'Latest orders');
define('TABLE_HEADING_CUSTOMER', 'Customer');
define('TABLE_HEADING_NUMBER', 'Order number');
define('TABLE_HEADING_ORDER_TOTAL', 'Order total');
define('TABLE_HEADING_STATUS', 'Status');

define('TABLE_HEADING_SUMMARY_PRODUCTS', 'Latest products');
define('TABLE_HEADING_PRODUCT_NAME', 'Products');
define('TABLE_HEADING_PRODUCT_PRICE', 'Price');

define('TABLE_HEADING_NEWS', 'Latest news');

define('BOX_TOOLS_RECOVER_CART', 'Recover Carts');

define('BOX_FEATURED', 'Featured Products');

define('TEXT_HEADER_DEFAULT','Main');
define('TEXT_HEADER_SUPPORT','Support');
define('TEXT_HEADER_SHOP','Shop');
define('TEXT_HEADER_LOGOFF','Logout');

define('BOX_CACHE_FILES', 'Cache control');

define('BOX_HEADING_ARTICLES', 'Article Manager');
define('BOX_TOPICS_ARTICLES', 'Topics/Articles');
define('BOX_ARTICLES_CONFIG', 'Configuration');
define('BOX_ARTICLES_AUTHORS', 'Authors');
define('BOX_ARTICLES_REVIEWS', 'Reviews'); 
define('BOX_ARTICLE_REVIEWS', 'Articles Reviews'); 
define('BOX_AUTHOR_REVIEWS', 'Authors Reviews'); 
define('BOX_ARTICLES_XSELL', 'Cross-Sell Articles');
define('IMAGE_NEW_TOPIC', 'New Topic');
define('IMAGE_NEW_ARTICLE', 'New Article');
define('TEXT_DISPLAY_NUMBER_OF_AUTHORS', 'Displaying <b>%d</b> to <b>%d</b> (of <b>%d</b> authors)'); 

define('TEXT_SUMMARY_STAT','Statistics');
define('TEXT_SUMMARY_CUSTOMERS','Customers');
define('TEXT_SUMMARY_ORDERS','Orders');
define('TEXT_SUMMARY_PRODUCTS','Products');
define('TEXT_SUMMARY_NEWS','News');

define('BOX_SALES_REPORT2','Sales Report 2');

define('TEXT_PHP_MAILER_ERROR','Message was not sent.<br />');
define('TEXT_PHP_MAILER_ERROR1','Mailer Error: ');

define('BOX_TOOLS_EMAIL_MANAGER','Email templates');

define('BOX_CATEGORY_SPECIALS', 'Special Categories');
define('TEXT_DISPLAY_NUMBER_OF_SPECIAL_CATEGORY', 'Displaying <b>%d</b> to <b>%d</b> (of <b>%d</b> Special Categories)');

define('IMAGE_ICON_STATUS_GREEN', 'Active');
define('IMAGE_ICON_STATUS_GREEN_LIGHT', 'Set active');
define('IMAGE_ICON_STATUS_RED', 'Inactive');
define('IMAGE_ICON_STATUS_RED_LIGHT', 'Set inactive');

define('TEXT_IMAGE_NONEXISTENT','No image aviable!'); 

define('TEXT_TOGGLE_EDITOR', 'Toggle HTML Editor');

define('WARNING_MODULES_SORT_ORDER','WARNING: You have duplicate sort orders which will result in calculations errors. Please correct these issues now!');

define('BOX_PRODUCTS_OPTIONS', 'Product Options Name');

define('BOX_MODULES_SHIP2PAY','Ship 2 Pay');
define('TEXT_DISPLAY_NUMBER_OF_PAYMENTS','Displaying <b>%d</b> to <b>%d</b> (of <b>%d</b> ship 2 pay)');

define('BOX_PRODUCT_EXTRA_FIELDS','Product Extra Fields');
define('TEXT_EDIT_FIELDS','Edit product extra fields.');
define('TEXT_ADD_FIELDS','Add product extra fields.');

define('BOX_CATALOG_FAQ', 'FAQ');

require_once(DIR_FS_LANGUAGES . $_SESSION['language'].'/admin/'.'affiliate_' . $_SESSION['language'] .'.php');

define('BOX_HEADING_CUSTOMER_EXTRA_FIELDS', 'Customer extra fields');
define('ENTRY_EXTRA_FIELDS_ERROR', 'Field %s must contain a minimum of %d characters');
define('TEXT_DISPLAY_NUMBER_OF_FIELDS', 'Displaying <b>%d</b> to <b>%d</b> (of <b>%d</b> Fields)');

define('VAMSHOP_SUPPORT_KEY_TEXT','<a href="http://vamshop.com/key.php" target="_blank"><u>Support key:</u></a>');
define('VAMSHOP_REGISTER_SUPPORT_KEY','<a href="http://vamshop.com/key.php" target="_blank">register key for free</a>.');
define('VAMSHOP_SUPPORT_KEY',(file_exists(DIR_FS_CATALOG .'vamshop.key') ? implode('', file(DIR_FS_CATALOG .'vamshop.key')) : VAMSHOP_REGISTER_SUPPORT_KEY));

define('TEXT_ACCESS_FORBIDDEN','Access forbidden');

define('TEXT_MANUAL_LINK','Help');
define('MANUAL_LINK_EDIT_CATEGORY','http://manual.vamshop.ru/ch05.html#edit-category');
define('MANUAL_LINK_NEW_CATEGORY','http://manual.vamshop.ru/ch05.html#new-category');
define('MANUAL_LINK_PRODUCTS','http://manual.vamshop.ru/ch05s03.html');
define('MANUAL_LINK_MANUFACTURERS','http://manual.vamshop.ru/ch05s02.html');
define('MANUAL_LINK_EASYPOPULATE','http://manual.vamshop.ru/catalog.html#easypopulate');
define('MANUAL_LINK_ATTRIBUTE','http://manual.vamshop.ru/ch05s05.html');
define('MANUAL_LINK_TAX','http://manual.vamshop.ru/ch05s06.html');
define('MANUAL_LINK_FILTERS','http://manual.vamshop.ru/ch05s07.html');
define('MANUAL_LINK_GV','http://manual.vamshop.ru/ch09.html');
define('MANUAL_LINK_COUPONS','http://manual.vamshop.ru/ch09s02.html');
define('MANUAL_LINK_AFFILIATE','http://manual.vamshop.ru/ch10.html');
define('MANUAL_LINK_NEWSLETTER','http://manual.vamshop.ru/ch12.html#id2647059');
define('MANUAL_LINK_RCS','http://manual.vamshop.ru/ch12s03.html');
define('MANUAL_LINK_NEWS','http://manual.vamshop.ru/ch13.html');
define('MANUAL_LINK_INFOPAGES','http://manual.vamshop.ru/ch13s02.html');
define('MANUAL_LINK_FAQ','http://manual.vamshop.ru/ch13s03.html');
define('MANUAL_LINK_ARTICLES','http://manual.vamshop.ru/ch13s04.html');
define('MANUAL_LINK_BACKUP','http://manual.vamshop.ru/ch13s06.html');

define('TXT_FREE','<span class="Requirement"><strong>free</strong></span>');

define('TEXT_PRINT_EAN','EAN');

define('text_zero', 'zero');
define('text_three', 'three');
define('text_four', 'four');
define('text_five', 'five');
define('text_six', 'six');
define('text_seven', 'seven');
define('text_eight', 'eight');
define('text_nine', 'nine');
define('text_ten', 'ten');
define('text_eleven', 'eleven');
define('text_twelve', 'twelve');
define('text_thirteen', 'thirteen');
define('text_fourteen', 'fourteen');
define('text_fifteen', 'fifteen');
define('text_sixteen', 'sixteen');
define('text_seventeen', 'seventeen');
define('text_eighteen', 'eighteen');
define('text_nineteen', 'nineteen');
define('text_twenty', 'twenty');
define('text_thirty', 'thirty');
define('text_forty', 'forty');
define('text_fifty', 'fifty');
define('text_sixty', 'sixty');
define('text_seventy', 'seventy');
define('text_eighty', 'eighty');
define('text_ninety', 'ninety');
define('text_hundred', 'hundred');
define('text_two_hundred', 'two hundred');
define('text_three_hundred', 'three hundred');
define('text_four_hundred', 'four hundred');
define('text_five_hundred', 'five hundred');
define('text_six_hundred', 'six hundred');
define('text_seven_hundred', 'seven hundred');
define('text_eight_hundred', 'eight hundred');
define('text_nine_hundred', 'nine hundred');
define('text_penny', 'penny');
define('text_kopecks', 'kopecks');
define('text_single_kopek', 'single kopek');
define('text_two_penny', 'two penny');
define('text_ruble', 'ruble');
define('text_rubles', 'rubles');
define('text_one_ruble', 'one ruble');
define('text_two_rubles', 'two rubles');
define('text_thousands', 'thousands');
define('text_thousand', 'thousand');
define('text_one_thousand', 'one thousand');
define('text_two_thousand', 'two thousand');
define('text_million', 'million');
define('text_millions', 'millions');
define('text_one_million', 'one million');
define('text_two_million', 'two million');
define('text_billion', 'billion');
define('text_billions', 'billions');
define('text_one_billion', 'one billion');
define('text_two_billion', 'two billion');
define('text_trillion', 'trillion');
define('text_trillions', 'trillions');
define('text_one_trillion', 'one trillion');
define('text_two_trillion', 'two trillion');

define('BOX_YML_IMPORT','YML import/export');

define('TABLE_TEXT_IS_PIN','Is PIN code');
define('BOX_CATALOG_PIN_LOADER','PIN loader');

// Products Specifications
define('BOX_CATALOG_PRODUCTS_SPECIFICATIONS', 'Products Specifications');

define('BOX_HEADING_ORDERS','Orders');
define('BUTTON_ORDERS_EXPORT','Orders Export');

define('BOX_ATTRIBUTES_MANAGER_CATEGORIES','Attributes for category');

define('TEXT_PRODUCTS_ATTRIBUTES','Product Attributes');

define('BOX_ANSWER_TEMPLATES','Answer Templates');
define('BOX_PRODUCT_LABELS','Product labels');

define('BOX_COMPANY_REVIEWS', 'Manufacturers reviews');

define('BOX_SITE_REVIEWS', 'Site reviews');

define('TEXT_ADD_REVIEW', 'Add Review');

define('TEXT_CATEGORY_DISCOUNT', 'Specials By Categories');
define('TEXT_MANUFACTURER_DISCOUNT', 'Specials By Brands');
define('TEXT_DISPLAY_NUMBER_OF_SPECIAL_MANUFACTURER', 'Displaying <b>%d</b> to <b>%d</b> (of <b>%d</b> Special Brands)');

define('BOX_HEADING_MARKETING', 'Marketing');

define('BOX_MERKETING_1', 'Payment method discount');
define('BOX_MERKETING_2', 'Shipping method discount');
define('BOX_MERKETING_3', 'Payment method surcharge');
define('BOX_MERKETING_4', 'Shipping method surcharge');
define('BOX_MERKETING_5', 'Order total discount');
define('BOX_MERKETING_6', 'Order quantity discount');
define('BOX_MERKETING_7', 'Personal customer discount');
define('BOX_MERKETING_8', 'Personal customer discount by brand');
define('BOX_MERKETING_9', 'Order total discount for groups');
define('BOX_MERKETING_10', 'Order quantity discount for groups');
define('BOX_MERKETING_11', 'Customer groups discount');
define('BOX_MERKETING_12', 'Accumulated discount');
define('BOX_MERKETING_13', 'Maximum allowed discount');
define('BOX_MERKETING_14', 'Coupons');
define('BOX_MERKETING_15', 'Gift vouchers');
define('BOX_MERKETING_16', 'Affiliate program');

?>