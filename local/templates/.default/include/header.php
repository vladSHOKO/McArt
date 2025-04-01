<?
require_once "boot.php";
?>
<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die(); ?>
<?
IncludeTemplateLangFile(__FILE__);
?>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>Компания - шаблон контентной страницы</title>
    <meta name="description" content="">
    <meta name="keywords" content="">

    <!-- Favicons -->
    <link href="<?= DEFAULT_TEMPLATE_PATH ?>assets/img/favicon.png" rel="icon">
    <link href="<?= DEFAULT_TEMPLATE_PATH ?>assets/img/apple-touch-icon.png" rel="apple-touch-icon">


    <!-- Vendor CSS Files -->
    <link href="<?= DEFAULT_TEMPLATE_PATH ?>assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?= DEFAULT_TEMPLATE_PATH ?>assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="<?= DEFAULT_TEMPLATE_PATH ?>assets/vendor/aos/aos.css" rel="stylesheet">

    <!-- Main CSS File -->
    <link href="<?= DEFAULT_TEMPLATE_PATH ?>assets/css/main.css" rel="stylesheet">
    <? $APPLICATION->ShowHead(); ?>
</head>

<body class="scrolled">
<div id="panel"><? $APPLICATION->ShowPanel(); ?></div>

<header id="header" class="header d-flex align-items-center">
    <div class="container-fluid container-xl position-relative d-flex align-items-center justify-content-between">

        <a href="#" class="logo d-flex align-items-center">
            <h1 class="sitename"><?= GetMessage("COMPANY_TITLE") ?></h1>
        </a>


        <?php
        $APPLICATION->IncludeComponent(
	"bitrix:menu", 
	"custom_ex1_top_menu", 
	array(
		"ROOT_MENU_TYPE" => "top",
		"MAX_LEVEL" => "3",
		"MENU_CACHE_TYPE" => "A",
		"TEMPLATE_TYPE" => defined("SITE_TEMPLATE_ID")?SITE_TEMPLATE_ID:"",
		"COMPONENT_TEMPLATE" => "custom_ex1_top_menu",
		"MENU_CACHE_TIME" => "3600",
		"MENU_CACHE_USE_GROUPS" => "Y",
		"MENU_CACHE_GET_VARS" => array(
		),
		"CHILD_MENU_TYPE" => "left",
		"USE_EXT" => "N",
		"DELAY" => "N",
		"ALLOW_MULTI_SELECT" => "N"
	),
	false
);
        ?>

    </div>
</header>