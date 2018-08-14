<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle(GetMessage('ABOUTabout'));
?><section class="pagename about-bg">
<h2 class="pagename__title"><?=GetMessage('ABOUTabout')?></h2>
 </section> <section class="advantages">
<div class="wr">
	<div class="advantages__content">
		<div class="advantages__item">
 <img alt="Широкая география поставок" src="<?=SITE_TEMPLATE_PATH?>/img/earth-globe.svg" class="advantages__img"> <span class="advantages__text"><?=GetMessage('ABOUT1')?></span>
		</div>
		<div class="advantages__item">
 <img alt="Налаженное сотрудничество" src="<?=SITE_TEMPLATE_PATH?>/img/molecule.svg" class="advantages__img"> <span class="advantages__text"><?=GetMessage('ABOUT2')?></span>
		</div>
		<div class="advantages__item">
 <img alt="Надежная доставка и гибкие условия оплаты" src="<?=SITE_TEMPLATE_PATH?>/img/social-media.svg" class="advantages__img"> <span class="advantages__text"><?=GetMessage('ABOUT3')?></span>
		</div>
		<div class="advantages__item">
 <img alt="Возможность поставки" src="<?=SITE_TEMPLATE_PATH?>/img/choices.svg" class="advantages__img"> <span class="advantages__text"><?=GetMessage('ABOUT4')?></span>
		</div>
	</div>
</div>
 </section>
<?$APPLICATION->IncludeComponent(
	"bitrix:breadcrumb",
	"breadcrumb",
	Array(
		"PATH" => "",
		"SITE_ID" => "s1",
		"START_FROM" => "0"
	)
);?>

<?$APPLICATION->IncludeComponent(
	"bitrix:news.detail", 
	"reliability_company", 
	array(
        'DETAIL_SET_CANONICAL_URL'=> 'Y',
		"ACTIVE_DATE_FORMAT" => "d.m.Y",
		"ADD_ELEMENT_CHAIN" => "N",
		"ADD_SECTIONS_CHAIN" => "N",
		"AJAX_MODE" => "N",
		"AJAX_OPTION_ADDITIONAL" => "",
		"AJAX_OPTION_HISTORY" => "N",
		"AJAX_OPTION_JUMP" => "N",
		"AJAX_OPTION_STYLE" => "Y",
		"BROWSER_TITLE" => "-",
		"CACHE_GROUPS" => "Y",
		"CACHE_TIME" => "36000000",
		"CACHE_TYPE" => "N",
		"CHECK_DATES" => "Y",
		"DETAIL_URL" => "",
		"DISPLAY_BOTTOM_PAGER" => "N",
		"DISPLAY_DATE" => "N",
		"DISPLAY_NAME" => "Y",
		"DISPLAY_PICTURE" => "Y",
		"DISPLAY_PREVIEW_TEXT" => "Y",
		"DISPLAY_TOP_PAGER" => "N",
		"ELEMENT_CODE" => "",
		"ELEMENT_ID" => "341",
		"FIELD_CODE" => array(
			0 => "ID",
			1 => "NAME",
			2 => "PREVIEW_TEXT",
			3 => "PREVIEW_PICTURE",
			4 => "DETAIL_TEXT",
			5 => "DETAIL_PICTURE",
			6 => "",
		),
		"IBLOCK_ID" => "15",
		"IBLOCK_TYPE" => "about",
		"IBLOCK_URL" => "",
		"INCLUDE_IBLOCK_INTO_CHAIN" => "N",
		"MESSAGE_404" => "",
		"META_DESCRIPTION" => "-",
		"META_KEYWORDS" => "-",
		"PAGER_BASE_LINK_ENABLE" => "N",
		"PAGER_SHOW_ALL" => "N",
		"PAGER_TEMPLATE" => ".default",
		"PAGER_TITLE" => "Страница",
		"PROPERTY_CODE" => array(
			0 => "TOPABOUT",
			1 => "TITLEABOUT",
			2 => "",
		),
		"SET_BROWSER_TITLE" => "N",
		"SET_CANONICAL_URL" => "N",
		"SET_LAST_MODIFIED" => "N",
		"SET_META_DESCRIPTION" => "Y",
		"SET_META_KEYWORDS" => "Y",
		"SET_STATUS_404" => "Y",
		"SET_TITLE" => "N",
		"SHOW_404" => "Y",
		"STRICT_SECTION_CHECK" => "N",
		"USE_PERMISSIONS" => "N",
		"USE_SHARE" => "N",
		"COMPONENT_TEMPLATE" => "reliability_company",
		"FILE_404" => ""
	),
	false
);?>

    <section class="company">
<div class="wr">
	<div class="company__content">
		<div class="company__office">
			<div class="company__toptext">
				<h2 class="company__title gray__title"></h2>
			</div>
		</div>
		<div class="block block1">
		</div>
		<div class="block block2">
		</div>
		<div class="block block3">
		</div>
		<div class="block block4">
		</div>
		<div class="block block5">
		</div>
		<div class="block block6">
		</div>
		<div class="block block7">
		</div>
		<div class="block block8">
		</div>
	</div>
</div>
 </section> <section class="projects">
