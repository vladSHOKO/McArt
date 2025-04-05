<?
require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/header.php");
$APPLICATION->SetTitle("Компания");
?>
    <main class="main">
<? $APPLICATION->IncludeComponent(
    "bitrix:main.include",
    "",
    array(
        "AREA_FILE_SHOW" => "file",
        "PATH" => DEFAULT_TEMPLATE_PATH . "/include/main/hero.php",
        "AREA_FILE_SUFFIX" => "inc",
        "EDIT_TEMPLATE" => ""
    )
); ?>
<? $APPLICATION->IncludeComponent(
    "bitrix:main.include",
    "",
    array(
        "AREA_FILE_SHOW" => "file",
        "PATH" => DEFAULT_TEMPLATE_PATH . "/include/main/featured-services.php",
        "AREA_FILE_SUFFIX" => "inc",
        "EDIT_TEMPLATE" => ""
    )
); ?>
<? $APPLICATION->IncludeComponent(
    "bitrix:main.include",
    "",
    array(
        "AREA_FILE_SHOW" => "file",
        "PATH" => DEFAULT_TEMPLATE_PATH . "/include/main/about.php",
        "AREA_FILE_SUFFIX" => "inc",
        "EDIT_TEMPLATE" => ""
    )
); ?>
    </main><? require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/footer.php"); ?>