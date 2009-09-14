<?php
/**
 * Smarty plugin
 * @package Smarty
 * @subpackage plugins
 */


/**
 * Smarty truncate modifier plugin
 *
 * Type:     modifier<br>
 * Name:     truncate<br>
 * Purpose:  Truncate a string to a certain length if necessary,
 *           optionally splitting in the middle of a word, and
 *           appending the $etc string or inserting $etc into the middle.
 * @link http://smarty.php.net/manual/en/language.modifier.truncate.php
 *          truncate (Smarty online manual)
 * @author   Monte Ohrt <monte at ohrt dot com>
 * @param string
 * @param integer
 * @param string
 * @param boolean
 * @param boolean
 * @return string
 */
function smarty_modifier_vam_truncate($string, $length = 80, $etc = '...',
                                  $break_words = false, $middle = false)
{

$string = strip_tags($string); 

    if ($length == 0)
        return '';

    if (strlen($string) > $length) {
        $length -= min($length, utf8_strlen($etc));
        if (!$break_words && !$middle) {
            $string = preg_replace('/\s+?(\S+)?$/', '', utf8_substr($string, 0, $length+1));
        }
        if(!$middle) {
            return utf8_substr($string, 0, $length) . $etc;
        } else {
            return utf8_substr($string, 0, $length/2) . $etc . utf8_substr($string, -$length/2);
        }
    } else {
        return $string;
    }
}

/* vim: set expandtab: */

?>