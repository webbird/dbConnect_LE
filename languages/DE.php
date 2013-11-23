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

if ('á' != "\xc3\xa1") {
    // important: language files must be saved as UTF-8 (without BOM)
    trigger_error('The language file <b>/modules/'.dirname(basename(__FILE__)).'/languages/'.
	    basename(__FILE__).'</b> is damaged, it must be saved <b>UTF-8</b> encoded!', E_USER_ERROR);
}

define ( 'dbc_error_database_not_connected', 'Die Datenbank ist nicht verbunden!' );
define ( 'dbc_error_fieldDefinitionsNotChecked', 'Bitte rufen Sie zunächst die Funktion<strong>checkFieldDefinitions()</strong> auf, bevor Sie Datenbankabfragen durchführen!' );
define ( 'dbc_error_emptyTableName', 'Der Tabellenname ist leer, bitte definieren Sie zunächst einen Namen fuer die Tabelle!' );
define ( 'dbc_error_noFieldDefinitions', 'Die Felddefinitionen fehlen, legen Sie die zunächst die Felder fuer die Datenbank fest!' );
define ( 'dbc_error_noPrimaryKey', 'Der Primäre Schlüssel ist nicht definiert!' );
define ( 'dbc_error_execQuery', 'Fehler bei der SQL Abfrage: <b>%s</b>' );
define ( 'dbc_error_feature_not_supported', 'Diese Funktion wird von dbConnectLE nicht unterstützt!' );
define ( 'dbc_error_recordEmpty', 'Der übergebene Datensatz ist leer, es ist nichts zu tun...' );
define ( 'dbc_error_csv_file_no_handle', 'Fuer die CSV Datei <b>%s</b> konnte kein Handle erzeugt werden.' );
define ( 'dbc_error_csv_no_keys', 'In der CSV Datei <b>%s</b> wurden keine Spaltenüberschriften gefunden!<br />Fügen Sie Spaltenüberschriften in die CSV ein oder setzen Sie den Schalter <b>$has_header=false</b>.' );
define ( 'dbc_error_csv_file_put', 'Fehler beim Schreiben der CSV Datei <b>%s</b>.' );
