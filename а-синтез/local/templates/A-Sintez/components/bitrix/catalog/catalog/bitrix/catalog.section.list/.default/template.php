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

$arViewModeList = $arResult['VIEW_MODE_LIST'];

$arViewStyles = array(
    'LIST' => array(
        'CONT' => 'bx_sitemap',
        'TITLE' => 'bx_sitemap_title',
        'LIST' => 'bx_sitemap_ul',
    ),
    'LINE' => array(
        'CONT' => 'bx_catalog_line',
        'TITLE' => 'bx_catalog_line_category_title',
        'LIST' => 'bx_catalog_line_ul',
        'EMPTY_IMG' => $this->GetFolder() . '/images/line-empty.png'
    ),
    'TEXT' => array(
        'CONT' => 'bx_catalog_text',
        'TITLE' => 'bx_catalog_text_category_title',
        'LIST' => 'bx_catalog_text_ul'
    ),
    'TILE' => array(
        'CONT' => 'bx_catalog_tile',
        'TITLE' => 'bx_catalog_tile_category_title',
        'LIST' => 'bx_catalog_tile_ul',
        'EMPTY_IMG' => $this->GetFolder() . '/images/tile-empty.png'
    )
);
$arCurView = $arViewStyles[$arParams['VIEW_MODE']];

$strSectionEdit = CIBlock::GetArrayByID($arParams["IBLOCK_ID"], "SECTION_EDIT");
$strSectionDelete = CIBlock::GetArrayByID($arParams["IBLOCK_ID"], "SECTION_DELETE");
$arSectionDeleteParams = array("CONFIRM" => GetMessage('CT_BCSL_ELEMENT_DELETE_CONFIRM'));

$db_li = CIBlockSection::GetList($arOrder = Array("SORT" => "ASC"), $arFilter = Array("IBLOCK_ID" => $arParams["IBLOCK_ID"], "ID" => $arParams["SECTION_ID"]), true, $arSelect = Array("UF_SECTIONTITLE", "UF_SECTIONDESC", "UF_CAT_DESCRIPTION"));
$ar_result = $db_li->GetNext();

?>



