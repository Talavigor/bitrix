<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die(); ?>

<section class="main-slider">
    <div class="wr">
        <div class="main-slider__container">
            <button class="main-slider__btn main-slider__btn--prev"></button>
            <button class="main-slider__btn main-slider__btn--next"></button>
            <div class="main-slider__wr">
                <? foreach ($arResult["ITEMS"] as $arItem):
                    //получаем ссылки для редактирования и удаления элемента
                    $arButtons = CIBlock::GetPanelButtons(
                        $arItem["IBLOCK_ID"],
                        0,
                        $arItem["ID"]
                    );

                    $arItem["EDIT_LINK"] = $arButtons["edit"]["edit_section"]["ACTION_URL"];
                    $arItem["DELETE_LINK"] = $arButtons["edit"]["delete_section"]["ACTION_URL"];

                    //добавляем действия (экшены) для управления элементом
                    $this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "SECTION_EDIT"));
                    $this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "SECTION_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
                    ?>
                    <a href="<?php if (is_array($arItem["DISPLAY_PROPERTIES"]['SLIDER_LINK'])) echo $arItem['DISPLAY_PROPERTIES']['SLIDER_LINK']['VALUE']; else echo '/catalog/'; ?>">
                        <div class="main-slider__item" id="<?=$this->GetEditAreaId($arItem['ID']);?>">
                            <div class="main-slider__item-block">
                                <?if (LANGUAGE_ID == 'en') {?>
                                    <span><?=$arItem['PROPERTIES']['TOPSLIDER']['VALUE']['TEXT'] ?></span>
                                <?} else{?>
                                    <span><?= $arItem['PREVIEW_TEXT'] ?></span>
                                <?}?>

                            </div>
                        </div>
                    </a>
                <? endforeach; ?>
            </div>
        </div>
    </div>
</section>


