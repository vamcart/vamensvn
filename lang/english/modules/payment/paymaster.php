<?php
/* -----------------------------------------------------------------------------------------
   $Id: paymaster.php 998 2012/09/16 13:24:46 VaM $

   VaM Shop - open source ecommerce solution
   http://vamshop.ru
   http://vamshop.com

   Copyright (c) 2012 VamShop
   -----------------------------------------------------------------------------------------
   based on: 
   (c) 2000-2001 The Exchange Project  (earlier name of osCommerce)
   (c) 2002-2003 osCommerce(moneyorder.php,v 1.8 2003/02/16); www.oscommerce.com 
   (c) 2003	 nextcommerce (moneyorder.php,v 1.4 2003/08/13); www.nextcommerce.org
   (c) 2004	 xt:Commerce (webmoney.php,v 1.4 2003/08/13); xt-commerce.com

   Released under the GNU General Public License 
   ---------------------------------------------------------------------------------------*/

  define('MODULE_PAYMENT_PAYMASTER_TEXT_TITLE', 'PayMaster');
  define('MODULE_PAYMENT_PAYMASTER_TEXT_PUBLIC_TITLE', 'PayMaster');
  define('MODULE_PAYMENT_PAYMASTER_TEXT_ADMIN_DESCRIPTION', 'Модуль оплаты PayMaster<br />Как правильно настроить модуль читайте <a href="http://vamshop.ru/blog/2012/09/16/vamshop-%d0%bf%d0%be%d0%b4%d0%ba%d0%bb%d1%8e%d1%87%d1%91%d0%bd-%d0%ba-paymaster-ru/" target="_blank"><u>здесь</u></a>.');
  define('MODULE_PAYMENT_PAYMASTER_TEXT_DESCRIPTION', 'После нажатия кнопки Подтвердить заказ Вы перейдёте на сайт платёжной системы для оплаты заказа, после оплаты Ваш заказ будет выполнен.');
  
	define('MODULE_PAYMENT_PAYMASTER_STATUS_TITLE' , 'Разрешить модуль PayMaster');
	define('MODULE_PAYMENT_PAYMASTER_STATUS_DESC' , 'Вы хотите разрешить использование модуля при оформлении заказов?');
	define('MODULE_PAYMENT_PAYMASTER_ALLOWED_TITLE' , 'Разрешённые страны');
	define('MODULE_PAYMENT_PAYMASTER_ALLOWED_DESC' , 'Укажите коды стран, для которых будет доступен данный модуль (например RU,DE (оставьте поле пустым, если хотите что б модуль был доступен покупателям из любых стран))');
	define('MODULE_PAYMENT_PAYMASTER_ID_TITLE' , 'PayMaster ID:');
	define('MODULE_PAYMENT_PAYMASTER_ID_DESC' , 'Укажите ID Вашего магазина в PayMaster.');
	define('MODULE_PAYMENT_PAYMASTER_SORT_ORDER_TITLE' , 'Порядок сортировки');
	define('MODULE_PAYMENT_PAYMASTER_SORT_ORDER_DESC' , 'Порядок сортировки модуля.');
	define('MODULE_PAYMENT_PAYMASTER_ZONE_TITLE' , 'Зона');
	define('MODULE_PAYMENT_PAYMASTER_ZONE_DESC' , 'Если выбрана зона, то данный модуль оплаты будет виден только покупателям из выбранной зоны.');
	define('MODULE_PAYMENT_PAYMASTER_SECRET_KEY_TITLE' , 'Секретный ключ');
	define('MODULE_PAYMENT_PAYMASTER_SECRET_KEY_DESC' , 'В данной опции укажите Ваш ключ, указанный в опции Secret Key на сайте PayMaster.');
	define('MODULE_PAYMENT_PAYMASTER_ORDER_STATUS_ID_TITLE' , 'Укажите оплаченный статус заказа');
	define('MODULE_PAYMENT_PAYMASTER_ORDER_STATUS_ID_DESC' , 'Укажите оплаченный статус заказа.');
  
?>