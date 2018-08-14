<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
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



?>

<div class="example__projects">
    <? if ($arParams["DISPLAY_TOP_PAGER"]): ?>
        <?= $arResult["NAV_STRING"] ?><br/>
    <? endif; ?>
    <? foreach ($arResult["ITEMS"] as $arItem): ?>
        <?
        $this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
        $this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
        ?>

        <div class="example__item" id="<?= $this->GetEditAreaId($arItem['ID']); ?>">

            <? if ($arParams["DISPLAY_NAME"] != "N" && $arItem["NAME"]): ?>
                <? if (!$arParams["HIDE_LINK_WHEN_NO_DETAIL"] || ($arItem["DETAIL_TEXT"] && $arResult["USER_HAVE_ACCESS"])): ?>
                    <span class="example__name"><? echo $arItem["NAME"] ?></span>

                <? else: ?>
                    <b><? echo $arItem["NAME"] ?></b><br/>
                <? endif; ?>
            <? endif; ?>

            <div class="img__wr1">
                <div class="img__wr">
                    <? if ($arParams["DISPLAY_PICTURE"] != "N" && is_array($arItem["DETAIL_PICTURE"])): ?>
                        <? if (!$arParams["HIDE_LINK_WHEN_NO_DETAIL"] || ($arItem["DETAIL_TEXT"] && $arResult["USER_HAVE_ACCESS"])): ?>
                            <a href="<?= $arItem["DETAIL_PAGE_URL"] ?>"><img
                                        class="preview_picture example__img"
                                        border="0"
                                        src="<?= $arItem["DETAIL_PICTURE"]["SRC"] ?>"
                                        width="<?= $arItem["DETAIL_PICTURE"]["WIDTH"] ?>"
                                        height="<?= $arItem["DETAIL_PICTURE"]["HEIGHT"] ?>"
                                        alt="<?= $arItem["DETAIL_PICTURE"]["ALT"] ?>"
                                        title="<?= $arItem["DETAIL_PICTURE"]["TITLE"] ?>"
                                        style="float:left"
                                /></a>
                        <? else: ?>
                            <img
                                    class="preview_picture example__img"
                                    border="0"
                                    src="<?= $arItem["DETAIL_PICTURE"]["SRC"] ?>"
                                    width="<?= $arItem["DETAIL_PICTURE"]["WIDTH"] ?>"
                                    height="<?= $arItem["DETAIL_PICTURE"]["HEIGHT"] ?>"
                                    alt="<?= $arItem["DETAIL_PICTURE"]["ALT"] ?>"
                                    title="<?= $arItem["DETAIL_PICTURE"]["TITLE"] ?>"
                                    style="float:left"
                            />
                        <? endif; ?>
                    <? endif ?>
                </div>
                <a href="<?= $arItem["DETAIL_PAGE_URL"] ?>" class="example__button yellowbutton"><span
                            class="btnLine topLeft"></span> <span
                            class="btnLine topRight"></span> <span class="btnLine bottomRight"></span> <span
                            class="btnLine bottomLeft"></span>
                    Смотреть подробнее </a>
            </div>
            <p class="example__describe">
                <? if ($arParams["DISPLAY_PREVIEW_TEXT"] != "N" && $arItem["PREVIEW_TEXT"]): ?>
                    <? echo $arItem["PREVIEW_TEXT"]; ?>
                <? endif; ?>
            </p>
        </div>
    <? endforeach; ?>
</div>



