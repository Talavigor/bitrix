<? if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();

use Bitrix\Main\Application;
use Bitrix\Main\Context;
use Bitrix\Main\Request;
use Bitrix\Main\Server;

global $APPLICATION;
global $arTheme; ?>

<? $bHideCatalogMenu = (isset($arParams["HIDE_CATALOG"]) && $arParams["HIDE_CATALOG"] == "Y"); ?>


<? if (!CNext::IsMainPage()): ?>
    <? if (CNext::IsCatalogPage()): ?>

        <?
        $cur_url = $APPLICATION->GetCurPage();
        $server = Context::getCurrent()->getServer();
        $cur_url = $server->getRequestUri();
        $arr_path = parse_url($cur_url);
        $arr_url = explode('/', $arr_path['path']);
        if (!empty($arr_url[2])) {

            $APPLICATION->IncludeComponent(
                "bitrix:menu",
                "left_menu_category",
                array(
                    "ROOT_MENU_TYPE" => "top_content_multilevel",
                    "MENU_CACHE_TYPE" => "A",
                    "MENU_CACHE_TIME" => "3600000",
                    "MENU_CACHE_USE_GROUPS" => "N",
                    "MENU_CACHE_GET_VARS" => array(),
                    "MAX_LEVEL" => "2",
                    "CHILD_MENU_TYPE" => "left1",
                    "USE_EXT" => "Y",
                    "DELAY" => "N",
                    "ALLOW_MULTI_SELECT" => "N",
                    "COMPONENT_TEMPLATE" => "left_menu_category",
                    "COMPOSITE_FRAME_MODE" => "A",
                    "COMPOSITE_FRAME_TYPE" => "AUTO"
                ),
                false,
                array(
                    "ACTIVE_COMPONENT" => "Y"
                )
            );
        }
        ?>
    <? endif; ?>
<? elseif (!$bHideCatalogMenu): ?>
    <? $APPLICATION->IncludeComponent(
        "bitrix:menu",
        "left_front_catalog",
        Array(
            "ALLOW_MULTI_SELECT" => "N",
            "CACHE_SELECTED_ITEMS" => "N",
            "CHILD_MENU_TYPE" => "left",
            "DELAY" => "N",
            "MAX_LEVEL" => $arTheme["MAX_DEPTH_MENU"]["VALUE"],
            "MENU_CACHE_GET_VARS" => "",
            "MENU_CACHE_TIME" => "3600000",
            "MENU_CACHE_TYPE" => "A",
            "MENU_CACHE_USE_GROUPS" => "N",
            "ROOT_MENU_TYPE" => "left",
            "USE_EXT" => "Y"
        ),
        false,
        Array(
            'ACTIVE_COMPONENT' => 'Y'
        )
    ); ?>
<? endif; ?>