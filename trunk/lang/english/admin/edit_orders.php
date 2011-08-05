<?php
/*
  $Id: edit_orders.php v5.0 08/05/2007 djmonkey1 Exp $

  osCommerce, Open Source E-Commerce Solutions
  http://www.oscommerce.com

  Copyright (c) 2007 osCommerce

  Released under the GNU General Public License
*/

define('HEADING_TITLE', 'Edit Order #%s of %s');
define('ADDING_TITLE', 'Adding product(s) to Order #%s');

define('ENTRY_UPDATE_TO_CC', '(Update to ' . ORDER_EDITOR_CREDIT_CARD . ' to view CC fields.)');
define('TABLE_HEADING_COMMENTS', 'Comments');
define('TABLE_HEADING_STATUS', 'Status');
define('TABLE_HEADING_NEW_STATUS', 'New status');
define('TABLE_HEADING_ACTION', 'Action');
define('TABLE_HEADING_DELETE', 'Delete?');
define('TABLE_HEADING_QUANTITY', 'Qty.');
define('TABLE_HEADING_PRODUCTS_MODEL', 'Model');
define('TABLE_HEADING_PRODUCTS', 'Products');
define('TABLE_HEADING_TAX', 'Tax');
define('TABLE_HEADING_TOTAL', 'Total');
define('TABLE_HEADING_BASE_PRICE', 'Price<br>(base)');
define('TABLE_HEADING_UNIT_PRICE', 'Price<br>(excl.)');
define('TABLE_HEADING_UNIT_PRICE_TAXED', 'Price<br>(incl.)');
define('TABLE_HEADING_TOTAL_PRICE', 'Total<br>(excl.)');
define('TABLE_HEADING_TOTAL_PRICE_TAXED', 'Total<br>(incl.)');
define('TABLE_HEADING_OT_TOTALS', 'Order Totals:');
define('TABLE_HEADING_OT_VALUES', 'Value:');
define('TABLE_HEADING_SHIPPING_QUOTES', 'Shipping Quotes:');
define('TABLE_HEADING_NO_SHIPPING_QUOTES', 'There are no shipping quotes to display!');

define('TABLE_HEADING_CUSTOMER_NOTIFIED', 'Customer<br>Notified');
define('TABLE_HEADING_DATE_ADDED', 'Date Added');

define('ENTRY_CUSTOMER', 'Customer');
define('ENTRY_NAME', 'Name:');
define('ENTRY_CITY_STATE', 'City, State:');
define('ENTRY_SHIPPING_ADDRESS', 'Shipping Address');
define('ENTRY_BILLING_ADDRESS', 'Billing Address');
define('ENTRY_PAYMENT_METHOD', 'Payment Method');
define('ENTRY_CREDIT_CARD_TYPE', 'Card Type:');
define('ENTRY_CREDIT_CARD_OWNER', 'Card Owner:');
define('ENTRY_CREDIT_CARD_NUMBER', 'Card Number:');
define('ENTRY_CREDIT_CARD_EXPIRES', 'Card Expires:');
define('ENTRY_SUB_TOTAL', 'Sub-Total:');

//the definition of ENTRY_TAX is important when dealing with certain tax components and scenarios
define('ENTRY_TAX', 'Tax');
//do not use a colon (:) in the defintion, ie 'VAT' is ok, but 'VAT:' is not

define('ENTRY_SHIPPING', 'Shipping:');
define('ENTRY_TOTAL', 'Total:');
define('ENTRY_STATUS', 'Status:');
define('ENTRY_NOTIFY_CUSTOMER', 'Notify Customer:');
define('ENTRY_NOTIFY_COMMENTS', 'Send Comments:');
define('ENTRY_CURRENCY_TYPE', 'Currency');
define('ENTRY_CURRENCY_VALUE', 'Currency Value');

