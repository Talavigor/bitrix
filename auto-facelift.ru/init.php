<?php
/*AddEventHandler("catalog", "OnBeforeStoreProductAdd", "InArticul");
AddEventHandler("catalog", "OnBeforeStoreProductUpdate", "InArticul");
function InArticul(&$arFields){
    AddMessage2Log("Произвольный текст сообщения");
    if(CModule::IncludeModule("iblock")) {
        $db_props = CIBlockElement::GetProperty(20, $arFields['PRODUCT_ID'], "sort", "asc", array("CODE" => "CML2_ARTICLE"));
        AddMessage2Log(print_r($db_props,true));
        if($articul=$db_props->fetch()["VALUE"]) {
            AddMessage2Log($articul);
            $arFields['PRODUCT_ID'] = IntVal($articul);
        }
    }
}*/

/**
 * Изменение статуса заказа
 */
AddEventHandler("sale", "OnOrderSave", "onOrderStatusHandlerAmo");
function onOrderStatusHandlerAmo($orderId, $arFields, $arOrder, $isNew){
    $url = 'https://integrator.comf5.ru/moysklad/domains/17475253/?route=hooks/onBxOrderUpdate';
    $statuses = [
        'В пути',
        'Доставлено'
    ];
    $arStatus = CSaleStatus::GetByID($arOrder['STATUS_ID']);
    if (!empty($arStatus) && in_array($arStatus['NAME'], $statuses)) {
        $data = [
            'status' => $arStatus['NAME'],
            'orderMS' => !empty($arOrder['ACCOUNT_NUMBER']) ? $arOrder['ACCOUNT_NUMBER'] : '',
            'orderProps' => array_map(function($e){
                                return ['id' => $e['ID'],
                                        'name' => $e['NAME']];
                            }, CSaleOrderProps::GetList()->arResult),
            'orderPropsValues' => $arOrder['ORDER_PROP']
        ];
        if($curl = curl_init()) {
            curl_setopt($curl, CURLOPT_URL, $url);
            curl_setopt($curl, CURLOPT_RETURNTRANSFER,true);
            curl_setopt($curl, CURLOPT_POST, true);
            curl_setopt($curl, CURLOPT_POSTFIELDS,  http_build_query($data));
            $out = curl_exec($curl);
        }
    }
}




use Bitrix\Main\Diag\Debug;
//-- Добавление обработчика события

AddEventHandler("main", "OnBeforeEventAdd", "bxModifySaleMails");


function bxModifySaleMails($orderID, &$eventName, &$arFields)
{
    $arOrder = CSaleOrder::GetByID($arFields['ORDER_REAL_ID']);

    $order_props = CSaleOrderPropsValue::GetOrderProps($arFields['ORDER_REAL_ID']);

    $phone="";
    $index = "";
    $country_name = "";
    $city_name = "";
    $address = "";
    $name = "";
    while ($arProps = $order_props->Fetch())
    {

        if ($arProps["CODE"] == "PHONE")
        {
            $phone = htmlspecialchars($arProps["VALUE"]);
        }
        if ($arProps["CODE"] == "LOCATION")
        {
            $arLocs = CSaleLocation::GetByID($arProps["VALUE"]);
            $country_name =  $arLocs["COUNTRY_NAME_ORIG"];
            $city_name = $arLocs["CITY_NAME_ORIG"];
        }

        if ($arProps["CODE"] == "ZIP")
        {
            $index = $arProps["VALUE"];
        }
        if ($arProps["CODE"] == "FIO")
        {
            $name = $arProps["VALUE"];
        }

        if ($arProps["CODE"] == "ADDRESS")
        {
            $address = $arProps["VALUE"];
        }
    }

    $full_address = $index.", ".$country_name."-".$city_name.", ".$address;

//    $id_delivery = preg_replace("/[^0-9]/", '', $arOrder["DELIVERY_ID"]);
    $id_delivery = $arOrder["DELIVERY_ID"];


    //-- получаем название службы доставки
    $arDeliv = CSaleDelivery::GetByID($id_delivery);


    $delivery_name = "";
    if ($arDeliv)
    {
        $delivery_name = $arDeliv["NAME"];
    }


    //-- получаем название платежной системы
    $arPaySystem = CSalePaySystem::GetByID($arOrder["PAY_SYSTEM_ID"]);
    $pay_system_name = "";
    if ($arPaySystem)
    {
        $pay_system_name = $arPaySystem["NAME"];
    }



    $dbBasketItems = CSaleBasket::GetList(array(), array("ORDER_ID" => $arFields['ORDER_REAL_ID']), false, false, array());
    while ($arItems = $dbBasketItems->Fetch()) {
        Debug::writeToFile($arItems, $varNames = "", $fileName = "/log.txt");

        $arFields['DETAIL_PAGE_URL'] = $arItems['DETAIL_PAGE_URL'];
        $arFields['NAME_PRODUCT'] = $arItems['NAME'];
        $arFields['PRICE_PRODUCT_1'] = round($arItems['PRICE']);
        $arFields['CURRENCY'] = $arItems['CURRENCY'];
        $arFields['DISCOUNT_PRICE_1'] = $arItems['DISCOUNT_PRICE'];
        $arFields['ID_PRODUCT'] = $arItems['PRODUCT_ID'];
        $arFields['QUANTITY'] = $arItems['QUANTITY'];



        if ($arProduct = CIBlockElement::GetByID($arItems['PRODUCT_ID'])->Fetch()) {
            if ($arProduct['PREVIEW_PICTURE'] > 0) {
                $fileID = $arProduct['PREVIEW_PICTURE'];
            } elseif ($arProduct['DETAIL_PICTURE'] > 0) {
                $fileID = $arProduct['DETAIL_PICTURE'];
            } else {
                $fileID = 0;
            }
            $arPicture = CFile::ResizeImageGet($fileID, array('width' => 90, 'height' => 110));
            $arPicture['SIZE'] = getimagesize($_SERVER['DOCUMENT_ROOT'].$arPicture['src']);
        }


        $arFields['DETAIL_PICTURE'] = $arPicture['src'];


    }



  

    //-- добавляем новые поля в массив результатов
    $arFields['IP_CLIENT'] = $_SERVER['REMOTE_ADDR'];
    $arFields["ORDER_DESCRIPTION"] = $arOrder["USER_DESCRIPTION"];
    $arFields["PHONE"] =  $phone;
    $arFields["DELIVERY_NAME"] =  $delivery_name;
    $arFields["PAY_SYSTEM_NAME"] =  $pay_system_name;
    $arFields["FULL_ADDRESS"] = $full_address;
    $arFields["USER_NAME"] = $arOrder['USER_NAME'];
    $arFields["USER_LAST_NAME"] = $arOrder['USER_LAST_NAME'];
    $arFields["DELIVERY_PRICE_1"] = $arOrder['PRICE_DELIVERY'];
    $arFields["TOTAL_PRICE_1"] = $arFields['PRICE_PRODUCT_1']*$arFields['QUANTITY'];


}

