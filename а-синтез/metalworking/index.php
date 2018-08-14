<?
require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/header.php");
$APPLICATION->SetTitle(GetMessage('METALL'));
?>
    <section class="pagename metalworking-bg">
    <h2 class="pagename__title metalworking__title"><?= GetMessage('METALL'); ?></h2>
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
    <section class="metalworking">
        <div class="wr">
            <div class="metalworking__content">
                <div class="metalworking__about">
                    <? if (LANGUAGE_ID == 'ru') {
                        $APPLICATION->IncludeComponent(
                            "bitrix:main.include",
                            "include_files",
                            Array(
                                "AREA_FILE_SHOW" => "file",
                                "EDIT_TEMPLATE" => "",
                                "PATH" => SITE_TEMPLATE_PATH . "/include_areas/metalloobrabotka_area.php"
                            )
                        );
                    } else {
                        $APPLICATION->IncludeComponent(
                            "bitrix:main.include",
                            "include_files",
                            Array(
                                "AREA_FILE_SHOW" => "file",
                                "EDIT_TEMPLATE" => "",
                                "PATH" => SITE_TEMPLATE_PATH . "/include_areas/en_metalloobrabotka_area.php"
                            )
                        );
                    }
                    ?>
                </div>
                <? $APPLICATION->IncludeComponent(
                    "bitrix:news.list",
                    "metalworking",
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
                        "DETAIL_URL" => "#SITE_DIR#/metalworking/#ELEMENT_CODE#/",
                        "DISPLAY_BOTTOM_PAGER" => "N",
                        "DISPLAY_DATE" => "N",
                        "DISPLAY_NAME" => "Y",
                        "DISPLAY_PICTURE" => "Y",
                        "DISPLAY_PREVIEW_TEXT" => "Y",
                        "DISPLAY_TOP_PAGER" => "N",
                        "FIELD_CODE" => array(
                            0 => "CODE",
                            1 => "XML_ID",
                            2 => "NAME",
                            3 => "PREVIEW_TEXT",
                            4 => "PREVIEW_PICTURE",
                            5 => "DETAIL_TEXT",
                            6 => "DETAIL_PICTURE",
                            7 => "IBLOCK_CODE",
                            8 => "",
                        ),
                        "FILTER_NAME" => "",
                        "HIDE_LINK_WHEN_NO_DETAIL" => "Y",
                        "IBLOCK_ID" => "17",
                        "IBLOCK_TYPE" => "metalworking",
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
                            0 => "METALLANONS",
                            1 => "METALLTITLE",
                            2 => "METALLDESCRIPTION",
                            3 => "",
                        ),
                        "SET_BROWSER_TITLE" => "Y",
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
                        "COMPONENT_TEMPLATE" => "metalworking",
                        "FILE_404" => ""
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
                <div class="block block6">
                </div>
                <div class="block block7">
                </div>
                <div class="block block8">
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