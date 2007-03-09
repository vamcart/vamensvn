<?php
/* --------------------------------------------------------------
   $Id: articles.php 1125 2007-03-09 11:13:01Z VaM $   

   VaM Shop - open source ecommerce solution
   http://vamshop.ru
   http://vamshop.com

   Copyright (c) 2007 VaM Shop
   --------------------------------------------------------------
   based on: 
   (c) 2000-2001 The Exchange Project  (earlier name of osCommerce)
   (c) 2002-2003 osCommerce(configuration.php,v 1.40 2002/12/29); www.oscommerce.com 

   Released under the GNU General Public License 
   --------------------------------------------------------------*/

  require('includes/application_top.php');
  require_once(DIR_FS_INC . 'xtc_wysiwyg.inc.php');

  $action = (isset($_GET['action']) ? $_GET['action'] : '');

  if (xtc_not_null($action)) {
    switch ($action) {
      case 'setflag':
        if ( ($_GET['flag'] == '0') || ($_GET['flag'] == '1') ) {
          if (isset($_GET['aID'])) {
            xtc_set_article_status($_GET['aID'], $_GET['flag']);
          }

          if (USE_CACHE == 'true') {
            xtc_reset_cache_block('topics');
          }
        }

        xtc_redirect(xtc_href_link(FILENAME_ARTICLES, 'tPath=' . $_GET['tPath'] . '&aID=' . $_GET['aID']));
        break;
      case 'new_topic':
      case 'edit_topic':
        $_GET['action']=$_GET['action'] . '_ACD';
        break;
      case 'insert_topic':
      case 'update_topic':
        if ( ($_POST['edit_x']) || ($_POST['edit_y']) ) {
          $_GET['action'] = 'edit_topic_ACD';
        } else {
        if (isset($_POST['topics_id'])) $topics_id = xtc_db_prepare_input($_POST['topics_id']);
          if ($topics_id == '') {
            $topics_id = xtc_db_prepare_input($_GET['tID']);
            }
        $sort_order = xtc_db_prepare_input($_POST['sort_order']);

        $sql_data_array = array('sort_order' => $sort_order);

        if ($action == 'insert_topic') {
          $insert_sql_data = array('parent_id' => $current_topic_id,
                                   'date_added' => 'now()');

          $sql_data_array = array_merge($sql_data_array, $insert_sql_data);

          xtc_db_perform(TABLE_TOPICS, $sql_data_array);

          $topics_id = xtc_db_insert_id();
        } elseif ($action == 'update_topic') {
          $update_sql_data = array('last_modified' => 'now()');

          $sql_data_array = array_merge($sql_data_array, $update_sql_data);

          xtc_db_perform(TABLE_TOPICS, $sql_data_array, 'update', "topics_id = '" . (int)$topics_id . "'");
        }

        $languages = xtc_get_languages();
        for ($i=0, $n=sizeof($languages); $i<$n; $i++) {

          $language_id = $languages[$i]['id'];

          $sql_data_array = array('topics_name' => xtc_db_prepare_input($_POST['topics_name'][$language_id]),
                                  'topics_heading_title' => xtc_db_prepare_input($_POST['topics_heading_title'][$language_id]),
                                  'topics_description' => xtc_db_prepare_input($_POST['topics_description'][$language_id]));

          if ($action == 'insert_topic') {
            $insert_sql_data = array('topics_id' => $topics_id,
                                     'language_id' => $languages[$i]['id']);

            $sql_data_array = array_merge($sql_data_array, $insert_sql_data);

            xtc_db_perform(TABLE_TOPICS_DESCRIPTION, $sql_data_array);
          } elseif ($action == 'update_topic') {
            xtc_db_perform(TABLE_TOPICS_DESCRIPTION, $sql_data_array, 'update', "topics_id = '" . (int)$topics_id . "' and language_id = '" . (int)$languages[$i]['id'] . "'");
          }
        }

        if (USE_CACHE == 'true') {
          xtc_reset_cache_block('topics');
        }

        xtc_redirect(xtc_href_link(FILENAME_ARTICLES, 'tPath=' . $tPath . '&tID=' . $topics_id));
        break;
        }
      case 'delete_topic_confirm':
        if (isset($_POST['topics_id'])) {
          $topics_id = xtc_db_prepare_input($_POST['topics_id']);

          $topics = xtc_get_topic_tree($topics_id, '', '0', '', true);
          $articles = array();
          $articles_delete = array();

          for ($i=0, $n=sizeof($topics); $i<$n; $i++) {
            $article_ids_query = xtc_db_query("select articles_id from " . TABLE_ARTICLES_TO_TOPICS . " where topics_id = '" . (int)$topics[$i]['id'] . "'");

            while ($article_ids = xtc_db_fetch_array($article_ids_query)) {
              $articles[$article_ids['articles_id']]['topics'][] = $topics[$i]['id'];
            }
          }

          reset($articles);
          while (list($key, $value) = each($articles)) {
            $topic_ids = '';

            for ($i=0, $n=sizeof($value['topics']); $i<$n; $i++) {
              $topic_ids .= "'" . (int)$value['topics'][$i] . "', ";
            }
            $topic_ids = substr($topic_ids, 0, -2);

            $check_query = xtc_db_query("select count(*) as total from " . TABLE_ARTICLES_TO_TOPICS . " where articles_id = '" . (int)$key . "' and topics_id not in (" . $topic_ids . ")");
            $check = xtc_db_fetch_array($check_query);
            if ($check['total'] < '1') {
              $articles_delete[$key] = $key;
            }
          }

// removing topics can be a lengthy process
          xtc_set_time_limit(0);
          for ($i=0, $n=sizeof($topics); $i<$n; $i++) {
            xtc_remove_topic($topics[$i]['id']);
          }

          reset($articles_delete);
          while (list($key) = each($articles_delete)) {
            xtc_remove_article($key);
          }
        }

        if (USE_CACHE == 'true') {
          xtc_reset_cache_block('topics');
        }

        xtc_redirect(xtc_href_link(FILENAME_ARTICLES, 'tPath=' . $tPath));
        break;
      case 'delete_article_confirm':
        if (isset($_POST['articles_id']) && isset($_POST['article_topics']) && is_array($_POST['article_topics'])) {
          $article_id = xtc_db_prepare_input($_POST['articles_id']);
          $article_topics = $_POST['article_topics'];

          for ($i=0, $n=sizeof($article_topics); $i<$n; $i++) {
            xtc_db_query("delete from " . TABLE_ARTICLES_TO_TOPICS . " where articles_id = '" . (int)$article_id . "' and topics_id = '" . (int)$article_topics[$i] . "'");
          }

          $article_topics_query = xtc_db_query("select count(*) as total from " . TABLE_ARTICLES_TO_TOPICS . " where articles_id = '" . (int)$article_id . "'");
          $article_topics = xtc_db_fetch_array($article_topics_query);

          if ($article_topics['total'] == '0') {
            xtc_remove_article($article_id);
          }
        }

        if (USE_CACHE == 'true') {
          xtc_reset_cache_block('topics');
        }

        xtc_redirect(xtc_href_link(FILENAME_ARTICLES, 'tPath=' . $tPath));
        break;
      case 'move_topic_confirm':
        if (isset($_POST['topics_id']) && ($_POST['topics_id'] != $_POST['move_to_topic_id'])) {
          $topics_id = xtc_db_prepare_input($_POST['topics_id']);
          $new_parent_id = xtc_db_prepare_input($_POST['move_to_topic_id']);

          $path = explode('_', xtc_get_generated_topic_path_ids($new_parent_id));

          if (in_array($topics_id, $path)) {
            $messageStack->add_session(ERROR_CANNOT_MOVE_TOPIC_TO_PARENT, 'error');

            xtc_redirect(xtc_href_link(FILENAME_ARTICLES, 'tPath=' . $tPath . '&tID=' . $topics_id));
          } else {
            xtc_db_query("update " . TABLE_TOPICS . " set parent_id = '" . (int)$new_parent_id . "', last_modified = now() where topics_id = '" . (int)$topics_id . "'");

            if (USE_CACHE == 'true') {
              xtc_reset_cache_block('topics');
            }

            xtc_redirect(xtc_href_link(FILENAME_ARTICLES, 'tPath=' . $new_parent_id . '&tID=' . $topics_id));
          }
        }

        break;
      case 'move_article_confirm':
        $articles_id = xtc_db_prepare_input($_POST['articles_id']);
        $new_parent_id = xtc_db_prepare_input($_POST['move_to_topic_id']);

        $duplicate_check_query = xtc_db_query("select count(*) as total from " . TABLE_ARTICLES_TO_TOPICS . " where articles_id = '" . (int)$articles_id . "' and topics_id = '" . (int)$new_parent_id . "'");
        $duplicate_check = xtc_db_fetch_array($duplicate_check_query);
        if ($duplicate_check['total'] < 1) xtc_db_query("update " . TABLE_ARTICLES_TO_TOPICS . " set topics_id = '" . (int)$new_parent_id . "' where articles_id = '" . (int)$articles_id . "' and topics_id = '" . (int)$current_topic_id . "'");

        if (USE_CACHE == 'true') {
          xtc_reset_cache_block('topics');
        }

        xtc_redirect(xtc_href_link(FILENAME_ARTICLES, 'tPath=' . $new_parent_id . '&aID=' . $articles_id));
        break;
      case 'insert_article':
      case 'update_article':
        if (isset($_POST['edit_x']) || isset($_POST['edit_y'])) {
          $action = 'new_article';
        } else {
          if (isset($_GET['aID'])) $articles_id = xtc_db_prepare_input($_GET['aID']);
          $articles_date_available = xtc_db_prepare_input($_POST['articles_date_available']);

          $articles_date_available = (date('Y-m-d') < $articles_date_available) ? $articles_date_available : 'null';

          $sql_data_array = array('articles_date_available' => $articles_date_available,
                                  'articles_status' => xtc_db_prepare_input($_POST['articles_status']),
                                  'authors_id' => xtc_db_prepare_input($_POST['authors_id']));

          if ($action == 'insert_article') {
            // If expected article then articles_date _added becomes articles_date_available
            if (isset($_POST['articles_date_available']) && xtc_not_null($_POST['articles_date_available'])) {
              $insert_sql_data = array('articles_date_added' => xtc_db_prepare_input($_POST['articles_date_available']));
            } else {
              $insert_sql_data = array('articles_date_added' => 'now()');
            }
            $sql_data_array = array_merge($sql_data_array, $insert_sql_data);

            xtc_db_perform(TABLE_ARTICLES, $sql_data_array);
            $articles_id = xtc_db_insert_id();

            xtc_db_query("insert into " . TABLE_ARTICLES_TO_TOPICS . " (articles_id, topics_id) values ('" . (int)$articles_id . "', '" . (int)$current_topic_id . "')");
          } elseif ($action == 'update_article') {
            $update_sql_data = array('articles_last_modified' => 'now()');
            // If expected article then articles_date _added becomes articles_date_available
            if (isset($_POST['articles_date_available']) && xtc_not_null($_POST['articles_date_available'])) {
              $update_sql_data = array('articles_date_added' => xtc_db_prepare_input($_POST['articles_date_available']));
            }

            $sql_data_array = array_merge($sql_data_array, $update_sql_data);

            xtc_db_perform(TABLE_ARTICLES, $sql_data_array, 'update', "articles_id = '" . (int)$articles_id . "'");
          }

          $languages = xtc_get_languages();
          for ($i=0, $n=sizeof($languages); $i<$n; $i++) {
            $language_id = $languages[$i]['id'];

            $sql_data_array = array('articles_name' => xtc_db_prepare_input($_POST['articles_name'][$language_id]),
                                    'articles_description' => xtc_db_prepare_input($_POST['articles_description'][$language_id]),
                                    'articles_url' => xtc_db_prepare_input($_POST['articles_url'][$language_id]),
                                    'articles_head_title_tag' => xtc_db_prepare_input($_POST['articles_head_title_tag'][$language_id]),
                                    'articles_head_desc_tag' => xtc_db_prepare_input($_POST['articles_head_desc_tag'][$language_id]),
                                    'articles_head_keywords_tag' => xtc_db_prepare_input($_POST['articles_head_keywords_tag'][$language_id]));

            if ($action == 'insert_article') {
              $insert_sql_data = array('articles_id' => $articles_id,
                                       'language_id' => $language_id);

              $sql_data_array = array_merge($sql_data_array, $insert_sql_data);

              xtc_db_perform(TABLE_ARTICLES_DESCRIPTION, $sql_data_array);
            } elseif ($action == 'update_article') {
              xtc_db_perform(TABLE_ARTICLES_DESCRIPTION, $sql_data_array, 'update', "articles_id = '" . (int)$articles_id . "' and language_id = '" . (int)$language_id . "'");
            }
          }

          if (USE_CACHE == 'true') {
            xtc_reset_cache_block('topics');
          }

          xtc_redirect(xtc_href_link(FILENAME_ARTICLES, 'tPath=' . $tPath . '&aID=' . $articles_id));
        }
        break;
      case 'copy_to_confirm':
        if (isset($_POST['articles_id']) && isset($_POST['topics_id'])) {
          $articles_id = xtc_db_prepare_input($_POST['articles_id']);
          $topics_id = xtc_db_prepare_input($_POST['topics_id']);

          if ($_POST['copy_as'] == 'link') {
            if ($topics_id != $current_topic_id) {
              $check_query = xtc_db_query("select count(*) as total from " . TABLE_ARTICLES_TO_TOPICS . " where articles_id = '" . (int)$articles_id . "' and topics_id = '" . (int)$topics_id . "'");
              $check = xtc_db_fetch_array($check_query);
              if ($check['total'] < '1') {
                xtc_db_query("insert into " . TABLE_ARTICLES_TO_TOPICS . " (articles_id, topics_id) values ('" . (int)$articles_id . "', '" . (int)$topics_id . "')");
              }
            } else {
              $messageStack->add_session(ERROR_CANNOT_LINK_TO_SAME_TOPIC, 'error');
            }
          } elseif ($_POST['copy_as'] == 'duplicate') {
            $article_query = xtc_db_query("select articles_date_available, authors_id from " . TABLE_ARTICLES . " where articles_id = '" . (int)$articles_id . "'");
            $article = xtc_db_fetch_array($article_query);

            xtc_db_query("insert into " . TABLE_ARTICLES . " (articles_date_added, articles_date_available, articles_status, authors_id) values (now(), '" . xtc_db_input($article['articles_date_available']) . "', '0', '" . (int)$article['authors_id'] . "')");
            $dup_articles_id = xtc_db_insert_id();

            $description_query = xtc_db_query("select language_id, articles_name, articles_description, articles_url, articles_head_title_tag, articles_head_desc_tag, articles_head_keywords_tag from " . TABLE_ARTICLES_DESCRIPTION . " where articles_id = '" . (int)$articles_id . "'");
            while ($description = xtc_db_fetch_array($description_query)) {
              xtc_db_query("insert into " . TABLE_ARTICLES_DESCRIPTION . " (articles_id, language_id, articles_name, articles_description, articles_url, articles_head_title_tag, articles_head_desc_tag, articles_head_keywords_tag, articles_viewed) values ('" . (int)$dup_articles_id . "', '" . (int)$description['language_id'] . "', '" . xtc_db_input($description['articles_name']) . "', '" . xtc_db_input($description['articles_description']) . "', '" . xtc_db_input($description['articles_url']) . "', '" . xtc_db_input($description['articles_head_title_tag']) . "', '" . xtc_db_input($description['articles_head_desc_tag']) . "', '" . xtc_db_input($description['articles_head_keywords_tag']) . "', '0')");
            }

            xtc_db_query("insert into " . TABLE_ARTICLES_TO_TOPICS . " (articles_id, topics_id) values ('" . (int)$dup_articles_id . "', '" . (int)$topics_id . "')");
            $articles_id = $dup_articles_id;
          }

          if (USE_CACHE == 'true') {
            xtc_reset_cache_block('topics');
          }
        }

        xtc_redirect(xtc_href_link(FILENAME_ARTICLES, 'tPath=' . $topics_id . '&aID=' . $articles_id));
        break;
    }
  }

