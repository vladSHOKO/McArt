<?php
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

$arResult["DISPLAY_PROPERTIES"] = array();
foreach ($arResult["PROPERTIES"] as $pid => &$arProp) {
    if ((is_array($arProp["VALUE"]) && count($arProp["VALUE"]) > 0) ||
        (!is_array($arProp["VALUE"]) && strlen($arProp["VALUE"]) > 0)) {
        $arResult["DISPLAY_PROPERTIES"][$pid] = CIBlockFormatProperties::GetDisplayValue($arResult['ITEMS'], $arProp, '');
    }
}

$arResult['SHOW_OFFERS_PROPS'] = true;
?>
<section class="portfolio-details section">

    <div class="container">

        <div class="row gy-4">

            <div class="col-lg-8">
                <div class="portfolio-details-slider">
                    <img src="<?=CFile::ResizeImageGet(CFile::GetFileArray($arResult['DETAIL_PICTURE']["ID"]), ["width" => 634, "height" => 475.5])['src'] ? CFile::ResizeImageGet(CFile::GetFileArray($arResult['DETAIL_PICTURE']["ID"]), ["width" => 634, "height" => 475.5])['src'] : DEFAULT_TEMPLATE_PATH . 'assets/img/services-1.jpg'?>?>" alt="">
                </div>
            </div>

            <div class="col-lg-4">
                <div class="portfolio-info">
                    <h3><?=GetMessage("PROJECT")?></h3>
                    <ul>
                        <li><strong><?=GetMessage("SERVICES")?></strong>: <?= $arResult["SECTION"]["NAME"] ?></li>
                        <li><strong><?=GetMessage("SECTOR")?></strong>: <?= $arResult["DISPLAY_PROPERTIES"]["BUSINESS_SECTOR"]["VALUE"] ?>
                        </li>
                        <li><strong><?=GetMessage("COMPANY")?></strong>: <?= $arResult["DISPLAY_PROPERTIES"]["CLIENT_NAME"]["VALUE"] ?>
                        </li>
                    </ul>
                </div>
                <div class="portfolio-description">
                    <h2><?= $arResult["NAME"] ?></h2>
                    <p>
                        <?= $arResult["DETAIL_TEXT"] ?>
                    </p>
                </div>
                <div>
                    <a href="<?= $arResult["SECTION"]["SECTION_PAGE_URL"] ?>"><b>В список</b></a>
                </div>

            </div>

        </div>

    </div>

</section>