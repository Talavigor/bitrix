<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
IncludeTemplateLangFile(__FILE__);
?>
<!DOCTYPE html>
<html lang="<?= LANGUAGE_ID ?>">
<head>
    <script>
        function action_lang() {
            window.location = '?lang_ui=' + document.getElementsByName('Lang')[0].value;
        }
    </script>
    <meta charset="<?= SITE_CHARSET ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><? $APPLICATION->ShowTitle() ?></title>
    <script data-skip-moving="true" type="text/javascript"
            src="<?= SITE_TEMPLATE_PATH . '/js/jquery-3.3.1.min.js' ?>"></script>

    <?
    // мета-теги
    $APPLICATION->ShowMeta("robots", false, false);
    $APPLICATION->ShowMeta("keywords", false, false);
    $APPLICATION->ShowMeta("description", false, false);
    //канонический url
    $APPLICATION->ShowLink("canonical", null, false);

    $APPLICATION->ShowHead();
    $APPLICATION->SetAdditionalCSS(SITE_TEMPLATE_PATH . '/slick/slick.css');
    $APPLICATION->SetAdditionalCSS(SITE_TEMPLATE_PATH . '/slick/slick-theme.css');
    //   $APPLICATION->AddHeadScript(SITE_TEMPLATE_PATH . '/js/jquery-3.3.1.min.js');
    $APPLICATION->AddHeadScript(SITE_TEMPLATE_PATH . '/slick/slick.min.js');
    $APPLICATION->AddHeadScript(SITE_TEMPLATE_PATH . '/js/script.js');
    ?>


    <link rel="icon" href="/favicon.ico" type="image/x-icon">
    <link rel="shortcut icon" href="/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" type="text/css"
          href="//cdnjs.cloudflare.com/ajax/libs/jquery-jgrowl/1.4.1/jquery.jgrowl.min.css"/>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery-jgrowl/1.4.1/jquery.jgrowl.min.js"></script>
