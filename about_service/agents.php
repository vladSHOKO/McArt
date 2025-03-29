<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Агенты");
?><br>
<?$APPLICATION->IncludeComponent(
	"mcart:agents.list", 
	"custom_template_for_agents", 
	array(
		"HLBLOCK_TNAME" => "estate_agents",
		"COMPONENT_TEMPLATE" => "custom_template_for_agents",
		"ELEMENTS_PER_PAGE" => "3",
		"CACHE_TYPE" => "A",
		"CACHE_TIME" => "36000000"
	),
	false
);?><?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>