<?if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED!==true) die();
/**
 * @global array $arParams
 * @global CUser $USER
 * @global CMain $APPLICATION
 * @global string $cartId
 */
$compositeStub = (isset($arResult['COMPOSITE_STUB']) && $arResult['COMPOSITE_STUB'] == 'Y');
?>

    <div class="basket__icon"></div>
    <div class="basket__text">
        <span class="basket__name"><?=GetMessage("TSB1_CART")?></span>
        <span class="basket__goods"><span class="basket__quantity">
                <?
                if ($arParams['SHOW_NUM_PRODUCTS'] == 'Y' && ($arResult['NUM_PRODUCTS'] > 0 || $arParams['SHOW_EMPTY_VALUES'] == 'Y'))
                {
                    echo $arResult['NUM_PRODUCTS'];
                }
                ?>
            </span><?=GetMessage('TOV')?></span>
    </div>

<div class="header__basket-wr">
    <div class="header__basket--full">
        <?
        if ($arParams['SHOW_NUM_PRODUCTS'] == 'Y' && ($arResult['NUM_PRODUCTS'] > 0 || $arParams['SHOW_EMPTY_VALUES'] == 'Y'))
        {
            echo $arResult['NUM_PRODUCTS'];
        }
        ?>
    </div>
    <img src="<?SITE_DIR?>/local/templates/A-Sintez/img/online-shopping-cart-grey.svg" alt="" class="header__basket-img">
</div>