<? if (empty($arParams['SECTION_CODE'])): ?>
    <section class="pagename">
        <h2 class="pagename__title">
            <? echo Getmessage('CATALOG'); ?>
        </h2>
    </section>

    <? $APPLICATION->IncludeComponent(
        "bitrix:breadcrumb",
        "breadcrumb",
        array(
            "PATH" => "",
            "SITE_ID" => "s1",
            "START_FROM" => "0",
            "COMPONENT_TEMPLATE" => "breadcrumb"
        ),
        false
    ); ?>

    <section class="catalog">
        <div class="wr">
            <div class="catalog__content">
                <h2 class="catalog__title">
                    <? if (LANGUAGE_ID == 'en') {
                        $APPLICATION->IncludeComponent(
                            "bitrix:main.include",
                            "include_files",
                            Array(
                                "AREA_FILE_SHOW" => "file",
                                "EDIT_TEMPLATE" => "",
                                "PATH" => SITE_TEMPLATE_PATH . "/include_areas/en_catalog_desc.php"
                            )
                        );
                    } else {
                        $APPLICATION->IncludeComponent(
                            "bitrix:main.include",
                            "include_files",
                            Array(
                                "AREA_FILE_SHOW" => "file",
                                "EDIT_TEMPLATE" => "",
                                "PATH" => SITE_TEMPLATE_PATH . "/include_areas/catalog_desc.php"
                            )
                        );
                    }
                    ?>
                </h2>


                <div class="<? echo $arCurView['CONT']; ?>">
                    <?
                    if ('Y' == $arParams['SHOW_PARENT_NAME'] && 0 < $arResult['SECTION']['ID']) {
                        $this->AddEditAction($arResult['SECTION']['ID'], $arResult['SECTION']['EDIT_LINK'], $strSectionEdit);
                        $this->AddDeleteAction($arResult['SECTION']['ID'], $arResult['SECTION']['DELETE_LINK'], $strSectionDelete, $arSectionDeleteParams);
                    }
                    if (0 < $arResult["SECTIONS_COUNT"]) {
                        ?>

                        <div class="catalog__list  <? echo $arCurView['LIST']; ?>">

                            <? switch ($arParams['VIEW_MODE']) {
                                case 'TILE':
                                    foreach ($arResult['SECTIONS'] as &$arSection) {
                                        $this->AddEditAction($arSection['ID'], $arSection['EDIT_LINK'], $strSectionEdit);
                                        $this->AddDeleteAction($arSection['ID'], $arSection['DELETE_LINK'], $strSectionDelete, $arSectionDeleteParams);

                                        if (false === $arSection['PICTURE'])
                                            $arSection['PICTURE'] = array(
                                                'SRC' => $arCurView['EMPTY_IMG'],
                                                'ALT' => (
                                                '' != $arSection["IPROPERTY_VALUES"]["SECTION_PICTURE_FILE_ALT"]
                                                    ? $arSection["IPROPERTY_VALUES"]["SECTION_PICTURE_FILE_ALT"]
                                                    : $arSection["NAME"]
                                                ),
                                                'TITLE' => (
                                                '' != $arSection["IPROPERTY_VALUES"]["SECTION_PICTURE_FILE_TITLE"]
                                                    ? $arSection["IPROPERTY_VALUES"]["SECTION_PICTURE_FILE_TITLE"]
                                                    : $arSection["NAME"]
                                                )
                                            );

                                        $db_list = CIBlockSection::GetList($arOrder = Array("SORT" => "ASC"), $arFilter = Array("IBLOCK_ID" => $arSection["IBLOCK_ID"], "ID" => $arSection["ID"]), true, $arSelect = Array("UF_SECTIONTITLE", "UF_CAT_DESCRIPTION", "UF_HOVER_DESC", "UF_SECTIONDESC"));
                                        $ar_cats = $db_list->GetNext();

                                        ?>

                                        <div class="catalog__item">
                                            <div class="img__wr1"
                                                 id="<? echo $this->GetEditAreaId($arSection['ID']); ?>">
                                                <div class="img__wr">
                                                    <img src="<? echo $arSection['PICTURE']['SRC']; ?>"
                                                         alt="<? echo $arSection['PICTURE']['TITLE']; ?>"
                                                         class="catalog__img">
                                                    <div class="catalog__overlay">
                                                        <p>
                                                            <? if (LANGUAGE_ID == 'en' && !empty($ar_cats['UF_SECTIONDESC'])) {
                                                                echo $ar_cats['UF_SECTIONDESC'];
                                                            } else {
                                                                echo $ar_cats['UF_CAT_DESCRIPTION'];
                                                            } ?>
                                                        </p>
                                                    </div>

                                                </div>

                                                <? if ('Y' != $arParams['HIDE_SECTION_NAME']) { ?>


                                                    <a href="<? echo $arSection['SECTION_PAGE_URL']; ?>"
                                                       class="catalog__button yellowbutton">
                                                        <span class="btnLine topLeft"></span>
                                                        <span class="btnLine topRight"></span>
                                                        <span class="btnLine bottomRight"></span>
                                                        <span class="btnLine bottomLeft"></span>
                                                        <?= GetMessage('VIEWD') ?>
                                                    </a>

                                                    <? if ($arParams["COUNT_ELEMENTS"]) { ?>
                                                        <span>(<? echo $arSection['ELEMENT_CNT']; ?>)</span>
                                                    <? }
                                                } ?>
                                            </div>
                                            <? if (LANGUAGE_ID == 'en' && !empty($ar_cats['UF_SECTIONTITLE'])) { ?>
                                                <span class="catalog__name"><? echo $ar_cats['UF_SECTIONTITLE']; ?></span>
                                                <?
                                            } else { ?>
                                                <span class="catalog__name"><? echo $arSection['NAME']; ?></span>
                                                <?
                                            } ?>
                                        </div>
                                    <? }
                                    unset($arSection);
                                    break;
                            } ?>

                        </div>

                        <? echo('LINE' != $arParams['VIEW_MODE'] ? '<div style="clear: both;"></div>' : '');
                    } ?>
                </div>


                <div class="block block1"></div>
                <div class="block block2"></div>
                <div class="block block3"></div>
                <div class="block block4"></div>
                <div class="block block5"></div>
                <div class="block block6"></div>
                <div class="block block7"></div>
                <div class="block block8"></div>
            </div>

        </div>
    </section>
