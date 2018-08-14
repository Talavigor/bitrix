<?
define("STOP_STATISTICS", true);
define("PUBLIC_AJAX_MODE", true);

require_once($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php");
use Bitrix\Main\Diag\Debug;
if (isset($_REQUEST["reloadcaptha"]) && $_REQUEST["reloadcaptha"] == "Y")
{
    echo CMain::CaptchaGetCode();

    die();
}

global $USER;

$arResult = array("STATUS" => "N", "NOTIFY_URL" => "", "ERRORS" => "NOTIFY_ERR_REG");

if (CModule::IncludeModule('sale'))
{
    //AJAX
    if ($_SERVER["REQUEST_METHOD"] == "POST" && $_POST['ajax'] == "Y" && check_bitrix_sessid() && !$USER->IsAuthorized())
    {
        $arResult["ERRORS"] = "";
        $arErrors = array();
        $user_mail = trim($_POST['user_mail']);
        $user_name = trim($_POST['user_name']);
        $user_phone = trim($_POST['user_phone']);
        $id = IntVal($_POST['id']);
        $user_login = trim($_POST["user_login"]);
        $user_password = trim($_POST["user_password"]);
        $url = trim($_POST["notifyurl"]);




        if (strlen($user_login) <= 0 && strlen($user_password) <= 0 && strlen($user_mail) <= 0)
            $arResult["ERRORS"] = 'NOTIFY_ERR_NULL';

        if (COption::GetOptionString("main", "captcha_registration", "N") == "Y" || (isset($_SESSION["NOTIFY_PRODUCT"]["CAPTHA"]) && $_SESSION["NOTIFY_PRODUCT"]["CAPTHA"] == "Y"))
        {
            if (!$APPLICATION->CaptchaCheckCode($_REQUEST["captcha_word"], $_REQUEST["captcha_sid"]))
            {
                $arResult["ERRORS"] = 'NOTIFY_ERR_CAPTHA';
            }
        }

        if (strlen($user_mail) > 0 && strlen($arResult["ERRORS"]) <= 0)
        {
            $res = CUser::GetList($b, $o, array("=EMAIL" => $user_mail));
            if($res->Fetch())
                $arResult["ERRORS"] = 'NOTIFY_ERR_MAIL_EXIST';
        }

        if (strlen($arResult["ERRORS"]) <= 0)
        {
            $user_id = $USER->GetID();
//			if (strlen($user_mail) > 0 && COption::GetOptionString("main", "new_user_registration", "N") == "Y")
            if (!$user_id)
            {
//				$user_id = CSaleUser::DoAutoRegisterUser($user_mail, array(), SITE_ID, $arErrors,array($user_name,$user_phone));
                $pass = rand(100000, 999999);

                $user_id = $USER->Add( Array(
                    "NAME" => $user_name,
                    "EMAIL" => $user_mail,
                    "LOGIN" => $user_mail,
                    "PERSONAL_PHONE" => $user_phone,
                    "LID" => "Auto-Facelift",
                    "ACTIVE" => "Y",
                    "GROUP_ID" => array(3,4,5),
                    "PASSWORD" => $pass,
                    "CONFIRM_PASSWORD" => $pass,
                ));

                $USER->Authorize($user_id);



//                Debug::writeToFile($user_id, $varName = "", $fileName = "/log.txt");

                if ($user_id > 0)
                {
                    $USER->Authorize($user_id);
                    if (count($arErrors) > 0)
                    {
                        $arResult["ERRORS"] = $arErrors[0]["TEXT"];
                    }
                }
                else
                {
                    $arResult["ERRORS"] = 'NOTIFY_ERR_REG';
                }
            }
            else
            {
                $arAuthResult = $USER->Login($user_login, $user_password, "Y");
                $rs = $APPLICATION->arAuthResult = $arAuthResult;
                if (count($rs) > 0 && $rs["TYPE"] == "ERROR")
                    $arResult["ERRORS"] = $rs["MESSAGE"];
            }

            if (strlen($arResult["ERRORS"]) <= 0)
            {
                $arResult["STATUS"] = "Y";
            }
        }
    }
}


//        $form_id = 9;
//        CModule::IncludeModule("form");
//        $arValues = Array(
//            'form_text_43'=> $user_name,
//            'form_text_44'=> $user_phone,
//            'form_email_45'=> $user_mail,
//            'WEB_FORM_ID'=> 9,
//            'form_id'=> 'REPORT_AVAILABILITY'
//        );
//
//        $RESULT_ID = CFormResult::Add($form_id, $arValues,'N',$user_id);
//Debug::writeToFile($arValues, $varName = "", $fileName = "/log.txt");

//$form_id = 9;
//if(CModule::IncludeModule("form")) {
//    $arValues = Array(
//        'form_text_43' => 'test',
//        'form_text_44' => 'test',
//        'form_email_45' => 'fkjdsfk@gmail.com'
//
//    );
//
//    CFormResult::Add($form_id, $arValues,'N');
//}

echo CUtil::PhpToJSObject($arResult);

require_once($_SERVER["DOCUMENT_ROOT"].BX_ROOT."/modules/main/include/epilog_after.php");
?>