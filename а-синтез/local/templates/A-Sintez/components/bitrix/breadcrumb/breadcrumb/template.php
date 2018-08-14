<?php
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

/**
 * @global CMain $APPLICATION
 */

global $APPLICATION;

if (empty($arResult))
    return "";

$strReturn = '';

$css = $APPLICATION->GetCSSArray();
if (!is_array($css) || !in_array("/bitrix/css/main/font-awesome.css", $css)) {
    $strReturn .= '<link href="' . CUtil::GetAdditionalFileURL("/bitrix/css/main/font-awesome.css") . '" type="text/css" rel="stylesheet" />' . "\n";
}


$strReturn .= '<div class="wr product-breadcrumbs"><div class="breadcrumbs" id="bx_breadcrumb_' . $index . '" div itemscope itemtype="http://schema.org/BreadcrumbList">';

$itemSize = count($arResult);
$iblock_id = 11; //ID инфоблока каталога
$custom_name = 'UF_SECTIONTITLE'; //символьный код свойства

//получаем название последней категории для получения перевода
if (!empty($arResult[3])) {
    $sectionLink = explode("/", $arResult[3]["LINK"]);//разбиваем путь на SECTION_CODE
    $section_count = count($sectionLink);
    if (!empty($sectionLink[3])) {
        $section_name = $sectionLink[3];
    }//нужный нам SECTION_CODE
}


if (CModule::IncludeModule("iblock") && isset($section_name)) {
    $dbSection1 = CIBlockSection::GetList(
        array("SORT" => "ASC"),
        array(
            "IBLOCK_ID" => $iblock_id,
            "CODE" => $section_name
        ),
        false,
        array($custom_name)
    );
    if ($sectionArray = $dbSection1->GetNext()) {
        $new_name_en = $sectionArray["$custom_name"];

    }

}

for ($index = 0; $index < 4; $index++) {
    if ($index > 0) {
        $cutLink = explode("/", $arResult[$index]["LINK"]);
        $cnt = count($cutLink);
        if (!empty($cutLink[2])) {
            $secNow = $cutLink[2];
        }

    }

    if (CModule::IncludeModule("iblock") && $index == 2) {
        $dbSection = CIBlockSection::GetList(
            array("SORT" => "ASC"),
            array(
                "IBLOCK_ID" => $iblock_id,
                "CODE" => $secNow
            ),
            false,
            array($custom_name)
        );
        if ($arSection = $dbSection->GetNext()) {
            $new_name = $arSection["$custom_name"];

        }

    }

    $title = htmlspecialcharsex($arResult[$index]["TITLE"]);

    if ($arResult[$index]["LINK"] <> "" && $index != $itemSize - 1) {
        if (LANGUAGE_ID == 'en' && $index == 2) {
            $title = $new_name;
        }
        $strReturn .= '

				  <span itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
				   <a itemprop="item" href="' . $arResult[$index]["LINK"] . '" title="' . $title . '">
					   <span itemprop="name">' . $title . '</span>
				   </a>
				      <meta itemprop="position" content="' . ($index + 1) . '" />
				  </span>/

			';
    } else {

        if (LANGUAGE_ID == 'en' && isset($secNow) && $index < 3) {
            $title = $new_name;
        } elseif (LANGUAGE_ID == 'en' && isset($new_name_en)) {
            $title = $new_name_en;
        }

        $strReturn .= '

					<span itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">	
					<link itemprop="item" href="http://' . SITE_SERVER_NAME . $arResult[$index]['LINK'] . '">
				      <span class="post post-page" itemprop="name">' . $title . '</span>
				      <meta itemprop="position" content="' . ($index + 1) . '" />
			      </span>

			';
    }

}

$strReturn .= '<div style="clear:both"></div></div></div>';

return $strReturn;
?>


