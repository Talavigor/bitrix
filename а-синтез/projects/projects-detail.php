<?
require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/header.php");
$APPLICATION->SetTitle("news_single");
?>

    <section class="pagename bridge-bg">
        <h2 class="pagename__title"><?= GetMessage('PROJECTS') ?></h2>
    </section>
<? $APPLICATION->IncludeComponent(
    "bitrix:breadcrumb",
    "breadcrumb",
    array(
        "PATH" => "",
        "SITE_ID" => "s1",
        "START_FROM" => "0",
        "COMPONENT_TEMPLATE" => "breadcrumb"
    ),
    false
); ?>


<? $APPLICATION->IncludeComponent(
    "bitrix:news.detail",
    "projects_single",
    array(
        "ACTIVE_DATE_FORMAT" => "d.m.Y",
        "ADD_ELEMENT_CHAIN" => "N",
        "ADD_SECTIONS_CHAIN" => "N",
        "AJAX_MODE" => "N",
        "AJAX_OPTION_ADDITIONAL" => "",
        "AJAX_OPTION_HISTORY" => "N",
        "AJAX_OPTION_JUMP" => "N",
        "AJAX_OPTION_STYLE" => "Y",
        "BROWSER_TITLE" => "NAME",
        "CACHE_GROUPS" => "Y",
        "CACHE_TIME" => "36000000",
        "CACHE_TYPE" => "N",
        "CHECK_DATES" => "Y",
        "DETAIL_URL" => "#SITE_DIR#/projects/#ELEMENT_CODE#",
        "DISPLAY_BOTTOM_PAGER" => "N",
        "DISPLAY_DATE" => "N",
        "DISPLAY_NAME" => "Y",
        "DISPLAY_PICTURE" => "Y",
        "DISPLAY_PREVIEW_TEXT" => "Y",
        "DISPLAY_TOP_PAGER" => "N",
        "ELEMENT_CODE" => $_REQUEST["ELEMENT_CODE"],
        "ELEMENT_ID" => $_REQUEST["ELEMENT_ID"],
        "FIELD_CODE" => array(
            0 => "NAME",
            1 => "PREVIEW_TEXT",
            2 => "PREVIEW_PICTURE",
            3 => "DETAIL_TEXT",
            4 => "DETAIL_PICTURE",
            5 => "",
        ),
        "IBLOCK_ID" => "16",
        "IBLOCK_TYPE" => "info_projects",
        "IBLOCK_URL" => "#SITE_DIR#/projects/",
        "INCLUDE_IBLOCK_INTO_CHAIN" => "N",
        "MESSAGE_404" => "",
        "META_DESCRIPTION" => "-",
        "META_KEYWORDS" => "-",
        "PAGER_BASE_LINK_ENABLE" => "N",
        "PAGER_SHOW_ALL" => "N",
        "PAGER_TEMPLATE" => ".default",
        "PAGER_TITLE" => "Страница",
        "PROPERTY_CODE" => array(
            0 => "TITLEPROJECTS",
            1 => "ANONSPROJECTS",
            2 => "DESCRIPTIONPROJECTS",
            3 => "",
        ),
        "SET_BROWSER_TITLE" => "Y",
        "SET_CANONICAL_URL" => "N",
        "SET_LAST_MODIFIED" => "N",
        "SET_META_DESCRIPTION" => "Y",
        "SET_META_KEYWORDS" => "Y",
        "SET_STATUS_404" => "Y",
        "SET_TITLE" => "Y",
        "SHOW_404" => "Y",
        "STRICT_SECTION_CHECK" => "N",
        "USE_PERMISSIONS" => "N",
        "USE_SHARE" => "N",
        "COMPONENT_TEMPLATE" => "projects_single",
        "FILE_404" => ""
    ),
    false
); ?>
    <section id="map">
        <? $APPLICATION->IncludeComponent(
            "bitrix:map.google.view",
            "google_maps",
            Array(
                "API_KEY" => "AIzaSyAJIoCrpsYrryrcVPEYyPUa-qfFHZMCg8M",
                "CONTROLS" => array("SMALL_ZOOM_CONTROL", "TYPECONTROL", "SCALELINE"),
                "INIT_MAP_TYPE" => "ROADMAP",
                "MAP_DATA" => "a:4:{s:10:\"google_lat\";d:50.4572386;s:10:\"google_lon\";d:30.649250800000004;s:12:\"google_scale\";i:16;s:10:\"PLACEMARKS\";a:1:{i:0;a:3:{s:4:\"TEXT\";s:23:\"А-Синтез###RN###\";s:3:\"LON\";d:30.649100596295;s:3:\"LAT\";d:50.457805532719;}}}",
                "MAP_HEIGHT" => "281",
                "MAP_ID" => "",
                "MAP_WIDTH" => "100%",
                "OPTIONS" => array("ENABLE_SCROLL_ZOOM", "ENABLE_DBLCLICK_ZOOM", "ENABLE_DRAGGING", "ENABLE_KEYBOARD")
            )
        ); ?> </section>
<? require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/footer.php"); ?>