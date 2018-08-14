<? if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();

use Bitrix\Main\Localization\Loc;

/**
 * @global CMain $APPLICATION
 * @var array $arParams
 * @var array $arResult
 * @var CatalogSectionComponent $component
 * @var CBitrixComponentTemplate $this
 * @var string $templateName
 * @var string $componentPath
 */

$this->setFrameMode(true);

if (!empty($arResult['NAV_RESULT'])) {
    $navParams = array(
        'NavPageCount' => $arResult['NAV_RESULT']->NavPageCount,
        'NavPageNomer' => $arResult['NAV_RESULT']->NavPageNomer,
        'NavNum' => $arResult['NAV_RESULT']->NavNum
    );
} else {
    $navParams = array(
        'NavPageCount' => 1,
        'NavPageNomer' => 1,
        'NavNum' => $this->randString()
    );
}

$showTopPager = false;
$showBottomPager = false;
$showLazyLoad = false;

if ($arParams['PAGE_ELEMENT_COUNT'] > 0 && $navParams['NavPageCount'] > 1) {
    $showTopPager = $arParams['DISPLAY_TOP_PAGER'];
    $showBottomPager = $arParams['DISPLAY_BOTTOM_PAGER'];
    $showLazyLoad = $arParams['LAZY_LOAD'] === 'Y' && $navParams['NavPageNomer'] != $navParams['NavPageCount'];
}

$templateLibrary = array('popup', 'ajax', 'fx');
$currencyList = '';

if (!empty($arResult['CURRENCIES'])) {
    $templateLibrary[] = 'currency';
    $currencyList = CUtil::PhpToJSObject($arResult['CURRENCIES'], false, true, true);
}

$templateData = array(
    'TEMPLATE_THEME' => $arParams['TEMPLATE_THEME'],
    'TEMPLATE_LIBRARY' => $templateLibrary,
    'CURRENCIES' => $currencyList
);
unset($currencyList, $templateLibrary);

$elementEdit = CIBlock::GetArrayByID($arParams['IBLOCK_ID'], 'ELEMENT_EDIT');
$elementDelete = CIBlock::GetArrayByID($arParams['IBLOCK_ID'], 'ELEMENT_DELETE');
$elementDeleteParams = array('CONFIRM' => GetMessage('CT_BCS_TPL_ELEMENT_DELETE_CONFIRM'));

$positionClassMap = array(
    'left' => 'product-item-label-left',
    'center' => 'product-item-label-center',
    'right' => 'product-item-label-right',
    'bottom' => 'product-item-label-bottom',
    'middle' => 'product-item-label-middle',
    'top' => 'product-item-label-top'
);

$discountPositionClass = '';
if ($arParams['SHOW_DISCOUNT_PERCENT'] === 'Y' && !empty($arParams['DISCOUNT_PERCENT_POSITION'])) {
    foreach (explode('-', $arParams['DISCOUNT_PERCENT_POSITION']) as $pos) {
        $discountPositionClass .= isset($positionClassMap[$pos]) ? ' ' . $positionClassMap[$pos] : '';
    }
}

$labelPositionClass = '';
if (!empty($arParams['LABEL_PROP_POSITION'])) {
    foreach (explode('-', $arParams['LABEL_PROP_POSITION']) as $pos) {
        $labelPositionClass .= isset($positionClassMap[$pos]) ? ' ' . $positionClassMap[$pos] : '';
    }
}

