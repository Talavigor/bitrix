<?
if(!defined("B_PROLOG_INCLUDED")||B_PROLOG_INCLUDED!==true)die();
/**
 * Bitrix vars
 *
 * @var array $arParams
 * @var array $arResult
 * @var CBitrixComponentTemplate $this
 * @global CMain $APPLICATION
 * @global CUser $USER
 */
?>
<div class="mfeedback">
<?if(!empty($arResult["ERROR_MESSAGE"]))
{
	foreach($arResult["ERROR_MESSAGE"] as $v)
		ShowError($v);
}
if(strlen($arResult["OK_MESSAGE"]) > 0)
{
	?><div class="mf-ok-text"><?=$arResult["OK_MESSAGE"]?></div><?
}
?>

<form action="<?=POST_FORM_ACTION_URI?>" method="POST" class="feedback__form">
<?=bitrix_sessid_post()?>

		<input type="text" name="user_name" value="<?=$arResult["AUTHOR_NAME"]?>" class="feedback__input" placeholder="<?=GetMessage('MFT_NAME')?>">

		<input type="text" name="user_email" value="<?=$arResult["AUTHOR_EMAIL"]?>" class="feedback__input" placeholder="<?=GetMessage('MFT_PHONE')?>">

		<textarea name="MESSAGE" rows="5" cols="40" class="feedback__textarea" placeholder="<?=GetMessage('MFT_MESSAGE')?>"><?=$arResult["MESSAGE"]?></textarea>


	<?if($arParams["USE_CAPTCHA"] == "Y"):?>
	<div class="mf-captcha" style="display:none;">
		<div class="mf-text"><?=GetMessage("MFT_CAPTCHA")?></div>
		<input type="hidden" name="captcha_sid" value="<?=$arResult["capCode"]?>">
		<img src="/bitrix/tools/captcha.php?captcha_sid=<?=$arResult["capCode"]?>" width="180" height="40" alt="CAPTCHA">
		<div class="mf-text"><?=GetMessage("MFT_CAPTCHA_CODE")?><span class="mf-req">*</span></div>
		<input type="text" name="captcha_word" size="30" maxlength="50" value="">
	</div>
	<?endif;?>

	<input type="hidden" name="PARAMS_HASH" value="<?=$arResult["PARAMS_HASH"]?>">
    <div class="feedback__btn">
        <span class="btnLine topLeft"></span> <span class="btnLine topRight"></span> <span class="btnLine bottomRight"></span> <span class="btnLine bottomLeft"></span>
	<input type="submit" name="submit" value="<?=GetMessage("MFT_SUBMIT")?>" class="order-call__button">
    </div>
</form>
</div>
<script>
    $(function(){
        $('.feedback__form').hover(function(){
                $('.mf-captcha').show(1000);
            },
            function(){
                $('.mf-captcha').hide(1000);
            });
    });
</script>