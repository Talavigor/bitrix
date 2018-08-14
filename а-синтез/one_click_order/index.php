<?
require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/modules/main/include/prolog_before.php");
if (CModule::IncludeModule("catalog")) {

    $ID = intval($_POST['product_id']);
    $ar_res = CCatalogProduct::GetByIDEx($ID);
    $COUNT = $_POST['count'];

    if (is_array($ar_res)) {
        global $USER;
        $rsUser = CUser::GetByID($USER->GetID());
        $arUser = $rsUser->Fetch();
        ?>
        <div class="popup popup--one-click" id="form_one_click">

            <span class="popup__title">Купить в 1 клик</span>
            <a href="<?= $ar_res['DETAIL_PAGE_URL'] ?>"><?= $ar_res['NAME'] ?></a>
            <form id="one_click_form" name="one_click_form">
                <input type="hidden" id="product_id" name="product_id" value="<?= $ID ?>">
                <input type="hidden" name="count" value="<?= $COUNT ?>">
                <input type="text" name="fio" value="<?= $USER->GetFullName() ?>" placeholder="ФИО"
                       class="popup-input__name popup-input">
                <input type="tel" name="phone" value="<?= $arUser['PERSONAL_PHONE'] ?>" placeholder="Ваш номер телефона"
                       class="popup-input__phone popup-input">
                <input type="email" name="email" value="<?= $USER->GetEmail() ?>" placeholder="E-mail"
                       class="popup-input__phone popup-input">
                <textarea placeholder="Комментарий к заказу" name="message" value='' class="feedback__textarea"
                          rows="5" cols="40"></textarea>
                <div class="order-call__button">
                    <span class="btnLine topLeft"></span>
                    <span class="btnLine topRight"></span>
                    <span class="btnLine bottomRight"></span>
                    <span class="btnLine bottomLeft"></span>
                    <input class="order-submit__close" type="submit" value="Отправить">
                </div>

            </form>
            <button class="order-call__close"></button>
        </div>

        <script>
            $(".order-call__close").click(function () {
                $(".popup").fadeOut();

                $(".overlay").fadeOut('slow');
            });

            $(".order-submit__close").click(function () {
                $(".popup").fadeOut();

                $(".overlay").fadeOut('slow');
            });

            $(document).ready(function () {

                $("#one_click_form").submit(function () {

                    var count = $('[name="count"]').val();
                    var product_id = $('[name="product_id"]').val();
                    var fio = $('[name="fio"]').val();
                    var phone = $('[name="phone"]').val();
                    var email = $('[name="email"]').val();
                    var message = $('[name="message"]').val();

                    var sendData = {
                        product_id: product_id,
                        fio: fio,
                        phone: phone,
                        email: email,
                        count: count,
                        message: message
                    };

                    $.ajax({
                        url: '/one_click_order/handler.php',
                        type: "POST",
                        data: ({sendData: sendData}),
                        success: function () {

                            $.jGrowl("Заказ успешно оформлен");
                        }
                    });
                    return false;
                });
            });
        </script>
        <?
    }
}
?>