define('TEXT_INFO_PAYMENT_METHOD', 'Payment Method:');
define('TEXT_NO_ORDER_PRODUCTS', 'This order contains no products');
define('TEXT_ADD_NEW_PRODUCT', 'Add products');
define('TEXT_PACKAGE_WEIGHT_COUNT', 'Package Weight: %s  |  Product Qty: %s');

define('TEXT_STEP_1', '<b>Step 1:</b>');
define('TEXT_STEP_2', '<b>Step 2:</b>');
define('TEXT_STEP_3', '<b>Step 3:</b>');
define('TEXT_STEP_4', '<b>Step 4:</b>');
define('TEXT_SELECT_CATEGORY', '- Choose a Category from the list -');
define('TEXT_PRODUCT_SEARCH', '<b>- OR enter a search term in the box below to see potential matches -</b>');
define('TEXT_ALL_CATEGORIES', 'All Categories/All Products');
define('TEXT_SELECT_PRODUCT', '- Choose a Product -');
define('TEXT_BUTTON_SELECT_OPTIONS', 'Select These Options');
define('TEXT_BUTTON_SELECT_CATEGORY', 'Select This Category');
define('TEXT_BUTTON_SELECT_PRODUCT', 'Select This Product');
define('TEXT_SKIP_NO_OPTIONS', '<em>No Options - Skipped...</em>');
define('TEXT_QUANTITY', 'Quantity:');
define('TEXT_BUTTON_ADD_PRODUCT', 'Add to Order');
define('TEXT_CLOSE_POPUP', '<u>Close</u> [x]');
define('TEXT_ADD_PRODUCT_INSTRUCTIONS', 'Keep adding products until you are done.<br>Then close this tab/window, return to the main tab/window, and press the "update" button.');
define('TEXT_PRODUCT_NOT_FOUND', '<b>Product not found<b>');
define('TEXT_SHIPPING_SAME_AS_BILLING', 'Shipping same as billing address');
define('TEXT_BILLING_SAME_AS_CUSTOMER', 'Billing same as customer address');

define('IMAGE_ADD_NEW_OT', 'Insert new custom order total after this one');
define('IMAGE_REMOVE_NEW_OT', 'Remove this order total component');
define('IMAGE_NEW_ORDER_EMAIL', 'Send new order confirmation email');

define('TEXT_NO_ORDER_HISTORY', 'No Order History Available');

define('PLEASE_SELECT', 'Please Select');

define('EMAIL_SEPARATOR', '------------------------------------------------------');
define('EMAIL_TEXT_SUBJECT', 'Your order has been updated');
define('EMAIL_TEXT_ORDER_NUMBER', 'Order Number:');
define('EMAIL_TEXT_INVOICE_URL', 'Detailed Invoice:');
define('EMAIL_TEXT_DATE_ORDERED', 'Date Ordered:');
define('EMAIL_TEXT_STATUS_UPDATE', 'Thank you so much for your order with us!' . "\n\n" . 'The status of your order has been updated.' . "\n\n" . 'New status: %s' . "\n\n");
define('EMAIL_TEXT_STATUS_UPDATE2', 'If you have questions, please reply to this email.' . "\n\n" . 'With warm regards from your friends at the ' . STORE_NAME . "\n");
define('EMAIL_TEXT_COMMENTS_UPDATE', 'The comments for your order are' . "\n\n%s\n\n");

define('ERROR_ORDER_DOES_NOT_EXIST', 'Error: Order %s does not exist.');
define('SUCCESS_ORDER_UPDATED', 'Success: Order has been successfully updated.');
define('SUCCESS_EMAIL_SENT', 'Completed: The order was updated and an email with the new information was sent.');
	
