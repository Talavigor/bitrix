<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
/** @var array $arParams */
/** @var array $arResult */
/** @global CMain $APPLICATION */
/** @global CUser $USER */
/** @global CDatabase $DB */
/** @var CBitrixComponentTemplate $this */
/** @var string $templateName */
/** @var string $templateFile */
/** @var string $templateFolder */
/** @var string $componentPath */
/** @var CBitrixComponent $component */
/** @var array $skuTemplate */
/** @var array $templateData */
$this->setFrameMode(true);

if (!empty($arResult['ITEMS'])) {
    $arResult['SKU_PROPS'] = reset($arResult['SKU_PROPS']);
    $skuTemplate = array();
    if (!empty($arResult['SKU_PROPS'])) {
        foreach ($arResult['SKU_PROPS'] as $arProp) {
            $propId = $arProp['ID'];
            $skuTemplate[$propId] = array(
                'SCROLL' => array(
                    'START' => '',
                    'FINISH' => '',
                ),
                'FULL' => array(
                    'START' => '',
                    'FINISH' => '',
                ),
                'ITEMS' => array()
            );
            $templateRow = '';
            if ('TEXT' == $arProp['SHOW_MODE']) {
                $skuTemplate[$propId]['SCROLL']['START'] = '<div class="bx_item_detail_size full" id="#ITEM#_prop_' . $propId . '_cont">' .
                    '<span class="bx_item_section_name_gray">' . htmlspecialcharsbx($arProp['NAME']) . '</span>' .
                    '<div class="bx_size_scroller_container"><div class="bx_size"><ul id="#ITEM#_prop_' . $propId . '_list" style="width: #WIDTH#;">';;
                $skuTemplate[$propId]['SCROLL']['FINISH'] = '</ul></div>' .
                    '<div class="bx_slide_left" id="#ITEM#_prop_' . $propId . '_left" data-treevalue="' . $propId . '" style=""></div>' .
                    '<div class="bx_slide_right" id="#ITEM#_prop_' . $propId . '_right" data-treevalue="' . $propId . '" style=""></div>' .
                    '</div></div>';

                $skuTemplate[$propId]['FULL']['START'] = '<div class="bx_item_detail_size" id="#ITEM#_prop_' . $propId . '_cont">' .
                    '<span class="bx_item_section_name_gray">' . htmlspecialcharsbx($arProp['NAME']) . '</span>' .
                    '<div class="bx_size_scroller_container"><div class="bx_size"><ul id="#ITEM#_prop_' . $propId . '_list" style="width: #WIDTH#;">';;
                $skuTemplate[$propId]['FULL']['FINISH'] = '</ul></div>' .
                    '<div class="bx_slide_left" id="#ITEM#_prop_' . $propId . '_left" data-treevalue="' . $propId . '" style="display: none;"></div>' .
                    '<div class="bx_slide_right" id="#ITEM#_prop_' . $propId . '_right" data-treevalue="' . $propId . '" style="display: none;"></div>' .
                    '</div></div>';
                foreach ($arProp['VALUES'] as $value) {
                    $value['NAME'] = htmlspecialcharsbx($value['NAME']);
                    $skuTemplate[$propId]['ITEMS'][$value['ID']] = '<li data-treevalue="' . $propId . '_' . $value['ID'] .
                        '" data-onevalue="' . $value['ID'] . '" style="width: #WIDTH#;" title="' . $value['NAME'] . '"><i></i><span class="cnt">' . $value['NAME'] . '</span></li>';
                }
                unset($value);
            } elseif ('PICT' == $arProp['SHOW_MODE']) {
                $skuTemplate[$propId]['SCROLL']['START'] = '<div class="bx_item_detail_scu full" id="#ITEM#_prop_' . $propId . '_cont">' .
                    '<span class="bx_item_section_name_gray">' . htmlspecialcharsbx($arProp['NAME']) . '</span>' .
                    '<div class="bx_scu_scroller_container"><div class="bx_scu"><ul id="#ITEM#_prop_' . $propId . '_list" style="width: #WIDTH#;">';
                $skuTemplate[$propId]['SCROLL']['FINISH'] = '</ul></div>' .
                    '<div class="bx_slide_left" id="#ITEM#_prop_' . $propId . '_left" data-treevalue="' . $propId . '" style=""></div>' .
                    '<div class="bx_slide_right" id="#ITEM#_prop_' . $propId . '_right" data-treevalue="' . $propId . '" style=""></div>' .
                    '</div></div>';

                $skuTemplate[$propId]['FULL']['START'] = '<div class="bx_item_detail_scu" id="#ITEM#_prop_' . $propId . '_cont">' .
                    '<span class="bx_item_section_name_gray">' . htmlspecialcharsbx($arProp['NAME']) . '</span>' .
                    '<div class="bx_scu_scroller_container"><div class="bx_scu"><ul id="#ITEM#_prop_' . $propId . '_list" style="width: #WIDTH#;">';
                $skuTemplate[$propId]['FULL']['FINISH'] = '</ul></div>' .
                    '<div class="bx_slide_left" id="#ITEM#_prop_' . $propId . '_left" data-treevalue="' . $propId . '" style="display: none;"></div>' .
                    '<div class="bx_slide_right" id="#ITEM#_prop_' . $propId . '_right" data-treevalue="' . $propId . '" style="display: none;"></div>' .
                    '</div></div>';
                foreach ($arProp['VALUES'] as $value) {
                    $value['NAME'] = htmlspecialcharsbx($value['NAME']);
                    $skuTemplate[$propId]['ITEMS'][$value['ID']] = '<li data-treevalue="' . $propId . '_' . $value['ID'] .
                        '" data-onevalue="' . $value['ID'] . '" style="width: #WIDTH#; padding-top: #WIDTH#;"><i title="' . $value['NAME'] . '"></i>' .
                        '<span class="cnt"><span class="cnt_item" style="background-image:url(\'' . $value['PICT']['SRC'] . '\');" title="' . $value['NAME'] . '"></span></span></li>';
                }
                unset($value);
            }
        }
        unset($templateRow, $arProp);
    }
}

