<?
define("HIDE_SIDEBAR", true);
require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/header.php");
$APPLICATION->SetTitle(GetMessage('ORDERING'));
?>
    <section class="pagename bridge-bg">
        <h2 class="pagename__title"><?= GetMessage('ORDERING') ?></h2>
    </section>
    <section class="order">
        <div class="wr">
            <div class="order__content">
                <? $APPLICATION->IncludeComponent(
                    "bitrix:sale.order.ajax",
                    "sale_order",
                    Array(
                        "ACTION_VARIABLE" => "soa-action",
                        "ADDITIONAL_PICT_PROP_11" => "-",
                        "ADDITIONAL_PICT_PROP_19" => "-",
                        "ALLOW_APPEND_ORDER" => "N",
                        "ALLOW_AUTO_REGISTER" => "Y",
                        "ALLOW_NEW_PROFILE" => "N",
                        "ALLOW_USER_PROFILES" => "N",
                        "BASKET_IMAGES_SCALING" => "adaptive",
                        "BASKET_POSITION" => "before",
                        "COMPATIBLE_MODE" => "N",
                        "COMPONENT_TEMPLATE" => "sale_order",
                        "COUNT_DELIVERY_TAX" => "N",
                        "COUNT_DISCOUNT_4_ALL_QUANTITY" => "N",
                        "DELIVERIES_PER_PAGE" => "9",
                        "DELIVERY_FADE_EXTRA_SERVICES" => "N",
                        "DELIVERY_NO_AJAX" => "N",
                        "DELIVERY_NO_SESSION" => "Y",
                        "DELIVERY_TO_PAYSYSTEM" => "d2p",
                        "DISABLE_BASKET_REDIRECT" => "N",
                        "ONLY_FULL_PAY_FROM_ACCOUNT" => "N",
                        "PATH_TO_AUTH" => "/auth/",
                        "PATH_TO_BASKET" => "/personal/cart/",
                        "PATH_TO_ORDER" => "/personal/order/make/",
                        "PATH_TO_PAYMENT" => "/personal/order/payment/",
                        "PATH_TO_PERSONAL" => "/personal/order/",
                        "PAY_FROM_ACCOUNT" => "N",
                        "PAY_SYSTEMS_PER_PAGE" => "9",
                        "PICKUPS_PER_PAGE" => "5",
                        "PICKUP_MAP_TYPE" => "yandex",
                        "PRODUCT_COLUMNS_HIDDEN" => array(),
                        "PRODUCT_COLUMNS_VISIBLE" => array(0 => "PREVIEW_PICTURE", 1 => "PROPS",),
                        "PROPS_FADE_LIST_1" => array(),
                        "PROPS_FADE_LIST_2" => array(),
                        "PROPS_FADE_LIST_3" => array(),
                        "PROP_1" => "",
                        "SEND_NEW_USER_NOTIFY" => "N",
                        "SERVICES_IMAGES_SCALING" => "adaptive",
                        "SET_TITLE" => "Y",
                        "SHOW_ACCOUNT_NUMBER" => "Y",
                        "SHOW_BASKET_HEADERS" => "N",
                        "SHOW_COUPONS_BASKET" => "N",
                        "SHOW_COUPONS_DELIVERY" => "N",
                        "SHOW_COUPONS_PAY_SYSTEM" => "N",
                        "SHOW_DELIVERY_INFO_NAME" => "N",
                        "SHOW_DELIVERY_LIST_NAMES" => "N",
                        "SHOW_DELIVERY_PARENT_NAMES" => "N",
                        "SHOW_MAP_IN_PROPS" => "N",
                        "SHOW_NEAREST_PICKUP" => "N",
                        "SHOW_NOT_CALCULATED_DELIVERIES" => "L",
                        "SHOW_ORDER_BUTTON" => "final_step",
                        "SHOW_PAY_SYSTEM_INFO_NAME" => "N",
                        "SHOW_PAY_SYSTEM_LIST_NAMES" => "N",
                        "SHOW_PICKUP_MAP" => "N",
                        "SHOW_STORES_IMAGES" => "N",
                        "SHOW_TOTAL_ORDER_BUTTON" => "N",
                        "SHOW_VAT_PRICE" => "N",
                        "SKIP_USELESS_BLOCK" => "Y",
                        "SPOT_LOCATION_BY_GEOIP" => "Y",
                        "TEMPLATE_LOCATION" => "popup",
                        "TEMPLATE_THEME" => "blue",
                        "USER_CONSENT" => "N",
                        "USER_CONSENT_ID" => "1",
                        "USER_CONSENT_IS_CHECKED" => "Y",
                        "USER_CONSENT_IS_LOADED" => "Y",
                        "USE_CUSTOM_ADDITIONAL_MESSAGES" => "N",
                        "USE_CUSTOM_ERROR_MESSAGES" => "N",
                        "USE_CUSTOM_MAIN_MESSAGES" => "N",
                        "USE_ENHANCED_ECOMMERCE" => "N",
                        "USE_PHONE_NORMALIZATION" => "Y",
                        "USE_PRELOAD" => "N",
                        "USE_PREPAYMENT" => "N",
                        "USE_YM_GOALS" => "N"
                    )
                ); ?>

                <div class="block block1"></div>
                <div class="block block2"></div>
                <div class="block block3"></div>
                <div class="block block4"></div>
                <div class="block block5"></div>
                <div class="block block6"></div>
                <div class="block block7"></div>
                <div class="block block8"></div>

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
        ); ?> </section>

<? require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/footer.php"); ?>