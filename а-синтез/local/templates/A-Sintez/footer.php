<footer>
    <div class="wr">
        <div class="footer__content">
            <div class="footer__logo">
                <? $APPLICATION->IncludeComponent(
                    "bitrix:main.include",
                    ".default",
                    array(
                        "AREA_FILE_SHOW" => "file",
                        "PATH" => "/local/templates/A-Sintez/include_areas/logo_footer.php",
                        "0" => "template",
                        "COMPONENT_TEMPLATE" => ".default",
                        "EDIT_TEMPLATE" => ""
                    ),
                    false
                ); ?>
                <span class="footer__copy footer__copy--desk">&copy; <?= GetMessage('ALLRIGHTS') ?>
                    <?

                    use Bitrix\Main\Type\DateTime;

                    $objDateTime = new DateTime();
                    echo $objDateTime->format("Y");
                    ?>
                </span>
            </div>
            <div class="footer__links">
                <div class="links__lists">
                    <div class="links__company">
                        <h3><?= GetMessage('COMPANYSINTEZ') ?></h3>

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

                    </div>

                    <div class="links__catalog">
                        <h3><?= GetMessage('CATALOG') ?></h3>

                        <? if (LANGUAGE_ID == 'ru') {
                            $APPLICATION->IncludeComponent(
                                "bitrix:menu",
                                "catalog_footer_menu",
                                array(
                                    "ALLOW_MULTI_SELECT" => "N",
                                    "CHILD_MENU_TYPE" => "bottom",
                                    "COMPONENT_TEMPLATE" => "catalog_footer_menu",
                                    "DELAY" => "N",
                                    "MAX_LEVEL" => "1",
                                    "MENU_CACHE_GET_VARS" => array(),
                                    "MENU_CACHE_TIME" => "3600",
                                    "MENU_CACHE_TYPE" => "N",
                                    "MENU_CACHE_USE_GROUPS" => "Y",
                                    "ROOT_MENU_TYPE" => "bottom",
                                    "USE_EXT" => "N"
                                ), false);
                        } else {
                            $APPLICATION->IncludeComponent(
                                "bitrix:menu",
                                "en_catalog_footer_menu",
                                array(
                                    "ALLOW_MULTI_SELECT" => "N",
                                    "CHILD_MENU_TYPE" => "bottom",
                                    "COMPONENT_TEMPLATE" => "en_catalog_footer_menu",
                                    "DELAY" => "N",
                                    "MAX_LEVEL" => "1",
                                    "MENU_CACHE_GET_VARS" => array(),
                                    "MENU_CACHE_TIME" => "3600",
                                    "MENU_CACHE_TYPE" => "N",
                                    "MENU_CACHE_USE_GROUPS" => "Y",
                                    "ROOT_MENU_TYPE" => "en_bottom",
                                    "USE_EXT" => "Y"
                                ), false);
                        }; ?>
                    </div>
                </div>

                <div class="links__input">
                    <span class="footer__subscribe"><a href="#"><?= GetMessage('SUBSCRIBE') ?></a></span>
                    <? $APPLICATION->IncludeComponent("bitrix:sender.subscribe", "subscription", Array(
                        "AJAX_MODE" => "N",    // Включить режим AJAX
                        "AJAX_OPTION_ADDITIONAL" => "",    // Дополнительный идентификатор
                        "AJAX_OPTION_HISTORY" => "N",    // Включить эмуляцию навигации браузера
                        "AJAX_OPTION_JUMP" => "N",    // Включить прокрутку к началу компонента
                        "AJAX_OPTION_STYLE" => "Y",    // Включить подгрузку стилей
                        "CACHE_TIME" => "3600",    // Время кеширования (сек.)
                        "CACHE_TYPE" => "A",    // Тип кеширования
                        "CONFIRMATION" => "Y",    // Запрашивать подтверждение подписки по email
                        "HIDE_MAILINGS" => "Y",    // Скрыть список рассылок, и подписывать на все
                        "SET_TITLE" => "Y",    // Устанавливать заголовок страницы
                        "SHOW_HIDDEN" => "N",    // Показать скрытые рассылки для подписки
                        "USER_CONSENT" => "N",    // Запрашивать согласие
                        "USER_CONSENT_ID" => "0",    // Соглашение
                        "USER_CONSENT_IS_CHECKED" => "Y",    // Галка по умолчанию проставлена
                        "USER_CONSENT_IS_LOADED" => "N",    // Загружать текст сразу
                        "USE_PERSONALIZATION" => "Y",    // Определять подписку текущего пользователя
                    ),
                        false
                    ); ?>
                    <span class="footer__copy footer__copy--m">&copy; <?= GetMessage('ALLRIGHTS') ?>
                        <?
                        $objDateTime = new DateTime();
                        echo $objDateTime->format("Y");
                        ?>
                    </span>
                </div>
            </div>


            <div class="footer__contacts">

                <div class="contacts__button">
                    <span class="btnLine topLeft"></span>
                    <span class="btnLine topRight"></span>
                    <span class="btnLine bottomRight"></span>
                    <span class="btnLine bottomLeft"></span>
                    <?= GetMessage('CALL') ?>
                </div>

                <span class="contacts__location"> <? $APPLICATION->IncludeComponent(
                        "bitrix:main.include",
                        ".default",
                        array(
                            "AREA_FILE_SHOW" => "file",
                            "PATH" => "/local/templates/A-Sintez/include_areas/adres.php",
                            "0" => "template",
                            "COMPONENT_TEMPLATE" => ".default",
                            "EDIT_TEMPLATE" => ""
                        ), false); ?></span>

                <span class="contacts__phone"><a href="tel:+380954662339"><? $APPLICATION->IncludeComponent(
                            "bitrix:main.include",
                            ".default",
                            array(
                                "AREA_FILE_SHOW" => "file",
                                "PATH" => "/local/templates/A-Sintez/include_areas/phone_footer.php",
                                "0" => "template",
                                "COMPONENT_TEMPLATE" => ".default",
                                "EDIT_TEMPLATE" => ""
                            ), false); ?></a></span>

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
                <div class="contacts__social">
                    <? $APPLICATION->IncludeComponent(
                        "bitrix:eshop.socnet.links",
                        "social",
                        array(
                            "FACEBOOK" => "https://www.facebook.com/",
                            "GOOGLE" => "https://plus.google.com/discover",
                            "INSTAGRAM" => "https://www.instagram.com/?hl=ru",
                            "TWITTER" => "",
                            "VKONTAKTE" => "",
                            "COMPONENT_TEMPLATE" => "social"
                        ),
                        false
                    ); ?>

                </div>
            </div>
        </div>
    </div>
</footer>
<div class="romb block-1"></div>
<div class="romb block-2"></div>
<div class="romb block-3"></div>
<div class="romb block-4"></div>
<div class="romb block-5"></div>
<div class="romb block-6"></div>
<div class="romb block-7"></div>
<div class="romb block-8"></div>
<div class="romb block-9"></div>
<div class="romb block-10"></div>
<div class="romb block-11"></div>
<div class="romb block-12"></div>
<div class="romb block-13"></div>
<div class="romb block-14"></div>

<a class="toTop">
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 48 48" fill="#eda81b">
        <path class="cls-1"
              d="M178.73,126v48h48V126h-48Zm33.77,33.21-10.12-9.83L193,159.21l-4.24-4,13.49-14.47,14.44,14.15Z"
              transform="translate(-178.73 -126)"/>
    </svg>
</a>
</div>


<script async defer
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAT9eRpNG8C7BMdmeLqh1R0s7ui0aageYk&callback=initMap">
</script>


</body>
</html>