//the hints
define('HINT_UPDATE_TO_CC', 'Set payment method to ' . ORDER_EDITOR_CREDIT_CARD . ' and the other fields will be displayed automatically.  CC fields are hidden if any other payment method is selected.  The name of the payment method that, when selected, will display the CC fields is configurable in the Order Editor area of the Configuration section of the Administration panel.');
define('HINT_UPDATE_CURRENCY', 'Changing the currency will cause the shipping quotes and order totals to recalculate and reload.');
define('HINT_SHIPPING_ADDRESS', 'If you change the shipping state, postcode, or country you will be given the option of whether or not to recalculate the totals and reload the shipping quotes.');
define('HINT_TOTALS', 'Feel free to give discounts by adding negative values. Subtotal, tax total, and grand total fields are not editable. When adding in custom order total components via AJAX make sure you enter the title first or the code will not recognize the entry (ie, a component with a blank title is deleted from the order).');
define('HINT_PRESS_UPDATE', 'Please click on "Update" to save all changes.');
define('HINT_BASE_PRICE', 'Price (base) is the products price before products attributes (ie, the catalog price of the item)');
define('HINT_PRICE_EXCL', 'Price (excl) is the base price plus any product attributes prices that may exist');
define('HINT_PRICE_INCL', 'Price (incl) is Price (excl) times tax');
define('HINT_TOTAL_EXCL', 'Total (excl) is Price (excl) times qty');
define('HINT_TOTAL_INCL', 'Total (incl) is Price (excl) times tax and qty');
//end hints

//new order confirmation email- this is a separate email from order status update
define('ENTRY_SEND_NEW_ORDER_CONFIRMATION', 'New order confirmation:');
define('EMAIL_TEXT_DATE_MODIFIED', 'Date Modified:');
define('EMAIL_TEXT_PRODUCTS', 'Products');
define('EMAIL_TEXT_DELIVERY_ADDRESS', 'Delivery Address');
define('EMAIL_TEXT_BILLING_ADDRESS', 'Billing Address');
define('EMAIL_TEXT_PAYMENT_METHOD', 'Payment Method');
// If you want to include extra payment information, enter text below (use <br> for line breaks):
//define('EMAIL_TEXT_PAYMENT_INFO', ''); //why would this be useful???
// If you want to include footer text, enter text below (use <br> for line breaks):
define('EMAIL_TEXT_FOOTER', '');
//end email

//add-on for downloads
define('ENTRY_DOWNLOAD_COUNT', 'Download #');
define('ENTRY_DOWNLOAD_FILENAME', 'Filename');
define('ENTRY_DOWNLOAD_MAXDAYS', 'Expiry days');
define('ENTRY_DOWNLOAD_MAXCOUNT', 'Downloads remaining');

//add-on for Ajax
define('AJAX_CONFIRM_PRODUCT_DELETE', 'Are you sure you want to delete this product from the order?');
define('AJAX_CONFIRM_COMMENT_DELETE', 'Are you sure you want to delete this comment from the orders status history?');
define('AJAX_MESSAGE_STACK_SUCCESS', 'Success! \' + %s + \' has been updated');
define('AJAX_CONFIRM_RELOAD_TOTALS', 'You have changed some shipping information. Would you like to recalculate the order totals and shipping quotes?');
define('AJAX_CANNOT_CREATE_XMLHTTP', 'Cannot create XMLHTTP instance');
define('AJAX_SUBMIT_COMMENT', 'Submit new comments and/or status');
define('AJAX_NO_QUOTES', 'There are no shipping quotes to display.');
define('AJAX_SELECTED_NO_SHIPPING', 'You have selected a shipping method for this order but it appears there is not one already stored in the database.  Would you like to add this shipping charge to the order?');
define('AJAX_RELOAD_TOTALS', 'The new shipping component has been written to the database but the totals have not yet been re-calculated.  Click ok now to re-calculate the order totals.  If your connection is slow wait for all components to load before clicking ok.');
define('AJAX_NEW_ORDER_EMAIL', 'Are you sure you want to send a new order confirmation email for this order?');
define('AJAX_INPUT_NEW_EMAIL_COMMENTS', 'Please input any comments you may have here.  It is ok to leave this blank if you do not wish to include comments.  Please remember as you type that hitting the "enter" key will result in submitting the comments as they appear.  It is not yet possible to include line breaks.');
define('AJAX_SUCCESS_EMAIL_SENT', 'Success!  A new order confirmation email was sent to %s');
define('AJAX_WORKING', 'Working, please wait....');

