<?
require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/header.php");

global $APPLICATION;
$APPLICATION->AddHeadString('<link href="http://' . SITE_SERVER_NAME . $arResult['CANONICAL_PAGE_URL'] . '/contacts" rel="canonical" />', true);
$APPLICATION->SetTitle("Контакты");
?>
    <section class="pagename">
    <h2 class="pagename__title"><? GetMessage('CONTACT') ?></h2>
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
        ); ?> </section>
    <section class="feedback">
    <div class="wr">
        <div class="feedback__content">
            <? $APPLICATION->IncludeComponent(
                "bitrix:breadcrumb",
                "breadcrumb",
                Array(
                    "PATH" => "",
                    "SITE_ID" => "s1",
                    "START_FROM" => "0"
                )
            ); ?>
            <div class="feedback__container">
                <div class="feedback__send">
                    <h3 class="feedback__title"><?= GetMessage('FEED') ?></h3>
                    <? $APPLICATION->IncludeComponent(
                        "bitrix:main.feedback",
                        "feedback",
                        Array(
                            "COMPONENT_TEMPLATE" => "feedback",
                            "EMAIL_TO" => "sale@a-sintez.com",
                            "EVENT_MESSAGE_ID" => array(),
                            "OK_TEXT" => GetMessage('MESSAGE'),
                            "REQUIRED_FIELDS" => array(0 => "NAME", 1 => "EMAIL", 2 => "MESSAGE",),
                            "USE_CAPTCHA" => "Y"
                        )
                    ); ?>
                </div>
                <div class="feedback__details">
                    <div class="feedback__contacts">
 <span class="contacts__location"> <? $APPLICATION->IncludeComponent(
         "bitrix:main.include",
         ".default",
         Array(
             "0" => "template",
             "AREA_FILE_SHOW" => "file",
             "COMPONENT_TEMPLATE" => ".default",
             "EDIT_TEMPLATE" => "",
             "PATH" => "/local/templates/A-Sintez/include_areas/adres.php"
         )
     ); ?></span> <span class="contacts__phone"><? $APPLICATION->IncludeComponent(
                                "bitrix:main.include",
                                ".default",
                                Array(
                                    "0" => "template",
                                    "AREA_FILE_SHOW" => "file",
                                    "COMPONENT_TEMPLATE" => ".default",
                                    "EDIT_TEMPLATE" => "",
                                    "PATH" => "/local/templates/A-Sintez/include_areas/phone_footer.php"
                                )
                            ); ?></span> <a href="mailto:sale@asynt.net"
                                            class="contacts__mail"><? $APPLICATION->IncludeComponent(
                                "bitrix:main.include",
                                ".default",
                                Array(
                                    "0" => "template",
                                    "AREA_FILE_SHOW" => "file",
                                    "COMPONENT_TEMPLATE" => ".default",
                                    "EDIT_TEMPLATE" => "",
                                    "PATH" => "/local/templates/A-Sintez/include_areas/email.php"
                                )
                            ); ?></a>
                    </div>
                    <div class="feedback__bank">
                        <span class="feedback__info feedback__info--bold"><?= GetMessage('REQ') ?></span><br>
                        <span class="feedback__info ">
					<? if (LANGUAGE_ID == 'ru') {
                        $APPLICATION->IncludeComponent(
                            "bitrix:main.include",
                            ".default",
                            Array(
                                "0" => "template",
                                "AREA_FILE_SHOW" => "file",
                                "COMPONENT_TEMPLATE" => ".default",
                                "EDIT_TEMPLATE" => "",
                                "PATH" => "/local/templates/A-Sintez/include_areas/requisites_area.php"
                            )
                        );
                    } else {
                        $APPLICATION->IncludeComponent(
                            "bitrix:main.include",
                            ".default",
                            Array(
                                "0" => "template",
                                "AREA_FILE_SHOW" => "file",
                                "COMPONENT_TEMPLATE" => ".default",
                                "EDIT_TEMPLATE" => "",
                                "PATH" => "/local/templates/A-Sintez/include_areas/en_requisites_area.php"
                            )
                        );
                    }
                    ?></span>
                    </div>
                </div>
            </div>
            <div class="xl-block xl-block--first">
            </div>
            <div class="xl-block xl-block--second">
            </div>
            <div class="m-block">
            </div>
        </div>
    </div>
    </section><? require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/footer.php"); ?>