</head>
<body>
<? $APPLICATION->ShowPanel(); ?>
<div id="page" class="site">
    <div class="overlay"></div>
    <div id="modal_window"></div>
    <header>
        <a name="header"></a>
        <div class="header__btns--mobile">
            <div class="header__btn header__phone">

            </div>

            <div class="header__phone-drop">
                <a href="tel:+7 (495) 134-41-64" class="header__number--m"><? $APPLICATION->IncludeComponent(
                        "bitrix:main.include",
                        ".default",
                        array(
                            "AREA_FILE_SHOW" => "file",
                            "PATH" => "/local/templates/A-Sintez/include_areas/phone.php",
                            "0" => "template",
                            "COMPONENT_TEMPLATE" => ".default",
                            "EDIT_TEMPLATE" => ""
                        ), false); ?></a>
                <span class="header__order-call--m"><?= GetMessage('CALL') ?></span>
            </div>

            <div class="header__btn header__search">

            </div>
            <form class="header__input-wr">
                <? if (CModule::IncludeModule("search")) {
                    $APPLICATION->IncludeComponent(
                        "bitrix:search.form",
                        "template1",
                        array(
                            "PAGE" => "#SITE_DIR#search/index.php",
                            "COMPONENT_TEMPLATE" => "template1",
                            "USE_SUGGEST" => "Y"
                        ),
                        false
                    );
                } ?>
            </form>

            <div class="header__btn header__languages">

                <? $APPLICATION->IncludeComponent(
                    "bitrix:main.site.selector",
                    "",
                    Array(
                        "SITE_LIST" => array(),
                        "CACHE_TYPE" => "A",
                        "CACHE_TIME" => "3600"
                    ),
                    false
                ); ?>
            </div>


            <div class="header__btn header__basket">
                <? $APPLICATION->IncludeComponent(
                    "bitrix:sale.basket.basket.line",
                    "basket.small",
                    array(
                        "HIDE_ON_BASKET_PAGES" => "N",
                        "PATH_TO_AUTHORIZE" => "",
                        "PATH_TO_BASKET" => SITE_DIR . "personal/cart/",
                        "PATH_TO_ORDER" => SITE_DIR . "",
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
                ); ?>


            </div>


        </div>
        <div class="wr">

            <div class="header--top">

                <div class="xl-block"></div>
                <div class="m-block"></div>

                <div class="logo">
                    <? $APPLICATION->IncludeComponent(
                        "bitrix:main.include",
                        ".default",
                        array(
                            "AREA_FILE_SHOW" => "file",
                            "PATH" => "/local/templates/A-Sintez/include_areas/logo_header.php",
                            "0" => "template",
                            "COMPONENT_TEMPLATE" => ".default",
                            "EDIT_TEMPLATE" => ""
                        ),
                        false
                    ); ?>
                </div>

                <button class="headerToggle">
                    <span></span>
                    <span></span>
                    <span></span>
                </button>

                <nav>
                    <? if (LANGUAGE_ID == 'ru') {
                        $APPLICATION->IncludeComponent("bitrix:menu", "template1", Array(
                            "ALLOW_MULTI_SELECT" => "N",    // Разрешить несколько активных пунктов одновременно
                            "CHILD_MENU_TYPE" => "left",    // Тип меню для остальных уровней
                            "DELAY" => "N",    // Откладывать выполнение шаблона меню
                            "MAX_LEVEL" => "1",    // Уровень вложенности меню
                            "MENU_CACHE_GET_VARS" => "",    // Значимые переменные запроса
                            "MENU_CACHE_TIME" => "3600",    // Время кеширования (сек.)
                            "MENU_CACHE_TYPE" => "N",    // Тип кеширования
                            "MENU_CACHE_USE_GROUPS" => "Y",    // Учитывать права доступа
                            "ROOT_MENU_TYPE" => "top",    // Тип меню для первого уровня
                            "USE_EXT" => "N",    // Подключать файлы с именами вида .тип_меню.menu_ext.php
                            "COMPONENT_TEMPLATE" => "template1"
                        ),
                            false);
                    } else {

                        $APPLICATION->IncludeComponent("bitrix:menu", "en_top_menu", Array(
                            "ALLOW_MULTI_SELECT" => "N",
                            "CHILD_MENU_TYPE" => "left",
                            "DELAY" => "N",
                            "MAX_LEVEL" => "1",
                            "MENU_CACHE_GET_VARS" => "",
                            "MENU_CACHE_TIME" => "3600",
                            "MENU_CACHE_TYPE" => "N",
                            "MENU_CACHE_USE_GROUPS" => "Y",
                            "ROOT_MENU_TYPE" => "en_top",
                            "USE_EXT" => "Y",
                            "COMPONENT_TEMPLATE" => "en_top_menu"
                        ),
                            false
                        );
                    }
                    ?>

                </nav>


                <div class="header--mobile">

                    <div class="header__close--mobile">
                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1"
                             id="Capa_1" x="0px" y="0px" width="27px" height="27px" viewBox="0 0 357 357"
                             style="enable-background:new 0 0 357 357;" xml:space="preserve">
								<polygon
                                        points="357,35.7 321.3,0 178.5,142.8 35.7,0 0,35.7 142.8,178.5 0,321.3 35.7,357 178.5,214.2 321.3,357 357,321.3     214.2,178.5   "
                                        fill="#eda81b"/>
						</svg>

                    </div>
                    <nav>


                        <? if (LANGUAGE_ID == 'ru') {
                            $APPLICATION->IncludeComponent(
                                "bitrix:menu",
                                "catalog_template",
                                Array(
                                    "ALLOW_MULTI_SELECT" => "N",
                                    "CHILD_MENU_TYPE" => "left",
                                    "COMPONENT_TEMPLATE" => "catalog_template",
                                    "DELAY" => "N",
                                    "MAX_LEVEL" => "1",
                                    "MENU_CACHE_GET_VARS" => array(),
                                    "MENU_CACHE_TIME" => "3600",
                                    "MENU_CACHE_TYPE" => "N",
                                    "MENU_CACHE_USE_GROUPS" => "Y",
                                    "ROOT_MENU_TYPE" => "left",
                                    "USE_EXT" => "N"
                                ), false);
                        } else {
                            $APPLICATION->IncludeComponent(
                                "bitrix:menu",
                                "en_catalog_template",
                                array(
                                    "ALLOW_MULTI_SELECT" => "N",
                                    "CHILD_MENU_TYPE" => "bottom",
                                    "COMPONENT_TEMPLATE" => "en_catalog_template",
                                    "DELAY" => "N",
                                    "MAX_LEVEL" => "1",
                                    "MENU_CACHE_GET_VARS" => array(),
                                    "MENU_CACHE_TIME" => "3600",
                                    "MENU_CACHE_TYPE" => "N",
                                    "MENU_CACHE_USE_GROUPS" => "Y",
                                    "ROOT_MENU_TYPE" => "en_left",
                                    "USE_EXT" => "Y"
                                ), false);
                        }; ?>

                    </nav>
                </div>

                <div class="phone">
                    <a href="tel:+7 (495) 134-41-64" class="number"> <? $APPLICATION->IncludeComponent(
                            "bitrix:main.include",
                            ".default",
                            array(
                                "AREA_FILE_SHOW" => "file",
                                "PATH" => "/local/templates/A-Sintez/include_areas/phone.php",
                                "0" => "template",
                                "COMPONENT_TEMPLATE" => ".default",
                                "EDIT_TEMPLATE" => ""
                            ), false); ?></a>

                    <span class="contacts__mail">
                    <a href="mailto:sale@asynt.nets">
                    <? $APPLICATION->IncludeComponent(
                        "bitrix:main.include",
                        ".default",
                        array(
                            "AREA_FILE_SHOW" => "file",
                            "PATH" => "/local/templates/A-Sintez/include_areas/email.php",
                            "0" => "template",
                            "COMPONENT_TEMPLATE" => ".default",
                            "EDIT_TEMPLATE" => ""
                        ), false); ?>
                    </a><br>
                </span>


                    <span class="order-call"><?= GetMessage('CALL') ?></span>

                    <div class="language">
                        <? $APPLICATION->IncludeComponent(
                            "bitrix:main.site.selector",
                            "localization",
                            array(
                                "SITE_LIST" => array(),
                                "CACHE_TYPE" => "A",
                                "CACHE_TIME" => "3600",
                                "COMPONENT_TEMPLATE" => "localization"
                            ),
                            false
                        ); ?>


                    </div>
                </div>

            </div>

            <div class="header--bottom">
                <div class="header__catalog">
                    <span><?= GetMessage('CATALOG') ?></span>
                    <div class="catalog__drop">


                        <? if (LANGUAGE_ID == 'ru') {
                            $APPLICATION->IncludeComponent(
                                "bitrix:menu",
                                "catalog_template",
                                Array(
                                    "ALLOW_MULTI_SELECT" => "N",
                                    "CHILD_MENU_TYPE" => "left",
                                    "COMPONENT_TEMPLATE" => "catalog_template",
                                    "DELAY" => "N",
                                    "MAX_LEVEL" => "1",
                                    "MENU_CACHE_GET_VARS" => array(),
                                    "MENU_CACHE_TIME" => "3600",
                                    "MENU_CACHE_TYPE" => "N",
                                    "MENU_CACHE_USE_GROUPS" => "Y",
                                    "ROOT_MENU_TYPE" => "left",
                                    "USE_EXT" => "N"
                                ), false);
                        } else {
                            $APPLICATION->IncludeComponent(
                                "bitrix:menu",
                                "en_catalog_template",
                                array(
                                    "ALLOW_MULTI_SELECT" => "N",
                                    "CHILD_MENU_TYPE" => "bottom",
                                    "COMPONENT_TEMPLATE" => "en_catalog_template",
                                    "DELAY" => "N",
                                    "MAX_LEVEL" => "1",
                                    "MENU_CACHE_GET_VARS" => array(),
                                    "MENU_CACHE_TIME" => "3600",
                                    "MENU_CACHE_TYPE" => "N",
                                    "MENU_CACHE_USE_GROUPS" => "Y",
                                    "ROOT_MENU_TYPE" => "en_left",
                                    "USE_EXT" => "Y"
                                ), false);
                        }; ?>

                    </div>
                </div>

                <? if (CModule::IncludeModule("search")) {
                    $APPLICATION->IncludeComponent(
                        "bitrix:search.form",
                        "template1",
                        array(
                            "PAGE" => "#SITE_DIR#search/index.php",
                            "COMPONENT_TEMPLATE" => "template1",
                            "USE_SUGGEST" => "Y"
                        ),
                        false
                    );
                } ?>

                <div class="basket">
                    <? $APPLICATION->IncludeComponent(
                        "bitrix:sale.basket.basket.line",
                        "basket.small",
                        array(
                            "HIDE_ON_BASKET_PAGES" => "N",
                            "PATH_TO_AUTHORIZE" => "",
                            "PATH_TO_BASKET" => SITE_DIR . "personal/cart/",
                            "PATH_TO_ORDER" => SITE_DIR . "",
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
                    ); ?>
                </div>

            </div>
        </div>

        <div class="header--tablet">

            <div class="header__catalog">
                <span><?= GetMessage('CATALOG') ?></span>
                <div class="catalog__drop">

                    <? if (LANGUAGE_ID == 'ru') {
                        $APPLICATION->IncludeComponent(
                            "bitrix:menu",
                            "catalog_template",
                            Array(
                                "ALLOW_MULTI_SELECT" => "N",
                                "CHILD_MENU_TYPE" => "left",
                                "COMPONENT_TEMPLATE" => "catalog_template",
                                "DELAY" => "N",
                                "MAX_LEVEL" => "1",
                                "MENU_CACHE_GET_VARS" => array(),
                                "MENU_CACHE_TIME" => "3600",
                                "MENU_CACHE_TYPE" => "N",
                                "MENU_CACHE_USE_GROUPS" => "Y",
                                "ROOT_MENU_TYPE" => "left",
                                "USE_EXT" => "N"
                            ), false);
                    } else {
                        $APPLICATION->IncludeComponent(
                            "bitrix:menu",
                            "en_catalog_template",
                            array(
                                "ALLOW_MULTI_SELECT" => "N",
                                "CHILD_MENU_TYPE" => "bottom",
                                "COMPONENT_TEMPLATE" => "en_catalog_template",
                                "DELAY" => "N",
                                "MAX_LEVEL" => "1",
                                "MENU_CACHE_GET_VARS" => array(),
                                "MENU_CACHE_TIME" => "3600",
                                "MENU_CACHE_TYPE" => "N",
                                "MENU_CACHE_USE_GROUPS" => "Y",
                                "ROOT_MENU_TYPE" => "en_left",
                                "USE_EXT" => "Y"
                            ), false);
                    }; ?>

                </div>
            </div>

            <div class="phone">
                <div class="phone__wr">
                    <a href="tel:+7 (495) 134-41-64" class="number"> <? $APPLICATION->IncludeComponent(
                            "bitrix:main.include",
                            ".default",
                            array(
                                "AREA_FILE_SHOW" => "file",
                                "PATH" => "/local/templates/A-Sintez/include_areas/phone.php",
                                "0" => "template",
                                "COMPONENT_TEMPLATE" => ".default",
                                "EDIT_TEMPLATE" => ""
                            ), false); ?></a>
                    <span class="order-call"><?= GetMessage('CALL') ?></span>
                </div>


                <div class="language">
                    <? $APPLICATION->IncludeComponent(
                        "bitrix:main.site.selector",
                        "",
                        Array(
                            "SITE_LIST" => array(),
                            "CACHE_TYPE" => "A",
                            "CACHE_TIME" => "3600"
                        ),
                        false
                    ); ?>


                </div>
            </div>

            <form class="input-search__wr">
                <? if (CModule::IncludeModule("search")) {
                    $APPLICATION->IncludeComponent(
                        "bitrix:search.form",
                        "template1",
                        array(
                            "PAGE" => "#SITE_DIR#search/index.php",
                            "COMPONENT_TEMPLATE" => "template1",
                            "USE_SUGGEST" => "Y"
                        ),
                        false
                    );
                } ?>
            </form>

            <div class="basket">
                <? $APPLICATION->IncludeComponent(
                    "bitrix:sale.basket.basket.line",
                    "basket.small",
                    array(
                        "HIDE_ON_BASKET_PAGES" => "N",
                        "PATH_TO_AUTHORIZE" => "",
                        "PATH_TO_BASKET" => SITE_DIR . "personal/cart/",
                        "PATH_TO_ORDER" => SITE_DIR . "",
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
                ); ?>

            </div>

        </div>

        <div class="order-call__popup popup">
            <span class="popup__title"><?= GetMessage('CALL') ?></span>
            <span class="popup__info"><span><?= GetMessage('TEXTHOME1') ?></span><br><?= GetMessage('TEXTHOME2') ?></span>

            <? $APPLICATION->IncludeComponent(
                "bitrix:main.feedback",
                "callback",
                array(
                    "EMAIL_TO" => "sale@a-sintez.com",
                    "EVENT_MESSAGE_ID" => array(
                        0 => "7",
                    ),
                    "OK_TEXT" => "",
                    "REQUIRED_FIELDS" => array(
                        0 => "NAME",
                        1 => "MESSAGE",
                    ),
                    "USE_CAPTCHA" => "Y",
                    "COMPONENT_TEMPLATE" => "callback"
                ),
                false
            ); ?>

            <button class="order-call__close"></button>
        </div>

    </header>