define('EMAIL_ACC_DISCOUNT_INTRO_OWNER', 'One of your customers reach accumulated discount limit. ' . "\n\n" . 'Details:');
define('EMAIL_TEXT_LIMIT', 'Accumulated discount: ');
define('EMAIL_TEXT_CURRENT_GROUP', 'New group: ');
define('EMAIL_TEXT_DISCOUNT', 'Discount: ');
define('EMAIL_ACC_SUBJECT', 'Accumalated discount');
define('EMAIL_ACC_INTRO_CUSTOMER', 'Congratulations, you have new discount. All details below:');
define('EMAIL_ACC_FOOTER', 'Now you can buy with your new discount rate.');

define('EMAIL_TEXT_CUSTOMER_NAME', 'Customer:');
define('EMAIL_TEXT_CUSTOMER_EMAIL_ADDRESS', 'Email:');
define('EMAIL_TEXT_CUSTOMER_TELEPHONE', 'Phone:');

define('TEXT_ORDER_COMMENTS', 'Order comments');

define('ENTRY_TYPE_BELOW', 'Type below'); 
define('ERROR_NO_ORDER_SELECTED', 'You have not selected an order to edit, or the order ID variable has not been set.');

// pull down default text
define('PULL_DOWN_DEFAULT', 'Please Select');
define('TYPE_BELOW', 'Type Below');

define('JS_ERROR', 'Errors have occured during the process of your form!\nPlease make the following corrections:\n\n');

define('JS_GENDER', '* The \'Gender\' value must be chosen.\n');
define('JS_FIRST_NAME', '* The \'First Name\' entry must have at least ' . ENTRY_FIRST_NAME_MIN_LENGTH . ' characters.\n');
define('JS_LAST_NAME', '* The \'Last Name\' entry must have at least ' . ENTRY_LAST_NAME_MIN_LENGTH . ' characters.\n');
define('JS_DOB', '* The \'Date of Birth\' entry must be in the format: xx/xx/xxxx (month/day/year).\n');
define('JS_EMAIL_ADDRESS', '* The \'E-Mail Address\' entry must have at least ' . ENTRY_EMAIL_ADDRESS_MIN_LENGTH . ' characters.\n');
define('JS_ADDRESS', '* The \'Street Address\' entry must have at least ' . ENTRY_STREET_ADDRESS_MIN_LENGTH . ' characters.\n');
define('JS_POST_CODE', '* The \'Post Code\' entry must have at least ' . ENTRY_POSTCODE_MIN_LENGTH . ' characters.\n');
define('JS_CITY', '* The \'Suburb\' entry must have at least ' . ENTRY_CITY_MIN_LENGTH . ' characters.\n');
define('JS_STATE', '* The \'State\' entry must be selected.\n');
define('JS_STATE_SELECT', '-- Select Above --');
define('JS_ZONE', '* The \'State\' entry must be selected from the list for this country.\n');
define('JS_COUNTRY', '* The \'Country\' entry must be selected.\n');
define('JS_TELEPHONE', '* The \'Telephone Number\' entry must have at least ' . ENTRY_TELEPHONE_MIN_LENGTH . ' characters.\n');
define('JS_PASSWORD', '* The \'Password\' and \'Confirmation\' entries must match and have at least ' . ENTRY_PASSWORD_MIN_LENGTH . ' characters.\n');