<? endif; ?>

<? if (!empty($arParams['SECTION_CODE'])): ?>

    <section class="pagename">
        <h2 class="pagename__title">
            <? if (LANGUAGE_ID == 'en' && !empty($ar_result['UF_SECTIONTITLE'])) {
                echo $ar_result['UF_SECTIONTITLE'];
            } else {
                echo $arResult['SECTION']['NAME'];
            } ?>
        </h2>
    </section>

    <? $APPLICATION->IncludeComponent(
        "bitrix:breadcrumb",
        "breadcrumb",
        array(
            "PATH" => "",
            "SITE_ID" => "s1",
            "START_FROM" => "0",
            "COMPONENT_TEMPLATE" => "breadcrumb"
        ),
        false
    ); ?>
    <? if ($arResult['SECTION']['DEPTH_LEVEL'] != 2): ?>
        <section class="catalog">
            <div class="wr">
                <div class="catalog__content">
                    <h2 class="catalog__title">
                        <? if (LANGUAGE_ID == 'en' && !empty($ar_result['UF_SECTIONDESC'])) {
                            echo $ar_result['UF_SECTIONDESC'];
                        } else {
                            echo $ar_result['UF_CAT_DESCRIPTION'];
                        } ?>
                    </h2>


                    <div class="<? echo $arCurView['CONT']; ?>">
                        <?
                        if ('Y' == $arParams['SHOW_PARENT_NAME'] && 0 < $arResult['SECTION']['ID']) {
                            $this->AddEditAction($arResult['SECTION']['ID'], $arResult['SECTION']['EDIT_LINK'], $strSectionEdit);
                            $this->AddDeleteAction($arResult['SECTION']['ID'], $arResult['SECTION']['DELETE_LINK'], $strSectionDelete, $arSectionDeleteParams);
                        }
                        if (0 < $arResult["SECTIONS_COUNT"]) {
                            ?>

                            <div class="catalog__list  <? echo $arCurView['LIST']; ?>">

                                <? switch ($arParams['VIEW_MODE']) {
                                    case 'TILE':
                                        foreach ($arResult['SECTIONS'] as &$arSection) {
                                            $this->AddEditAction($arSection['ID'], $arSection['EDIT_LINK'], $strSectionEdit);
                                            $this->AddDeleteAction($arSection['ID'], $arSection['DELETE_LINK'], $strSectionDelete, $arSectionDeleteParams);

                                            if (false === $arSection['PICTURE'])
                                                $arSection['PICTURE'] = array(
                                                    'SRC' => $arCurView['EMPTY_IMG'],
                                                    'ALT' => (
                                                    '' != $arSection["IPROPERTY_VALUES"]["SECTION_PICTURE_FILE_ALT"]
                                                        ? $arSection["IPROPERTY_VALUES"]["SECTION_PICTURE_FILE_ALT"]
                                                        : $arSection["NAME"]
                                                    ),
                                                    'TITLE' => (
                                                    '' != $arSection["IPROPERTY_VALUES"]["SECTION_PICTURE_FILE_TITLE"]
                                                        ? $arSection["IPROPERTY_VALUES"]["SECTION_PICTURE_FILE_TITLE"]
                                                        : $arSection["NAME"]
                                                    )
                                                );

                                            $db_list = CIBlockSection::GetList($arOrder = Array("SORT" => "ASC"), $arFilter = Array("IBLOCK_ID" => $arSection["IBLOCK_ID"], "ID" => $arSection["ID"]), true, $arSelects = Array("UF_SECTIONTITLE", "UF_CAT_DESCRIPTION", "UF_HOVER_DESC", "UF_SECTIONDESC"));
                                            $ar_cat = $db_list->GetNext();

                                            ?>

                                            <div class="catalog__item">
                                                <div class="img__wr1"
                                                     id="<? echo $this->GetEditAreaId($arSection['ID']); ?>">
                                                    <div class="img__wr">
                                                        <img src="<? echo $arSection['PICTURE']['SRC']; ?>"
                                                             alt="<? echo $arSection['PICTURE']['TITLE']; ?>"
                                                             class="catalog__img">
                                                        <div class="catalog__overlay">
                                                            <p>
                                                                <? if (LANGUAGE_ID == 'en' && !empty($ar_cat['UF_SECTIONDESC'])) {
                                                                    echo $ar_cat['UF_SECTIONDESC'];
                                                                } else {
                                                                    echo $ar_cat['UF_CAT_DESCRIPTION'];
                                                                } ?>
                                                            </p>
                                                        </div>

                                                    </div>

                                                    <? if ('Y' != $arParams['HIDE_SECTION_NAME']) { ?>


                                                        <a href="<? echo $arSection['SECTION_PAGE_URL']; ?>">
                                                            <button class="catalog__button yellowbutton">
                                                                <span class="btnLine topLeft"></span>
                                                                <span class="btnLine topRight"></span>
                                                                <span class="btnLine bottomRight"></span>
                                                                <span class="btnLine bottomLeft"></span>
                                                                <?= GetMessage('VIEWD') ?>
                                                        </a>

                                                        <? if ($arParams["COUNT_ELEMENTS"]) { ?>
                                                            <span>(<? echo $arSection['ELEMENT_CNT']; ?>)</span>
                                                        <? }
                                                    } ?>
                                                </div>

                                                <? if (LANGUAGE_ID == 'en' && !empty($ar_cat['UF_SECTIONTITLE'])) { ?>
                                                    <span class="catalog__name"><? echo $ar_cat['UF_SECTIONTITLE']; ?></span>
                                                    <?
                                                } else { ?>
                                                    <span class="catalog__name"><? echo $arSection['NAME']; ?></span>
                                                    <?
                                                } ?>
                                            </div>
                                        <? }
                                        unset($arSection);
                                        break;
                                } ?>

                            </div>

                            <? echo('LINE' != $arParams['VIEW_MODE'] ? '<div style="clear: both;"></div>' : '');
                        } ?>
                    </div>


                    <div class="block block1"></div>
                    <div class="block block2"></div>
                    <div class="block block3"></div>
                    <div class="block block4"></div>
                    <div class="block block5"></div>
                    <div class="block block6"></div>
                    <div class="block block7"></div>
                    <div class="block block8"></div>
                </div>

            </div>
        </section>
    <? endif; ?>
