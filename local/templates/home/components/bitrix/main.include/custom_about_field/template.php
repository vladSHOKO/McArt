<?
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
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

?>
    <div class="site-section-title mb-3">
        <h2><?=GetMessage("OUR_COMPANY")?></h2>
    </div>
<?php
$this->setFrameMode(true);

if($arResult["FILE"] <> '')
	include($arResult["FILE"]);
