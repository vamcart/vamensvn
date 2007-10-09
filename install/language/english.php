<?php
/* --------------------------------------------------------------
   $Id: english.php 1213 2007-05-03 13:12:58 VaM $  

   VaM Shop - open source ecommerce solution
   http://vamshop.ru
   http://vamshop.com

   Copyright (c) 2007 VaM Shop
   --------------------------------------------------------------
   based on:
   (c) 2003	 nextcommerce (english.php,v 1.8 2003/08/13); www.nextcommerce.org
   (c) 2004	 xt:Commerce (english.php,v 1.8 2003/08/13); xt-commerce.com 
   
   Released under the GNU General Public License 
   --------------------------------------------------------------*/
// Global
define('TEXT_FOOTER',''); 
   
// Box names
define('BOX_LANGUAGE','Language');
define('BOX_DB_CONNECTION','DB Connection') ;
define('BOX_WEBSERVER_SETTINGS','Webserver Settings');
define('BOX_DB_IMPORT','DB Import');
define('BOX_WRITE_CONFIG','Write config files');
define('BOX_ADMIN_CONFIG','Administrator config');
define('BOX_USERS_CONFIG','User config');

define('PULL_DOWN_DEFAULT','Please select a Country!');


// Error messages
 	// index.php
	define('SELECT_LANGUAGE_ERROR','Please select a language!');
	// step2,5.php
	define('TEXT_CONNECTION_ERROR','A test connection made to the database was NOT successful.');
	define('TEXT_CONNECTION_SUCCESS','A test connection made to the database was successful.');
	define('TEXT_DB_ERROR','The error message returned is:');
	define('TEXT_DB_ERROR_1','Please click on the <i>Back</i> graphic to review your database server settings.');
	define('TEXT_DB_ERROR_2','If you require help with your database server settings, please consult your hosting company.');
	// step6.php
	define('ENTRY_FIRST_NAME_ERROR','Firstname to short');
	define('ENTRY_LAST_NAME_ERROR','Lastname to short');
	define('ENTRY_EMAIL_ADDRESS_ERROR','Email to short');
	define('ENTRY_EMAIL_ADDRESS_CHECK_ERROR','Check Email Format');
	define('ENTRY_STREET_ADDRESS_ERROR','Street to short');
	define('ENTRY_POST_CODE_ERROR','Post Code to short');
	define('ENTRY_CITY_ERROR','City to short');
	define('ENTRY_COUNTRY_ERROR','Select Country');
	define('ENTRY_STATE_ERROR','Select State');
	define('ENTRY_TELEPHONE_NUMBER_ERROR','Telephone number to short');
	define('ENTRY_PASSWORD_ERROR','Check Password');
	define('ENTRY_STORE_NAME_ERROR','Store name to short');
	define('ENTRY_COMPANY_NAME_ERROR','Company name to short');
	define('ENTRY_EMAIL_ADDRESS_FROM_ERROR','Email-From to short');
	define('ENTRY_EMAIL_ADDRESS_FROM_CHECK_ERROR','Check Email-From Format');
	define('SELECT_ZONE_SETUP_ERROR','Select Zone setup');
	// step7.php
	define('ENTRY_DISCOUNT_ERROR','Product discount -Guest');
	define('ENTRY_OT_DISCOUNT_ERROR','Discount on ot -Guest');
	define('SELECT_OT_DISCOUNT_ERROR','Discount on ot -Guest');
	define('SELECT_GRADUATED_ERROR','Graduated Prices -Guest');
	define('SELECT_PRICE_ERROR','Show Price -Guest');
	define('SELECT_TAX_ERROR','Show Tax -Guest');
	define('ENTRY_DISCOUNT_ERROR2','Product discount -Default');
	define('ENTRY_OT_DISCOUNT_ERROR2','Discount on ot -Default');
	define('SELECT_OT_DISCOUNT_ERROR2','Discount on ot -Default');
	define('SELECT_GRADUATED_ERROR2','Graduated Prices -Default');
	define('SELECT_PRICE_ERROR2','Show Price -Default');
	define('SELECT_TAX_ERROR2','Show Tax -Default');
	
	


	
	
// index.php
define('TITLE_SELECT_LANGUAGE','Select your language!');