// check if the catalog image directory exists
  if (is_dir(DIR_FS_CATALOG_IMAGES)) {
    if (!is_writeable(DIR_FS_CATALOG_IMAGES)) $messageStack->add(ERROR_CATALOG_IMAGE_DIRECTORY_NOT_WRITEABLE, 'error');
  } else {
    $messageStack->add(ERROR_CATALOG_IMAGE_DIRECTORY_DOES_NOT_EXIST, 'error');
  }
?>
<!doctype html public "-//W3C//DTD HTML 4.01 Transitional//EN">
<html <?php echo HTML_PARAMS; ?>>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=<?php echo $_SESSION['language_charset']; ?>"> 
<title><?php echo TITLE; ?></title>
<link rel="stylesheet" type="text/css" href="includes/stylesheet.css">
<?php

// Include WYSIWYG if is activated
if (USE_WYSIWYG == 'true') {
	$query = xtc_db_query("SELECT code FROM ".TABLE_LANGUAGES." WHERE languages_id='".$_SESSION['languages_id']."'");
	$data = xtc_db_fetch_array($query);
	// generate editor for categories EDIT
	$languages = xtc_get_languages();
?>
<script type="text/javascript" src="includes/modules/fckeditor/fckeditor.js"></script>
<script type="text/javascript">
	window.onload = function()
		{<?php

	// generate editor for categories
	if ($_GET['action'] == 'new_topic' || $_GET['action'] == 'edit_topic') {
		for ($i = 0; $i < sizeof($languages); $i ++) {
			echo xtc_wysiwyg('topics_description', $data['code'], $languages[$i]['id']);
		}
	}

	// generate editor for products
	if ($_GET['action'] == 'new_article') {
		for ($i = 0; $i < sizeof($languages); $i ++) {
			echo xtc_wysiwyg('articles_description', $data['code'], $languages[$i]['id']);
		}
	}
?>}
</script><?php
}
?>
</head>
<body style="margin: 0; background-color: #FFFFFF">
<!-- header //-->
<?php require(DIR_WS_INCLUDES . 'header.php'); ?>
<!-- header_eof //-->

<!-- body //-->
<table border="0" width="100%" cellspacing="2" cellpadding="2">
  <tr>
