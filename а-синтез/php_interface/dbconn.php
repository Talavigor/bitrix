<?
define("BX_USE_MYSQLI", true);
define("DBPersistent", false);
$DBType = "mysql";
$DBHost = "";
$DBLogin = "";
$DBPassword = "";
$DBName = "";
$DBDebug = false;
$DBDebugToFile = false;

define("DELAY_DB_CONNECT", true);
define("CACHED_b_file", 3600);
define("CACHED_b_file_bucket_size", 10);
define("CACHED_b_lang", 3600);
define("CACHED_b_option", 3600);
define("CACHED_b_lang_domain", 3600);
define("CACHED_b_site_template", 3600);
define("CACHED_b_event", 3600);
define("CACHED_b_agent", 3660);
define("CACHED_menu", 3600);

define("BX_UTF", true);
define("BX_FILE_PERMISSIONS", 0644);
define("BX_DIR_PERMISSIONS", 0755);
@umask(~(BX_FILE_PERMISSIONS | BX_DIR_PERMISSIONS) & 0777);
define("BX_DISABLE_INDEX_PAGE", true);


$correctLangs = array("ru", "en"); // здесь список языков вашего сайта

// сначала проверяем наличие переменной lang в url
if (isset($_GET['lang']) && in_array($_GET['lang'], $correctLangs)) {
    define('LANGUAGE_ID', $_GET['lang']);
} elseif (isset($_COOKIE['lang'])) // если нет в урле, проверяем куку с тем же именем
{
    define('LANGUAGE_ID', $_COOKIE['lang']);
} else // если нет куки, проверяем основной язык браузера
{
    $lang = substr($_SERVER['HTTP_ACCEPT_LANGUAGE'], 0, 2);
    if (in_array($lang, array_keys($correctLangs))) {
        define('LANGUAGE_ID', $lang);
    }
}

if (defined("LANGUAGE_ID")) {
    SetCookie('lang', LANGUAGE_ID, time() + (3600 * 24 * 365), "/");
}
?>