<? endif; ?>

<? if ($arResult['SECTION']['DEPTH_LEVEL'] == 2): ?>
<?
$cat_image = CFile::GetPath($arResult['SECTION']['PICTURE']);

$db_lists = CIBlockSection::GetList(Array(SORT => "ASC"),
    $arFilter = Array("IBLOCK_ID" => $arResult['SECTION']["IBLOCK_ID"], "ID" => $arResult['SECTION']['ID']),
    true,
    $arSel = Array("UF_*"));
$cat_result = $db_lists->GetNext();

$res_cat = CIBlockSection::GetByID($arResult['SECTION']['ID']);
$cat_res = $res_cat->Fetch();
$parent_id = $cat_res['IBLOCK_SECTION_ID'];
$parent_lists = CIBlockSection::GetList(Array(SORT => "ASC"),
    $arFilter = Array("IBLOCK_ID" => $arParams['IBLOCK_ID'], "ID" => $parent_id),
    true,
    $arSel1 = Array("UF_*"));
$parent_result = $parent_lists->GetNext();


?>

<section class="product">
    <div class="wr">
        <div class="product__content">


            <div class="product__example">
                <div class="img__wr">
                    <img src="<? echo $cat_image ?>" alt="<? echo $arResult['SECTION']['NAME'] ?>"
                         class="product__img">
                </div>
            </div>


            <div class="product__choice">
                <h2 class="product__title"><?
                    if (LANGUAGE_ID == 'en' && !empty($cat_result['UF_SECTIONTITLE'])) {
                        echo $cat_result['UF_SECTIONTITLE'];
                    } else {
                        echo $arResult['SECTION']['NAME'];
                    } ?></h2>

                <div class="product__category">
                    <span><?= GetMessage('CAT1') ?></span>
                    <? if (LANGUAGE_ID == 'en' && !empty($parent_result['UF_SECTIONTITLE'])) { ?>
                        <a href="<? //= 'catalog/'.$parent_result['CODE'] ?>"><? echo $parent_result['UF_SECTIONTITLE'] ?></a>
                    <? } else { ?>
                        <a href="/catalog/<?= $parent_result['CODE'] ?>/"><? echo $parent_result['NAME'] ?></a>
                    <? } ?>
                </div>

                <p class="product__text">
                    <? if (LANGUAGE_ID == 'en' && !empty($cat_result['UF_SECTIONDESC'])) {
                        echo $cat_result['UF_SECTIONDESC'];
                    } else {
                        echo $cat_result['UF_CAT_DESCRIPTION'];
                    } ?>
                </p>

                <a href="#column_product" rel="nofollow"><? echo GetMessage("CATALOG_BUY") ?>
                    <button class="product__button">
                        <span class="btnLine topLeft"></span>
                        <span class="btnLine topRight"></span>
                        <span class="btnLine bottomRight"></span>
                        <span class="btnLine bottomLeft"></span>
                        <?= GetMessage('CAT2') ?>
                    </button>
                </a>
            </div>

            <div class="block block1"></div>
            <div class="block block2"></div>
            <div class="block block3"></div>
            <div class="block block4"></div>
            <div class="block block5"></div>
            <div class="block block6"></div>
            <div class="block block7"></div>
            <div class="block block8"></div>


        </div>
    </div>