<div class="wr">
	<div class="projects__content">
		 <? if (LANGUAGE_ID == 'ru') {
         $APPLICATION->IncludeComponent(
	"bitrix:main.include",
	"include_files",
	Array(
		"AREA_FILE_SHOW" => "file",
		"EDIT_TEMPLATE" => "",
		"PATH" => SITE_TEMPLATE_PATH."/include_areas/best_projects.php"
	)
);}else{
             $APPLICATION->IncludeComponent(
                 "bitrix:main.include",
                 "include_files",
                 Array(
                     "AREA_FILE_SHOW" => "file",
                     "EDIT_TEMPLATE" => "",
                     "PATH" => SITE_TEMPLATE_PATH."/include_areas/en_best_projects.php"
                 )
             );
         }

         ?> <?$APPLICATION->IncludeComponent(
	"bitrix:news.list", 
	"slider_best_projects", 
	array(
		"ACTIVE_DATE_FORMAT" => "d.m.Y",
		"ADD_SECTIONS_CHAIN" => "N",
		"AJAX_MODE" => "N",
		"AJAX_OPTION_ADDITIONAL" => "",
		"AJAX_OPTION_HISTORY" => "N",
		"AJAX_OPTION_JUMP" => "N",
		"AJAX_OPTION_STYLE" => "Y",
		"CACHE_FILTER" => "N",
		"CACHE_GROUPS" => "Y",
		"CACHE_TIME" => "36000000",
		"CACHE_TYPE" => "N",
		"CHECK_DATES" => "Y",
		"COMPONENT_TEMPLATE" => "slider_best_projects",
		"DETAIL_URL" => "",
		"DISPLAY_BOTTOM_PAGER" => "N",
		"DISPLAY_DATE" => "Y",
		"DISPLAY_NAME" => "Y",
		"DISPLAY_PICTURE" => "Y",
		"DISPLAY_PREVIEW_TEXT" => "Y",
		"DISPLAY_TOP_PAGER" => "N",
		"FIELD_CODE" => array(
			0 => "ID",
			1 => "best_slider",
			2 => "",
		),
		"FILTER_NAME" => "",
		"HIDE_LINK_WHEN_NO_DETAIL" => "N",
		"IBLOCK_ID" => "5",
		"IBLOCK_TYPE" => "-",
		"INCLUDE_IBLOCK_INTO_CHAIN" => "N",
		"INCLUDE_SUBSECTIONS" => "N",
		"MESSAGE_404" => "",
		"NEWS_COUNT" => "20",
		"PAGER_BASE_LINK_ENABLE" => "N",
		"PAGER_DESC_NUMBERING" => "N",
		"PAGER_DESC_NUMBERING_CACHE_TIME" => "",
		"PAGER_SHOW_ALL" => "N",
		"PAGER_SHOW_ALWAYS" => "N",
		"PAGER_TEMPLATE" => ".default",
		"PAGER_TITLE" => "Слайдер",
		"PARENT_SECTION" => "",
		"PARENT_SECTION_CODE" => "",
		"PREVIEW_TRUNCATE_LEN" => "",
		"PROPERTY_CODE" => array(
			0 => "",
			1 => "PHOTO_PROJECT",
			2 => "LOGO_PROJECT",
			3 => "",
		),
		"SET_BROWSER_TITLE" => "N",
		"SET_LAST_MODIFIED" => "N",
		"SET_META_DESCRIPTION" => "Y",
		"SET_META_KEYWORDS" => "Y",
		"SET_STATUS_404" => "N",
		"SET_TITLE" => "N",
		"SHOW_404" => "N",
		"SORT_BY1" => "ACTIVE_FROM",
		"SORT_BY2" => "SORT",
		"SORT_ORDER1" => "DESC",
		"SORT_ORDER2" => "ASC",
		"STRICT_SECTION_CHECK" => "N"
	),
	false
);?>
	</div>
</div>
 </section> <section id="map">
<?$APPLICATION->IncludeComponent(
	"bitrix:map.google.view",
	"google_maps",
	Array(
		"API_KEY" => "AIzaSyAJIoCrpsYrryrcVPEYyPUa-qfFHZMCg8M",
		"CONTROLS" => array("SMALL_ZOOM_CONTROL","TYPECONTROL","SCALELINE"),
		"INIT_MAP_TYPE" => "ROADMAP",
		"MAP_DATA" => "a:4:{s:10:\"google_lat\";d:50.4572386;s:10:\"google_lon\";d:30.649250800000004;s:12:\"google_scale\";i:16;s:10:\"PLACEMARKS\";a:1:{i:0;a:3:{s:4:\"TEXT\";s:23:\"А-Синтез###RN###\";s:3:\"LON\";d:30.649100596295;s:3:\"LAT\";d:50.457805532719;}}}",
		"MAP_HEIGHT" => "281",
		"MAP_ID" => "",
		"MAP_WIDTH" => "100%",
		"OPTIONS" => array("ENABLE_SCROLL_ZOOM","ENABLE_DBLCLICK_ZOOM","ENABLE_DRAGGING","ENABLE_KEYBOARD")
	)
);?> </section><?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>