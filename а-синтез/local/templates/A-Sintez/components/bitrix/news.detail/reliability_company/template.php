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
$APPLICATION->AddHeadString('<link href="http://' . SITE_SERVER_NAME . $arResult['IBLOCK']['CANONICAL_PAGE_URL'] . '" rel="canonical" />', true);
?>


<section class="company">

    <div class="wr">
        <div class="company__content">
            <div class="company__office">
                <div class="company__toptext">
                    <? if (LANGUAGE_ID == 'en') { ?>
                        <h2 class="company__title gray__title"><?= $arResult['PROPERTIES']['TITLEABOUT']['VALUE'] ?></h2>
                    <? } else { ?>
                        <? if ($arParams["DISPLAY_NAME"] != "N" && $arResult["NAME"]): ?>
                            <h2 class="company__title gray__title"><?= $arResult["NAME"] ?></h2>
                        <? endif; ?>
                    <? } ?>


                    <? if ($arResult["NAV_RESULT"]): ?>
                        <? if ($arParams["DISPLAY_TOP_PAGER"]): ?><?= $arResult["NAV_STRING"] ?><br/><? endif; ?>
                        <? echo $arResult["NAV_TEXT"]; ?>
                        <? if ($arParams["DISPLAY_BOTTOM_PAGER"]): ?><br/><?= $arResult["NAV_STRING"] ?><? endif; ?>
                    <? elseif (strlen($arResult["DETAIL_TEXT"]) > 0): ?>
                        <? if (LANGUAGE_ID == 'en') { ?>
                            <?= $arResult['PROPERTIES']['TOPABOUT']['~VALUE']['TEXT'] ?>
                        <? } else { ?>
                            <? echo $arResult["DETAIL_TEXT"]; ?>
                        <? } ?>
                    <? else: ?>
                        <? echo $arResult["PREVIEW_TEXT"]; ?>
                    <? endif ?>
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


                    <div class="company__imgcontainer--small">
                        <? foreach ($arResult["FIELDS"] as $code => $value):
                            if ('PREVIEW_PICTURE' == $code) {
                                ?><?
                                if (!empty($value) && is_array($value)) {
                                    ?><img border="0" src="<?= $value["SRC"] ?>" width="<?= $value["WIDTH"] ?>"
                                           height="<?= $value["HEIGHT"] ?>" class="company__img--small"><?
                                }
                            }
                            ?>
                        <? endforeach; ?>
                    </div>
                </div>
            </div>
            <div class="company__bottomtext">
                <? if (LANGUAGE_ID == 'en') { ?>
                    <p>
                        <?= $arResult['PROPERTIES']['BOTTOMABOUT']['~VALUE']['TEXT'] ?>
                    </p>
                <? } else { ?>
                    <? if ($arParams["DISPLAY_PREVIEW_TEXT"] != "N" && $arResult["FIELDS"]["PREVIEW_TEXT"]): ?>
                        <p><?= $arResult["FIELDS"]["PREVIEW_TEXT"];
                            unset($arResult["FIELDS"]["PREVIEW_TEXT"]); ?></p>
                    <? endif; ?>
                <? } ?>
            </div>

        </div>

</section>
