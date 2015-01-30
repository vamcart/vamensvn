<?php
/* -----------------------------------------------------------------------------------------
   $Id: english_db_eeror.php 1260 2015/03/07 13:24:46 VaM $

   VaM Shop - open source ecommerce solution
   http://vamshop.ru
   http://vamshop.com

   Copyright (c) 2007 VaM Shop
   -----------------------------------------------------------------------------------------
   Released under the GNU General Public License
   ---------------------------------------------------------------------------------------*/

// Обработка MySQL ошибок

define('DB_ERR_MAIL', 'Administrator </dev/null>'); // Укажите e-mail адрес и имя получателя, куда будут тприходить пиьсма с технической информацией, в случае возникновения проблем с MySQL сервером.
define('DB_ERR_MSG', "<br /><br /><center><font face=\"verdana,tahoma,arial\" size=\"2\" color=\"ff0000\"><b>"
                     ."MySQL problems!</b><font></center>"); // Сообщение, которое будет выводиться при возникновении проблем с MySQL сервером.
define('MYSQL QUERY ERROR_TEXT', 'MYSQL QUERY ERROR REPORT');
define('MYSQL QUERY ERROR_SUBJECT', 'MySQL Error report!');
define('MYSQL QUERY ERROR_SERVER_NAME', 'Server Name: ');
define('MYSQL QUERY ERROR_REMOTE_ADDR', 'Remote Address: ');
define('MYSQL QUERY ERROR_REFERER', 'Referer: ');
define('MYSQL QUERY ERROR_REQUESTED', 'Requested: ');
define('MYSQL QUERY ERROR_FROM', 'From: db_error@');

?>