define('CATEGORY_COMPANY', 'Company Details');
define('CATEGORY_PERSONAL', 'Personal Details');
define('CATEGORY_ADDRESS', 'Address');
define('CATEGORY_CONTACT', 'Contact Information');
define('CATEGORY_OPTIONS', 'Options');
define('CATEGORY_PASSWORD', 'Password');
define('CATEGORY_CORRECT', 'If this is the right customer, press the Confirm button below.');
define('ENTRY_CUSTOMERS_ID', 'ID:');
define('ENTRY_CUSTOMERS_ID_TEXT', '&nbsp;<small><font color="#AABBDD">required</font></small>');
define('ENTRY_COMPANY', 'Company Name:');
define('ENTRY_COMPANY_ERROR', '');
define('ENTRY_COMPANY_TEXT', '');
define('ENTRY_GENDER', 'Gender:');
define('ENTRY_GENDER_ERROR', '&nbsp;<small><font color="#AABBDD">required</font></small>');
define('ENTRY_GENDER_TEXT', '&nbsp;<small><font color="#AABBDD">required</font></small>');
define('ENTRY_FIRST_NAME', 'First Name:');
define('ENTRY_FIRST_NAME_ERROR', '&nbsp;<small><font color="#FF0000">min ' . ENTRY_FIRST_NAME_MIN_LENGTH . ' chars</font></small>');
define('ENTRY_FIRST_NAME_TEXT', '&nbsp;<small><font color="#AABBDD">required</font></small>');
define('ENTRY_LAST_NAME', 'Last Name:');
define('ENTRY_LAST_NAME_ERROR', '&nbsp;<small><font color="#FF0000">min ' . ENTRY_LAST_NAME_MIN_LENGTH . ' chars</font></small>');
define('ENTRY_LAST_NAME_TEXT', '&nbsp;<small><font color="#AABBDD">required</font></small>');
define('ENTRY_DATE_OF_BIRTH', 'Date of Birth:');
define('ENTRY_DATE_OF_BIRTH_ERROR', '&nbsp;<small><font color="#FF0000">(eg. 05/21/1970)</font></small>');
define('ENTRY_DATE_OF_BIRTH_TEXT', '&nbsp;<small>(eg. 05/21/1970) <font color="#AABBDD">required</font></small>');
define('ENTRY_EMAIL_ADDRESS', 'E-Mail Address:');
define('ENTRY_EMAIL_ADDRESS_ERROR', '&nbsp;<small><font color="#FF0000">min ' . ENTRY_EMAIL_ADDRESS_MIN_LENGTH . ' chars</font></small>');
define('ENTRY_EMAIL_ADDRESS_CHECK_ERROR', '&nbsp;<small><font color="#FF0000">Your email address doesn\'t appear to be valid!</font></small>');
define('ENTRY_EMAIL_ADDRESS_ERROR_EXISTS', '&nbsp;<small><font color="#FF0000">email address already exists!</font></small>');
define('ENTRY_EMAIL_ADDRESS_TEXT', '&nbsp;<small><font color="#AABBDD">required</font></small>');
define('ENTRY_STREET_ADDRESS', 'Street Address:');
define('ENTRY_STREET_ADDRESS_ERROR', '&nbsp;<small><font color="#FF0000">min ' . ENTRY_STREET_ADDRESS_MIN_LENGTH . ' chars</font></small>');
define('ENTRY_STREET_ADDRESS_TEXT', '&nbsp;<small><font color="#AABBDD">required</font></small>');
define('ENTRY_SUBURB', 'Suburb:');
define('ENTRY_SUBURB_ERROR', '');
define('ENTRY_SUBURB_TEXT', '');
define('ENTRY_POST_CODE', 'Post Code:');
define('ENTRY_POST_CODE_ERROR', '&nbsp;<small><font color="#FF0000">min ' . ENTRY_POSTCODE_MIN_LENGTH . ' chars</font></small>');
define('ENTRY_POST_CODE_TEXT', '&nbsp;<small><font color="#AABBDD">required</font></small>');
define('ENTRY_CITY', 'Suburb:');
define('ENTRY_CITY_ERROR', '&nbsp;<small><font color="#FF0000">min ' . ENTRY_CITY_MIN_LENGTH . ' chars</font></small>');
define('ENTRY_CITY_TEXT', '&nbsp;<small><font color="#AABBDD">required</font></small>');
define('ENTRY_STATE', 'State/Province:');
define('ENTRY_STATE_ERROR', '&nbsp;<small><font color="#FF0000">required</font></small>');
define('ENTRY_STATE_ERROR_SELECT', 'Select state/province.');
define('ENTRY_STATE_TEXT', '*');
define('ENTRY_COUNTRY', 'Country:');
define('ENTRY_COUNTRY_ERROR', '');
define('ENTRY_COUNTRY_TEXT', '&nbsp;<small><font color="#AABBDD">required</font></small>');
define('ENTRY_TELEPHONE_NUMBER', 'Telephone Number:');
define('ENTRY_TELEPHONE_NUMBER_ERROR', '&nbsp;<small><font color="#FF0000">min ' . ENTRY_TELEPHONE_MIN_LENGTH . ' chars</font></small>');
define('ENTRY_TELEPHONE_NUMBER_TEXT', '&nbsp;<small><font color="#AABBDD">required</font></small>');
define('ENTRY_FAX_NUMBER', 'Fax Number:');
define('ENTRY_FAX_NUMBER_ERROR', '');
define('ENTRY_FAX_NUMBER_TEXT', '');
define('ENTRY_NEWSLETTER', 'Newsletter:');
define('ENTRY_NEWSLETTER_TEXT', '');
define('ENTRY_NEWSLETTER_YES', 'Subscribed');
define('ENTRY_NEWSLETTER_NO', 'Unsubscribed');
define('ENTRY_NEWSLETTER_ERROR', '');
define('ENTRY_PASSWORD', 'Password:');
define('ENTRY_PASSWORD_ERROR', '&nbsp;<small><font color="#FF0000">min ' . ENTRY_PASSWORD_MIN_LENGTH . ' chars</font></small>');
define('ENTRY_PASSWORD_ERROR_NOT_MATCHING', 'Поле Подтвердите пароль должно совпадать с полем Пароль.');
define('ENTRY_PASSWORD_TEXT', '*');
define('ENTRY_PASSWORD_CONFIRMATION', 'Password Confirmation:');
define('ENTRY_PASSWORD_CONFIRMATION_TEXT', '&nbsp;<small><font color="#AABBDD">required</font></small>');
define('ENTRY_PASSWORD_CURRENT', 'Current password:');
define('ENTRY_PASSWORD_CURRENT_TEXT', '*');
define('ENTRY_PASSWORD_CURRENT_ERROR', '&nbsp;<small><font color="#FF0000">min ' . ENTRY_PASSWORD_MIN_LENGTH . ' chars</font></small>');
define('ENTRY_PASSWORD_NEW', 'New password:');
define('ENTRY_PASSWORD_NEW_TEXT', '*');
define('ENTRY_PASSWORD_NEW_ERROR', '&nbsp;<small><font color="#FF0000">min ' . ENTRY_PASSWORD_MIN_LENGTH . ' chars</font></small>');
define('ENTRY_PASSWORD_NEW_ERROR_NOT_MATCHING', 'Your passwords not matching.');
define('PASSWORD_HIDDEN', '--HIDDEN--');

// manual order box text in includes/boxes/manual_order.php
define('BOX_HEADING_MANUAL_ORDER', 'Manual Orders');
define('BOX_MANUAL_ORDER_CREATE_ACCOUNT', 'Create Account');
define('BOX_MANUAL_ORDER_CREATE_ORDER', 'Create Order');

define('EDIT_ORDER_TAB_CUSTOMER','Customer');
define('EDIT_ORDER_TAB_PAYMENT','Payment');
define('EDIT_ORDER_TAB_PRODUCTS','Products/Shipping');
define('EDIT_ORDER_TAB_COMMENTS','Comments');

define('BUTTON_BACK_TO_ORDER','Back to Order');
define('BUTTON_BACK_TO_ORDERS_LIST','Back to Orders List');

?>