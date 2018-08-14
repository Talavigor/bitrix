<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die(); ?>

<section class="trust">
    <div class="wr">
        <div class="trust__content">
            <div class="block-title">
                <div class="block-line">
                </div>
                <div class="block-romb-white">
                    <div class="block-romb-orange">
                    </div>
                </div>
                <span class="block__name"><?=GetMessage('WEARE')?></span>
            </div>
            <div class="trust__slider">
                <button class="trust__arrow trust__arrow--prev">
                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Capa_1" x="0px" y="0px" viewBox="0 0 477.175 477.175" style="enable-background:new 0 0 477.175 477.175;" xml:space="preserve" width="20px" height="32px">
							<path d="M145.188,238.575l215.5-215.5c5.3-5.3,5.3-13.8,0-19.1s-13.8-5.3-19.1,0l-225.1,225.1c-5.3,5.3-5.3,13.8,0,19.1l225.1,225   c2.6,2.6,6.1,4,9.5,4s6.9-1.3,9.5-4c5.3-5.3,5.3-13.8,0-19.1L145.188,238.575z" fill="#c7c7c7"/>
						</svg>
                </button>
                <button class="trust__arrow trust__arrow--next">
                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Capa_1" x="0px" y="0px" viewBox="0 0 477.175 477.175" style="enable-background:new 0 0 477.175 477.175;" xml:space="preserve" width="20px" height="32px">
							<path d="M360.731,229.075l-225.1-225.1c-5.3-5.3-13.8-5.3-19.1,0s-5.3,13.8,0,19.1l215.5,215.5l-215.5,215.5   c-5.3,5.3-5.3,13.8,0,19.1c2.6,2.6,6.1,4,9.5,4c3.4,0,6.9-1.3,9.5-4l225.1-225.1C365.931,242.875,365.931,234.275,360.731,229.075z   " fill="#c7c7c7"/>
						</svg>
                </button>
                <div class="trust__slider-container">
                    <? foreach ($arResult["ITEMS"] as $arItem): ?>
                        <?
                        $this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
                        $this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
                        ?>
                        <? $img_foto_trust = CFile::GetPath($arItem['PROPERTIES']['TRUST']['VALUE']); ?>
                        <div class="trust__item" id="<?= $this->GetEditAreaId($arItem['ID']); ?>">
                            <a href="#"><img src="<?= $img_foto_trust ?>" alt=""></a>
                        </div>
                    <? endforeach; ?>
                </div>
            </div>
        </div>
    </div>
</section>
