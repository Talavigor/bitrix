<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php");

if (CModule::IncludeModule("sale") && CModule::IncludeModule("catalog")) {

    $PRODUCT_ID = $_POST["sendData"]["id"];
    $QUANTITY = $_POST["sendData"]["count"];

    Add2BasketByProductID($PRODUCT_ID, $QUANTITY);

    $APPLICATION->IncludeComponent(
        "bitrix:sale.basket.basket.line",
        "basket.small",
        array(
            "HIDE_ON_BASKET_PAGES" => "N",
            "PATH_TO_AUTHORIZE" => "",
            "PATH_TO_BASKET" => SITE_DIR . "personal/cart/",
            "PATH_TO_ORDER" => SITE_DIR . "personal/order/",
            "PATH_TO_PERSONAL" => SITE_DIR . "personal/",
            "PATH_TO_PROFILE" => SITE_DIR . "personal/",
            "PATH_TO_REGISTER" => SITE_DIR . "login/",
            "POSITION_FIXED" => "N",
            "SHOW_AUTHOR" => "N",
            "SHOW_EMPTY_VALUES" => "Y",
            "SHOW_NUM_PRODUCTS" => "Y",
            "SHOW_PERSONAL_LINK" => "N",
            "SHOW_PRODUCTS" => "Y",
            "SHOW_TOTAL_PRICE" => "N",
            "COMPONENT_TEMPLATE" => "basket.small",
            "SHOW_DELAY" => "N",
            "SHOW_NOTAVAIL" => "N",
            "SHOW_IMAGE" => "Y",
            "SHOW_PRICE" => "N",
            "SHOW_SUMMARY" => "N"
        ),
        false
    );

}
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/epilog_after.php");
?>

