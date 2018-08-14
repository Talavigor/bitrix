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
$this->setFrameMode(true);

global $APPLICATION;
$APPLICATION->AddHeadString('<link href="http://'.SITE_SERVER_NAME.$arResult['CANONICAL_PAGE_URL'].'" rel="canonical" />',true);

?>

<div class="metalworking__list">
    <? if ($arParams["DISPLAY_TOP_PAGER"]): ?>
        <?= $arResult["NAV_STRING"] ?><br/>
    <? endif; ?>
    <? foreach ($arResult["ITEMS"] as $arItem): ?>
        <?
        $this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
        $this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
        ?>
        <div class="metalworking__item" id="<?= $this->GetEditAreaId($arItem['ID']); ?>">
            <div class="img__wr1">
                <div class="img__wr">
                    <? if ($arParams["DISPLAY_PICTURE"] != "N" && is_array($arItem["PREVIEW_PICTURE"])): ?>
                        <? if (!$arParams["HIDE_LINK_WHEN_NO_DETAIL"] || ($arItem["DETAIL_TEXT"] && $arResult["USER_HAVE_ACCESS"])): ?>
                            <a href="<?= $arItem["DETAIL_PAGE_URL"] ?>"><img
                                        class="preview_picture metalworking__img"
                                        border="0"
                                        src="<?= $arItem["PREVIEW_PICTURE"]["SRC"] ?>"
                                        width="<?= $arItem["PREVIEW_PICTURE"]["WIDTH"] ?>"
                                        height="<?= $arItem["PREVIEW_PICTURE"]["HEIGHT"] ?>"
                                        alt="<?= $arItem["PREVIEW_PICTURE"]["ALT"] ?>"
                                        title="<?= $arItem["PREVIEW_PICTURE"]["TITLE"] ?>"
                                        style="float:left"
                                /></a>
                        <? else: ?>
                            <img
                                    class="preview_picture metalworking__img"
                                    border="0"
                                    src="<?= $arItem["PREVIEW_PICTURE"]["SRC"] ?>"
                                    width="<?= $arItem["PREVIEW_PICTURE"]["WIDTH"] ?>"
                                    height="<?= $arItem["PREVIEW_PICTURE"]["HEIGHT"] ?>"
                                    alt="<?= $arItem["PREVIEW_PICTURE"]["ALT"] ?>"
                                    title="<?= $arItem["PREVIEW_PICTURE"]["TITLE"] ?>"
                                    style="float:left"
                            />
                        <? endif; ?>
                    <? endif ?>

                    <div class="metalworking__overlay">
                        <? if ($arParams["DISPLAY_PREVIEW_TEXT"] != "N" && $arItem["PREVIEW_TEXT"]): ?>
                            <?if (LANGUAGE_ID == 'en' && !empty($arItem["PROPERTIES"]['METALLANONS']['~VALUE']['TEXT'])) {?>
                                <p><? echo $arItem["PROPERTIES"]['METALLANONS']['~VALUE']['TEXT']; ?></p>
                            <?} else{?>
                                <p><? echo $arItem["PREVIEW_TEXT"]; ?></p>
                            <?}?>

                        <? endif; ?>
                    </div>
                </div>
                <a href="<?= $arItem["DETAIL_PAGE_URL"] ?>" class="metalworking__button yellowbutton"> <span
                            class="btnLine topLeft"></span> <span class="btnLine topRight"></span> <span
                            class="btnLine bottomRight"></span> <span class="btnLine bottomLeft"></span>
                <?=GetMessage('MOREM')?></a>
            </div>
            <? if ($arParams["DISPLAY_NAME"] != "N" && $arItem["NAME"]): ?>
                <? if (!$arParams["HIDE_LINK_WHEN_NO_DETAIL"] || ($arItem["DETAIL_TEXT"] && $arResult["USER_HAVE_ACCESS"])): ?>
                    <?if (LANGUAGE_ID == 'en' && !empty($arItem["PROPERTIES"]['METALLTITLE']['VALUE'])) {?>
                        <span class="metalworking__name"><? echo $arItem["PROPERTIES"]['METALLTITLE']['VALUE'] ?></span>
                    <?} else{?>
                        <span class="metalworking__name"><? echo $arItem["NAME"] ?></span>
                    <?}?>

                <? else: ?>
                    <b><? echo $arItem["NAME"] ?></b>
                <? endif; ?>
            <? endif; ?>

        </div>
    <? endforeach; ?>

</div>

