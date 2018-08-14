<?
define("FRONT_PAGE", "Y");
require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/header.php");

global $APPLICATION;
$APPLICATION->AddHeadString('<link href="http://' . SITE_SERVER_NAME . $arResult['CANONICAL_PAGE_URL'] . '" rel="canonical" />', true);

$APPLICATION->SetPageProperty("keywords", "");
$APPLICATION->SetPageProperty("title", "А-Синтез");
$APPLICATION->SetPageProperty("NOT_SHOW_NAV_CHAIN", "Y");
$APPLICATION->SetTitle("А-Синтез");
?><? if ($APPLICATION->GetCurPage() == '/') {
    $APPLICATION->IncludeComponent(
        "bitrix:news.list",
        "slider",
        array(
            "DISPLAY_DATE" => "Y",
            "DISPLAY_NAME" => "Y",
            "DISPLAY_PICTURE" => "Y",
            "DISPLAY_PREVIEW_TEXT" => "Y",
            "AJAX_MODE" => "N",
            "IBLOCK_TYPE" => "news",
            "IBLOCK_ID" => "4",
            "NEWS_COUNT" => "20",
            "SORT_BY1" => "ACTIVE_FROM",
            "SORT_ORDER1" => "DESC",
            "SORT_BY2" => "SORT",
            "SORT_ORDER2" => "ASC",
            "FILTER_NAME" => "",
            "FIELD_CODE" => array(
                0 => "",
                1 => "SLIDER_LINK",
                2 => "",
            ),
            "PROPERTY_CODE" => array(
                0 => "",
                1 => "SLIDER_LINK",
                2 => "",
            ),
            "CHECK_DATES" => "Y",
            "DETAIL_URL" => "",
            "PREVIEW_TRUNCATE_LEN" => "",
            "ACTIVE_DATE_FORMAT" => "",
            "SET_TITLE" => "N",
            "SET_STATUS_404" => "Y",
            "INCLUDE_IBLOCK_INTO_CHAIN" => "N",
            "ADD_SECTIONS_CHAIN" => "N",
            "HIDE_LINK_WHEN_NO_DETAIL" => "N",
            "PARENT_SECTION" => "",
            "PARENT_SECTION_CODE" => "",
            "CACHE_TYPE" => "A",
            "CACHE_TIME" => "36000000",
            "CACHE_NOTES" => "",
            "CACHE_FILTER" => "N",
            "CACHE_GROUPS" => "N",
            "DISPLAY_TOP_PAGER" => "N",
            "DISPLAY_BOTTOM_PAGER" => "N",
            "PAGER_TITLE" => "Слайдер",
            "PAGER_SHOW_ALWAYS" => "N",
            "PAGER_TEMPLATE" => "",
            "PAGER_DESC_NUMBERING" => "N",
            "PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
            "PAGER_SHOW_ALL" => "N",
            "AJAX_OPTION_JUMP" => "N",
            "AJAX_OPTION_STYLE" => "Y",
            "AJAX_OPTION_HISTORY" => "N",
            "AJAX_OPTION_ADDITIONAL" => "",
            "COMPONENT_TEMPLATE" => "slider",
            "SET_BROWSER_TITLE" => "Y",
            "SET_META_KEYWORDS" => "Y",
            "SET_META_DESCRIPTION" => "Y",
            "SET_LAST_MODIFIED" => "N",
            "INCLUDE_SUBSECTIONS" => "Y",
            "STRICT_SECTION_CHECK" => "N",
            "COMPOSITE_FRAME_MODE" => "A",
            "COMPOSITE_FRAME_TYPE" => "AUTO",
            "PAGER_BASE_LINK_ENABLE" => "N",
            "SHOW_404" => "Y",
            "FILE_404" => ""
        ),
        false
    );
}
?>
    <main>
        <div class="wr">
            <? $APPLICATION->IncludeComponent(
                "bitrix:news.list",
                "range_home",
                Array(
                    "ACTIVE_DATE_FORMAT" => "d.m.Y",
                    "ADD_SECTIONS_CHAIN" => "Y",
                    "AJAX_MODE" => "N",
                    "AJAX_OPTION_ADDITIONAL" => "",
                    "AJAX_OPTION_HISTORY" => "N",
                    "AJAX_OPTION_JUMP" => "N",
                    "AJAX_OPTION_STYLE" => "Y",
                    "CACHE_FILTER" => "N",
                    "CACHE_GROUPS" => "Y",
                    "CACHE_TIME" => "36000000",
                    "CACHE_TYPE" => "A",
                    "CHECK_DATES" => "Y",
                    "DETAIL_URL" => "",
                    "DISPLAY_BOTTOM_PAGER" => "Y",
                    "DISPLAY_DATE" => "Y",
                    "DISPLAY_NAME" => "Y",
                    "DISPLAY_PICTURE" => "Y",
                    "DISPLAY_PREVIEW_TEXT" => "Y",
                    "DISPLAY_TOP_PAGER" => "N",
                    "FIELD_CODE" => array("ID", ""),
                    "FILE_404" => "",
                    "FILTER_NAME" => "",
                    "HIDE_LINK_WHEN_NO_DETAIL" => "N",
                    "IBLOCK_ID" => "13",
                    "IBLOCK_TYPE" => "-",
                    "INCLUDE_IBLOCK_INTO_CHAIN" => "Y",
                    "INCLUDE_SUBSECTIONS" => "Y",
                    "MESSAGE_404" => "",
                    "NEWS_COUNT" => "20",
                    "PAGER_BASE_LINK_ENABLE" => "N",
                    "PAGER_DESC_NUMBERING" => "N",
                    "PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
                    "PAGER_SHOW_ALL" => "N",
                    "PAGER_SHOW_ALWAYS" => "N",
                    "PAGER_TEMPLATE" => ".default",
                    "PAGER_TITLE" => "Новости",
                    "PARENT_SECTION" => "",
                    "PARENT_SECTION_CODE" => "",
                    "PREVIEW_TRUNCATE_LEN" => "",
                    "PROPERTY_CODE" => array("LINK_RANGE", "FOTO_RANGE", ""),
                    "SET_BROWSER_TITLE" => "Y",
                    "SET_LAST_MODIFIED" => "N",
                    "SET_META_DESCRIPTION" => "Y",
                    "SET_META_KEYWORDS" => "Y",
                    "SET_STATUS_404" => "Y",
                    "SET_TITLE" => "Y",
                    "SHOW_404" => "Y",
                    "SORT_BY1" => "ACTIVE_FROM",
                    "SORT_BY2" => "SORT",
                    "SORT_ORDER1" => "DESC",
                    "SORT_ORDER2" => "ASC",
                    "STRICT_SECTION_CHECK" => "N"
                )
            ); ?>
            <div class="recently">
                <div class="title__border">
                    <span class="title__name">Недавно купили</span>
                </div>
                <div class="recently__container">
                    <? $APPLICATION->IncludeComponent(
                        "bitrix:catalog.top",
                        "top_element_home",
                        Array(
                            "ACTION_VARIABLE" => "action",
                            "ADD_PICT_PROP" => "-",
                            "ADD_PROPERTIES_TO_BASKET" => "N",
                            "ADD_TO_BASKET_ACTION" => "ADD",
                            "BASKET_URL" => "/personal/cart",
                            "CACHE_FILTER" => "N",
                            "CACHE_GROUPS" => "Y",
                            "CACHE_TIME" => "36000000",
                            "CACHE_TYPE" => "A",
                            "COMPARE_NAME" => "CATALOG_COMPARE_LIST",
                            "COMPATIBLE_MODE" => "Y",
                            "CONVERT_CURRENCY" => "N",
                            "CUSTOM_FILTER" => "",
                            "DETAIL_URL" => "",
                            "DISPLAY_COMPARE" => "N",
                            "ELEMENT_COUNT" => "6",
                            "ELEMENT_SORT_FIELD" => "shows",
                            "ELEMENT_SORT_FIELD2" => "sort",
                            "ELEMENT_SORT_ORDER" => "desc",
                            "ELEMENT_SORT_ORDER2" => "desc",
                            "ENLARGE_PRODUCT" => "STRICT",
                            "FILTER_NAME" => "",
                            "HIDE_NOT_AVAILABLE" => "N",
                            "HIDE_NOT_AVAILABLE_OFFERS" => "N",
                            "IBLOCK_ID" => "11",
                            "IBLOCK_TYPE" => "catalog",
                            "LABEL_PROP" => array(),
                            "LINE_ELEMENT_COUNT" => "3",
                            "MESS_BTN_ADD_TO_BASKET" => "В корзину",
                            "MESS_BTN_BUY" => "Купить",
                            "MESS_BTN_COMPARE" => "Сравнить",
                            "MESS_BTN_DETAIL" => "Подробнее",
                            "MESS_NOT_AVAILABLE" => "Нет в наличии",
                            "OFFERS_CART_PROPERTIES" => array("ART"),
                            "OFFERS_FIELD_CODE" => array("CODE", "NAME", "PREVIEW_PICTURE", "DETAIL_PICTURE", "SHOW_COUNTER", ""),
                            "OFFERS_LIMIT" => "6",
                            "OFFERS_PROPERTY_CODE" => array("ART", ""),
                            "OFFERS_SORT_FIELD" => "sort",
                            "OFFERS_SORT_FIELD2" => "id",
                            "OFFERS_SORT_ORDER" => "asc",
                            "OFFERS_SORT_ORDER2" => "desc",
                            "PARTIAL_PRODUCT_PROPERTIES" => "N",
                            "PRICE_CODE" => array("BASE"),
                            "PRICE_VAT_INCLUDE" => "N",
                            "PRODUCT_BLOCKS_ORDER" => "price,props,sku,quantityLimit,quantity,buttons",
                            "PRODUCT_DISPLAY_MODE" => "N",
                            "PRODUCT_ID_VARIABLE" => "id",
                            "PRODUCT_PROPERTIES" => array(""),
                            "PRODUCT_PROPS_VARIABLE" => "prop",
                            "PRODUCT_QUANTITY_VARIABLE" => "quantity",
                            "PRODUCT_ROW_VARIANTS" => "={{'VARIANT':'2'}", "BIG_DATA':false", "={{'VARIANT':'2'}", "BIG_DATA':false",
                            "PRODUCT_SUBSCRIPTION" => "N",
                            "PROPERTY_CODE" => array("CATALOGTITLE", ""),
                            "PROPERTY_CODE_MOBILE" => array("CATALOGTITLE"),
                            "ROTATE_TIMER" => "30",
                            "SECTION_URL" => "",
                            "SEF_MODE" => "N",
                            "SHOW_CLOSE_POPUP" => "N",
                            "SHOW_DISCOUNT_PERCENT" => "N",
                            "SHOW_MAX_QUANTITY" => "N",
                            "SHOW_OLD_PRICE" => "N",
                            "SHOW_PAGINATION" => "Y",
                            "SHOW_PRICE_COUNT" => "1",
                            "SHOW_SLIDER" => "N",
                            "TEMPLATE_THEME" => "blue",
                            "USE_ENHANCED_ECOMMERCE" => "N",
                            "USE_PRICE_COUNT" => "N",
                            "USE_PRODUCT_QUANTITY" => "N",
                            "VIEW_MODE" => "SECTION"
                        )
                    ); ?>
                </div>
            </div>
        </div>
    </main>
    <section class="projects">
        <div class="wr">
            <div class="projects__content">
                <? if (LANGUAGE_ID == 'ru') {
                    $APPLICATION->IncludeComponent(
                        "bitrix:main.include",
                        "include_files",
                        Array(
                            "AREA_FILE_SHOW" => "file",
                            "EDIT_TEMPLATE" => "",
                            "PATH" => SITE_TEMPLATE_PATH . "/include_areas/best_projects.php"
                        )
                    );
                } else {
                    $APPLICATION->IncludeComponent(
                        "bitrix:main.include",
                        "include_files",
                        Array(
                            "AREA_FILE_SHOW" => "file",
                            "EDIT_TEMPLATE" => "",
                            "PATH" => SITE_TEMPLATE_PATH . "/include_areas/en_best_projects.php"
                        )
                    );
                } ?><? $APPLICATION->IncludeComponent(
                    "bitrix:news.list",
                    "slider_best_projects",
                    Array(
                        "ACTIVE_DATE_FORMAT" => "d.m.Y",
                        "ADD_SECTIONS_CHAIN" => "Y",
                        "AJAX_MODE" => "N",
                        "AJAX_OPTION_ADDITIONAL" => "",
                        "AJAX_OPTION_HISTORY" => "N",
                        "AJAX_OPTION_JUMP" => "N",
                        "AJAX_OPTION_STYLE" => "Y",
                        "CACHE_FILTER" => "N",
                        "CACHE_GROUPS" => "Y",
                        "CACHE_TIME" => "36000000",
                        "CACHE_TYPE" => "N",
                        "CHECK_DATES" => "Y",
                        "DETAIL_URL" => "",
                        "DISPLAY_BOTTOM_PAGER" => "Y",
                        "DISPLAY_DATE" => "Y",
                        "DISPLAY_NAME" => "Y",
                        "DISPLAY_PICTURE" => "Y",
                        "DISPLAY_PREVIEW_TEXT" => "Y",
                        "DISPLAY_TOP_PAGER" => "N",
                        "FIELD_CODE" => array("ID", "best_slider", ""),
                        "FILE_404" => "",
                        "FILTER_NAME" => "",
                        "HIDE_LINK_WHEN_NO_DETAIL" => "N",
                        "IBLOCK_ID" => "5",
                        "IBLOCK_TYPE" => "-",
                        "INCLUDE_IBLOCK_INTO_CHAIN" => "Y",
                        "INCLUDE_SUBSECTIONS" => "Y",
                        "MESSAGE_404" => "",
                        "NEWS_COUNT" => "20",
                        "PAGER_BASE_LINK_ENABLE" => "N",
                        "PAGER_DESC_NUMBERING" => "N",
                        "PAGER_DESC_NUMBERING_CACHE_TIME" => "",
                        "PAGER_SHOW_ALL" => "N",
                        "PAGER_SHOW_ALWAYS" => "N",
                        "PAGER_TEMPLATE" => ".default",
                        "PAGER_TITLE" => "Слайдер",
                        "PARENT_SECTION" => "",
                        "PARENT_SECTION_CODE" => "",
                        "PREVIEW_TRUNCATE_LEN" => "",
                        "PROPERTY_CODE" => array("", "PHOTO_PROJECT", "LOGO_PROJECT", ""),
                        "SET_BROWSER_TITLE" => "Y",
                        "SET_LAST_MODIFIED" => "N",
                        "SET_META_DESCRIPTION" => "Y",
                        "SET_META_KEYWORDS" => "Y",
                        "SET_STATUS_404" => "Y",
                        "SET_TITLE" => "Y",
                        "SHOW_404" => "Y",
                        "SORT_BY1" => "ACTIVE_FROM",
                        "SORT_BY2" => "SORT",
                        "SORT_ORDER1" => "DESC",
                        "SORT_ORDER2" => "ASC",
                        "STRICT_SECTION_CHECK" => "N"
                    )
                ); ?>
            </div>
        </div>
    </section>
