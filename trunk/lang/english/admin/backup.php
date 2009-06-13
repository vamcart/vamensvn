<?php
/* --------------------------------------------------------------
   $Id: backup.php 899 2007-02-07 17:36:57 VaM $

   VaM Shop - open source ecommerce solution
   http://vamshop.ru
   http://vamshop.com

   Copyright (c) 2007 VaM Shop
   --------------------------------------------------------------
   based on:
   (c) 2000-2001 The Exchange Project  (earlier name of osCommerce)
   (c) 2002-2003 osCommerce(backup.php,v 1.21 2002/06/15); www.oscommerce.com
   (c) 2003	 nextcommerce (backup.php,v 1.4 2003/08/14); www.nextcommerce.org
   (c) 2004	 xt:Commerce (backup.php,v 1.4 2003/08/14); xt-commerce.com

   Released under the GNU General Public License
   --------------------------------------------------------------*/

define('TEXT_DUMPER_SUBMIT', 'Submit');
define('TEXT_DUMPER_SEC', ' sec.');
define('TEXT_DUMPER_DIR_ERROR', 'Backup directory create error');
define('TEXT_DUMPER_DOWNLOAD', 'Download file');
define('TEXT_DUMPER_BACK', 'Back');
define('TEXT_DUMPER_CREATE', 'Backup');
define('TEXT_DUMPER_NAME_ERROR', 'ERROR! DB not selected!');
define('TEXT_DUMPER_CONNECT', 'Connecting to DB ');
define('TEXT_DUMPER_CONNECT_ERROR', 'Database select error.');
define('TEXT_DUMPER_CREATE_FILE', 'Backup creation:');
define('TEXT_DUMPER_CHARSET_ERROR', 'Databse charset error.');
define('TEXT_DUMPER_CHARSET', 'Set database charset to ');
define('TEXT_DUMPER_CHARSET_COLLATION', 'Charset collation error:');
define('TEXT_DUMPER_TABLE', 'Table ');
define('TEXT_DUMPER_CONNECT1', 'charset ');
define('TEXT_DUMPER_PROCESS', 'Processing table ');
define('TEXT_DUMPER_MAKE', 'Backup for db ');
define('TEXT_DUMPER_MAKE1', ' created successful.');
define('TEXT_DUMPER_SIZE', 'DB size:       ');
define('TEXT_DUMPER_MB', ' mb');
define('TEXT_DUMPER_FILE_SIZE', 'File size: ');
define('TEXT_DUMPER_TABLES_COUNT', 'Tables saved: ');
define('TEXT_DUMPER_STRING_COUNT', 'Strings saved:   ');
define('TEXT_DUMPER_RESTORE', 'Restore');
define('TEXT_DUMPER_FILE_ERROR', 'ERROR! File not found!');
define('TEXT_DUMPER_FILE_READ', 'Read file ');
define('TEXT_DUMPER_FILE_ERROR1', 'ERROR! File not selected!');
define('TEXT_DUMPER_QUERY_ERROR', 'Query error.');
define('TEXT_DUMPER_RESTORED', 'DB restored.');
define('TEXT_DUMPER_DATE', 'Date: ');
define('TEXT_DUMPER_QUERY_COUNT', 'Number of queries: ');
define('TEXT_DUMPER_TABLES_CREATED', 'Tables added: ');
define('TEXT_DUMPER_STRINGS_CREATED', 'Strings added: ');
define('TEXT_DUMPER_MAX', '9 (max)');
define('TEXT_DUMPER_MED', '5 (med)');
define('TEXT_DUMPER_MIN', '1 (min)');
define('TEXT_DUMPER_NO', 'No compression');

define('TEXT_DUMPER_BACKUP', 'Backup&nbsp;');
define('TEXT_DUMPER_DB', 'DB:');
define('TEXT_DUMPER_FILTER', 'Tables filter:');
define('TEXT_DUMPER_COMPRESS', 'Compression:');
define('TEXT_DUMPER_COMPRESS_LEVEL', 'Compression level:');

define('TEXT_DUMPER_RESTORE_DB', 'Restore&nbsp;');
define('TEXT_DUMPER_FILE', 'File:');

define('TEXT_DUMPER_TABLE_STATUS', 'Table status:');
define('TEXT_DUMPER_TOTAL_STATUS', 'Total:');

define('TEXT_DUMPER_ERROR', 'Ошибка');
define('TEXT_DUMPER_BROWSER_ERROR', 'Minimum system requirements:<br /> - Internet Explorer 5.5+, Mozilla or Opera 8+ (<span id=sie>-</span>)<br /> - JavaScript enabled (<span id=sjs>-</span>)');

define('TEXT_DUMPER_LOGIN_HEADER', 'Login and password');
define('TEXT_DUMPER_LOGIN', 'Login:');
define('TEXT_DUMPER_PASSWORD', 'Password:');

define('TEXT_DUMPER_FORBIDDEN', 'Permission error');
define('TEXT_DUMPER_DB_CONNECT', 'DB connection error');
define('TEXT_DUMPER_DB_ERROR', 'Error!');

define('HEADING_TITLE','Backup');

?>