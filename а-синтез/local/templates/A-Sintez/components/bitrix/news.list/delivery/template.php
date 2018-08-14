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

global $APPLICATION;
$APPLICATION->AddHeadString('<link href="http://'.SITE_SERVER_NAME.$arResult['CANONICAL_PAGE_URL'].'" rel="canonical" />',true);
?>
<div class="delivery__methods">
<?if($arParams["DISPLAY_TOP_PAGER"]):?>
	<?=$arResult["NAV_STRING"]?><br />
<?endif;?>
<?foreach($arResult["ITEMS"] as $arItem):?>
	<?
	$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
	$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
	?>
	<div class="delivery__item" id="<?=$this->GetEditAreaId($arItem['ID']);?>">
		<?if($arParams["DISPLAY_PICTURE"]!="N" && is_array($arItem["PREVIEW_PICTURE"])):?>
			<?if(!$arParams["HIDE_LINK_WHEN_NO_DETAIL"] || ($arItem["DETAIL_TEXT"] && $arResult["USER_HAVE_ACCESS"])):?>
				<img
						class="preview_picture delivery__img"
						border="0"
						src="<?=$arItem["PREVIEW_PICTURE"]["SRC"]?>"
						width="<?=$arItem["PREVIEW_PICTURE"]["WIDTH"]?>"
						height="<?=$arItem["PREVIEW_PICTURE"]["HEIGHT"]?>"
						alt="<?=$arItem["PREVIEW_PICTURE"]["ALT"]?>"
						title="<?=$arItem["PREVIEW_PICTURE"]["TITLE"]?>"
						style="float:left"
						/>
			<?endif;?>
		<?endif?>

		<?if($arParams["DISPLAY_NAME"]!="N" && $arItem["NAME"]):?>
			<?if(!$arParams["HIDE_LINK_WHEN_NO_DETAIL"] || ($arItem["DETAIL_TEXT"] && $arResult["USER_HAVE_ACCESS"])):?>
                <?if (LANGUAGE_ID == 'en' && !empty($arItem['PROPERTIES']['DELIVERYTITLE']['VALUE'])) {?>
                    <span class="delivery__name"><?=$arItem['PROPERTIES']['DELIVERYTITLE']['VALUE'] ?></span>
                <?} else{?>
                    <span class="delivery__name"><? echo $arItem["NAME"]?></span>
                <?}?>
            <?else:?>
				<span><?echo $arItem["NAME"]?></span>
			<?endif;?>
		<?endif;?>

		<?if($arParams["DISPLAY_PREVIEW_TEXT"]!="N" && $arItem["PREVIEW_TEXT"]):?>
            <?if (LANGUAGE_ID == 'en' && !empty($arItem['PROPERTIES']['DESCRIPTIONTITLE']['~VALUE']['TEXT'])) {?>
                <p class="delivery__describe"><?=$arItem['PROPERTIES']['DESCRIPTIONTITLE']['~VALUE']['TEXT'] ?></p>
            <?} else{?>
                <p class="delivery__describe"><?echo $arItem["PREVIEW_TEXT"];?></p>
            <?}?>


		<?endif;?>
    </div>
<?endforeach;?>

</div>
