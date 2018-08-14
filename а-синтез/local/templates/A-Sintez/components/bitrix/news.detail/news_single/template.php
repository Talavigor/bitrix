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
$APPLICATION->AddHeadString('<link href="http://' . SITE_SERVER_NAME . $arResult['DETAIL_PAGE_URL'] . '" rel="canonical" />', true);
?>


<section class="company">
    <div class="wr">
        <div class="company__content">
            <div class="company__office">
                <div class="company__toptext">

                    <? if (LANGUAGE_ID == 'en') { ?>
                        <h2 class="company__title gray__title"><?= $arResult['PROPERTIES']['TITLENEWS']['VALUE'] ?></h2>
                    <? } else { ?>
                        <h2 class="company__title gray__title"><?= $arResult["NAME"] ?></h2>
                    <? } ?>



                    <? if ($arParams["DISPLAY_PREVIEW_TEXT"] != "N" && $arResult["FIELDS"]["PREVIEW_TEXT"]): ?>
                        <? if (LANGUAGE_ID == 'ru') { ?>
                            <p><?= $arResult["FIELDS"]["PREVIEW_TEXT"];
                                unset($arResult["FIELDS"]["PREVIEW_TEXT"]); ?></p>
                        <? } else { ?>
                            <p><?= $arResult['PROPERTIES']["TEXTNEWS"]["~VALUE"]["TEXT"];
                                ?></p>
                        <? } ?>


                    <? endif; ?>

                </div>
                <div class="company__imgcontainer">
                    <? if ($arParams["DISPLAY_PICTURE"] != "N" && is_array($arResult["DETAIL_PICTURE"])): ?>
                        <img
                                class="detail_picture company__img"
                                border="0"
                                src="<?= $arResult["DETAIL_PICTURE"]["SRC"] ?>"
                                width="<?= $arResult["DETAIL_PICTURE"]["WIDTH"] ?>"
                                height="<?= $arResult["DETAIL_PICTURE"]["HEIGHT"] ?>"
                                alt="<?= $arResult["DETAIL_PICTURE"]["ALT"] ?>"
                                title="<?= $arResult["DETAIL_PICTURE"]["TITLE"] ?>"
                        />
                    <? endif ?>

                </div>
            </div>

        </div>

</section>
