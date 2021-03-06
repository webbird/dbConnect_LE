<?php

/**
 * dbConnect_LE
 *
 * @author Ralf Hertsch <ralf.hertsch@phpmanufaktur.de>
 * @link http://phpmanufaktur.de
 * @copyright 2008 - 2013
 * @license MIT License (MIT) http://www.opensource.org/licenses/MIT
 */

// include class.secure.php to protect this file and the whole CMS!
if (defined('WB_PATH')) {
    if (defined('LEPTON_VERSION')) include (WB_PATH . '/framework/class.secure.php');
} else {
    $oneback = "../";
    $root = $oneback;
    $level = 1;
    while (($level < 10) && (! file_exists($root . '/framework/class.secure.php'))) {
        $root .= $oneback;
        $level += 1;
    }
    if (file_exists($root . '/framework/class.secure.php')) {
        include ($root . '/framework/class.secure.php');
    } else {
        trigger_error(sprintf("[ <b>%s</b> ] Can't include class.secure.php!", $_SERVER['SCRIPT_NAME']), E_USER_ERROR);
    }
}
// end include class.secure.php

$module_directory = 'dbconnect_le';
$module_name = 'dbConnectLE';
$module_function = (defined('LEPTON_VERSION') || defined('CAT_VERSION')) ? 'library' : 'snippet';
$module_version = '0.71';
$module_platform = '2.8.x';
$module_author = 'Ralf Hertsch, Berlin (Germany)';
$module_license = 'MIT License (MIT)';
$module_description = 'Objectoriented MySQL interface for usage with WebsiteBaker, LEPTON CMS and BlackCat CMS';
$module_home = 'https://phpmanufaktur.de/';
$module_guid = 'A6697E72-9FC0-433C-8536-2112F6E6D687';
