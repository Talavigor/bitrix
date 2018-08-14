<? require_once($_SERVER['DOCUMENT_ROOT'] . '/bitrix/modules/main/include/prolog_before.php');

use Bitrix\Main\Application;
use Bitrix\Sale;

if (isset($_POST['sendData']['product_id']) && isset($_POST['sendData']['fio']) && isset($_POST['sendData']['phone']) && isset($_POST['sendData']['email'])) {
    if (CModule::IncludeModule("catalog") && CModule::IncludeModule("sale")) {
        global $USER;
        $user_id = $USER->GetID();
        if (!$user_id) {
            //пароль для нового пользователя
            $pass = rand(100000, 999999);
            //группы, в которых он будет состоять
            $groups = array(3, 4, 5);
            $user_id = $USER->Add(array(
                "NAME" => $_POST['sendData']['fio'],
                "EMAIL" => $_POST['sendData']['email'],
                "LOGIN" => $_POST['sendData']['email'],
                "PERSONAL_PHONE" => $_POST['sendData']['phone'],
                "LID" => "ru",
                "ACTIVE" => "Y",
                "GROUP_ID" => $groups,
                "PASSWORD" => $pass,
                "CONFIRM_PASSWORD" => $pass,
            ));
            $USER->Authorize($user_id);
            $error_text = $USER->LAST_ERROR;
        }
        $product_id = intval($_POST['sendData']['product_id']);

        $ar_res = CCatalogProduct::GetByIDEx($product_id);

// Корзина
        CSaleBasket::DeleteAll(CSaleBasket::GetBasketUserID()); //очищаем корзину
        $basket = Sale\Basket::loadItemsForFUser(Sale\Fuser::getId(), Bitrix\Main\Context::getCurrent()->getSite());


//создаем заказ


        $product_fields = [
            'PRODUCT_ID' => $ar_res['ID'],
            'NAME' => $ar_res['NAME'],
            'CURRENCY' => 'RUB',
            'QUANTITY' => $_POST['sendData']['count']
        ];

        $item = $basket->createItem("catalog", $product_id);

        $item->setFields($product_fields);

        $order = Bitrix\Sale\Order::create(SITE_ID, $user_id);
        $order->setPersonTypeId(1); // Физич/Юридич. лицо
        $order->setBasket($basket);

        // Устанавливаем свойства
        $propertyCollection = $order->getPropertyCollection();
        // телефон
        $phoneProp = $propertyCollection->getPhone();
        $phoneProp->setValue($_POST['sendData']['phone']);
        // имя
        $nameProp = $propertyCollection->getPayerName();
        $nameProp->setValue(!empty($_POST['sendData']['fio']) ? $_POST['sendData']['fio'] : '');
        // email
        $emailProp = $propertyCollection->getUserEmail();
        $emailProp->setValue($_POST['sendData']['email']);

        $order->setField('USER_DESCRIPTION', $_POST['sendData']['message']);
        $result = $order->save();
    }
}
