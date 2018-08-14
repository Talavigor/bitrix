<?
require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/header.php");
$APPLICATION->SetTitle(GetMessage('NEWSN'));
?>
    <section class="pagename bridge-bg">
        <h2 class="pagename__title"><?= GetMessage('NEWSN') ?></h2>
    </section>
<? $APPLICATION->IncludeComponent(
    "bitrix:breadcrumb",
    "breadcrumb",
    Array(
        "PATH" => "",
        "SITE_ID" => "s1",
        "START_FROM" => "0"
    )
); ?>

    <section class="example">
        <div class="wr">
            <div class="example__content">
                <? $APPLICATION->IncludeComponent(
                    "bitrix:news",
                    "news_catalog",
                    array(
                        "ADD_ELEMENT_CHAIN" => "N",
                        "ADD_SECTIONS_CHAIN" => "N",
                        "AJAX_MODE" => "Y",
                        "AJAX_OPTION_ADDITIONAL" => "",
                        "AJAX_OPTION_HISTORY" => "N",
                        "AJAX_OPTION_JUMP" => "N",
                        "AJAX_OPTION_STYLE" => "Y",
                        "BROWSER_TITLE" => "-",
                        "CACHE_FILTER" => "N",
                        "CACHE_GROUPS" => "Y",
                        "CACHE_TIME" => "36000000",
                        "CACHE_TYPE" => "N",
                        "CHECK_DATES" => "Y",
                        "DETAIL_ACTIVE_DATE_FORMAT" => "d.m.Y",
                        "DETAIL_DISPLAY_BOTTOM_PAGER" => "Y",
                        "DETAIL_DISPLAY_TOP_PAGER" => "N",
                        "DETAIL_FIELD_CODE" => array(
                            0 => "ID",
                            1 => "CODE",
                            2 => "XML_ID",
                            3 => "NAME",
                            4 => "PREVIEW_TEXT",
                            5 => "PREVIEW_PICTURE",
                            6 => "DETAIL_TEXT",
                            7 => "DETAIL_PICTURE",
                            8 => "IBLOCK_TYPE_ID",
                            9 => "IBLOCK_ID",
                            10 => "IBLOCK_CODE",
                            11 => "IBLOCK_NAME",
                            12 => "IBLOCK_EXTERNAL_ID",
                            13 => "",
                        ),
                        "DETAIL_PAGER_SHOW_ALL" => "Y",
                        "DETAIL_PAGER_TEMPLATE" => "",
                        "DETAIL_PAGER_TITLE" => "Страница",
                        "DETAIL_PROPERTY_CODE" => array(
                            0 => "",
                            1 => "",
                        ),
                        "DETAIL_SET_CANONICAL_URL" => "N",
                        "DISPLAY_BOTTOM_PAGER" => "Y",
                        "DISPLAY_DATE" => "N",
                        "DISPLAY_NAME" => "N",
                        "DISPLAY_PICTURE" => "Y",
                        "DISPLAY_PREVIEW_TEXT" => "Y",
                        "DISPLAY_TOP_PAGER" => "N",
                        "HIDE_LINK_WHEN_NO_DETAIL" => "N",
                        "IBLOCK_ID" => "14",
                        "IBLOCK_TYPE" => "news",
                        "INCLUDE_IBLOCK_INTO_CHAIN" => "N",
                        "LIST_ACTIVE_DATE_FORMAT" => "d.m.Y",
                        "LIST_FIELD_CODE" => array(
                            0 => "NAME",
                            1 => "PREVIEW_TEXT",
                            2 => "PREVIEW_PICTURE",
                            3 => "DETAIL_TEXT",
                            4 => "DETAIL_PICTURE",
                            5 => "",
                        ),
                        "LIST_PROPERTY_CODE" => array(
                            0 => "ANONSNEWS",
                            1 => "TITLENEWS",
                            2 => "",
                        ),
                        "MESSAGE_404" => "",
                        "META_DESCRIPTION" => "-",
                        "META_KEYWORDS" => "-",
                        "NEWS_COUNT" => "4",
                        "PAGER_BASE_LINK_ENABLE" => "Y",
                        "PAGER_DESC_NUMBERING" => "N",
                        "PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
                        "PAGER_SHOW_ALL" => "Y",
                        "PAGER_SHOW_ALWAYS" => "N",
                        "PAGER_TEMPLATE" => ".default",
                        "PAGER_TITLE" => "Новости",
                        "PREVIEW_TRUNCATE_LEN" => "",
                        "SEF_MODE" => "Y",
                        "SET_LAST_MODIFIED" => "N",
                        "SET_STATUS_404" => "N",
                        "SET_TITLE" => "N",
                        "SHOW_404" => "N",
                        "SORT_BY1" => "ACTIVE_FROM",
                        "SORT_BY2" => "SORT",
                        "SORT_ORDER1" => "DESC",
                        "SORT_ORDER2" => "ASC",
                        "STRICT_SECTION_CHECK" => "N",
                        "USE_CATEGORIES" => "N",
                        "USE_FILTER" => "N",
                        "USE_PERMISSIONS" => "N",
                        "USE_RATING" => "N",
                        "USE_REVIEW" => "N",
                        "USE_RSS" => "N",
                        "USE_SEARCH" => "N",
                        "USE_SHARE" => "N",
                        "COMPONENT_TEMPLATE" => "news_catalog",
                        "SEF_FOLDER" => "/news/",
                        "PAGER_BASE_LINK" => "",
                        "PAGER_PARAMS_NAME" => "arrPager",
                        "SEF_URL_TEMPLATES" => array(
                            "news" => "",
                            "section" => "",
                            "detail" => "#ELEMENT_CODE#/",
                        )
                    ),
                    false
                ); ?>
                <div class="block block1">
                </div>
                <div class="block block2">
                </div>
                <div class="block block3">
                </div>
                <div class="block block4">
                </div>
                <div class="block block5">
                </div>
            </div>
        </div>
    </section>
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
); ?> </section><? require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/footer.php"); ?>