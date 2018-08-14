<?
require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/header.php");
$APPLICATION->SetTitle("Доставка");
?>
    <section class="pagename">
    <h2 class="pagename__title"><?= GetMessage('DELIV') ?></h2>
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
    <section class="delivery">
        <div class="wr">
            <div class="delivery__content">
                <h2 class="delivery__title">3 <?= GetMessage('DELIVM') ?></h2>

                <? $APPLICATION->IncludeComponent(
                    "bitrix:news.list",
                    "delivery",
                    array(
                        "ACTIVE_DATE_FORMAT" => "d.m.Y",
                        "ADD_SECTIONS_CHAIN" => "N",
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
                        "DISPLAY_BOTTOM_PAGER" => "N",
                        "DISPLAY_DATE" => "N",
                        "DISPLAY_NAME" => "Y",
                        "DISPLAY_PICTURE" => "Y",
                        "DISPLAY_PREVIEW_TEXT" => "Y",
                        "DISPLAY_TOP_PAGER" => "N",
                        "FIELD_CODE" => array(
                            0 => "",
                            1 => "",
                        ),
                        "FILTER_NAME" => "",
                        "HIDE_LINK_WHEN_NO_DETAIL" => "N",
                        "IBLOCK_ID" => "18",
                        "IBLOCK_TYPE" => "delivery",
                        "INCLUDE_IBLOCK_INTO_CHAIN" => "N",
                        "INCLUDE_SUBSECTIONS" => "N",
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
                            0 => "DELIVERYTITLE",
                            1 => "DESCRIPTIONTITLE",
                            2 => "",
                        ),
                        "SET_BROWSER_TITLE" => "N",
                        "SET_LAST_MODIFIED" => "N",
                        "SET_META_DESCRIPTION" => "Y",
                        "SET_META_KEYWORDS" => "Y",
                        "SET_STATUS_404" => "Y",
                        "SET_TITLE" => "N",
                        "SHOW_404" => "Y",
                        "SORT_BY1" => "ACTIVE_FROM",
                        "SORT_BY2" => "SORT",
                        "SORT_ORDER1" => "DESC",
                        "SORT_ORDER2" => "ASC",
                        "STRICT_SECTION_CHECK" => "N",
                        "COMPONENT_TEMPLATE" => "delivery",
                        "FILE_404" => ""
                    ),
                    false
                ); ?>
                <div class="delivery__pay">
                    <? if (LANGUAGE_ID == 'ru') {
                        $APPLICATION->IncludeComponent(
                            "bitrix:main.include",
                            "include_files",
                            Array(
                                "AREA_FILE_SHOW" => "file",
                                "EDIT_TEMPLATE" => "",
                                "PATH" => SITE_TEMPLATE_PATH . "/include_areas/delivery_area.php"
                            )
                        );
                    } else {
                        $APPLICATION->IncludeComponent(
                            "bitrix:main.include",
                            "include_files",
                            Array(
                                "AREA_FILE_SHOW" => "file",
                                "EDIT_TEMPLATE" => "",
                                "PATH" => SITE_TEMPLATE_PATH . "/include_areas/en_delivery_area.php"
                            )
                        );
                    }

                    ?>
                </div>
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
                <div class="block block6">
                </div>
                <div class="block block7">
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