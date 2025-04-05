<?php
if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();

use Bitrix\Main\Localization\Loc;
use Bitrix\Catalog\ProductTable;

/**
 * @global CMain $APPLICATION
 * @var array $arParams
 * @var array $arResult
 * @var CatalogSectionComponent $component
 * @var CBitrixComponentTemplate $this
 * @var string $templateName
 * @var string $componentPath
 *
 *  _________________________________________________________________________
 * |    Attention!
 * |    The following comments are for system use
 * |    and are required for the component to work correctly in ajax mode:
 * |    <!-- items-container -->
 * |    <!-- pagination-container -->
 * |    <!-- component-end -->
 */

$this->setFrameMode(true);
$this->addExternalCss('/bitrix/css/main/bootstrap.css');

?>
<section class="portfolio section">

    <div class="container">
        <div class="row gy-4">

            <?foreach ($arResult["ITEMS"] as $arItem):?>
            <div class="col-lg-4">
                <article>
                    <div class="post-img">
                        <img src="<?=CFile::ResizeImageGet(CFile::GetFileArray($arItem['PREVIEW_PICTURE']["ID"]), ["width" => 634, "height" => 475.5])['src'] ? CFile::ResizeImageGet(CFile::GetFileArray($arItem['PREVIEW_PICTURE']["ID"]), ["width" => 634, "height" => 475.5])['src'] : DEFAULT_TEMPLATE_PATH . 'assets/img/services-1.jpg'?>" alt="" class="img-fluid">
                    </div>
                    <div class="card-body">
                        <h5 class="title"><a href="<?=$arItem["DETAIL_PAGE_URL"]?>"><?=$arItem["NAME"]?></a></h5>
                        <p class="card-text"><?=$arItem["PREVIEW_TEXT"]?></p>
                    </div>
                </article>
            </div>
            <?endforeach;?>
        </div>
    </div>
</section>
