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

define('CONTRIB_INSTALLER_NAME','Contrib_Installer');
define('CONTRIB_INSTALLER_VERSION','2.0.6');
define('CONFIG_FILENAME','install.xml');
define('INIT_CONTRIB_INSTALLER', 'contrib_installer.php');

define('INIT_CONTRIB_INSTALLER_TEXT', 'Initialize Contrib Installer');
define('CONTRIB_INSTALLER_TEXT', 'Contrib Installer');

//=========================
define('ALL_CHANGES_WILL_BE_REMOVED_TEXT', 'All changes that was already made will be removed.');
//=========================
define('AUTHOR_TEXT', 'Author: ');
define('FROM_INSTALL_FILE_TEXT', 'From install file: ');
//=========================
define('INSTALLING_CONTRIBUTION_TEXT', 'Installing Contribution: ');
define('REMOVING_CONTRIBUTION_TEXT', 'Removing Contribution: ');
//=========================
define('CANT_CREATE_DIR_TEXT', 'Couldn\'t create directory: ');
define('CANT_WRITE_TO_DIR_TEXT', 'Can\'t write to directory: ');
define('COLUDNT_REMOVE_DIR_TEXT', 'Couldn\'t remove directory: ');
//=========================
define('REMOVING_DIRS_IN_BOLD', 'Removing directory(s) in bold: ');
define('CREATING_DIRS_IN_BOLD', 'Creating directory(s) in bold: ');
//=========================
define('WRITE_PERMISSINS_NEEDED_TEXT', 'I need write permission for: ');
define('ADD_CODE_IN_FILE_TEXT', 'Add code in file: ');
define('EXPRESSION_TEXT', 'Expression: ');
define('AFTER_EXPRESSION_ADD_TEXT', 'After expression add: ');
define('ORIGINAL_AFTER_EXPRESSION_ADD_TEXT', 'Original after expression add: ');
define('UNDO_ADD_CODE_IN_FILE_TEXT', 'Undo add code in file: ');
define('ORIGINAL_EXPRESSION_TEXT', 'Original expression: ');
define('ORIGINAL_REPLACE_WITH_TEXT', 'Original replace with: ');
//=========================
define('CONFLICT_IN_FILE_TEXT', 'There is a conflict in file: ');
define('CANT_READ_FILE', 'File doesn\'t exist: ');
define('REMOVING_FILE_TEXT', 'Removing file: ');
define('COULDNT_REMOVE_FILE_TEXT', 'Couldn\'t remove file: ');
define('COULDNT_COPY_TO_TEXT', 'Couldn\'t copy file: ');

//=========================
define('COULDNT_FIND_TEXT', 'Couldn\'t find ');
//define('CANT_OPEN_FOR_WRITING_TEXT', 'Can\'t open file for writing: ');
//=========================
define('CONTRIBUTION_DIR_TEXT', 'Contribution Directory<br>(where contributions are located): ');
define('NO_CONTRIBUTION_NAME_TEXT', 'No contribution name.');
//=========================
define('NO_FILE_TAG_IN_ADDFILE_SECTION_TEXT', 'No file tag.');
define('NAME_OF_FILE_MISSING_IN_ADDFILE_SECTION_TEXT', 'Name of file missing.');

define('NO_QUERY_TAG_IN_SQL_SECTION_TEXT', 'No query tag.');
define('NO_REMOVE_QUERY_NESSESARY_FOR_SQL_QUERY_TEXT', 'No remove query necessary for SQL query: ');
define('RUN_SQL_REMOVE_QUERY_TEXT', 'Run SQL remove query: ');
define('RUN_SQL_QUERY_TEXT', 'Run SQL query: ');

//=========================
define('NO_DIR_TAG_IN_MAKE_DIR_SECTION_TEXT', 'No dir tag.');
define('NAME_OF_DIR_MISSING_IN_MAKE_DIR_SECTION_TEXT', 'Name of dir missing.');
define('NAME_OF_PARENT_DIR_MISSING_IN_MAKE_DIR_SECTION_TEXT', 'Name of parent_dir missing.');

define('ERROR_IN_ADDCODE_SECTION_TEXT', 'Error in <addcode>');
define('COPYING_TO_TEXT', 'Copying to: ');
define('FIND_REPLACE_IN_FILE_TEXT', 'Find &amp; replace in file: ');
define('ERROR_IN_FINDREPLACE_SECTION_TEXT', 'Error in <findreplace>');
define('UNDO_FIND_REPLACE_IN_FILE_TEXT', 'Undo find &amp; replace in file: ');