</section>

<section class="describe" id="column_product">
    <div class="wr">
        <div class="describe__content">
            <div class="describe__tabs">
                <a href="#describe" class="describe__tab describe__tab--descr tab-active"><?= GetMessage('CAT5') ?></a>
                <a href="#types" class="describe__tab describe__tab--types"><?= GetMessage('CAT6') ?></a>

            </div>
            <div class="describe__text describe__text--descr ">
                <? if (LANGUAGE_ID == 'en' && !empty($cat_result['UF_HOVER_DESC'])) {
                    echo $cat_result['UF_HOVER_DESC'];
                } else {
                    echo $cat_result['DESCRIPTION'];
                } ?>

            </div>

            <div class="describe__main">
                <div class="filter__button">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 247.46 247.46" width="30px" height="40px">
                        <path d="M246.744,13.984c-1.238-2.626-3.881-4.301-6.784-4.301H7.5c-2.903,0-5.545,1.675-6.784,4.301  c-1.238,2.626-0.85,5.73,0.997,7.97l89.361,108.384v99.94c0,2.595,1.341,5.005,3.545,6.373c1.208,0.749,2.579,1.127,3.955,1.127  c1.137,0,2.278-0.259,3.33-0.78l50.208-24.885c2.551-1.264,4.165-3.863,4.169-6.71l0.098-75.062l89.366-108.388  C247.593,19.714,247.982,16.609,246.744,13.984z M143.097,122.873c-1.105,1.34-1.711,3.023-1.713,4.761l-0.096,73.103  l-35.213,17.453v-90.546c0-1.741-0.605-3.428-1.713-4.771L23.404,24.682h200.651L143.097,122.873z"
                              fill="#525252"/>
                    </svg>

                </div>

                <? $APPLICATION->ShowViewContent("filtr_area") ?>


                <? endif; ?>

