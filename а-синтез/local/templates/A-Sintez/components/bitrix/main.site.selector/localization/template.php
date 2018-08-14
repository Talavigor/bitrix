<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<?
$page_url  = $APPLICATION->GetCurPage();
?>


<div class="language">
    <? if (LANGUAGE_ID == 'en') { ?>
        <span class="select-placeholder" data-value="EN">EN</span>
    <?} else { ?>
        <span class="select-placeholder" data-value="RU">RU</span>
    <? } ?>


    <ul class="language__list">
        <li class="language-list__item" data-value="RU">
            <a href="<?=$page_url.'?lang=ru'; ?>">RU</a>
        </li>
        <li class="language-list__item" data-value="EN">
            <a href="<?=$page_url.'?lang=en'; ?>">EN</a>
        </li>
    </ul>
</div>