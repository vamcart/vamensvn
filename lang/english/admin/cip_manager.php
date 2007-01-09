<?php
/*
  cip_manager.php
  osCommerce, Open Source E-Commerce Solutions
  http://www.oscommerce.com
  Copyright (c) 2002 osCommerce
  Released under the GNU General Public License
*/

define('HEADING_TITLE', '<ABBR  title="Contrib Installer Package">CIP</ABBR> Manager');

define('TABLE_HEADING_FILENAME', 'Name');
define('TABLE_HEADING_SIZE', 'Size');
define('TABLE_HEADING_PERMISSIONS', 'Permissions');
define('TABLE_HEADING_USER', 'User');
define('TABLE_HEADING_GROUP', 'Group');
define('TABLE_HEADING_UPLOADED', 'Uploaded');
define('TABLE_HEADING_ACTION', 'Action');

define('TEXT_INFO_HEADING_UPLOAD', 'Upload');
define('TEXT_FILE_NAME', 'Filename:');
define('TEXT_FILE_SIZE', 'Size:');
define('TEXT_FILE_CONTENTS', 'Contents:');
define('TEXT_LAST_MODIFIED', 'Last Modified:');
define('TEXT_NEW_FOLDER', 'New Folder');
define('TEXT_NEW_FOLDER_INTRO', 'Enter the name for the new folder:');
define('TEXT_DELETE_INTRO', 'Are you sure you want to delete this file?');
define('TEXT_UPLOAD_INTRO', 'Please select the files to upload.');

define('ERROR_DIRECTORY_NOT_WRITEABLE', 'Error: I can not write to this directory. Please set the right user permissions on: %s');
define('ERROR_FILE_NOT_WRITEABLE', 'Error: I can not write to this file. Please set the right user permissions on: %s');
define('ERROR_DIRECTORY_NOT_REMOVEABLE', 'Error: I can not remove this directory. Please set the right user permissions on: %s');
define('ERROR_FILE_NOT_REMOVEABLE', 'Error: I can not remove this file. Please set the right user permissions on: %s');
define('ERROR_DIRECTORY_DOES_NOT_EXIST', 'Error: Directory does not exist: %s');
//======================
define('ICON_UNZIP', 'Unpack');
define('ICON_ZIP', 'Pack');
define('ICON_EDIT', 'Edit');
define('ICON_INSTALL', 'Install');
define('ICON_REMOVE', 'Remove');
define('ICON_DELETE_MODULE', 'Delete module archive');
define('ICON_WITHOUT_DATA_REMOVING', 'without data removing');
define('ICON_EMPTY', '');

define('ICON_INSTALLED_CURRENT_FOLDER', 'Current folder of CIP that has been installed');

//Uploader:
define('ERROR_FILE_ALREADY_EXISTS','File %s  <b>already exists</b>.');

define('CIP_MANAGER_SUPPORT','Support: ');
define('CIP_MANAGER_UPLOADER','Uploader: ');
define('CIP_MANAGER_SUPPORT_FORUM','Support Forum for this CIP');
define('CIP_MANAGER_CONTRIBUTION_PAGE','Contributions official page on osCommerce site');
define('CIP_MANAGER_SUPPORT_FORUM_DEVELOPER','Support Forum for this CIP at developer site');
define('CIP_MANAGER_INFO','Contrib Info: ');
define('CIP_MANAGER_INSTALLED','CIP have been INSTALLED');
define('CIP_MANAGER_NOT_INSTALLED','CIP have NOT been installed');
define('CIP_MANAGER_UPLOAD_NOTE','Remember that you could upload <b>only ZIPs</b>, <br><b>no more than 500Kb</b><br>and <b>only Contrib Installer Packages! :-)</b>.');
define('CIP_MANAGER_XML_NOT_FOUND',' does not exists!');
define('CIP_MANAGER_GENERAL_INFO','General Info: ');
define('CIP_MANAGER_IMAGE_PREVIEW','Image Preview: ');
define('CIP_MANAGER_ENLARGE','Click to enlarge');
define('CIP_MANAGER_INSTALLED','CIP was <b>installed!</b>');
define('CIP_MANAGER_REMOVED','CIP was <b>removed.</b>');

?>