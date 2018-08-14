<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
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
$this->setFrameMode(true);?>

<form class="input-search__wr" action="<?=$arResult["FORM_ACTION"]?>">

			<?if($arParams["USE_SUGGEST"] === "Y"):?><?$APPLICATION->IncludeComponent(
				"bitrix:search.suggest.input",
				"templates/.default",
				array(
					"NAME" => "q",
					"VALUE" => GetMessage('LOOK'),
					"INPUT_SIZE" => 85,
					"DROPDOWN_SIZE" => 10,
				),
				$component, array("HIDE_ICONS" => "Y")
			);?><?else:?>
                <input class="input-search header__input" placeholder="<?=GetMessage('LOOK')?>" type="text" name="q" value="" size="55" maxlength="50" /><?endif;?>

    <button class="header__search--btn" name="s" type="submit"></button>
</form>