define('TEXT_WELCOME_INDEX','<b>Welcome to VaM Shop</b><br /><br />VaM Shop is an open source e-commerce solution under on going development by the VaM Shop Team and its community.<br /> Its feature packed out-of-the-box installation allows store owners to setup, run, and maintain their online stores with minimum effort and with no costs involved.<br /> VaM Shop combines open source solutions to provide a free and open development platform, which includes the powerful PHP web scripting language, the stable Apache web server, and the fast MySQL database server.<br /><br />With no restrictions or special requirements, VaM Shop can be installed on any PHP4 enabled web server, on any environment that PHP and MySQL supports, which includes GNU/Linux, Solaris, BSD, and Microsoft Windows environments.');
define('TEXT_WELCOME_STEP1','<b>Main database and webserver settings</b><br /><br />Please enter your Database and webserver settings.<br />');
define('TEXT_WELCOME_STEP2','<b>Install database</b><br /><br />The VaM Shop installer will automatically install the VaM Shop database.');
define('TEXT_WELCOME_STEP3','<b>Database import.</b><br /><br />');
define('TEXT_WELCOME_STEP4','<b>Configure VaM Shop main files</b><br /><br /><b>If there are old configure files from a further installation, VaM Shop wiill delete them</b><br /><br />The installer will set up the configuration files with the main parameters for database and file structur.<br /><br />You can choose between different session handling systems.');
define('TEXT_WELCOME_STEP5','<b>Webserver Configuration</b><br /><br />');
define('TEXT_WELCOME_STEP6','<b>Basic shop configuration</b><br /><br />The installer will create the admin account and will perform some db actions.<br /> The given informations for <b>Country</b> and <b>Post Code</b> are used for shipping and tax callculations.');
define('TEXT_WELCOME_STEP7','<b>Guest and default customers setup</b><br /><br />The VaM Shop group- and pricesystem got nearly infinite possibilities of different prices.<br /><br />
<b>% discount on single product</b><br />
%max can be set for every single product, and single customers group<br />
if %max at product = 10.00% and %max for group = 5% -> 5% discount on product<br />
if %max at product = 10.00% and %max for group = 15% -> 10% discount on product<br /><br />
<b>% discount on order total</b><br />
% discount on total order sum (after tax and currencies calculations)<br /><br />
<b>Graduated price</b><br />
You also can set infinite graduated prices for a single product and single customers group.<br />
you also are able to combine any of those systems, like:<br />
user group 1 -> graduated prices on product Y<br />
user group 2 -> 10% discount on product Y<br />
user group 3 -> a special group price on product Y<br />
user group 4 -> netto price on product Y<br />
');
define('TEXT_WELCOME_FINISHED','<b>VaM Shop installation successful!</b>');
// step1.php

define('TITLE_CUSTOM_SETTINGS','Custom Settings');
define('TEXT_IMPORT_DB','Import VaM Shop Database');
define('TEXT_IMPORT_DB_LONG','Import the VaM Shop database structure which includes tables and sample data.');
define('TEXT_AUTOMATIC','Automatic Configuration');
define('TEXT_AUTOMATIC_LONG','The information you submit regarding the web server and database server will be automatically saved into both VaM Shop Shop and Administration Tool configuration files.');
define('TITLE_DATABASE_SETTINGS','Database Settings');
define('TEXT_DATABASE_SERVER','Database Server');
define('TEXT_DATABASE_SERVER_LONG','The database server can be in the form of a hostname, such as <i>db1.myserver.com</i>, or as an IP address, such as <i>192.168.0.1</i>.');
define('TEXT_USERNAME','Username');
define('TEXT_USERNAME_LONG','The username is used to connect to the database server. An example username is <i>mysql_10</i>.<br /><br />Note: If the VaM Shop Database is to be imported (selected above), the account used to connect to the database server needs to have Create and Drop permissions.');
define('TEXT_PASSWORD','Password:');
define('TEXT_PASSWORD_LONG','The password is used together with the username, which forms the database user account.');
define('TEXT_DATABASE','Database');
define('TEXT_DATABASE_LONG','The database used to hold the catalog data. An example database name is <i>vamshop</i>.<br /><b>ATTENTION:</b> VaM Shop need an empty Database to perform Installation.');
define('TITLE_WEBSERVER_SETTINGS','Webserver Settings');
define('TEXT_WS_ROOT','Webserver Root Directory');
define('TEXT_WS_ROOT_LONG','The directory where your web pages are being served from, usually <i>/home/myname/public_html</i>.');
define('TEXT_WS_XTC','Webserver "VaM Shop" Directory');
define('TEXT_WS_vam_LONG','The directory where your catalog pages are being served from (from the webserver root directory), usually <i>/home/myname/public_html<b>/vamshop/</b></i>.');
define('TEXT_WS_ADMIN','Webserver Administration Tool Directory');
define('TEXT_WS_ADMIN_LONG','The directory where your administration tool pages are being served from (from the webserver root directory), usually <i>/home/myname/public_html<b>/vamshop/admin/</b></i>.');
define('TEXT_WS_CATALOG','WWW Catalog Directory');
define('TEXT_WS_CATALOG_LONG','The virtual directory where the VaM Shop Catalog module resides, usually <i>/vamshop/</i>.');
define('TEXT_WS_ADMINTOOL','WWW Administration Tool Directory');
define('TEXT_WS_ADMINTOOL_LONG','The virtual directory where the VaM Shop Administration Tool resides, usually <i>/vamshop/admin/</i>');

define('TEXT_WWW','Shop URL');

// step2.php

define('TEXT_PROCESS_1','Please continue the installation process to execute the database import procedure.');
define('TEXT_PROCESS_2','It is important this procedure is not interrupted, otherwise the database may end up corrupt.');
define('TEXT_PROCESS_3','The file to import must be located and named at: ');


// step3.php

define('TEXT_TITLE_ERROR','The following error has occurred:');
define('TEXT_TITLE_SUCCESS','The database import was successful!');

// step4.php
define('TITLE_WEBSERVER_CONFIGURATION','Webserver Configuration:');
define('TITLE_STEP4_ERROR','The following error has occurred:');
define('TEXT_STEP4_ERROR','<b>The configuration files do not exist, or permission levels are not set.</b><br /><br />Please perform the following actions: ');
define('TEXT_STEP4_ERROR_1','If <i>chmod 706</i> does not work, please try <i>chmod 777</i>.');
define('TEXT_STEP4_ERROR_2','If you are running this installation procedure under a Microsoft Windows environment, try renaming the existing configuration file so a new file can be created.');
define('TEXT_VALUES','The following configuration values will be written to:');
define('TITLE_CHECK_CONFIGURATION','Please check your web-server informations');
define('TEXT_HTTP','HTTP Server');
define('TEXT_HTTP_LONG','The web server can be in the form of a hostname, such as <i>http://www.myserver.com</i>, or as an IP address, such as <i>http://192.168.0.1</i>.');
define('TEXT_HTTPS','HTTPS Server');
define('TEXT_HTTPS_LONG','The secure web server can be in the form of a hostname, such as  <i>https://www.myserver.com</i>, or as an IP address, such as <i>https://192.168.0.1</i>.');
define('TEXT_SSL','Enable SSL Connections');
define('TEXT_SSL_LONG','Enable Secure Connections With SSL (HTTPS)');
define('TITLE_CHECK_DATABASE','Please check your database-server informations');
define('TEXT_PERSIST','Enable Persistent Connections');
define('TEXT_PERSIST_LONG','Enable persistent database connections. Please disable this if you are on a shared server.');
define('TEXT_SESS_FILE','Store Sessions as Files');
define('TEXT_SESS_DB','Store Sessions in the Database');
define('TEXT_SESS_LONG','The location to store PHPs sessions files.');

// step5.php

define('TEXT_WS_CONFIGURATION_SUCCESS','<strong>VaM Shop</strong> Webserver configuration was successful');

// step6.php

define('TITLE_ADMIN_CONFIG','Administrator configuration');
define('TEXT_REQU_INFORMATION','* required information');
define('TEXT_FIRSTNAME','First Name:');
define('TEXT_LASTNAME','Last Name:');
define('TEXT_EMAIL','E-Mail Address:');
define('TEXT_EMAIL_LONG','(for receiving orders)');				
define('TEXT_STREET','Street Address:');
define('TEXT_POSTCODE','Post Code:');
define('TEXT_CITY','City:');
define('TEXT_STATE','State/Province:');
define('TEXT_COUNTRY','Country:');
define('TEXT_COUNTRY_LONG','Will be used for shipping and tax');
define('TEXT_TEL','Telephone  Number:');
define('TEXT_PASSWORD','Password:');
define('TEXT_PASSWORD_CONF','Password Confirmation:');
define('TITLE_SHOP_CONFIG','Shop configuration');
define('TEXT_STORE','Store Name:');
define('TEXT_STORE_LONG','(The name of my store)');
define('TEXT_EMAIL_FROM','E-Mail From:');
define('TEXT_EMAIL_FROM_LONG','(The e-mail adress used in (sent) e-mails)');
define('TITLE_ZONE_CONFIG','Zone configuration');
define('TEXT_ZONE','Set up zones for EU?');
define('TITLE_ZONE_CONFIG_NOTE','*Note; VaM Shop can automatically setup the right Zone-Setup if your store is located within the EU.');
define('TITLE_SHOP_CONFIG_NOTE','*Note; Information for basic Shop configuration');
define('TITLE_ADMIN_CONFIG_NOTE','*Note; Information for Admin/Superuser');
define('TEXT_ZONE_NO','No');
define('TEXT_ZONE_YES','Yes');
define('TEXT_COMPANY','Company name:');
define('ENTRY_STATE_ERROR_SELECT','Select state');
define('ENTRY_STREET_ADDRESS_TEXT', '');

// step7
define('TITLE_GUEST_CONFIG','Guest configuration');
define('TITLE_GUEST_CONFIG_NOTE','*Note; Settings for standard user (non-regristrated customer)');
define('TITLE_CUSTOMERS_CONFIG','Default customers configuration');
define('TITLE_CUSTOMERS_CONFIG_NOTE','*Note; Settings for standard user (regristrated customer)');
define('TEXT_STATUS_DISCOUNT','Product discount');
define('TEXT_STATUS_DISCOUNT_LONG','discount on products <i>(in percent, like 10.00 , 20.00)</i>');
define('TEXT_STATUS_OT_DISCOUNT_FLAG','Discount on order total');
define('TEXT_STATUS_OT_DISCOUNT_FLAG_LONG','allow guest to get discount on total order price');
define('TEXT_STATUS_OT_DISCOUNT','Discount on order total');
define('TEXT_STATUS_OT_DISCOUNT_LONG','discount on order total <i>(in percent, like 10.00 , 20.00)</i>');
define('TEXT_STATUS_GRADUATED_PRICE','Graduated price');
define('TEXT_STATUS_GRADUATED_PRICE_LONG','allow user to see gratuated prices');
define('TEXT_STATUS_SHOW_PRICE','Show price');
define('TEXT_STATUS_SHOW_PRICE_LONG','allow user to see product-price in shop');
define('TEXT_STATUS_SHOW_TAX','Show tax');
define('TEXT_STATUS_SHOW_TAX_LONG','Display prices with tax included (Yes) or without any tax (No)');


define('TITLE_CHMOD','Setting rights on files');
// fnished.php

define('TEXT_SHOP_CONFIG_SUCCESS','<strong>VaM Shop</strong> Shop configuration was successful.');
define('TEXT_TEAM','<a href="http://vamshop.com" target="_blank">VaM Shop support site</a>');

// Сборка VaM

// step1

define('IMAGE_CONTINUE','Continue');
define('IMAGE_CANCEL','Cancel');
define('IMAGE_BACK','Back');
define('IMAGE_RETRY','Retry');
define('TEXT_RUSSIAN','Russian');
define('TEXT_ENGLISH','English');
define('TEXT_CHECKING','Checking:');
define('TEXT_ATTENTION','Attention:');
define('TITLE_INDEX','VaM Shop Installer - Welcome');
define('TITLE_STEP1','VaM Shop Installer - STEP 1 / Settings');
define('TITLE_STEP2','VaM Shop Installer - STEP 2 / DB Connection');
define('TITLE_STEP3','VaM Shop Installer - STEP 3 / DB Import');
define('TITLE_STEP4','VaM Shop Installer - STEP 4 / Webserver Configuration');
define('TITLE_STEP5','VaM Shop Installer - STEP 5 / Write Config Files');
define('TITLE_STEP6','VaM Shop Installer - STEP 6 / Create Superuser');
define('TITLE_STEP7','VaM Shop Installer - STEP 7 / Define Pricesystem');
define('TITLE_FINISHED','VaM Shop Installer - Finished');
define('CHARSET','utf-8');
define('TEXT_INSTALL','Install');
define('ERROR_PERMISSION','WRONG PERMISSION on ');
define('TEXT_ERROR','ERROR');
define('TEXT_FILE_PERMISSIONS','FILE Permissions .............................. ');
define('TEXT_FOLDER_PERMISSIONS','FOLDER Permissions .............................. ');
define('PHP_VERSION_ERROR','<b>ATTENTION!, your PHP Version is to old, VaM Shop requires atleast PHP 4.1.3.</b><br /><br />
                 Your php Version: <b><?php echo phpversion(); ?></b><br /><br />
                 VaM Shop wont work on this server, update PHP or change Server.');
define('TEXT_PHP_VERSION','PHP VERSION .............................. ');
define('TEXT_GD_LIB_NOT_FOUND','ERROR NO GDLIB FOUND!');
define('TEXT_GD_LIB_VERSION','if GDlib Version < 2+ , klick here for further instructions');
define('TEXT_GD_LIB_VERSION1','GDlib VERSION .............................. ');
define('TEXT_GD_LIB_GIF_SUPPORT','GDlib GIF-Support .............................. ');
define('TEXT_GD_LIB_GIF_SUPPORT_ERROR','<b><font color="ff0000">ERROR</font></b><br />You don\'t have GIF support within your GDlib, you won\'t be able to use GIF images, and GIF overlayfunctions in VaM Shop!');
define('TEXT_OK','OK');

//finished

define('TEXT_CATALOG','Catalog');

define('START','Install');
define('STEP1','Step 1');
define('STEP2','Step 2');
define('STEP3','Step 3');
define('STEP4','Step 4');
define('STEP5','Step 5');
define('STEP6','Step 6');
define('END','Finished');

?>