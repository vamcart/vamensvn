<?php
/* -----------------------------------------------------------------------------------------
   $Id: english_db_eeror.php 1260 2007/02/07 13:24:46 VaM $

   VaM Shop - open source ecommerce solution
   http://vamshop.ru
   http://vamshop.com

   Copyright (c) 2007 VaM Shop
   -----------------------------------------------------------------------------------------
   Released under the GNU General Public License
   ---------------------------------------------------------------------------------------*/

// ��������� MySQL ������

define('DB_ERR_MAIL', 'Administrator </dev/null>'); // ������� e-mail ����� � ��� ����������, ���� ����� ���������� ������ � ����������� �����������, � ������ ������������� ������� � MySQL ��������.
define('DB_ERR_MSG', "<br /><br /><center><font face=\"verdana,tahoma,arial\" size=\"2\" color=\"ff0000\"><b>"
                     ."MySQL problems!</b><font></center>"); // ���������, ������� ����� ���������� ��� ������������� ������� � MySQL ��������.
define('MYSQL QUERY ERROR_TEXT', 'MYSQL QUERY ERROR REPORT');
define('MYSQL QUERY ERROR_SUBJECT', 'MySQL Error report!');
define('MYSQL QUERY ERROR_SERVER_NAME', 'Server Name: ');
define('MYSQL QUERY ERROR_REMOTE_ADDR', 'Remote Address: ');
define('MYSQL QUERY ERROR_REFERER', 'Referer: ');
define('MYSQL QUERY ERROR_REQUESTED', 'Requested: ');
define('MYSQL QUERY ERROR_FROM', 'From: db_error@');

?>