$arParams['~MESS_BTN_BUY'] = $arParams['~MESS_BTN_BUY'] ?: Loc::getMessage('CT_BCS_TPL_MESS_BTN_BUY');
$arParams['~MESS_BTN_DETAIL'] = $arParams['~MESS_BTN_DETAIL'] ?: Loc::getMessage('CT_BCS_TPL_MESS_BTN_DETAIL');
$arParams['~MESS_BTN_COMPARE'] = $arParams['~MESS_BTN_COMPARE'] ?: Loc::getMessage('CT_BCS_TPL_MESS_BTN_COMPARE');
$arParams['~MESS_BTN_SUBSCRIBE'] = $arParams['~MESS_BTN_SUBSCRIBE'] ?: Loc::getMessage('CT_BCS_TPL_MESS_BTN_SUBSCRIBE');
$arParams['~MESS_BTN_ADD_TO_BASKET'] = $arParams['~MESS_BTN_ADD_TO_BASKET'] ?: Loc::getMessage('CT_BCS_TPL_MESS_BTN_ADD_TO_BASKET');
$arParams['~MESS_NOT_AVAILABLE'] = $arParams['~MESS_NOT_AVAILABLE'] ?: Loc::getMessage('CT_BCS_TPL_MESS_PRODUCT_NOT_AVAILABLE');
$arParams['~MESS_SHOW_MAX_QUANTITY'] = $arParams['~MESS_SHOW_MAX_QUANTITY'] ?: Loc::getMessage('CT_BCS_CATALOG_SHOW_MAX_QUANTITY');
$arParams['~MESS_RELATIVE_QUANTITY_MANY'] = $arParams['~MESS_RELATIVE_QUANTITY_MANY'] ?: Loc::getMessage('CT_BCS_CATALOG_RELATIVE_QUANTITY_MANY');
$arParams['~MESS_RELATIVE_QUANTITY_FEW'] = $arParams['~MESS_RELATIVE_QUANTITY_FEW'] ?: Loc::getMessage('CT_BCS_CATALOG_RELATIVE_QUANTITY_FEW');

$arParams['MESS_BTN_LAZY_LOAD'] = $arParams['MESS_BTN_LAZY_LOAD'] ?: Loc::getMessage('CT_BCS_CATALOG_MESS_BTN_LAZY_LOAD');

$generalParams = array(
    'SHOW_DISCOUNT_PERCENT' => $arParams['SHOW_DISCOUNT_PERCENT'],
    'PRODUCT_DISPLAY_MODE' => $arParams['PRODUCT_DISPLAY_MODE'],
    'SHOW_MAX_QUANTITY' => $arParams['SHOW_MAX_QUANTITY'],
    'RELATIVE_QUANTITY_FACTOR' => $arParams['RELATIVE_QUANTITY_FACTOR'],
    'MESS_SHOW_MAX_QUANTITY' => $arParams['~MESS_SHOW_MAX_QUANTITY'],
    'MESS_RELATIVE_QUANTITY_MANY' => $arParams['~MESS_RELATIVE_QUANTITY_MANY'],
    'MESS_RELATIVE_QUANTITY_FEW' => $arParams['~MESS_RELATIVE_QUANTITY_FEW'],
    'SHOW_OLD_PRICE' => $arParams['SHOW_OLD_PRICE'],
    'USE_PRODUCT_QUANTITY' => $arParams['USE_PRODUCT_QUANTITY'],
    'PRODUCT_QUANTITY_VARIABLE' => $arParams['PRODUCT_QUANTITY_VARIABLE'],
    'ADD_TO_BASKET_ACTION' => $arParams['ADD_TO_BASKET_ACTION'],
    'ADD_PROPERTIES_TO_BASKET' => $arParams['ADD_PROPERTIES_TO_BASKET'],
    'PRODUCT_PROPS_VARIABLE' => $arParams['PRODUCT_PROPS_VARIABLE'],
    'SHOW_CLOSE_POPUP' => $arParams['SHOW_CLOSE_POPUP'],
    'DISPLAY_COMPARE' => $arParams['DISPLAY_COMPARE'],
    'COMPARE_PATH' => $arParams['COMPARE_PATH'],
    'COMPARE_NAME' => $arParams['COMPARE_NAME'],
    'PRODUCT_SUBSCRIPTION' => $arParams['PRODUCT_SUBSCRIPTION'],
    'PRODUCT_BLOCKS_ORDER' => $arParams['PRODUCT_BLOCKS_ORDER'],
    'LABEL_POSITION_CLASS' => $labelPositionClass,
    'DISCOUNT_POSITION_CLASS' => $discountPositionClass,
    'SLIDER_INTERVAL' => $arParams['SLIDER_INTERVAL'],
    'SLIDER_PROGRESS' => $arParams['SLIDER_PROGRESS'],
    '~BASKET_URL' => $arParams['~BASKET_URL'],
    '~ADD_URL_TEMPLATE' => $arResult['~ADD_URL_TEMPLATE'],
    '~BUY_URL_TEMPLATE' => $arResult['~BUY_URL_TEMPLATE'],
    '~COMPARE_URL_TEMPLATE' => $arResult['~COMPARE_URL_TEMPLATE'],
    '~COMPARE_DELETE_URL_TEMPLATE' => $arResult['~COMPARE_DELETE_URL_TEMPLATE'],
    'TEMPLATE_THEME' => $arParams['TEMPLATE_THEME'],
    'USE_ENHANCED_ECOMMERCE' => $arParams['USE_ENHANCED_ECOMMERCE'],
    'DATA_LAYER_NAME' => $arParams['DATA_LAYER_NAME'],
    'BRAND_PROPERTY' => $arParams['BRAND_PROPERTY'],
    'MESS_BTN_BUY' => $arParams['~MESS_BTN_BUY'],
    'MESS_BTN_DETAIL' => $arParams['~MESS_BTN_DETAIL'],
    'MESS_BTN_COMPARE' => $arParams['~MESS_BTN_COMPARE'],
    'MESS_BTN_SUBSCRIBE' => $arParams['~MESS_BTN_SUBSCRIBE'],
    'MESS_BTN_ADD_TO_BASKET' => $arParams['~MESS_BTN_ADD_TO_BASKET'],
    'MESS_NOT_AVAILABLE' => $arParams['~MESS_NOT_AVAILABLE']
);