<!-- body_text //-->
     <td width="100%" valign="top"><table border="0" width="100%" cellspacing="0" cellpadding="2">
 <?php
   //----- new_topic / edit_topic  -----
  if ($_GET['action'] == 'new_topic_ACD' || $_GET['action'] == 'edit_topic_ACD') {
    if ( ($_GET['tID']) && (!$_POST) ) {
      $topics_query = xtc_db_query("select t.topics_id, td.topics_name, td.topics_heading_title, td.topics_description, t.parent_id, t.sort_order, t.date_added, t.last_modified from " . TABLE_TOPICS . " t, " . TABLE_TOPICS_DESCRIPTION . " td where t.topics_id = '" . $_GET['tID'] . "' and t.topics_id = td.topics_id and td.language_id = '" . (int)$_SESSION['languages_id'] . "' order by t.sort_order, td.topics_name");
      $topic = xtc_db_fetch_array($topics_query);

      $tInfo = new objectInfo($topic);
    } elseif ($_POST) {
      $tInfo = new objectInfo($_POST);
      $topics_name = $_POST['topics_name'];
      $topics_heading_title = $_POST['topics_heading_title'];
      $topics_description = $_POST['topics_description'];
      $topics_url = $_POST['topics_url'];
    } else {
      $tInfo = new objectInfo(array());
    }

    $languages = xtc_get_languages();

    $text_new_or_edit = ($_GET['action']=='new_topic_ACD') ? TEXT_INFO_HEADING_NEW_TOPIC : TEXT_INFO_HEADING_EDIT_TOPIC;
?>
      <tr>
        <td><table border="0" width="100%" cellspacing="0" cellpadding="0">
          <tr>
            <td colspan="2" class="pageHeading"><h1 class="contentBoxHeading"><?php echo sprintf($text_new_or_edit, xtc_output_generated_topic_path($current_topic_id)); ?></h1></td>
          </tr>
        </table></td>
      </tr>
      <tr>
        <td><?php echo xtc_draw_separator('pixel_trans.gif', '1', '10'); ?></td>
      </tr>
      <tr><?php echo xtc_draw_form('new_topic', FILENAME_ARTICLES, 'tPath=' . $tPath . '&tID=' . $_GET['tID'] . '&action=new_topic_preview', 'post', 'enctype="multipart/form-data"'); ?>
        <td><table border="0" cellspacing="0" cellpadding="2">
<?php
    for ($i=0; $i<sizeof($languages); $i++) {
?>
          <tr>
            <td class="main"><?php if ($i == 0) echo TEXT_EDIT_TOPICS_NAME; ?></td>
            <td class="main"><?php echo xtc_image(DIR_WS_LANGUAGES . $languages[$i]['directory'] . '/' . $languages[$i]['image'], $languages[$i]['name']) . '&nbsp;' . xtc_draw_input_field('topics_name[' . $languages[$i]['id'] . ']', (($topics_name[$languages[$i]['id']]) ? stripslashes($topics_name[$languages[$i]['id']]) : xtc_get_topic_name($tInfo->topics_id, $languages[$i]['id']))); ?></td>
          </tr>
<?php
    }
?>
          <tr>
            <td colspan="2"><?php echo xtc_draw_separator('pixel_trans.gif', '1', '10'); ?></td>
          </tr>
<?php
    for ($i=0; $i<sizeof($languages); $i++) {
?>
          <tr>
            <td class="main"><?php if ($i == 0) echo TEXT_EDIT_TOPICS_HEADING_TITLE; ?></td>
            <td class="main"><?php echo xtc_image(DIR_WS_LANGUAGES . $languages[$i]['directory'] . '/' . $languages[$i]['image'], $languages[$i]['name']) . '&nbsp;' . xtc_draw_input_field('topics_heading_title[' . $languages[$i]['id'] . ']', (($topics_name[$languages[$i]['id']]) ? stripslashes($topics_name[$languages[$i]['id']]) : xtc_get_topic_heading_title($tInfo->topics_id, $languages[$i]['id']))); ?></td>
          </tr>
<?php
    }
?>
          <tr>
            <td colspan="2"><?php echo xtc_draw_separator('pixel_trans.gif', '1', '10'); ?></td>
          </tr>
<?php
    for ($i=0; $i<sizeof($languages); $i++) {
?>
          <tr>
            <td class="main" valign="top"><?php if ($i == 0) echo TEXT_EDIT_TOPICS_DESCRIPTION; ?></td>
            <td><table border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td class="main" valign="top"><?php echo xtc_image(DIR_WS_LANGUAGES . $languages[$i]['directory'] . '/' . $languages[$i]['image'], $languages[$i]['name']); ?>&nbsp;</td>

<td class="main">

<?php
          echo xtc_draw_textarea_field('topics_description[' . $languages[$i]['id'] . ']', 'soft', '70', '15', (($topics_description[$languages[$i]['id']]) ? stripslashes($topics_description[$languages[$i]['id']]) : xtc_get_topic_description($tInfo->topics_id, $languages[$i]['id']))); 
?>

</td>
              </tr>
            </table></td>
          </tr>
<?php
    }
?>
          <tr>
            <td colspan="2"><?php echo xtc_draw_separator('pixel_trans.gif', '1', '10'); ?></td>
          </tr>
          <tr>
            <td class="main"><?php echo TEXT_EDIT_SORT_ORDER; ?></td>
            <td class="main"><?php echo xtc_draw_separator('pixel_trans.gif', '24', '15') . '&nbsp;' . xtc_draw_input_field('sort_order', $tInfo->sort_order, 'size="2"'); ?></td>
          </tr>
          <tr>
            <td colspan="2"><?php echo xtc_draw_separator('pixel_trans.gif', '1', '10'); ?></td>
          </tr>
        </table></td>
      </tr>
      <tr>
        <td><?php echo xtc_draw_separator('pixel_trans.gif', '1', '10'); ?></td>
      </tr>
      <tr>
        <td class="main" align="right"><?php echo xtc_draw_hidden_field('topics_date_added', (($tInfo->date_added) ? $tInfo->date_added : date('Y-m-d'))) . xtc_draw_hidden_field('parent_id', $tInfo->parent_id) . '<input type="submit" class="button" onClick="this.blur();" value="' . BUTTON_PREVIEW . '"/>' . '&nbsp;&nbsp;<a class="button" href="' . xtc_href_link(FILENAME_ARTICLES, 'tPath=' . $tPath . '&tID=' . $_GET['tID']) . '">' . BUTTON_CANCEL . '</a>'; ?></td>
      </form></tr>
<?php
  //----- new_topic_preview -----
  } elseif ($_GET['action'] == 'new_topic_preview') {
    if ($_POST) {
      $tInfo = new objectInfo($_POST);
      $topics_name = $_POST['topics_name'];
      $topics_heading_title = $_POST['topics_heading_title'];
      $topics_description = $_POST['topics_description'];
    } else {
      $topic_query = xtc_db_query("select t.topics_id, td.language_id, td.topics_name, td.topics_heading_title, td.topics_description, t.sort_order, t.date_added, t.last_modified from " . TABLE_TOPICS . " t, " . TABLE_TOPICS_DESCRIPTION . " td where t.topics_id = td.topics_id and t.topics_id = '" . $_GET['tID'] . "'");
      $topic = xtc_db_fetch_array($topic_query);

      $tInfo = new objectInfo($topic);
    }

    $form_action = ($_GET['tID']) ? 'update_topic' : 'insert_topic';

    echo xtc_draw_form($form_action, FILENAME_ARTICLES, 'tPath=' . $tPath . '&tID=' . $_GET['tID'] . '&action=' . $form_action, 'post', 'enctype="multipart/form-data"');

    $languages = xtc_get_languages();
    for ($i=0; $i<sizeof($languages); $i++) {
      if ($_GET['read'] == 'only') {
        $tInfo->topics_name = xtc_get_topic_name($tInfo->topics_id, $languages[$i]['id']);
        $tInfo->topics_heading_title = xtc_get_topic_heading_title($tInfo->topics_id, $languages[$i]['id']);
        $tInfo->topics_description = xtc_get_topic_description($tInfo->topics_id, $languages[$i]['id']);
      } else {
        $tInfo->topics_name = xtc_db_prepare_input($topics_name[$languages[$i]['id']]);
        $tInfo->topics_heading_title = xtc_db_prepare_input($topics_heading_title[$languages[$i]['id']]);
        $tInfo->topics_description = xtc_db_prepare_input($topics_description[$languages[$i]['id']]);
      }
?>
      <tr>
        <td><table border="0" width="100%" cellspacing="0" cellpadding="0">
          <tr>
            <td class="pageHeading"><?php echo xtc_image(DIR_WS_LANGUAGES . $languages[$i]['directory'] . '/' . $languages[$i]['image'], $languages[$i]['name']) . '&nbsp;' . $tInfo->topics_heading_title; ?></td>
          </tr>
        </table></td>
      </tr>
      <tr>
        <td><?php echo xtc_draw_separator('pixel_trans.gif', '1', '10'); ?></td>
      </tr>
      <tr>
        <td class="main"><?php echo $tInfo->topics_description; ?></td>
      </tr>

<?php
    }
    if ($_GET['read'] == 'only') {
      if ($_GET['origin']) {
        $pos_params = strpos($_GET['origin'], '?', 0);
        if ($pos_params != false) {
          $back_url = substr($_GET['origin'], 0, $pos_params);
          $back_url_params = substr($_GET['origin'], $pos_params + 1);
        } else {
          $back_url = $_GET['origin'];
          $back_url_params = '';
        }
      } else {
        $back_url = FILENAME_ARTICLES;
        $back_url_params = 'tPath=' . $tPath . '&tID=' . $tInfo->topics_id;
      }
?>
      <tr>
        <td align="right"><?php echo '<a class="button" href="' . xtc_href_link($back_url, $back_url_params, 'NONSSL') . '">' . BUTTON_BACK . '</a>'; ?></td>
      </tr>
<?php
    } else {
?>
      <tr>
        <td align="right" class="smallText">
<?php
/* Re-Post all POST'ed variables */
      reset($_POST);
      while (list($key, $value) = each($_POST)) {
        if (!is_array($_POST[$key])) {
          echo xtc_draw_hidden_field($key, htmlspecialchars(stripslashes($value)));
        }
      }
      $languages = xtc_get_languages();
      for ($i=0; $i<sizeof($languages); $i++) {
        echo xtc_draw_hidden_field('topics_name[' . $languages[$i]['id'] . ']', htmlspecialchars(stripslashes($topics_name[$languages[$i]['id']])));
        echo xtc_draw_hidden_field('topics_heading_title[' . $languages[$i]['id'] . ']', htmlspecialchars(stripslashes($topics_heading_title[$languages[$i]['id']])));
        echo xtc_draw_hidden_field('topics_description[' . $languages[$i]['id'] . ']', htmlspecialchars(stripslashes($topics_description[$languages[$i]['id']])));
      }

      echo '<input type="submit" class="button" onClick="this.blur();" value="' . BUTTON_BACK . '"/>&nbsp;&nbsp;';

      if ($_GET['tID']) {
        echo '<input type="submit" class="button" onClick="this.blur();" value="' . BUTTON_UPDATE . '"/>';
      } else {
        echo '<input type="submit" class="button" onClick="this.blur();" value="' . BUTTON_INSERT . '"/>';
      }
      echo '&nbsp;&nbsp;<a class="button" href="' . xtc_href_link(FILENAME_ARTICLES, 'tPath=' . $tPath . '&tID=' . $_GET['tID']) . '">' . BUTTON_CANCEL . '</a>';
?></td>
      </form></tr>
<?php
    }
  } elseif ($action == 'new_article') {
    $parameters = array('articles_name' => '',
                       'articles_description' => '',
                       'articles_url' => '',
                       'articles_head_title_tag' => '',
                       'articles_head_desc_tag' => '',
                       'articles_head_keywords' => '',
                       'articles_id' => '',
                       'articles_date_added' => '',
                       'articles_last_modified' => '',
                       'articles_date_available' => '',
                       'articles_status' => '',
                       'authors_id' => '');

    $aInfo = new objectInfo($parameters);

    if (isset($_GET['aID']) && empty($_POST)) {
      $article_query = xtc_db_query("select ad.articles_name, ad.articles_description, ad.articles_url, ad.articles_head_title_tag, ad.articles_head_desc_tag, ad.articles_head_keywords_tag, a.articles_id, a.articles_date_added, a.articles_last_modified, date_format(a.articles_date_available, '%Y-%m-%d') as articles_date_available, a.articles_status, a.authors_id from " . TABLE_ARTICLES . " a, " . TABLE_ARTICLES_DESCRIPTION . " ad where a.articles_id = '" . (int)$_GET['aID'] . "' and a.articles_id = ad.articles_id and ad.language_id = '" . (int)$_SESSION['languages_id'] . "'");
      $article = xtc_db_fetch_array($article_query);

      $aInfo->objectInfo($article);
    } elseif (xtc_not_null($_POST)) {
      $aInfo->objectInfo($_POST);
      $articles_name = $_POST['articles_name'];
      $articles_description = $_POST['articles_description'];
      $articles_url = $_POST['articles_url'];
      $articles_head_title_tag = $_POST['articles_head_title_tag'];
      $articles_head_desc_tag = $_POST['articles_head_desc_tag'];
      $articles_head_keywords_tag = $_POST['articles_head_keywords_tag'];
    }

    $authors_array = array(array('id' => '', 'text' => TEXT_NONE));
    $authors_query = xtc_db_query("select authors_id, authors_name from " . TABLE_AUTHORS . " order by authors_name");
    while ($authors = xtc_db_fetch_array($authors_query)) {
      $authors_array[] = array('id' => $authors['authors_id'],
                                     'text' => $authors['authors_name']);
    }

    $languages = xtc_get_languages();

    if (!isset($aInfo->articles_status)) $aInfo->articles_status = '1';
    switch ($aInfo->articles_status) {
      case '0': $in_status = false; $out_status = true; break;
      case '1':
      default: $in_status = true; $out_status = false;
    }
?>
<link href="includes/javascript/date-picker/css/datepicker.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="includes/javascript/date-picker/js/datepicker.js"></script>

<script type="text/javascript" src="includes/javascript/modified.js"></script>
<script type="text/javascript" src="includes/javascript/tabber.js"></script>
<link rel="stylesheet" href="includes/javascript/tabber.css" TYPE="text/css" MEDIA="screen">
<link rel="stylesheet" href="includes/javascript/tabber-print.css" TYPE="text/css" MEDIA="print">
    <?php echo xtc_draw_form('new_article', FILENAME_ARTICLES, 'tPath=' . $tPath . (isset($_GET['aID']) ? '&aID=' . $_GET['aID'] : '') . '&action=article_preview', 'post', 'enctype="multipart/form-data"'); ?>
    <table border="0" width="100%" cellspacing="0" cellpadding="2">
      <tr>
        <td><table border="0" width="100%" cellspacing="0" cellpadding="0">
          <tr>
            <td colspan="2" class="pageHeading"><h1 class="contentBoxHeading"><?php echo sprintf(TEXT_NEW_ARTICLE, xtc_output_generated_topic_path($current_topic_id)); ?></h1></td>
          </tr>
        </table></td>
      </tr>
      <tr>
        <td><?php echo xtc_draw_separator('pixel_trans.gif', '1', '10'); ?></td>
      </tr>
      <tr>
        <td><table border="0" cellspacing="0" cellpadding="2">
          <tr>
            <td class="main"><?php echo TEXT_ARTICLES_STATUS; ?></td>
            <td class="main"><?php echo xtc_draw_separator('pixel_trans.gif', '24', '15') . '&nbsp;' . xtc_draw_radio_field('articles_status', '0', $out_status) . '&nbsp;' . TEXT_ARTICLE_NOT_AVAILABLE . '&nbsp;' . xtc_draw_radio_field('articles_status', '1', $in_status) . '&nbsp;' . TEXT_ARTICLE_AVAILABLE; ?></td>
          </tr>
          <tr>
            <td colspan="2"><?php echo xtc_draw_separator('pixel_trans.gif', '1', '10'); ?></td>
          </tr>
          <tr>
            <td class="main"><?php echo TEXT_ARTICLES_DATE_AVAILABLE; ?><br><small>(YYYY-MM-DD)</small></td>
            <td class="main"><?php echo xtc_draw_input_field('articles_date_available', $aInfo->articles_date_available, 'size="10" class="format-y-m-d dividor-slash"'); ?></td>
          </tr>
          <tr>
            <td colspan="2"><?php echo xtc_draw_separator('pixel_trans.gif', '1', '10'); ?></td>
          </tr>
          <tr>
          <tr>
            <td class="main"><?php echo TEXT_ARTICLES_AUTHOR; ?></td>
            <td class="main"><?php echo xtc_draw_separator('pixel_trans.gif', '24', '15') . '&nbsp;' . xtc_draw_pull_down_menu('authors_id', $authors_array, $aInfo->authors_id); ?></td>
          </tr>
          <tr>
            <td colspan="2"><?php echo xtc_draw_separator('pixel_trans.gif', '1', '10'); ?></td>
          </tr>
<?php
    for ($i=0, $n=sizeof($languages); $i<$n; $i++) {
?>
          <tr>
            <td class="main"><?php if ($i == 0) echo TEXT_ARTICLES_NAME; ?></td>
            <td class="main"><?php echo xtc_image(DIR_WS_LANGUAGES . $languages[$i]['directory'] . '/' . $languages[$i]['image'], $languages[$i]['name']) . '&nbsp;' . xtc_draw_input_field('articles_name[' . $languages[$i]['id'] . ']', (isset($articles_name[$languages[$i]['id']]) ? $articles_name[$languages[$i]['id']] : xtc_get_articles_name($aInfo->articles_id, $languages[$i]['id'])), 'size="35"'); ?></td>
          </tr>
<?php
    }
?>
          <tr>
            <td colspan="2"><?php echo xtc_draw_separator('pixel_trans.gif', '1', '10'); ?></td>
          </tr>
<?php
    for ($i=0, $n=sizeof($languages); $i<$n; $i++) {
?>
          <tr bgcolor="#ffffcc">
            <td class="main"><?php if ($i == 0) echo TEXT_ARTICLES_HEAD_TITLE_TAG; ?></td>
            <td class="main"><?php echo xtc_image(DIR_WS_LANGUAGES . $languages[$i]['directory'] . '/' . $languages[$i]['image'], $languages[$i]['name']) . '&nbsp;' . xtc_draw_input_field('articles_head_title_tag[' . $languages[$i]['id'] . ']', (isset($articles_head_title_tag[$languages[$i]['id']]) ? $articles_head_title_tag[$languages[$i]['id']] : xtc_get_articles_head_title_tag($aInfo->articles_id, $languages[$i]['id'])), 'size="35"'); ?></td>
          </tr>
<?php
    }
?>
          <tr bgcolor="#ffffcc">
            <td colspan="2"><?php echo xtc_draw_separator('pixel_trans.gif', '1', '10'); ?></td>
          </tr>
<?php
    for ($i=0, $n=sizeof($languages); $i<$n; $i++) {
?>
          <tr bgcolor="#ffffcc">
            <td class="main" valign="top"><?php if ($i == 0) echo sprintf(TEXT_ARTICLES_HEAD_DESC_TAG, MAX_ARTICLE_ABSTRACT_LENGTH); ?></td>
            <td><table border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td class="main" valign="top"><?php echo xtc_image(DIR_WS_LANGUAGES . $languages[$i]['directory'] . '/' . $languages[$i]['image'], $languages[$i]['name']); ?>&nbsp;</td>
                <td class="main"><?php echo xtc_draw_textarea_field('articles_head_desc_tag[' . $languages[$i]['id'] . ']', 'soft', '70', '5', (isset($articles_head_desc_tag[$languages[$i]['id']]) ? $articles_head_desc_tag[$languages[$i]['id']] : xtc_get_articles_head_desc_tag($aInfo->articles_id, $languages[$i]['id']))); ?></td>
              </tr>
            </table></td>
          </tr>
<?php
    }
?>
          <tr bgcolor="#ffffcc">
            <td colspan="2"><?php echo xtc_draw_separator('pixel_trans.gif', '1', '10'); ?></td>
          </tr>
<?php
    for ($i=0, $n=sizeof($languages); $i<$n; $i++) {
?>
          <tr bgcolor="#ffffcc">
            <td class="main" valign="top"><?php if ($i == 0) echo TEXT_ARTICLES_HEAD_KEYWORDS_TAG; ?></td>
            <td><table border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td class="main" valign="top"><?php echo xtc_image(DIR_WS_LANGUAGES . $languages[$i]['directory'] . '/' . $languages[$i]['image'], $languages[$i]['name']); ?>&nbsp;</td>
                <td class="main"><?php echo xtc_draw_textarea_field('articles_head_keywords_tag[' . $languages[$i]['id'] . ']', 'soft', '70', '5', (isset($articles_head_keywords_tag[$languages[$i]['id']]) ? $articles_head_keywords_tag[$languages[$i]['id']] : xtc_get_articles_head_keywords_tag($aInfo->articles_id, $languages[$i]['id']))); ?></td>
              </tr>
            </table></td>
          </tr>
<?php
    }
?>
          <tr>
            <td colspan="2"><?php echo xtc_draw_separator('pixel_trans.gif', '1', '10'); ?></td>
          </tr>

<?php
    for ($i=0, $n=sizeof($languages); $i<$n; $i++) {
?>
          <tr>
            <td class="main" valign="top"><?php if ($i == 0) echo TEXT_ARTICLES_DESCRIPTION; ?></td>
            <td><table border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td class="main" valign="top"><?php echo xtc_image(DIR_WS_LANGUAGES . $languages[$i]['directory'] . '/' . $languages[$i]['image'], $languages[$i]['name']); ?>&nbsp;</td>

<td class="main">

<?php
          echo xtc_draw_textarea_field('articles_description[' . $languages[$i]['id'] . ']', 'soft', '70', '15', (($articles_description[$languages[$i]['id']]) ? stripslashes($articles_description[$languages[$i]['id']]) : xtc_get_articles_description($aInfo->articles_id, $languages[$i]['id'])));
?>

</td>

              </tr>
            </table></td>
          </tr>
<?php
    }
?>
          <tr>
            <td colspan="2"><?php echo xtc_draw_separator('pixel_trans.gif', '1', '10'); ?></td>
          </tr>
<?php
    for ($i=0, $n=sizeof($languages); $i<$n; $i++) {
?>
          <tr>
            <td class="main"><?php if ($i == 0) echo TEXT_ARTICLES_URL . '<br><small>' . TEXT_ARTICLES_URL_WITHOUT_HTTP . '</small>'; ?></td>
            <td class="main"><?php echo xtc_image(DIR_WS_LANGUAGES . $languages[$i]['directory'] . '/' . $languages[$i]['image'], $languages[$i]['name']) . '&nbsp;' . xtc_draw_input_field('articles_url[' . $languages[$i]['id'] . ']', (isset($articles_url[$languages[$i]['id']]) ? $articles_url[$languages[$i]['id']] : xtc_get_articles_url($aInfo->articles_id, $languages[$i]['id'])), 'size="35"'); ?></td>
          </tr>
<?php
    }
?>
        </table></td>
      </tr>
      <tr>
        <td><?php echo xtc_draw_separator('pixel_trans.gif', '1', '10'); ?></td>
      </tr>
      <tr>
        <td class="main" align="right"><?php echo xtc_draw_hidden_field('articles_date_added', (xtc_not_null($aInfo->articles_date_added) ? $aInfo->articles_date_added : date('Y-m-d'))) . '<input type="submit" class="button" onClick="this.blur();" value="' . BUTTON_PREVIEW . '"/>' . '&nbsp;&nbsp;<a class="button" href="' . xtc_href_link(FILENAME_ARTICLES, 'tPath=' . $tPath . (isset($_GET['aID']) ? '&aID=' . $_GET['aID'] : '')) . '">' . BUTTON_CANCEL . '</a>'; ?></td>
      </tr>
    </table></form>
<?php
  } elseif ($action == 'article_preview') {
    if (xtc_not_null($_POST)) {
      $aInfo = new objectInfo($_POST);
      $articles_name = $_POST['articles_name'];
      $articles_description = $_POST['articles_description'];
      $articles_url = $_POST['articles_url'];
      $articles_head_title_tag = $_POST['articles_head_title_tag'];
      $articles_head_desc_tag = $_POST['articles_head_desc_tag'];
      $articles_head_keywords_tag = $_POST['articles_head_keywords_tag'];
    } else {
      $article_query = xtc_db_query("select a.articles_id, ad.language_id, ad.articles_name, ad.articles_description, ad.articles_url, ad.articles_head_title_tag, ad.articles_head_desc_tag, ad.articles_head_keywords_tag, a.articles_date_added, a.articles_last_modified, a.articles_date_available, a.articles_status, a.authors_id  from " . TABLE_ARTICLES . " a, " . TABLE_ARTICLES_DESCRIPTION . " ad where a.articles_id = ad.articles_id and a.articles_id = '" . (int)$_GET['aID'] . "'");
      $article = xtc_db_fetch_array($article_query);

      $aInfo = new objectInfo($article);
    }

    $form_action = (isset($_GET['aID'])) ? 'update_article' : 'insert_article';

    echo xtc_draw_form($form_action, FILENAME_ARTICLES, 'tPath=' . $tPath . (isset($_GET['aID']) ? '&aID=' . $_GET['aID'] : '') . '&action=' . $form_action, 'post', 'enctype="multipart/form-data"');

    $languages = xtc_get_languages();
    for ($i=0, $n=sizeof($languages); $i<$n; $i++) {
      if (isset($_GET['read']) && ($_GET['read'] == 'only')) {
        $aInfo->articles_name = xtc_get_articles_name($aInfo->articles_id, $languages[$i]['id']);
        $aInfo->articles_description = xtc_get_articles_description($aInfo->articles_id, $languages[$i]['id']);
        $aInfo->articles_url = xtc_get_articles_url($aInfo->articles_id, $languages[$i]['id']);
        $aInfo->articles_head_title_tag = xtc_get_articles_head_title_tag($aInfo->articles_id, $languages[$i]['id']);
        $aInfo->articles_head_desc_tag = xtc_get_articles_head_desc_tag($aInfo->articles_id, $languages[$i]['id']);
        $aInfo->articles_head_keywords_tag = xtc_get_articles_head_keywords_tag($aInfo->articles_id, $languages[$i]['id']);
      } else {
        $aInfo->articles_name = xtc_db_prepare_input($articles_name[$languages[$i]['id']]);
        $aInfo->articles_description = xtc_db_prepare_input($articles_description[$languages[$i]['id']]);
        $aInfo->articles_url = xtc_db_prepare_input($articles_url[$languages[$i]['id']]);
        $aInfo->articles_head_title_tag = xtc_db_prepare_input($articles_head_title_tag[$languages[$i]['id']]);
        $aInfo->articles_head_desc_tag = xtc_db_prepare_input($articles_head_desc_tag[$languages[$i]['id']]);
        $aInfo->articles_head_keywords_tag = xtc_db_prepare_input($articles_head_keywords_tag[$languages[$i]['id']]);
      }
?>
    <table border="0" width="100%" cellspacing="0" cellpadding="2">
      <tr>
        <td><table border="0" width="100%" cellspacing="0" cellpadding="0">
          <tr>
            <td class="pageHeading" colspan="2"><?php echo xtc_image(DIR_WS_LANGUAGES . $languages[$i]['directory'] . '/' . $languages[$i]['image'], $languages[$i]['name']) . '&nbsp;' . $aInfo->articles_name; ?></td>
          </tr>
        </table></td>
      </tr>
<?php
      if ($aInfo->articles_description) {
?>
      <tr>
        <td><?php echo xtc_draw_separator('pixel_trans.gif', '1', '10'); ?></td>
      </tr>
      <tr>
        <td class="main"><?php echo $aInfo->articles_description; ?></td>
      </tr>
<?php
      }
?>
<?php
      if ($aInfo->articles_url) {
?>
      <tr>
        <td><?php echo xtc_draw_separator('pixel_trans.gif', '1', '10'); ?></td>
      </tr>
      <tr>
        <td class="main"><?php echo sprintf(TEXT_ARTICLE_MORE_INFORMATION, $aInfo->articles_url); ?></td>
      </tr>
<?php
      }
?>
      <tr>
        <td><?php echo xtc_draw_separator('pixel_trans.gif', '1', '10'); ?></td>
      </tr>
<?php
      if ($aInfo->articles_date_available > date('Y-m-d')) {
?>
      <tr>
        <td align="center" class="smallText"><?php echo sprintf(TEXT_ARTICLE_DATE_AVAILABLE, xtc_date_long($aInfo->articles_date_available)); ?></td>
      </tr>
<?php
      } else {
?>
      <tr>
        <td align="center" class="smallText"><?php echo sprintf(TEXT_ARTICLE_DATE_ADDED, xtc_date_long($aInfo->articles_date_added)); ?></td>
      </tr>
<?php
      }
?>
      <tr>
        <td><?php echo xtc_draw_separator('pixel_trans.gif', '1', '10'); ?></td>
      </tr>
<?php
    }

    if (isset($_GET['read']) && ($_GET['read'] == 'only')) {
      if (isset($_GET['origin'])) {
        $pos_params = strpos($_GET['origin'], '?', 0);
        if ($pos_params != false) {
          $back_url = substr($_GET['origin'], 0, $pos_params);
          $back_url_params = substr($_GET['origin'], $pos_params + 1);
        } else {
          $back_url = $_GET['origin'];
          $back_url_params = '';
        }
      } else {
        $back_url = FILENAME_ARTICLES;
        $back_url_params = 'tPath=' . $tPath . '&aID=' . $aInfo->articles_id;
      }
?>
      <tr>
        <td align="right"><?php echo '<a class="button" href="' . xtc_href_link($back_url, $back_url_params, 'NONSSL') . '">' . BUTTON_BACK . '</a>'; ?></td>
      </tr>
<?php
    } else {
?>
      <tr>
        <td align="right" class="smallText">
<?php
/* Re-Post all POST'ed variables */
      reset($_POST);
      while (list($key, $value) = each($_POST)) {
        if (!is_array($_POST[$key])) {
          echo xtc_draw_hidden_field($key, htmlspecialchars(stripslashes($value)));
        }
      }
      $languages = xtc_get_languages();
      for ($i=0, $n=sizeof($languages); $i<$n; $i++) {
        echo xtc_draw_hidden_field('articles_name[' . $languages[$i]['id'] . ']', htmlspecialchars(stripslashes($articles_name[$languages[$i]['id']])));
        echo xtc_draw_hidden_field('articles_description[' . $languages[$i]['id'] . ']', htmlspecialchars(stripslashes($articles_description[$languages[$i]['id']])));
        echo xtc_draw_hidden_field('articles_url[' . $languages[$i]['id'] . ']', htmlspecialchars(stripslashes($articles_url[$languages[$i]['id']])));
        echo xtc_draw_hidden_field('articles_head_title_tag[' . $languages[$i]['id'] . ']', htmlspecialchars(stripslashes($articles_head_title_tag[$languages[$i]['id']])));
        echo xtc_draw_hidden_field('articles_head_desc_tag[' . $languages[$i]['id'] . ']', htmlspecialchars(stripslashes($articles_head_desc_tag[$languages[$i]['id']])));
        echo xtc_draw_hidden_field('articles_head_keywords_tag[' . $languages[$i]['id'] . ']', htmlspecialchars(stripslashes($articles_head_keywords_tag[$languages[$i]['id']])));
      }

      echo '<input type="submit" class="button" name="edit" onClick="this.blur();" value="' . BUTTON_BACK . '"/>' . '&nbsp;&nbsp;';

      if (isset($_GET['aID'])) {
        echo '<input type="submit" class="button" onClick="this.blur();" value="' . BUTTON_UPDATE . '"/>';
      } else {
        echo '<input type="submit" class="button" onClick="this.blur();" value="' . BUTTON_INSERT . '"/>';
      }
      echo '&nbsp;&nbsp;<a class="button" href="' . xtc_href_link(FILENAME_ARTICLES, 'tPath=' . $tPath . (isset($_GET['aID']) ? '&aID=' . $_GET['aID'] : '')) . '">' . BUTTON_CANCEL . '</a>';
?></td>
      </tr>
    </table></form>
<?php
    }
  } else {
?>
    <table border="0" width="100%" cellspacing="0" cellpadding="2">
      <tr>
        <td><table border="0" width="100%" cellspacing="0" cellpadding="0">
          <tr>
            <td colspan="2" class="pageHeading"><h1 class="contentBoxHeading"><?php echo HEADING_TITLE; ?></h1></td>
          </tr>
          <tr>
            <td class="pageHeading" align="right"><?php echo xtc_draw_separator('pixel_trans.gif', 1, HEADING_IMAGE_HEIGHT); ?></td>
            <td align="right"><table border="0" width="100%" cellspacing="0" cellpadding="0">
              <tr>
                <td class="smallText" align="right">
<?php
    echo xtc_draw_form('search', FILENAME_ARTICLES, '', 'get');
    echo HEADING_TITLE_SEARCH . ' ' . xtc_draw_input_field('search');
    echo '</form>';
?>
                </td>
              </tr>
              <tr>
                <td class="smallText" align="right">
<?php
    echo xtc_draw_form('goto', FILENAME_ARTICLES, '', 'get');
    echo HEADING_TITLE_GOTO . ' ' . xtc_draw_pull_down_menu('tPath', xtc_get_topic_tree(), $current_topic_id, 'onChange="this.form.submit();"');
    echo '</form>';
?>
                </td>
              </tr>
            </table></td>
          </tr>
        </table></td>
      </tr>
      <tr>
        <td><table border="0" width="100%" cellspacing="0" cellpadding="0">
          <tr>
            <td valign="top"><table border="0" width="100%" cellspacing="0" cellpadding="2">
              <tr class="dataTableHeadingRow">
                <td class="dataTableHeadingContent"><?php echo TABLE_HEADING_TOPICS_ARTICLES; ?></td>
                <td class="dataTableHeadingContent" align="center"><?php echo TABLE_HEADING_STATUS; ?></td>
                <td class="dataTableHeadingContent" align="right"><?php echo TABLE_HEADING_ACTION; ?>&nbsp;</td>
              </tr>
<?php
    $topics_count = 0;
    $rows = 0;
    if (isset($_GET['search'])) {
      $search = xtc_db_prepare_input($_GET['search']);

      $topics_query = xtc_db_query("select t.topics_id, td.topics_name, t.parent_id, t.sort_order, t.date_added, t.last_modified from " . TABLE_TOPICS . " t, " . TABLE_TOPICS_DESCRIPTION . " td where t.topics_id = td.topics_id and td.language_id = '" . (int)$_SESSION['languages_id'] . "' and td.topics_name like '%" . xtc_db_input($search) . "%' order by t.sort_order, td.topics_name");
    } else {
      $topics_query = xtc_db_query("select t.topics_id, td.topics_name, t.parent_id, t.sort_order, t.date_added, t.last_modified from " . TABLE_TOPICS . " t, " . TABLE_TOPICS_DESCRIPTION . " td where t.parent_id = '" . (int)$current_topic_id . "' and t.topics_id = td.topics_id and td.language_id = '" . (int)$_SESSION['languages_id'] . "' order by t.sort_order, td.topics_name");
    }
    while ($topics = xtc_db_fetch_array($topics_query)) {
      $topics_count++;
      $rows++;

// Get parent_id for subtopics if search
      if (isset($_GET['search'])) $tPath= $topics['parent_id'];

      if ((!isset($_GET['tID']) && !isset($_GET['aID']) || (isset($_GET['tID']) && ($_GET['tID'] == $topics['topics_id']))) && !isset($tInfo) && (substr($action, 0, 3) != 'new')) {
        $topic_childs = array('childs_count' => xtc_childs_in_topic_count($topics['topics_id']));
        $topic_articles = array('articles_count' => xtc_articles_in_topic_count($topics['topics_id']));

        $tInfo_array = array_merge($topics, $topic_childs, $topic_articles);
        $tInfo = new objectInfo($tInfo_array);
      }

      if (isset($tInfo) && is_object($tInfo) && ($topics['topics_id'] == $tInfo->topics_id) ) {
        echo '              <tr id="defaultSelected" class="dataTableRowSelected" onmouseover="rowOverEffect(this)" onmouseout="rowOutEffect(this)" onclick="document.location.href=\'' . xtc_href_link(FILENAME_ARTICLES, xtc_get_topic_path($topics['topics_id'])) . '\'">' . "\n";
      } else {
        echo '              <tr class="dataTableRow" onmouseover="rowOverEffect(this)" onmouseout="rowOutEffect(this)" onclick="document.location.href=\'' . xtc_href_link(FILENAME_ARTICLES, 'tPath=' . $tPath . '&tID=' . $topics['topics_id']) . '\'">' . "\n";
      }
?>
                <td class="dataTableContent"><?php echo '<a href="' . xtc_href_link(FILENAME_ARTICLES, xtc_get_topic_path($topics['topics_id'])) . '">' . xtc_image(DIR_WS_ICONS . 'folder.gif', ICON_FOLDER) . '</a>&nbsp;<b>' . $topics['topics_name'] . '</b>'; ?></td>
                <td class="dataTableContent" align="center">&nbsp;</td>
                <td class="dataTableContent" align="right"><?php if (isset($tInfo) && is_object($tInfo) && ($topics['topics_id'] == $tInfo->topics_id) ) { echo xtc_image(DIR_WS_IMAGES . 'icon_arrow_right.gif', ''); } else { echo '<a href="' . xtc_href_link(FILENAME_ARTICLES, 'tPath=' . $tPath . '&tID=' . $topics['topics_id']) . '">' . xtc_image(DIR_WS_IMAGES . 'icon_info.gif', IMAGE_ICON_INFO) . '</a>'; } ?>&nbsp;</td>
              </tr>
<?php
    }

    $articles_count = 0;
    if (isset($_GET['search'])) {
      $articles_query = xtc_db_query("select a.articles_id, ad.articles_name, a.articles_date_added, a.articles_last_modified, a.articles_date_available, a.articles_status, a2t.topics_id from " . TABLE_ARTICLES . " a, " . TABLE_ARTICLES_DESCRIPTION . " ad, " . TABLE_ARTICLES_TO_TOPICS . " a2t where a.articles_id = ad.articles_id and ad.language_id = '" . (int)$_SESSION['languages_id'] . "' and a.articles_id = a2t.articles_id and ad.articles_name like '%" . xtc_db_input($search) . "%' order by ad.articles_name");
    } else {
      $articles_query = xtc_db_query("select a.articles_id, ad.articles_name, a.articles_date_added, a.articles_last_modified, a.articles_date_available, a.articles_status from " . TABLE_ARTICLES . " a, " . TABLE_ARTICLES_DESCRIPTION . " ad, " . TABLE_ARTICLES_TO_TOPICS . " a2t where a.articles_id = ad.articles_id and ad.language_id = '" . (int)$_SESSION['languages_id'] . "' and a.articles_id = a2t.articles_id and a2t.topics_id = '" . (int)$current_topic_id . "' order by ad.articles_name");
    }
    while ($articles = xtc_db_fetch_array($articles_query)) {
      $articles_count++;
      $rows++;

// Get topics_id for article if search
      if (isset($_GET['search'])) $tPath = $articles['topics_id'];

      if ( (!isset($_GET['aID']) && !isset($_GET['tID']) || (isset($_GET['aID']) && ($_GET['aID'] == $articles['articles_id']))) && !isset($aInfo) && !isset($tInfo) && (substr($action, 0, 3) != 'new')) {
// find out the rating average from customer reviews
        $reviews_query = xtc_db_query("select (avg(reviews_rating) / 5 * 100) as average_rating from " . TABLE_ARTICLE_REVIEWS . " where articles_id = '" . (int)$articles['articles_id'] . "'");
        $reviews = xtc_db_fetch_array($reviews_query);
        $aInfo_array = array_merge($articles, $reviews);
        $aInfo = new objectInfo($aInfo_array);
      }

      if (isset($aInfo) && is_object($aInfo) && ($articles['articles_id'] == $aInfo->articles_id) ) {
        echo '              <tr id="defaultSelected" class="dataTableRowSelected" onmouseover="rowOverEffect(this)" onmouseout="rowOutEffect(this)" onclick="document.location.href=\'' . xtc_href_link(FILENAME_ARTICLES, 'tPath=' . $tPath . '&aID=' . $articles['articles_id'] . '&action=article_preview&read=only') . '\'">' . "\n";
      } else {
        echo '              <tr class="dataTableRow" onmouseover="rowOverEffect(this)" onmouseout="rowOutEffect(this)" onclick="document.location.href=\'' . xtc_href_link(FILENAME_ARTICLES, 'tPath=' . $tPath . '&aID=' . $articles['articles_id']) . '\'">' . "\n";
      }
?>
                <td class="dataTableContent"><?php echo '<a href="' . xtc_href_link(FILENAME_ARTICLES, 'tPath=' . $tPath . '&aID=' . $articles['articles_id'] . '&action=article_preview&read=only') . '">' . xtc_image(DIR_WS_ICONS . 'preview.gif', ICON_PREVIEW) . '</a>&nbsp;' . $articles['articles_name']; ?></td>
                <td class="dataTableContent" align="center">
<?php
      if ($articles['articles_status'] == '1') {
        echo xtc_image(DIR_WS_IMAGES . 'icon_status_green.gif', IMAGE_ICON_STATUS_GREEN, 10, 10) . '&nbsp;&nbsp;<a href="' . xtc_href_link(FILENAME_ARTICLES, 'action=setflag&flag=0&aID=' . $articles['articles_id'] . '&tPath=' . $tPath) . '">' . xtc_image(DIR_WS_IMAGES . 'icon_status_red_light.gif', IMAGE_ICON_STATUS_RED_LIGHT, 10, 10) . '</a>';
      } else {
        echo '<a href="' . xtc_href_link(FILENAME_ARTICLES, 'action=setflag&flag=1&aID=' . $articles['articles_id'] . '&tPath=' . $tPath) . '">' . xtc_image(DIR_WS_IMAGES . 'icon_status_green_light.gif', IMAGE_ICON_STATUS_GREEN_LIGHT, 10, 10) . '</a>&nbsp;&nbsp;' . xtc_image(DIR_WS_IMAGES . 'icon_status_red.gif', IMAGE_ICON_STATUS_RED, 10, 10);
      }
?></td>
                <td class="dataTableContent" align="right"><?php if (isset($aInfo) && is_object($aInfo) && ($articles['articles_id'] == $aInfo->articles_id)) { echo xtc_image(DIR_WS_IMAGES . 'icon_arrow_right.gif', ''); } else { echo '<a href="' . xtc_href_link(FILENAME_ARTICLES, 'tPath=' . $tPath . '&aID=' . $articles['articles_id']) . '">' . xtc_image(DIR_WS_IMAGES . 'icon_info.gif', IMAGE_ICON_INFO) . '</a>'; } ?>&nbsp;</td>
              </tr>
<?php
    }

    $tPath_back = '';
    if (sizeof($tPath_array) > 0) {
      for ($i=0, $n=sizeof($tPath_array)-1; $i<$n; $i++) {
        if (empty($tPath_back)) {
          $tPath_back .= $tPath_array[$i];
        } else {
          $tPath_back .= '_' . $tPath_array[$i];
        }
      }
    }

    $tPath_back = (xtc_not_null($tPath_back)) ? 'tPath=' . $tPath_back . '&' : '';
?>
              <tr>
                <td colspan="3"><table border="0" width="100%" cellspacing="0" cellpadding="2">
                  <tr>
                    <td class="smallText"><?php echo TEXT_TOPICS . '&nbsp;' . $topics_count . '<br>' . TEXT_ARTICLES . '&nbsp;' . $articles_count; ?></td>
                    <td align="right" class="smallText"><?php if (sizeof($tPath_array) > 0) echo '<a class="button" href="' . xtc_href_link(FILENAME_ARTICLES, $tPath_back . 'tID=' . $current_topic_id) . '">' . BUTTON_BACK . '</a>&nbsp;'; if (!isset($_GET['search'])) echo '<a class="button" href="' . xtc_href_link(FILENAME_ARTICLES, 'tPath=' . $tPath . '&action=new_topic') . '">' . BUTTON_NEW_TOPIC . '</a>&nbsp;<a class="button" href="' . xtc_href_link(FILENAME_ARTICLES, 'tPath=' . $tPath . '&action=new_article') . '">' . BUTTON_NEW_ARTICLE . '</a>'; ?>&nbsp;</td>
                  </tr>
                </table></td>
              </tr>
            </table></td>
<?php
    $heading = array();
    $contents = array();
    switch ($action) {
      case 'new_topic':
        $heading[] = array('text' => '<b>' . TEXT_INFO_HEADING_NEW_TOPIC . '</b>');

        $contents = array('form' => xtc_draw_form('newtopic', FILENAME_ARTICLES, 'action=insert_topic&tPath=' . $tPath, 'post', 'enctype="multipart/form-data"'));
        $contents[] = array('text' => TEXT_NEW_TOPIC_INTRO);

        $topic_inputs_string = '';
        $languages = xtc_get_languages();
        for ($i = 0, $n = sizeof($languages); $i < $n; $i++) {
          $topic_inputs_string .= '<br>' . xtc_image(DIR_WS_LANGUAGES . $languages[$i]['directory'] . '/' . $languages[$i]['image'], $languages[$i]['name']) . '&nbsp;' . xtc_draw_input_field('topics_name[' . $languages[$i]['id'] . ']');
        }

        $contents[] = array('text' => '<br>' . TEXT_TOPICS_NAME . $topic_inputs_string);
        $contents[] = array('text' => '<br>' . TEXT_SORT_ORDER . '<br>' . xtc_draw_input_field('sort_order', '', 'size="2"'));
        $contents[] = array('align' => 'center', 'text' => '<br>' . '<input type="submit" class="button" onClick="this.blur();" value="' . BUTTON_SAVE . '"/>' . ' <a class="button" href="' . xtc_href_link(FILENAME_ARTICLES, 'tPath=' . $tPath) . '">' . BUTTON_CANCEL . '</a>');
        break;
      case 'edit_topic':
        $heading[] = array('text' => '<b>' . TEXT_INFO_HEADING_EDIT_TOPIC . '</b>');

        $contents = array('form' => xtc_draw_form('topics', FILENAME_ARTICLES, 'action=update_topic&tPath=' . $tPath, 'post', 'enctype="multipart/form-data"') . xtc_draw_hidden_field('topics_id', $tInfo->topics_id));
        $contents[] = array('text' => TEXT_EDIT_INTRO);

        $topic_inputs_string = '';
        $languages = xtc_get_languages();
        for ($i = 0, $n = sizeof($languages); $i < $n; $i++) {
          $topic_inputs_string .= '<br>' . xtc_image(DIR_WS_LANGUAGES . $languages[$i]['directory'] . '/' . $languages[$i]['image'], $languages[$i]['name']) . '&nbsp;' . xtc_draw_input_field('topics_name[' . $languages[$i]['id'] . ']', xtc_get_topic_name($tInfo->topics_id, $languages[$i]['id']));
        }

        $contents[] = array('text' => '<br>' . TEXT_EDIT_TOPICS_NAME . $topic_inputs_string);
        $contents[] = array('text' => '<br>' . TEXT_EDIT_SORT_ORDER . '<br>' . xtc_draw_input_field('sort_order', $tInfo->sort_order, 'size="2"'));
        $contents[] = array('align' => 'center', 'text' => '<br>' . '<input type="submit" class="button" onClick="this.blur();" value="' . BUTTON_SAVE . '"/>' . ' <a class="button" href="' . xtc_href_link(FILENAME_ARTICLES, 'tPath=' . $tPath . '&tID=' . $tInfo->topics_id) . '">' . BUTTON_CANCEL . '</a>');
        break;
      case 'delete_topic':
        $heading[] = array('text' => '<b>' . TEXT_INFO_HEADING_DELETE_TOPIC . '</b>');

        $contents = array('form' => xtc_draw_form('topics', FILENAME_ARTICLES, 'action=delete_topic_confirm&tPath=' . $tPath) . xtc_draw_hidden_field('topics_id', $tInfo->topics_id));
        $contents[] = array('text' => TEXT_DELETE_TOPIC_INTRO);
        $contents[] = array('text' => '<br><b>' . $tInfo->topics_name . '</b>');
        if ($tInfo->childs_count > 0) $contents[] = array('text' => '<br>' . sprintf(TEXT_DELETE_WARNING_CHILDS, $tInfo->childs_count));
        if ($tInfo->articles_count > 0) $contents[] = array('text' => '<br>' . sprintf(TEXT_DELETE_WARNING_ARTICLES, $tInfo->articles_count));
        $contents[] = array('align' => 'center', 'text' => '<br>' . '<input type="submit" class="button" onClick="this.blur();" value="' . BUTTON_DELETE . '"/>' . ' <a class="button" href="' . xtc_href_link(FILENAME_ARTICLES, 'tPath=' . $tPath . '&tID=' . $tInfo->topics_id) . '">' . BUTTON_CANCEL . '</a>');
        break;
      case 'move_topic':
        $heading[] = array('text' => '<b>' . TEXT_INFO_HEADING_MOVE_TOPIC . '</b>');

        $contents = array('form' => xtc_draw_form('topics', FILENAME_ARTICLES, 'action=move_topic_confirm&tPath=' . $tPath) . xtc_draw_hidden_field('topics_id', $tInfo->topics_id));
        $contents[] = array('text' => sprintf(TEXT_MOVE_TOPICS_INTRO, $tInfo->topics_name));
        $contents[] = array('text' => '<br>' . sprintf(TEXT_MOVE, $tInfo->topics_name) . '<br>' . xtc_draw_pull_down_menu('move_to_topic_id', xtc_get_topic_tree(), $current_topic_id));
        $contents[] = array('align' => 'center', 'text' => '<br>' . '<input type="submit" class="button" onClick="this.blur();" value="' . BUTTON_MOVE . '"/>' . ' <a class="button" href="' . xtc_href_link(FILENAME_ARTICLES, 'tPath=' . $tPath . '&tID=' . $tInfo->topics_id) . '">' . BUTTON_CANCEL . '</a>');
        break;
      case 'delete_article':
        $heading[] = array('text' => '<b>' . TEXT_INFO_HEADING_DELETE_ARTICLE . '</b>');

        $contents = array('form' => xtc_draw_form('articles', FILENAME_ARTICLES, 'action=delete_article_confirm&tPath=' . $tPath) . xtc_draw_hidden_field('articles_id', $aInfo->articles_id));
        $contents[] = array('text' => TEXT_DELETE_ARTICLE_INTRO);
        $contents[] = array('text' => '<br><b>' . $aInfo->articles_name . '</b>');

        $article_topics_string = '';
        $article_topics = xtc_generate_topic_path($aInfo->articles_id, 'article');
        for ($i = 0, $n = sizeof($article_topics); $i < $n; $i++) {
          $topic_path = '';
          for ($j = 0, $k = sizeof($article_topics[$i]); $j < $k; $j++) {
            $topic_path .= $article_topics[$i][$j]['text'] . '&nbsp;&gt;&nbsp;';
          }
          $topic_path = substr($topic_path, 0, -16);
          $article_topics_string .= xtc_draw_checkbox_field('article_topics[]', $article_topics[$i][sizeof($article_topics[$i])-1]['id'], true) . '&nbsp;' . $topic_path . '<br>';
        }
        $article_topics_string = substr($article_topics_string, 0, -4);

        $contents[] = array('text' => '<br>' . $article_topics_string);
        $contents[] = array('align' => 'center', 'text' => '<br>' . '<input type="submit" class="button" onClick="this.blur();" value="' . BUTTON_DELETE . '"/>' . ' <a class="button" href="' . xtc_href_link(FILENAME_ARTICLES, 'tPath=' . $tPath . '&aID=' . $aInfo->articles_id) . '">' . BUTTON_CANCEL . '</a>');
        break;
      case 'move_article':
        $heading[] = array('text' => '<b>' . TEXT_INFO_HEADING_MOVE_ARTICLE . '</b>');

        $contents = array('form' => xtc_draw_form('articles', FILENAME_ARTICLES, 'action=move_article_confirm&tPath=' . $tPath) . xtc_draw_hidden_field('articles_id', $aInfo->articles_id));
        $contents[] = array('text' => sprintf(TEXT_MOVE_ARTICLES_INTRO, $aInfo->articles_name));
        $contents[] = array('text' => '<br>' . TEXT_INFO_CURRENT_TOPICS . '<br><b>' . xtc_output_generated_topic_path($aInfo->articles_id, 'article') . '</b>');
        $contents[] = array('text' => '<br>' . sprintf(TEXT_MOVE, $aInfo->articles_name) . '<br>' . xtc_draw_pull_down_menu('move_to_topic_id', xtc_get_topic_tree(), $current_topic_id));
        $contents[] = array('align' => 'center', 'text' => '<br>' . '<input type="submit" class="button" onClick="this.blur();" value="' . BUTTON_MOVE . '"/>' . ' <a class="button" href="' . xtc_href_link(FILENAME_ARTICLES, 'tPath=' . $tPath . '&aID=' . $aInfo->articles_id) . '">' . BUTTON_CANCEL . '</a>');
        break;
      case 'copy_to':
        $heading[] = array('text' => '<b>' . TEXT_INFO_HEADING_COPY_TO . '</b>');

        $contents = array('form' => xtc_draw_form('copy_to', FILENAME_ARTICLES, 'action=copy_to_confirm&tPath=' . $tPath) . xtc_draw_hidden_field('articles_id', $aInfo->articles_id));
        $contents[] = array('text' => TEXT_INFO_COPY_TO_INTRO);
        $contents[] = array('text' => '<br>' . TEXT_INFO_CURRENT_TOPICS . '<br><b>' . xtc_output_generated_topic_path($aInfo->articles_id, 'article') . '</b>');
        $contents[] = array('text' => '<br>' . TEXT_TOPICS . '<br>' . xtc_draw_pull_down_menu('topics_id', xtc_get_topic_tree(), $current_topic_id));
        $contents[] = array('text' => '<br>' . TEXT_HOW_TO_COPY . '<br>' . xtc_draw_radio_field('copy_as', 'link', true) . ' ' . TEXT_COPY_AS_LINK . '<br>' . xtc_draw_radio_field('copy_as', 'duplicate') . ' ' . TEXT_COPY_AS_DUPLICATE);
        $contents[] = array('align' => 'center', 'text' => '<br>' . '<input type="submit" class="button" onClick="this.blur();" value="' . BUTTON_COPY . '"/>' . ' <a class="button" href="' . xtc_href_link(FILENAME_ARTICLES, 'tPath=' . $tPath . '&aID=' . $aInfo->articles_id) . '">' . BUTTON_CANCEL . '</a>');
        break;

      default:
        if ($rows > 0) {
          if (isset($tInfo) && is_object($tInfo)) { // topic info box contents
            $heading[] = array('text' => '<b>' . $tInfo->topics_name . '</b>');

            $contents[] = array('align' => 'center', 'text' => '<a class="button" href="' . xtc_href_link(FILENAME_ARTICLES, 'tPath=' . $tPath . '&tID=' . $tInfo->topics_id . '&action=edit_topic') . '">' . BUTTON_EDIT . '</a> <a class="button" href="' . xtc_href_link(FILENAME_ARTICLES, 'tPath=' . $tPath . '&tID=' . $tInfo->topics_id . '&action=delete_topic') . '">' . BUTTON_DELETE . '</a> <a class="button" href="' . xtc_href_link(FILENAME_ARTICLES, 'tPath=' . $tPath . '&tID=' . $tInfo->topics_id . '&action=move_topic') . '">' . BUTTON_MOVE . '</a>');
            $contents[] = array('text' => '<br>' . TEXT_DATE_ADDED . ' ' . xtc_date_short($tInfo->date_added));
            if (xtc_not_null($tInfo->last_modified)) $contents[] = array('text' => TEXT_LAST_MODIFIED . ' ' . xtc_date_short($tInfo->last_modified));
            $contents[] = array('text' => '<br>' . TEXT_SUBTOPICS . ' ' . $tInfo->childs_count . '<br>' . TEXT_ARTICLES . ' ' . $tInfo->articles_count);
          } elseif (isset($aInfo) && is_object($aInfo)) { // article info box contents
            $heading[] = array('text' => '<b>' . xtc_get_articles_name($aInfo->articles_id, $_SESSION['languages_id']) . '</b>');

            $contents[] = array('align' => 'center', 'text' => '<a class="button" href="' . xtc_href_link(FILENAME_ARTICLES, 'tPath=' . $tPath . '&aID=' . $aInfo->articles_id . '&action=new_article') . '">' . BUTTON_EDIT . '</a> <a class="button" href="' . xtc_href_link(FILENAME_ARTICLES, 'tPath=' . $tPath . '&aID=' . $aInfo->articles_id . '&action=delete_article') . '">' . BUTTON_DELETE . '</a> <a class="button" href="' . xtc_href_link(FILENAME_ARTICLES, 'tPath=' . $tPath . '&aID=' . $aInfo->articles_id . '&action=move_article') . '">' . BUTTON_MOVE . '</a> <a class="button" href="' . xtc_href_link(FILENAME_ARTICLES, 'tPath=' . $tPath . '&aID=' . $aInfo->articles_id . '&action=copy_to') . '">' . BUTTON_COPY_TO . '</a>');            $contents[] = array('text' => '<br>' . TEXT_DATE_ADDED . ' ' . xtc_date_short($aInfo->articles_date_added));
            if (xtc_not_null($aInfo->articles_last_modified)) $contents[] = array('text' => TEXT_LAST_MODIFIED . ' ' . xtc_date_short($aInfo->articles_last_modified));
            if (date('Y-m-d') < $aInfo->articles_date_available) $contents[] = array('text' => TEXT_DATE_AVAILABLE . ' ' . xtc_date_short($aInfo->articles_date_available));
            $contents[] = array('text' => '<br>' . TEXT_ARTICLES_AVERAGE_RATING . ' ' . number_format($aInfo->average_rating, 2) . '%');
          }
        } else { // create topic/article info
          $heading[] = array('text' => '<b>' . EMPTY_TOPIC . '</b>');

          $contents[] = array('text' => TEXT_NO_CHILD_TOPICS_OR_ARTICLES);
        }
        break;
    }

    if ( (xtc_not_null($heading)) && (xtc_not_null($contents)) ) {
      echo '            <td width="25%" valign="top">' . "\n";

      $box = new box;
      echo $box->infoBox($heading, $contents);

      echo '            </td>' . "\n";
    }
?>
          </tr>
        </table></td>
      </tr>
    </table>
<?php
  }
?>
    </td>
<!-- body_text_eof //-->
  </tr>
</table>
<!-- body_eof //-->

<!-- footer //-->
<?php require(DIR_WS_INCLUDES . 'footer.php'); ?>
<!-- footer_eof //-->
<br>
</body>
</html>
<?php require(DIR_WS_INCLUDES . 'application_bottom.php'); ?>