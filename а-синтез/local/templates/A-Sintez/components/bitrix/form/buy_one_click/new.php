<?
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();

$APPLICATION->IncludeComponent("bitrix:form.result.new", "", $arParams, $component);
?>
<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php");

global $USER;
use Bitrix\Main,
    Bitrix\Main\Loader,
    Bitrix\Main\Config\Option,
    Bitrix\Sale,
    Bitrix\Sale\Order,
    Bitrix\Main\Application,
    Bitrix\Sale\DiscountCouponsManager;

if (!Loader::IncludeModule('sale'))
    die();

$request = Application::getInstance()->getContext()->getRequest();





global $USER, $APPLICATION;

$siteId = \Bitrix\Main\Context::getCurrent()->getSite();

$currencyCode = Option::get('sale', 'default_currency', 'RUB');

DiscountCouponsManager::init();

$registeredUserID = $USER->GetID();

$basket = Sale\Basket::loadItemsForFUser(Sale\Fuser::getId(), Bitrix\Main\Context::getCurrent()->getSite());


if ($item = $basket->getExistsItem('catalog', 73)) {
    $item->setField('QUANTITY', $item->getQuantity() + $quantity);

} else {
    $item = $basket->createItem('catalog', 73);
    $item->setFields(array(
        'QUANTITY' => 1,
        'CURRENCY' => \Bitrix\Currency\CurrencyManager::getBaseCurrency(),
        'LID' => \Bitrix\Main\Context::getCurrent()->getSite(),
        'PRODUCT_PROVIDER_CLASS' => 'CCatalogProductProvider',
    ));
}
$basket->save();

$order = Order::create($siteId, $registeredUserID);
$order->setPersonTypeId(1);
$basket = Sale\Basket::loadItemsForFUser(\CSaleBasket::GetBasketUserID(), Bitrix\Main\Context::getCurrent()->getSite())->getOrderableItems();

$order->setBasket($basket);

/*Shipment*/
$shipmentCollection = $order->getShipmentCollection();
$shipment = $shipmentCollection->createItem();
$shipment->setFields(array(
    'DELIVERY_ID' => 4,
    'DELIVERY_NAME' => 'Самовывоз',
    'CURRENCY' => $order->getCurrency()
));


$shipmentItemCollection = $shipment->getShipmentItemCollection();

foreach ($order->getBasket() as $item)
{
    $shipmentItem = $shipmentItemCollection->createItem($item);
    $shipmentItem->setQuantity($item->getQuantity());
}


/*Payment*/
$paymentCollection = $order->getPaymentCollection();
$extPayment = $paymentCollection->createItem();
$extPayment->setFields(array(
    'PAY_SYSTEM_ID' => 3,
    'PAY_SYSTEM_NAME' => 'Наличные',
    'SUM' => $order->getPrice()
));

/**/
$order->doFinalAction(true);

$propertyCollection = $order->getPropertyCollection();

$propertyCollection = $order->getPropertyCollection();


foreach ($propertyCollection->getGroups() as $group)
{

    foreach ($propertyCollection->getGroupProperties($group['ID']) as $property)
    {

        $p = $property->getProperty();
        if( $p["CODE"] == "CONTACT_PERSON")
            $property->setValue("VASYA");

    }
}



$order->setField('CURRENCY', $currencyCode);
$order->setField('COMMENTS', 'Заказ оформлен через АПИ. ' . $comment);
$order->save();
$orderId = $order->GetId();

if($orderId > 0){
    echo "Ваш заказ оформлен";
}
else{
    echo "Ошибка оформления";
}

?>