$obName = 'ob' . preg_replace('/[^a-zA-Z0-9_]/', 'x', $this->GetEditAreaId($navParams['NavNum']));
$containerName = 'container-' . $navParams['NavNum'];


if ($showTopPager) {
    ?>
    <div data-pagination-num="<?= $navParams['NavNum'] ?>">
        <!-- pagination-container -->
        <?= $arResult['NAV_STRING'] ?>
        <!-- pagination-container -->
    </div>


    <?
}

if ($arParams['HIDE_SECTION_DESCRIPTION'] !== 'Y') {
    ?>
    <!--	<div class="bx-section-desc bx---><?//=$arParams['TEMPLATE_THEME']
    ?><!--">-->
    <!--		<p class="bx-section-desc-post">--><?//=$arResult['DESCRIPTION']
    ?><!--</p>-->
    <!--	</div>-->
    <?
}
?>

<? if ($arResult['DEPTH_LEVEL'] == 2): ?>
    <div class="cart__list">

        <div class="cart__namesofvalues">
            <span class="cart__values cart__values--product"><?= GetMessage('PRODUCT') ?></span>
            <span class="cart__values cart__values--units"><?= GetMessage('UNITS') ?></span>
            <span class="cart__values cart__values--quantity"><?= GetMessage('QUAN') ?></span>
        </div>

        <? foreach ($arResult["ITEMS"] as $arOffer): ?>
            <div class="cart__item">
                <div class="cart__info">
                    <div class="cart__text">
                        <h3 class="cart__title"><? if (LANGUAGE_ID == 'en') {
                                echo $arOffer['PROPERTIES']['CATALOGTITLE']['VALUE'];
                            } else {
                                echo $arOffer['NAME'];
                            } ?>
                        </h3>
                        <?
                        $ar_properties = $arOffer['PROPERTIES'];
                        unset($ar_properties['CATALOGDESCRIPTION']);
                        unset($ar_properties['FORMSCATALOG']);
                        unset($ar_properties['CATALOGANONS']);
                        unset($ar_properties['CATALOGTITLE']);
                        unset($ar_properties['SHORT_TEXT']);

                        ?>


                        <? foreach ($ar_properties as $ar_prop): ?>
                            <? if (!empty($ar_prop['VALUE'])): ?>
                                <span class="cart__type">
                                   <?
                                   $arItemName = explode("@", $ar_prop['NAME']);
                                   if (LANGUAGE_ID == 'en' && !empty($arItemName[1])) {
                                       echo $arItemName[1] . ': ' . $ar_prop['VALUE'];
                                   } else {
                                       echo $arItemName[0] . ': ' . $ar_prop['VALUE'];
                                   }
                                   ?>

                                </span><br>
                            <? endif; ?>
                        <? endforeach; ?>
                    </div>
                </div>

                <div class="cart__howmuch">
                    <div class="cart__whatunit"><span><?= $arOffer['CATALOG_MEASURE_NAME'] ?></span></div>


                    <div class="basket__quantity">
                        <button class="basket__minus">
                            <svg xmlns="http://www.w3.org/2000/svg" version="1.1" id="Layer_1" x="0px" y="0px"
                                 viewBox="0 0 455                                             455"
                                 style="enable-background:new 0 0 455 455;" xml:space="preserve" width="17px"
                                 height="17px">
											<rect y="212.5" width="455" height="30" fill="#7e7e7e"/>
										</svg>


                        </button>
                        <input type="text" class="basket__input" value="1"
                               name="<? echo $arParams["PRODUCT_QUANTITY_VARIABLE"] ?>">
                        <button class="basket__plus">
                            <svg xmlns="http://www.w3.org/2000/svg" version="1.1" id="Capa_1" x="0px" y="0px"
                                 viewBox="0 0 42                                              42"
                                 style="enable-background:new 0 0 42 42;" xml:space="preserve" width="17px"
                                 height="17px">
											<polygon
                                                    points="42,20 22,20 22,0 20,0 20,20 0,20 0,22 20,22 20,42 22,42 22,22 42,22 "
                                                    fill="#7e7e7e"/>
										</svg>
                        </button>
                    </div>
                </div>

                <div class="btns_wr">
                    <a class="bx_basket" href="" data-id="<?= $arOffer['ID']; ?>"
                       data-value="<? if (LANGUAGE_ID == 'en') {
                           echo $arOffer['PROPERTIES']['ART']['VALUE'];
                       } else {
                           echo $arOffer['NAME'];
                       } ?>">
                        <button class="product__button" rel="nofollow">
                            <span class="btnLine topLeft"></span>
                            <span class="btnLine topRight"></span>
                            <span class="btnLine bottomRight"></span>
                            <span class="btnLine bottomLeft"></span>
                            <?= GetMessage('CAT4') ?>
                        </button>
                    </a>

                    <a class="one_click_buy" data-id_one="<?= $arOffer['ID']; ?>"
                       href="/one_click_order?product_id=<?= $arOffer['ID']; ?>">
                        <button class="product__button" rel="nofollow">
                            <span class="btnLine topLeft"></span>
                            <span class="btnLine topRight"></span>
                            <span class="btnLine bottomRight"></span>
                            <span class="btnLine bottomLeft"></span>
                            <?= GetMessage('CAT8') ?>
                        </button>
                    </a>
                </div>
                <div class="cart__separator"></div>
            </div>

        <? endforeach; ?>

    </div>
    </div>
    </div>
    </div>
    </section>


    <script>
        $(document).ready(function () {

            $(".one_click_buy").click(function (event) {
                event.preventDefault();

                var $input = $(this).parent().parent().find('.basket__input');
                var count = parseInt($input.val());
                var product_id = $(this).attr('data-id_one');

                $("#modal_window").load("/one_click_order/index.php", {
                    count: count,
                    product_id: product_id
                }, function () {
                    order_handler();

                });

                $(".overlay").fadeIn('fast');
            });

            function order_handler() {
                $("#one_click_form").submit(function () {
                    if (
                        $('[name="fio"]').val() == '' ||
                        $('[name="phone"]').val() == '' ||
                        $('[name="email"]').val() == ''
                    ) {
                        alert('Заполните обязательные поля');
                    }
                })
            }

            $(".bx_basket").click(function (event) {
                event.preventDefault();

                var $input = $(this).parent().parent().find('.basket__input');
                var count = parseInt($input.val());

                var ids = $(this).attr('data-id');
                var value = $(this).attr('data-value');

                var sendData = {
                    id: ids,
                    value: value,
                    count: count,
                };
                console.log(sendData);

                $.ajax({
                    url: '/catalog/add2basket.php?RND=' + Math.random(),
                    global: false,
                    type: "POST",
                    data: ({sendData: sendData}),
                    success: function (data) {
                        BX.onCustomEvent('OnBasketChange');
                        $.jGrowl("Товар добавлен в корзину");
                    }
                });
                return false;
            });


        });
    </script>


    <section class="buywithit">
        <div class="wr">
            <div class="buywithit__content">
                <div class="title__border">
                    <h2 class="title__name"><?= GetMessage('CAT7') ?></h2>
                </div>

                <div class="buywithit__slider">

                    <button class="buywithit__arrow buywithit__arrow--prev">
                        <svg xmlns="http://www.w3.org/2000/svg" version="1.1" id="Capa_1" x="0px" y="0px"
                             viewBox="0 0 477.175 477.175" style="enable-background:new 0 0 477.175 477.175;"
                             xml:space="preserve" width="20px" height="32px">
							<path d="M145.188,238.575l215.5-215.5c5.3-5.3,5.3-13.8,0-19.1s-13.8-5.3-19.1,0l-225.1,225.1c-5.3,5.3-5.3,13.8,0,19.1l225.1,225   c2.6,2.6,6.1,4,9.5,4s6.9-1.3,9.5-4c5.3-5.3,5.3-13.8,0-19.1L145.188,238.575z"
                                  fill="#c7c7c7"></path>
						</svg>
                    </button>

                    <button class="buywithit__arrow buywithit__arrow--next">
                        <svg xmlns="http://www.w3.org/2000/svg" version="1.1" id="Capa_1" x="0px" y="0px"
                             viewBox="0 0 477.175 477.175" style="enable-background:new 0 0 477.175 477.175;"
                             xml:space="preserve" width="20px" height="32px">
							<path d="M360.731,229.075l-225.1-225.1c-5.3-5.3-13.8-5.3-19.1,0s-5.3,13.8,0,19.1l215.5,215.5l-215.5,215.5   c-5.3,5.3-5.3,13.8,0,19.1c2.6,2.6,6.1,4,9.5,4c3.4,0,6.9-1.3,9.5-4l225.1-225.1C365.931,242.875,365.931,234.275,360.731,229.075z   "
                                  fill="#c7c7c7"></path>
						</svg>
                    </button>

                    <div class="buywithit__slider-wr">
                        <? $APPLICATION->IncludeComponent(
                            "bitrix:catalog.top",
                            "top_element",
                            array(
                                "ACTION_VARIABLE" => "action",
                                "ADD_PICT_PROP" => "-",
                                "ADD_PROPERTIES_TO_BASKET" => "Y",
                                "ADD_TO_BASKET_ACTION" => "ADD",
                                "BASKET_URL" => "/personal/cart",
                                "BRAND_PROPERTY" => "BRAND_REF",
                                "CACHE_FILTER" => "N",
                                "CACHE_GROUPS" => "Y",
                                "CACHE_TIME" => "36000000",
                                "CACHE_TYPE" => "A",
                                "COMPARE_NAME" => "CATALOG_COMPARE_LIST",
                                "COMPARE_PATH" => "",
                                "COMPATIBLE_MODE" => "N",
                                "CONVERT_CURRENCY" => "N",
                                "CURRENCY_ID" => "RUB",
                                "CUSTOM_FILTER" => "{\"CLASS_ID\":\"CondGroup\",\"DATA\":{\"All\":\"OR\",\"True\":\"True\"},\"CHILDREN\":[]}",
                                "DATA_LAYER_NAME" => "dataLayer",
                                "DETAIL_URL" => "",
                                "DISCOUNT_PERCENT_POSITION" => "bottom-right",
                                "DISPLAY_COMPARE" => "N",
                                "ELEMENT_COUNT" => "9",
                                "ELEMENT_SORT_FIELD" => "shows",
                                "ELEMENT_SORT_FIELD2" => "id",
                                "ELEMENT_SORT_ORDER" => "asc",
                                "ELEMENT_SORT_ORDER2" => "desc",
                                "ENLARGE_PRODUCT" => "STRICT",
                                "FILTER_NAME" => "",
                                "HIDE_NOT_AVAILABLE" => "L",
                                "HIDE_NOT_AVAILABLE_OFFERS" => "L",
                                "IBLOCK_ID" => "11",
                                "IBLOCK_TYPE" => "catalog",
                                "LABEL_PROP" => "",
                                "LABEL_PROP_MOBILE" => "",
                                "LABEL_PROP_POSITION" => "top-left",
                                "LINE_ELEMENT_COUNT" => "",
                                "MESS_BTN_ADD_TO_BASKET" => "В корзину",
                                "MESS_BTN_BUY" => "Купить",
                                "MESS_BTN_COMPARE" => "Сравнить",
                                "MESS_BTN_DETAIL" => "Подробнее",
                                "MESS_NOT_AVAILABLE" => "Нет в наличии",
                                "MESS_RELATIVE_QUANTITY_FEW" => "мало",
                                "MESS_RELATIVE_QUANTITY_MANY" => "много",
                                "MESS_SHOW_MAX_QUANTITY" => "Наличие",
                                "OFFERS_CART_PROPERTIES" => array(
                                    0 => "ART",
                                ),
                                "OFFERS_FIELD_CODE" => array(
                                    0 => "PREVIEW_TEXT",
                                    1 => "PREVIEW_PICTURE",
                                    2 => "DETAIL_TEXT",
                                    3 => "DETAIL_PICTURE",
                                    4 => "",
                                ),
                                "OFFERS_LIMIT" => "5",
                                "OFFERS_PROPERTY_CODE" => array(
                                    0 => "ART",
                                    1 => "SIZES_SHOES",
                                    2 => "SIZES_CLOTHES",
                                    3 => "MORE_PHOTO",
                                    4 => "",
                                ),
                                "OFFERS_SORT_FIELD" => "shows",
                                "OFFERS_SORT_FIELD2" => "id",
                                "OFFERS_SORT_ORDER" => "asc",
                                "OFFERS_SORT_ORDER2" => "desc",
                                "OFFER_ADD_PICT_PROP" => "-",
                                "OFFER_TREE_PROPS" => array(),
                                "PARTIAL_PRODUCT_PROPERTIES" => "N",
                                "PRICE_CODE" => array(
                                    0 => "BASE",
                                ),
                                "PRICE_VAT_INCLUDE" => "N",
                                "PRODUCT_BLOCKS_ORDER" => "price,props,sku,quantityLimit,quantity,buttons,compare",
                                "PRODUCT_DISPLAY_MODE" => "Y",
                                "PRODUCT_ID_VARIABLE" => "id",
                                "PRODUCT_PROPERTIES" => array(),
                                "PRODUCT_PROPS_VARIABLE" => "prop",
                                "PRODUCT_QUANTITY_VARIABLE" => "",
                                "PRODUCT_ROW_VARIANTS" => "[{'VARIANT':'2','BIG_DATA':false},{'VARIANT':'2','BIG_DATA':false},{'VARIANT':'2','BIG_DATA':false}]",
                                "PRODUCT_SUBSCRIPTION" => "Y",
                                "PROPERTY_CODE" => array(
                                    0 => "SHORT_TEXT",
                                    1 => "MANUFACTURER",
                                    2 => "MATERIAL",
                                    3 => "",
                                ),
                                "PROPERTY_CODE_MOBILE" => array(
                                    0 => "SHORT_TEXT",
                                ),
                                "RELATIVE_QUANTITY_FACTOR" => "5",
                                "ROTATE_TIMER" => "30",
                                "SECTION_URL" => "",
                                "SEF_MODE" => "Y",
                                "SEF_RULE" => "",
                                "SHOW_CLOSE_POPUP" => "N",
                                "SHOW_DISCOUNT_PERCENT" => "N",
                                "SHOW_MAX_QUANTITY" => "N",
                                "SHOW_OLD_PRICE" => "N",
                                "SHOW_PAGINATION" => "Y",
                                "SHOW_PRICE_COUNT" => "1",
                                "SHOW_SLIDER" => "Y",
                                "SLIDER_INTERVAL" => "3000",
                                "SLIDER_PROGRESS" => "N",
                                "TEMPLATE_THEME" => "blue",
                                "USE_ENHANCED_ECOMMERCE" => "Y",
                                "USE_PRICE_COUNT" => "N",
                                "USE_PRODUCT_QUANTITY" => "N",
                                "VIEW_MODE" => "SLIDER",
                                "COMPONENT_TEMPLATE" => "top_element"
                            ),
                            false
                        ); ?>

                    </div>
                </div>
            </div>
        </div>
    </section>