$intRowsCount = count($arResult['ITEMS']);
$strRand = $this->randString();
$strContID = 'cat_top_cont_' . $strRand;
?>

<?
$boolFirst = true;
$arRowIDs = array();
foreach ($arResult['ITEMS'] as $keyRow => $arOneRow) {
    $strRowID = 'cat-top-' . $keyRow . '_' . $strRand;
    $arRowIDs[] = $strRowID;
    ?>

    <?
    foreach ($arOneRow as $keyItem => $arItem) {
        $this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], $strElementEdit);
        $this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], $strElementDelete, $arElementDeleteParams);
        $strMainID = $this->GetEditAreaId($arItem['ID']);

        $arItemIDs = array(
            'ID' => $strMainID,
            'PICT' => $strMainID . '_pict',
            'SECOND_PICT' => $strMainID . '_secondpict',
            'MAIN_PROPS' => $strMainID . '_main_props',

            'QUANTITY' => $strMainID . '_quantity',
            'QUANTITY_DOWN' => $strMainID . '_quant_down',
            'QUANTITY_UP' => $strMainID . '_quant_up',
            'QUANTITY_MEASURE' => $strMainID . '_quant_measure',
            'BUY_LINK' => $strMainID . '_buy_link',
            'BASKET_ACTIONS' => $strMainID . '_basket_actions',
            'NOT_AVAILABLE_MESS' => $strMainID . '_not_avail',
            'SUBSCRIBE_LINK' => $strMainID . '_subscribe',
            'COMPARE_LINK' => $strMainID . '_compare_link',

            'PRICE' => $strMainID . '_price',
            'DSC_PERC' => $strMainID . '_dsc_perc',
            'SECOND_DSC_PERC' => $strMainID . '_second_dsc_perc',

            'PROP_DIV' => $strMainID . '_sku_tree',
            'PROP' => $strMainID . '_prop_',
            'DISPLAY_PROP_DIV' => $strMainID . '_sku_prop',
            'BASKET_PROP_DIV' => $strMainID . '_basket_prop'
        );

        $strObName = 'ob' . preg_replace("/[^a-zA-Z0-9_]/", "x", $strMainID);
        $productTitle = (
        isset($arItem['IPROPERTY_VALUES']['ELEMENT_PAGE_TITLE']) && $arItem['IPROPERTY_VALUES']['ELEMENT_PAGE_TITLE'] != ''
            ? $arItem['IPROPERTY_VALUES']['ELEMENT_PAGE_TITLE']
            : $arItem['NAME']
        );
        $imgTitle = (
        isset($arItem['IPROPERTY_VALUES']['ELEMENT_PREVIEW_PICTURE_FILE_TITLE']) && $arItem['IPROPERTY_VALUES']['ELEMENT_PREVIEW_PICTURE_FILE_TITLE'] != ''
            ? $arItem['IPROPERTY_VALUES']['ELEMENT_PREVIEW_PICTURE_FILE_TITLE']
            : $arItem['NAME']
        );

        $minPrice = false;
        if (isset($arItem['MIN_PRICE']) || isset($arItem['RATIO_PRICE']))
            $minPrice = (isset($arItem['RATIO_PRICE']) ? $arItem['RATIO_PRICE'] : $arItem['MIN_PRICE']);

        $renderImage = CFile::ResizeImageGet($arItem["DETAIL_PICTURE"]['ID'], Array("width" => 302, "height" => 212), BX_RESIZE_IMAGE_EXACT, false);


        $top_lists = CIBlockSection::GetList(Array(SORT => "ASC"),
            $arFilter = Array("IBLOCK_ID" => 11, "ID" => $arItem['IBLOCK_SECTION_ID']),
            true,
            $arSel = Array("*"));
        $top_result = $top_lists->GetNext();
        $topImage = CFile::ResizeImageGet($top_result["PICTURE"], Array("width" => 300, "height" => 213), BX_RESIZE_IMAGE_EXACT, false);


        ?>


        <a href="<? echo $top_result['SECTION_PAGE_URL']; ?>"
           title="<? echo $productTitle; ?>">
            <div class="buywithit__item">
                <img src="<?= $topImage['src'] ?>" alt="<?= $arItem['NAME'] ?>"
                     class="buywithit__img">
                <? if (LANGUAGE_ID == 'en' && !empty($arItem['PROPERTIES']['CATALOGTITLE']['VALUE'])) { ?>
                    <span class="buywithit__name"><? echo $arItem['PROPERTIES']['CATALOGTITLE']['VALUE']; ?></span>
                <? } else { ?>
                    <span class="buywithit__name"><? echo $arItem['NAME']; ?></span>
                <? } ?>

            </div>
        </a>

        <?
    }
    $boolFirst = false;
}


?>
