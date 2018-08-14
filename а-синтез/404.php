<?
include_once($_SERVER['DOCUMENT_ROOT'] . '/bitrix/modules/main/include/urlrewrite.php');

CHTTP::SetStatus("404 Not Found");
@define("ERROR_404", "Y");
//define("HIDE_SIDEBAR", true);

require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/header.php");

$APPLICATION->SetTitle("Страница не найдена"); ?>

    <div class="bx-404-container">
        <div class="bx-404-block"><img src="<?= SITE_DIR ?>images/404.png" alt=""></div>
        <? if (LANGUAGE_ID == 'en') { ?>
            <div class="bx-404-text-block">Page not found!</div>
            <div class="">We’re sorry, the page you requested could not be found.<br>Please go back to the <a
                        href="<?= SITE_DIR ?>">homepage</a>.<br>
            </div>
        <? } else { ?>
            <div class="bx-404-text-block">Запрашиваемая страница не найдена!</div>
            <div class="">К сожалению, запрашиваемая Вами страница не найдена.<br> Вы можете перейти на <a
                        href="<?= SITE_DIR ?>">главную страницу</a><br> и найти интересующую Вас страницу на сайте!
            </div>
        <? } ?>
    </div>

    <div class="map-columns row">
        <div class="col-sm-10 col-sm-offset-1">
            <div class="bx-maps-title"></div>
        </div>
    </div>

    <div class="col-sm-offset-2 col-sm-4">
        <div class="bx-map-title"><i class="fa fa-leanpub"></i></div>

    </div>


<? require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/footer.php"); ?>