<? $APPLICATION->IncludeComponent(
    "bitrix:news.list",
    "slider_trust",
    array(
        "ACTIVE_DATE_FORMAT" => "d.m.Y",
        "ADD_SECTIONS_CHAIN" => "Y",
        "AJAX_MODE" => "N",
        "AJAX_OPTION_ADDITIONAL" => "",
        "AJAX_OPTION_HISTORY" => "N",
        "AJAX_OPTION_JUMP" => "N",
        "AJAX_OPTION_STYLE" => "Y",
        "CACHE_FILTER" => "N",
        "CACHE_GROUPS" => "Y",
        "CACHE_TIME" => "36000000",
        "CACHE_TYPE" => "A",
        "CHECK_DATES" => "Y",
        "COMPONENT_TEMPLATE" => "slider_trust",
        "DETAIL_URL" => "",
        "DISPLAY_BOTTOM_PAGER" => "Y",
        "DISPLAY_DATE" => "Y",
        "DISPLAY_NAME" => "Y",
        "DISPLAY_PICTURE" => "Y",
        "DISPLAY_PREVIEW_TEXT" => "Y",
        "DISPLAY_TOP_PAGER" => "N",
        "FIELD_CODE" => array(
            0 => "ID",
            1 => "",
        ),
        "FILTER_NAME" => "",
        "HIDE_LINK_WHEN_NO_DETAIL" => "N",
        "IBLOCK_ID" => "6",
        "IBLOCK_TYPE" => "-",
        "INCLUDE_IBLOCK_INTO_CHAIN" => "Y",
        "INCLUDE_SUBSECTIONS" => "Y",
        "MESSAGE_404" => "",
        "NEWS_COUNT" => "20",
        "PAGER_BASE_LINK_ENABLE" => "N",
        "PAGER_DESC_NUMBERING" => "N",
        "PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
        "PAGER_SHOW_ALL" => "N",
        "PAGER_SHOW_ALWAYS" => "N",
        "PAGER_TEMPLATE" => ".default",
        "PAGER_TITLE" => "Новости",
        "PARENT_SECTION" => "",
        "PARENT_SECTION_CODE" => "",
        "PREVIEW_TRUNCATE_LEN" => "",
        "PROPERTY_CODE" => array(
            0 => "",
            1 => "TRUST",
            2 => "",
        ),
        "SET_BROWSER_TITLE" => "Y",
        "SET_LAST_MODIFIED" => "N",
        "SET_META_DESCRIPTION" => "Y",
        "SET_META_KEYWORDS" => "Y",
        "SET_STATUS_404" => "Y",
        "SET_TITLE" => "Y",
        "SHOW_404" => "Y",
        "SORT_BY1" => "ACTIVE_FROM",
        "SORT_BY2" => "SORT",
        "SORT_ORDER1" => "DESC",
        "SORT_ORDER2" => "ASC",
        "STRICT_SECTION_CHECK" => "N",
        "COMPOSITE_FRAME_MODE" => "A",
        "COMPOSITE_FRAME_TYPE" => "AUTO",
        "FILE_404" => ""
    ),
    false
); ?><? $APPLICATION->IncludeComponent(
    "bitrix:news.list",
    "news_home",
    Array(
        "ACTIVE_DATE_FORMAT" => "d.m.Y",
        "ADD_SECTIONS_CHAIN" => "Y",
        "AJAX_MODE" => "N",
        "AJAX_OPTION_ADDITIONAL" => "",
        "AJAX_OPTION_HISTORY" => "N",
        "AJAX_OPTION_JUMP" => "N",
        "AJAX_OPTION_STYLE" => "Y",
        "CACHE_FILTER" => "N",
        "CACHE_GROUPS" => "Y",
        "CACHE_TIME" => "36000000",
        "CACHE_TYPE" => "A",
        "CHECK_DATES" => "Y",
        "COMPONENT_TEMPLATE" => "news_home",
        "DETAIL_URL" => "",
        "DISPLAY_BOTTOM_PAGER" => "Y",
        "DISPLAY_DATE" => "Y",
        "DISPLAY_NAME" => "Y",
        "DISPLAY_PICTURE" => "Y",
        "DISPLAY_PREVIEW_TEXT" => "Y",
        "DISPLAY_TOP_PAGER" => "N",
        "FIELD_CODE" => array(0 => "ID", 1 => "",),
        "FILE_404" => "",
        "FILTER_NAME" => "",
        "HIDE_LINK_WHEN_NO_DETAIL" => "N",
        "IBLOCK_ID" => "14",
        "IBLOCK_TYPE" => "news",
        "INCLUDE_IBLOCK_INTO_CHAIN" => "Y",
        "INCLUDE_SUBSECTIONS" => "Y",
        "MESSAGE_404" => "",
        "NEWS_COUNT" => "5",
        "PAGER_BASE_LINK_ENABLE" => "N",
        "PAGER_DESC_NUMBERING" => "N",
        "PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
        "PAGER_SHOW_ALL" => "N",
        "PAGER_SHOW_ALWAYS" => "N",
        "PAGER_TEMPLATE" => ".default",
        "PAGER_TITLE" => "Новости",
        "PARENT_SECTION" => "",
        "PARENT_SECTION_CODE" => "",
        "PREVIEW_TRUNCATE_LEN" => "",
        "PROPERTY_CODE" => array(0 => "", 1 => "TRUST", 2 => "",),
        "SET_BROWSER_TITLE" => "Y",
        "SET_LAST_MODIFIED" => "N",
        "SET_META_DESCRIPTION" => "Y",
        "SET_META_KEYWORDS" => "Y",
        "SET_STATUS_404" => "Y",
        "SET_TITLE" => "Y",
        "SHOW_404" => "Y",
        "SORT_BY1" => "ACTIVE_FROM",
        "SORT_BY2" => "SORT",
        "SORT_ORDER1" => "DESC",
        "SORT_ORDER2" => "ASC",
        "STRICT_SECTION_CHECK" => "N"
    )
); ?>
    <section class="about">
        <div class="wr">
            <div class="about__content">
                <div class="about__text">
                    <? if (LANGUAGE_ID == 'ru') {
                        $APPLICATION->IncludeComponent(
                            "bitrix:main.include",
                            "include_files",
                            Array(
                                "AREA_FILE_SHOW" => "file",
                                "EDIT_TEMPLATE" => "",
                                "PATH" => SITE_TEMPLATE_PATH . "/include_areas/about_area.php"
                            )
                        );
                    } else {
                        $APPLICATION->IncludeComponent(
                            "bitrix:main.include",
                            "include_files",
                            Array(
                                "AREA_FILE_SHOW" => "file",
                                "EDIT_TEMPLATE" => "",
                                "PATH" => SITE_TEMPLATE_PATH . "/include_areas/en_about_area.php"
                            )
                        );
                    }

                    ?><br>
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
); ?></section><?

require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/footer.php"); ?>