define('REPLACE_WITH_TEXT', 'Replace with: ');
define('ON_LINE_TEXT', 'On line ');
//=========================
define('UPDATE_BUTTON_TEXT', 'Update');
define('IN_THE_FILE_TEXT', 'in the file: ');

define('INSTALL_XML_FILE_IS_VALID_TEXT', 'File install.xml is valid.');
define('PERMISSIONS_IS_VALID_TEXT', 'Permissions is OK.');

define('INSTALLATION_COMPLETE_TEXT', 'Installed.');
define('REMOVING_COMPLETE_TEXT', 'Removed.');


// Subheaders
define('COMMENTS_TEXT', 'Comments: ');
define('CHECKING_CONFIG_FILE_TEXT', 'Checking config file: ');
define('CHECKING_PERMISSIONS_TEXT', 'Checking permissions: ');
define('CHECKING_CONFLICTS_TEXT', 'Checking conflicts:');

//define('RUNNING_TEXT', 'Running: ');
define('RUNNING_TEXT', 'Log of Contrib Installer Package (CIP) running: ');//1.0.4

define('STATUS_TEXT', 'Status: ');

define('NO_CONFLICTS_TEXT', 'No conflicts.');
define('PHP_INSTALL_TEXT', 'PHP install code: ');
define('PHP_REMOVE_TEXT', 'PHP remove code: ');

define('PHP_RUNTIME_MESSAGES_TEXT', 'PHP runtime messages: ');

define('NO_INSTALL_TAG_IN_PHP_SECTION_TEXT', 'No INSTALL tag in php section.');
define('NO_REMOVE_TAG_IN_PHP_SECTION_TEXT', 'No REMOVE tag in php section.');


define('FILE_EXISTS_TEXT', 'File exists');
define('FILE_NOT_EXISTS_TEXT', 'File NOT exists');

define('LINK_EXISTS_TEXT', 'Link exists.');



define('NAME_OF_FILE_MISSING_IN_DEL_FILE_SECTION_TEXT', 'Name of file missing.');
define('MD5_SUM_UPDATED_TEXT', 'MD5 sum updated.');
define('MD5_SUM_REMOVED_TEXT', 'MD5 sum removed.');

define('FILE_EXISTS_AND_WAS_CHANGED_TEXT', 'File exists and was changed by another CIP. You should: <br>
- backup this file,<br>
- remove this file,<br>
- install this CIP,<br>
- find all changes in file that you backup (they marked with comments),<br>
- apply all changes from file that you backup to file installed by this CIP,<br>
- test. <br>');
define('ERROR_COULD_NOT_OPEN_XML', 'Could not open XML input from: ');
define('ERROR_XML', 'XML error: ');
define('TEXT_AT_LINE', ' at line ');

//1.0.6:
define('TEXT_NOT_ORIGINAL_TEXT', 'Not original text in find-section. ');
define('TEXT_HAVE_BEEN_FOUND', 'Have been found ');
define('TEXT_TIMES', ' times!!!');

define('NO_COMMENTS_TAG_IN_DESCRIPTION_SECTION_TEXT', 'No comments tag in description section');
define('NO_CREDITS_TAG_IN_DESCRIPTION_SECTION_TEXT', 'No credits tag in description section');

define('NO_DETAILS_TAG_IN_DESCRIPTION_SECTION_TEXT', 'No details tag in description section');

define('NO_CONTRIB_REF_PARAMETER_IN_DETAILS_TAG_TEXT', 'No contrib_ref parameter in details tag');
define('NO_FORUM_REF_PARAMETER_IN_DETAILS_TAG_TEXT', 'No forum_ref parameter in details tag');
define('NO_CONTRIB_TYPE_PARAMETER_IN_DETAILS_TAG_TEXT', 'No contrib_type parameter in details tag');
define('NO_STATUS_PARAMETER_IN_DETAILS_TAG_TEXT', 'No status parameter in details tag');
define('NO_LAST_UPDATE_PARAMETER_IN_DETAILS_TAG_TEXT', 'No last_update parameter in details tag');


//1.0.13
define('CHOOSE_A_CONTRIBUTION_TEXT', '
<a href="http://www.oscommerce.com/community?contributions=&search=Contrib+Installer&category=all" target=_blank">Search CIP\'s on osCommerce.org</a> or choose a contribution: ');


//1.0.14
define('IMAGE_BUTTON_INSTALL', 'Install');
define('IMAGE_BUTTON_REMOVE', 'Remove');

?>