<? endif; ?>

<?
if ($showLazyLoad) {
    ?>
    <div class=" bx-<?= $arParams['TEMPLATE_THEME'] ?>">
        <div class="btn btn-default btn-lg center-block" style="margin: 15px;"
             data-use="show-more-<?= $navParams['NavNum'] ?>">
            <?= $arParams['MESS_BTN_LAZY_LOAD'] ?>
        </div>
    </div>
    <?
}

if ($showBottomPager) {
    ?>
    <div data-pagination-num="<?= $navParams['NavNum'] ?>">
        <!-- pagination-container -->
        <?= $arResult['NAV_STRING'] ?>
        <!-- pagination-container -->
    </div>
    <?
}

$signer = new \Bitrix\Main\Security\Sign\Signer;
$signedTemplate = $signer->sign($templateName, 'catalog.section');
$signedParams = $signer->sign(base64_encode(serialize($arResult['ORIGINAL_PARAMETERS'])), 'catalog.section');
?>

<script>
    BX.message({
        BTN_MESSAGE_BASKET_REDIRECT: '<?=GetMessageJS('CT_BCS_CATALOG_BTN_MESSAGE_BASKET_REDIRECT')?>',
        BASKET_URL: '<?=$arParams['BASKET_URL']?>',
        ADD_TO_BASKET_OK: '<?=GetMessageJS('ADD_TO_BASKET_OK')?>',
        TITLE_ERROR: '<?=GetMessageJS('CT_BCS_CATALOG_TITLE_ERROR')?>',
        TITLE_BASKET_PROPS: '<?=GetMessageJS('CT_BCS_CATALOG_TITLE_BASKET_PROPS')?>',
        TITLE_SUCCESSFUL: '<?=GetMessageJS('ADD_TO_BASKET_OK')?>',
        BASKET_UNKNOWN_ERROR: '<?=GetMessageJS('CT_BCS_CATALOG_BASKET_UNKNOWN_ERROR')?>',
        BTN_MESSAGE_SEND_PROPS: '<?=GetMessageJS('CT_BCS_CATALOG_BTN_MESSAGE_SEND_PROPS')?>',
        BTN_MESSAGE_CLOSE: '<?=GetMessageJS('CT_BCS_CATALOG_BTN_MESSAGE_CLOSE')?>',
        BTN_MESSAGE_CLOSE_POPUP: '<?=GetMessageJS('CT_BCS_CATALOG_BTN_MESSAGE_CLOSE_POPUP')?>',
        COMPARE_MESSAGE_OK: '<?=GetMessageJS('CT_BCS_CATALOG_MESS_COMPARE_OK')?>',
        COMPARE_UNKNOWN_ERROR: '<?=GetMessageJS('CT_BCS_CATALOG_MESS_COMPARE_UNKNOWN_ERROR')?>',
        COMPARE_TITLE: '<?=GetMessageJS('CT_BCS_CATALOG_MESS_COMPARE_TITLE')?>',
        PRICE_TOTAL_PREFIX: '<?=GetMessageJS('CT_BCS_CATALOG_PRICE_TOTAL_PREFIX')?>',
        RELATIVE_QUANTITY_MANY: '<?=CUtil::JSEscape($arParams['MESS_RELATIVE_QUANTITY_MANY'])?>',
        RELATIVE_QUANTITY_FEW: '<?=CUtil::JSEscape($arParams['MESS_RELATIVE_QUANTITY_FEW'])?>',
        BTN_MESSAGE_COMPARE_REDIRECT: '<?=GetMessageJS('CT_BCS_CATALOG_BTN_MESSAGE_COMPARE_REDIRECT')?>',
        BTN_MESSAGE_LAZY_LOAD: '<?=CUtil::JSEscape($arParams['MESS_BTN_LAZY_LOAD'])?>',
        BTN_MESSAGE_LAZY_LOAD_WAITER: '<?=GetMessageJS('CT_BCS_CATALOG_BTN_MESSAGE_LAZY_LOAD_WAITER')?>',
        SITE_ID: '<?=CUtil::JSEscape(SITE_ID)?>'
    });
    var <?=$obName?> =
    new JCCatalogSectionComponent({
        siteId: '<?=CUtil::JSEscape(SITE_ID)?>',
        componentPath: '<?=CUtil::JSEscape($componentPath)?>',
        navParams: <?=CUtil::PhpToJSObject($navParams)?>,
        deferredLoad: false, // enable it for deferred load
        initiallyShowHeader: '<?=!empty($arResult['ITEM_ROWS'])?>',
        bigData: <?=CUtil::PhpToJSObject($arResult['BIG_DATA'])?>,
        lazyLoad: !!'<?=$showLazyLoad?>',
        loadOnScroll: !!'<?=($arParams['LOAD_ON_SCROLL'] === 'Y')?>',
        template: '<?=CUtil::JSEscape($signedTemplate)?>',
        ajaxId: '<?=CUtil::JSEscape($arParams['AJAX_ID'])?>',
        parameters: '<?=CUtil::JSEscape($signedParams)?>',
        container: '<?=$containerName?>'
    });
</script>