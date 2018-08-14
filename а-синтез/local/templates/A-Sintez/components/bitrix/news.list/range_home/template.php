<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die(); ?>

<div class="range">
    <div class="block-title">
        <div class="block-line">
        </div>
        <div class="block-romb-white">
            <div class="block-romb-orange">
            </div>
        </div>
        <span class="block__name"><?=GetMessage('BASICASS')?></span>
    </div>
    <div class="range__container">
        <? foreach ($arResult["ITEMS"] as $arItem): ?>
            <?

            $arButtons = CIBlock::GetPanelButtons(
                $arItem["IBLOCK_ID"],
                0,
                $arItem["ID"]

            );

            $arItem["EDIT_LINK"] = $arButtons["edit"]["edit_section"]["ACTION_URL"];
            $arItem["DELETE_LINK"] = $arButtons["edit"]["delete_section"]["ACTION_URL"];

         
            $this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "SECTION_EDIT"));
            $this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "SECTION_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
            $foto_range = CFile::GetPath($arItem['PROPERTIES']['FOTO_RANGE']['VALUE']); ?>
            <div class="range__item" id="<?= $this->GetEditAreaId($arItem['ID']); ?>">
                <a href="<?= $arItem['DISPLAY_PROPERTIES']['LINK_RANGE']['VALUE'] ?>">
                    <div class="img__wr">
                        <br>
                        <img src="<?= $foto_range ?>" alt="<?= $arItem['NAME'] ?>" class="range__item-img">
                        <div class="hover-bg">
                        </div>
                    </div>
                    <?if (LANGUAGE_ID == 'en') {?>
                        <span class="range__item-name"><?=$arItem['PROPERTIES']['TITLE_ASSORTIMENT']['VALUE'] ?></span>
                    <?} else{?>
                        <span class="range__item-name"><?= $arItem['NAME'] ?></span>
                    <?}?>
                </a>
            </div>
        <? endforeach; ?>
    </div>

    <a href="<? SITE_DIR ?>/catalog" class="range__allgoods"> <span class="btnLine topLeft"></span> <span class="btnLine topRight"></span>
        <span class="btnLine bottomRight"></span> <span class="btnLine bottomLeft"></span>
        <?=GetMessage('ALLPRODUCTS')?> </a>
</div>
