<?php
require $_SERVER['DOCUMENT_ROOT'] . '/bitrix/header.php';
/* @var CMain APPLICATION */
$APPLICATION->SetTitle("Редактирование подписки");
?><?php $APPLICATION->IncludeComponent(
	"bitrix:subscribe.edit", 
	".default", 
	array(
		"SHOW_HIDDEN" => "Y",
		"ALLOW_ANONYMOUS" => "Y",
		"SHOW_AUTH_LINKS" => "Y",
		"CACHE_TIME" => "3600",
		"SET_TITLE" => "Y",
		"COMPONENT_TEMPLATE" => ".default",
		"AJAX_MODE" => "N",
		"AJAX_OPTION_JUMP" => "N",
		"AJAX_OPTION_STYLE" => "Y",
		"AJAX_OPTION_HISTORY" => "N",
		"AJAX_OPTION_ADDITIONAL" => "",
		"CACHE_TYPE" => "A"
	),
	false
);?><?php require $_SERVER['DOCUMENT_ROOT'] . '/bitrix/footer.php';