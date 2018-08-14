<? if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();

$this->IncludeLangFile('template.php');

$cartId = $arParams['cartId'];

require(realpath(dirname(__FILE__)) . '/top_template.php');

if ($arParams["SHOW_PRODUCTS"] == "Y" && ($arResult['NUM_PRODUCTS'] > 0 || !empty($arResult['CATEGORIES']['DELAY']))) {

    ?>




    <div class="basket__drop basket__drop-m">

            <div id="<?= $cartId ?>products" class="bx-basket-item-list-container">
                <? foreach ($arResult["CATEGORIES"] as $category => $items):
                                     if (empty($items))
                        continue;
                    ?>

                    <? foreach ($items as $v): ?>

                        <? if ($v["DETAIL_PAGE_URL"]): ?>
                            <div class="basket__item-wr">

                                <div class="basket__item ">
                                    <div class="basket__img ">
                        <? if ($arParams["SHOW_IMAGE"] == "Y" && $v["PICTURE_SRC"]): ?>

                        <? endif ?>
                                        <span class="basket-item__name">
                                            <? if (LANGUAGE_ID == 'en') {
                                                $db_props = CIBlockElement::GetProperty(11, $v['PRODUCT_ID'], "sort", "asc", Array("CODE"=>"CATALOGTITLE"));
                                                if($ar_props = $db_props->Fetch()):
                                                    $en_name = $ar_props['VALUE'];
                                                endif;
                                                echo $en_name;
                                            } else {
                                                echo $v['NAME'];
                                            } ?>


                                        </span>
                                    </div>
                                    <span class="basket__quantity"><?= $v["QUANTITY"].$v["MEASURE_NAME"]?></span>
                                </div>

                                <div class="bx-basket-item-list-item-remove"
                                     onclick="<?= $cartId ?>.removeItemFromCart(<?= $v['ID'] ?>)"
                                     title="<?= GetMessage("TSB1_DELETE") ?>"></div>
                            </div>
                        <? endif ?>





                <? endforeach ?>

                <? endforeach ?>
            </div>
            <a href="<? SITE_DIR ?>/personal/cart" class="toBasket"><?=GetMessage("GOCART")?></a>

    </div>
    <script>
        BX.ready(function () {
            <?=$cartId?>.
            fixCart();
        });
    </script>
    <?
}