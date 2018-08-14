<? if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();
// добавление названия товара в хлебные крошки
if ($arParams['ADD_SECTIONS_CHAIN'] && !empty($arResult['NAME'])) {
    $db_list = CIBlockSection::GetList(false, Array("IBLOCK_ID" => $arResult['IBLOCK_ID'], "ID" => $arResult['ID']), false, Array("UF_CAT_DESCRIPTION"));
    $ar_result = $db_list->GetNext();

    $arResult['SECTION']['PATH'][] = array(
        'NAME' => $arResult['NAME'],
        'PATH' => 'ncnkjdnkfcnjkdnfn');

    $component = $this->__component;
    $component->arResult = $arResult;
}


