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

$bxajaxid1 = CAjax::GetComponentID($component->__name, $component->__template->__name, $component->arParams['AJAX_OPTION_ADDITIONAL']);
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
            <?if (LANGUAGE_ID == 'en' && !empty($arItem['PROPERTIES']['TITLEPROJECTS']['VALUE'])) {?>
                <span class="example__name"><?=$arItem['PROPERTIES']['TITLEPROJECTS']['VALUE'] ?></span>
            <?} else{?>
                    <? if (!$arParams["HIDE_LINK_WHEN_NO_DETAIL"] || ($arItem["DETAIL_TEXT"] && $arResult["USER_HAVE_ACCESS"])): ?>
                        <span class="example__name"><? echo $arItem["NAME"] ?></span>

                    <? else: ?>
                        <b><? echo $arItem["NAME"] ?></b><br/>
                    <? endif; ?>

            <?}?>
            <? endif; ?>

            <div class="img__wr1">
                <div class="img__wr">
                    <? if ($arParams["DISPLAY_PICTURE"] != "N" && is_array($arItem["PREVIEW_PICTURE"])): ?>
                        <? if (!$arParams["HIDE_LINK_WHEN_NO_DETAIL"] || ($arItem["DETAIL_TEXT"] && $arResult["USER_HAVE_ACCESS"])): ?>
                            <a href="<?= $arItem["DETAIL_PAGE_URL"] ?>"><img
                                        class="preview_picture example__img"
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
                                    class="preview_picture example__img"
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
                </div>
                <a href="<?= $arItem["DETAIL_PAGE_URL"] ?>" class="example__button yellowbutton"><span
                            class="btnLine topLeft"></span> <span
                            class="btnLine topRight"></span> <span class="btnLine bottomRight"></span> <span
                            class="btnLine bottomLeft"></span>
                    <?=GetMessage('VIEW')?> </a>
            </div>
            <p class="example__describe">
                <?if (LANGUAGE_ID == 'en' && !empty($arItem['PROPERTIES']['ANONSPROJECTS']['~VALUE']['TEXT'])) {?>
                    <?=$arItem['PROPERTIES']['ANONSPROJECTS']['~VALUE']['TEXT'] ?>
                <?} else{?>
                    <? if ($arParams["DISPLAY_PREVIEW_TEXT"] != "N" && $arItem["PREVIEW_TEXT"]): ?>
                        <? echo $arItem["PREVIEW_TEXT"]; ?>
                    <? endif; ?>
                <?}?>
            </p>
        </div>
    <? endforeach; ?>
</div>

<? if ($arResult["NAV_RESULT"]->nEndPage > 1 && $arResult["NAV_RESULT"]->NavPageNomer < $arResult["NAV_RESULT"]->nEndPage): ?>
    <div class="example__loadmore" id="btn_<?= $bxajaxid1 ?>">
        <span class="example__more" data-ajax-id="<?= $bxajaxid1 ?>"
              data-show-more="<?= $arResult["NAV_RESULT"]->NavNum ?>"
              data-next-page="<?= ($arResult["NAV_RESULT"]->NavPageNomer + 1) ?>"
              data-max-page="<?= $arResult["NAV_RESULT"]->nEndPage ?>"><?=GetMessage('LOADMORE')?></span>
        <svg xmlns="http://www.w3.org/2000/svg" version="1.1" id="Layer_1" x="0px" y="0px" viewBox="0 0 404.257 404.257"
             style="enable-background:new 0 0 404.257 404.257;" xml:space="preserve" width="40px" height="22px">
						<polygon
                                points="386.257,114.331 202.128,252.427 18,114.331 0,138.331 202.128,289.927 404.257,138.331 "
                                fill="#a3a3a3"/>
					</svg>
    </div>

<? endif ?>
