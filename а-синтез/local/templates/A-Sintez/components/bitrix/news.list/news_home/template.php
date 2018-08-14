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
?>

<section class="news">
    <div class="wr">
        <div class="news__content">
            <div class="news__title">
                <span class="block__name"><?= GetMessage('NEWS') ?></span> <span class="news__all news__all--desk"><a
                            href="<? SITE_DIR ?>news"><?= GetMessage('ALLNEWS') ?></a></span>
            </div>
            <div class="news__items-container">

                <div class="news__items--big">
                    <?
                    $this->AddEditAction($arResult['ITEMS'][0]['ID'], $arResult['ITEMS'][0]['EDIT_LINK'], CIBlock::GetArrayByID($arResult['ITEMS'][0]["IBLOCK_ID"], "ELEMENT_EDIT"));
                    $this->AddDeleteAction($arResult['ITEMS'][0]['ID'], $arResult['ITEMS'][0]['DELETE_LINK'], CIBlock::GetArrayByID($arResult['ITEMS'][0]["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
                    ?>
                    <div class="news__item--big" id="<?= $this->GetEditAreaId($arResult['ITEMS'][0]['ID']); ?>">
                        <a href="<? echo $arResult['ITEMS'][0]["DETAIL_PAGE_URL"] ?>"><img
                                    alt="<?= $arResult['ITEMS'][0]["PREVIEW_PICTURE"]["ALT"] ?>"
                                    width="199px" height="102px"
                                    src="<?= $arResult['ITEMS'][0]["PREVIEW_PICTURE"]["SRC"] ?>"></a>
                        <div class="item--big__text">
                            <? if ($arParams["DISPLAY_NAME"] != "N" && $arResult['ITEMS'][0]["NAME"]): ?>
                                <? if (!$arParams["HIDE_LINK_WHEN_NO_DETAIL"] || ($arResult['ITEMS'][0]["DETAIL_TEXT"] && $arResult["USER_HAVE_ACCESS"])): ?>

                                    <? if (LANGUAGE_ID == 'en') { ?>
                                        <a href="<? echo $arResult['ITEMS'][0]["DETAIL_PAGE_URL"] ?>"
                                           class="item--big__title"><?= $arResult['ITEMS'][0]['PROPERTIES']['TITLENEWS']['VALUE'] ?></a>
                                    <? } else { ?>
                                        <a href="<? echo $arResult['ITEMS'][0]["DETAIL_PAGE_URL"] ?>"
                                           class="item--big__title"><?= $arResult['ITEMS'][0]['NAME'] ?></a>
                                    <? } ?>
                                <? else: ?>
                                    <b><? echo $arResult['ITEMS'][0]["NAME"] ?></b>
                                <? endif; ?>

                            <? endif; ?>
                            <p class="item--big__p">
                                <? if (LANGUAGE_ID == 'en') { ?>
                                    <? echo $arResult['ITEMS'][0]['PROPERTIES']['TEXTNEWS']['~VALUE']['TEXT']; ?>
                                <? } else { ?>

                                    <? if ($arParams["DISPLAY_PREVIEW_TEXT"] != "N" && $arResult['ITEMS'][0]["PREVIEW_TEXT"]): ?>
                                        <? echo $arResult['ITEMS'][0]["PREVIEW_TEXT"]; ?>
                                    <? endif; ?>
                                <? } ?>
                            </p>
                            <? if ($arParams["DISPLAY_DATE"] != "N" && $arResult['ITEMS'][0]["DISPLAY_ACTIVE_FROM"]): ?>
                                <span class="item--big__date"><? echo $arResult['ITEMS'][0]["DISPLAY_ACTIVE_FROM"] ?></span>
                            <? endif ?>
                        </div>
                    </div>

                    <?
                    $this->AddEditAction($arResult['ITEMS'][1]['ID'], $arResult['ITEMS'][1]['EDIT_LINK'], CIBlock::GetArrayByID($arResult['ITEMS'][1]["IBLOCK_ID"], "ELEMENT_EDIT"));
                    $this->AddDeleteAction($arResult['ITEMS'][1]['ID'], $arResult['ITEMS'][1]['DELETE_LINK'], CIBlock::GetArrayByID($arResult['ITEMS'][1]["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
                    ?>
                    <div class="news__item--big news__item--big-reverse"
                         id="<?= $this->GetEditAreaId($arResult['ITEMS'][1]['ID']); ?>">
                        <a href="<? echo $arResult['ITEMS'][1]["DETAIL_PAGE_URL"] ?>" class="item__img--reverse"><img
                                    alt="<?= $arResult['ITEMS'][1]["PREVIEW_PICTURE"]["ALT"] ?>"
                                    width="199px" height="102px"
                                    src="<?= $arResult['ITEMS'][1]["PREVIEW_PICTURE"]["SRC"] ?>"></a>
                        <div class="item--big__text">
                            <? if ($arParams["DISPLAY_NAME"] != "N" && $arResult['ITEMS'][1]["NAME"]): ?>
                                <? if (!$arParams["HIDE_LINK_WHEN_NO_DETAIL"] || ($arResult['ITEMS'][1]["DETAIL_TEXT"] && $arResult["USER_HAVE_ACCESS"])): ?>


                                    <? if (LANGUAGE_ID == 'en') { ?>
                                        <a href="<? echo $arResult['ITEMS'][1]["DETAIL_PAGE_URL"] ?>"
                                           class="item--big__title"><?= $arResult['ITEMS'][1]['PROPERTIES']['TITLENEWS']['VALUE'] ?></a>
                                    <? } else { ?>
                                        <a href="<? echo $arResult['ITEMS'][1]["DETAIL_PAGE_URL"] ?>"
                                           class="item--big__title"><?= $arResult['ITEMS'][1]['NAME'] ?></a>
                                    <? } ?>
                                <? else: ?>
                                    <b><? echo $arResult['ITEMS'][1]["NAME"] ?></b>
                                <? endif; ?>


                            <? endif; ?>
                            <p class="item--big__p">
                                <? if (LANGUAGE_ID == 'en') { ?>
                                    <? echo $arResult['ITEMS'][1]['PROPERTIES']['TEXTNEWS']['~VALUE']['TEXT']; ?>
                                <? } else { ?>

                                    <? if ($arParams["DISPLAY_PREVIEW_TEXT"] != "N" && $arResult['ITEMS'][1]["PREVIEW_TEXT"]): ?>
                                        <? echo $arResult['ITEMS'][1]["PREVIEW_TEXT"]; ?>
                                    <? endif; ?>
                                <? } ?>
                            </p>
                            <? if ($arParams["DISPLAY_DATE"] != "N" && $arResult['ITEMS'][1]["DISPLAY_ACTIVE_FROM"]): ?>
                                <span class="item--big__date"><? echo $arResult['ITEMS'][1]["DISPLAY_ACTIVE_FROM"] ?></span>
                            <? endif ?>
                        </div>
                    </div>

                </div>


                <div class="news__items--small">
                    <?
                    $this->AddEditAction($arResult['ITEMS'][2]['ID'], $arResult['ITEMS'][2]['EDIT_LINK'], CIBlock::GetArrayByID($arResult['ITEMS'][2]["IBLOCK_ID"], "ELEMENT_EDIT"));
                    $this->AddDeleteAction($arResult['ITEMS'][2]['ID'], $arResult['ITEMS'][2]['DELETE_LINK'], CIBlock::GetArrayByID($arResult['ITEMS'][2]["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
                    ?>
                    <div class="news__item--small" id="<?= $this->GetEditAreaId($arResult['ITEMS'][2]['ID']); ?>">
                        <? if ($arParams["DISPLAY_NAME"] != "N" && $arResult['ITEMS'][2]["NAME"]): ?>
                            <? if (!$arParams["HIDE_LINK_WHEN_NO_DETAIL"] || ($arResult['ITEMS'][2]["DETAIL_TEXT"] && $arResult["USER_HAVE_ACCESS"])): ?>


                                <? if (LANGUAGE_ID == 'en') { ?>
                                    <a href="<? echo $arResult['ITEMS'][2]["DETAIL_PAGE_URL"] ?>"
                                       class="item--small__title"><?= $arResult['ITEMS'][2]['PROPERTIES']['TITLENEWS']['VALUE'] ?></a>
                                <? } else { ?>
                                    <a href="<? echo $arResult['ITEMS'][2]["DETAIL_PAGE_URL"] ?>"
                                       class="item--small__title"><?= $arResult['ITEMS'][2]['NAME'] ?></a>
                                <? } ?>
                            <? else: ?>
                                <b><? echo $arResult['ITEMS'][2]["NAME"] ?></b>
                            <? endif; ?>


                        <? endif; ?>
                        <? if ($arParams["DISPLAY_DATE"] != "N" && $arResult['ITEMS'][2]["DISPLAY_ACTIVE_FROM"]): ?>
                            <span class="item--small__date"><? echo $arResult['ITEMS'][2]["DISPLAY_ACTIVE_FROM"] ?></span>
                        <? endif ?>
                    </div>
                    <?
                    $this->AddEditAction($arResult['ITEMS'][3]['ID'], $arResult['ITEMS'][3]['EDIT_LINK'], CIBlock::GetArrayByID($arResult['ITEMS'][3]["IBLOCK_ID"], "ELEMENT_EDIT"));
                    $this->AddDeleteAction($arResult['ITEMS'][3]['ID'], $arResult['ITEMS'][3]['DELETE_LINK'], CIBlock::GetArrayByID($arResult['ITEMS'][3]["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
                    ?>
                    <div class="news__item--small" id="<?= $this->GetEditAreaId($arResult['ITEMS'][3]['ID']); ?>">
                        <? if ($arParams["DISPLAY_NAME"] != "N" && $arResult['ITEMS'][3]["NAME"]): ?>
                            <? if (!$arParams["HIDE_LINK_WHEN_NO_DETAIL"] || ($arResult['ITEMS'][3]["DETAIL_TEXT"] && $arResult["USER_HAVE_ACCESS"])): ?>


                                <? if (LANGUAGE_ID == 'en') { ?>
                                    <a href="<? echo $arResult['ITEMS'][3]["DETAIL_PAGE_URL"] ?>"
                                       class="item--small__title"><?= $arResult['ITEMS'][3]['PROPERTIES']['TITLENEWS']['VALUE'] ?></a>
                                <? } else { ?>
                                    <a href="<? echo $arResult['ITEMS'][3]["DETAIL_PAGE_URL"] ?>"
                                       class="item--small__title"><?= $arResult['ITEMS'][3]['NAME'] ?></a>
                                <? } ?>
                            <? else: ?>
                                <b><? echo $arResult['ITEMS'][3]["NAME"] ?></b>
                            <? endif; ?>


                        <? endif; ?>
                        <? if ($arParams["DISPLAY_DATE"] != "N" && $arResult['ITEMS'][3]["DISPLAY_ACTIVE_FROM"]): ?>
                            <span class="item--small__date"><? echo $arResult['ITEMS'][3]["DISPLAY_ACTIVE_FROM"] ?></span>
                        <? endif ?>
                    </div>
                    <?
                    $this->AddEditAction($arResult['ITEMS'][4]['ID'], $arResult['ITEMS'][4]['EDIT_LINK'], CIBlock::GetArrayByID($arResult['ITEMS'][4]["IBLOCK_ID"], "ELEMENT_EDIT"));
                    $this->AddDeleteAction($arResult['ITEMS'][4]['ID'], $arResult['ITEMS'][4]['DELETE_LINK'], CIBlock::GetArrayByID($arResult['ITEMS'][4]["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
                    ?>
                    <div class="news__item--small" id="<?= $this->GetEditAreaId($arResult['ITEMS'][4]['ID']); ?>">
                        <? if ($arParams["DISPLAY_NAME"] != "N" && $arResult['ITEMS'][4]["NAME"]): ?>
                            <? if (!$arParams["HIDE_LINK_WHEN_NO_DETAIL"] || ($arResult['ITEMS'][4]["DETAIL_TEXT"] && $arResult["USER_HAVE_ACCESS"])): ?>

                                <? if (LANGUAGE_ID == 'en') { ?>
                                    <a href="<? echo $arResult['ITEMS'][4]["DETAIL_PAGE_URL"] ?>"
                                       class="item--small__title"><?= $arResult['ITEMS'][4]['PROPERTIES']['TITLENEWS']['VALUE'] ?></a>
                                <? } else { ?>
                                    <a href="<? echo $arResult['ITEMS'][4]["DETAIL_PAGE_URL"] ?>"
                                       class="item--small__title"><?= $arResult['ITEMS'][4]['NAME'] ?></a>
                                <? } ?>
                            <? else: ?>
                                <b><? echo $arResult['ITEMS'][4]["NAME"] ?></b>
                            <? endif; ?>


                        <? endif; ?>
                        <? if ($arParams["DISPLAY_DATE"] != "N" && $arResult['ITEMS'][4]["DISPLAY_ACTIVE_FROM"]): ?>
                            <span class="item--small__date"><? echo $arResult['ITEMS'][4]["DISPLAY_ACTIVE_FROM"] ?></span>
                        <? endif ?>
                    </div>
                    <span class="news__all news__all--m"><a href="#"><?= GetMessage('ALLNEWS') ?></a></span>
                </div>

            </div>
        </div>
    </div>
</section>
