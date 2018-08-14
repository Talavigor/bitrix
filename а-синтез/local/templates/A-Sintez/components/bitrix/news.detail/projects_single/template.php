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


                    <? if ($arParams["DISPLAY_NAME"] != "N" && $arResult["NAME"]): ?>
                        <? if (LANGUAGE_ID == 'ru') { ?>
                            <h2 class="company__title gray__title"><?= $arResult["NAME"] ?></h2>
                        <? } else { ?>
                            <h2 class="company__title gray__title"><?= $arResult['PROPERTIES']['TITLEPROJECTS']['VALUE'] ?></h2>
                        <? } ?>

                    <? endif; ?>

                    <? if ($arParams["DISPLAY_PREVIEW_TEXT"] != "N" && $arResult["FIELDS"]["DETAIL_TEXT"]): ?>

                        <? if (LANGUAGE_ID == 'ru') { ?>
                            <p><?= $arResult["FIELDS"]["DETAIL_TEXT"];
                                unset($arResult["FIELDS"]["DETAIL_TEXT"]); ?></p>
                        <? } else { ?>
                            <p><?= $arResult['PROPERTIES']["DESCRIPTIONPROJECTS"]["~VALUE"]["TEXT"];
                                ?></p>
                        <? } ?>
                    <? endif; ?>

                </div>
                <div class="company__imgcontainer">
                    <? if ($arParams["DISPLAY_PICTURE"] != "N" && is_array($arResult["PREVIEW_PICTURE"])): ?>
                        <img
                                class="detail_picture company__img"
                                border="0"
                                src="<?= $arResult["PREVIEW_PICTURE"]["SRC"] ?>"
                                width="<?= $arResult["PREVIEW_PICTURE"]["WIDTH"] ?>"
                                height="<?= $arResult["PREVIEW_PICTURE"]["HEIGHT"] ?>"
                                alt="<?= $arResult["PREVIEW_PICTURE"]["ALT"] ?>"
                                title="<?= $arResult["PREVIEW_PICTURE"]["TITLE"] ?>"
                        />
                    <? endif ?>

                </div>
            </div>

        </div>

</section>
