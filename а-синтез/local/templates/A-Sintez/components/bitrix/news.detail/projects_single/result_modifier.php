<? if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();

if($arParams['ADD_SECTIONS_CHAIN'] && !empty($arResult['NAME']))
{
$arResult['SECTION']['PATH'][] = array(
'NAME' => $arResult['PROPERTIES']['TITLEPROJECTS']['VALUE'],
'PATH' => ' ');

$component = $this->__component;
$component->arResult = $arResult;
}