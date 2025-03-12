<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
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
$this->setFrameMode(true);
?>
<div class="container">
    <div class="row justify-content-center mb-5">
        <div class="col-md-7 text-center">
            <div class="site-section-title">
                <h2><?=GetMessage("OUR_BLOG")?></h2>
            </div>
        </div>
    </div>
    <div class="row">
        <? foreach ($arResult["ITEMS"] as $arItem): ?>
            <div class="col-md-6 col-lg-4 mb-5" data-aos="fade-up" data-aos-delay="100"
                 id="<?= $this->GetEditAreaId($arItem['ID']); ?>">
                <?
                $this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
                $this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
                ?>
                <?if($arItem['PREVIEW_PICTURE']):?>
                <a href="<?= $arItem['DETAIL_PAGE_URL'] ?>">
                    <img src="<?= $arItem['PREVIEW_PICTURE'] ?>"
                                                                 class="img-fluid">
                </a>
                <?endif;?>
                <div class="p-4 bg-white">
                    <span class="d-block text-secondary small text-uppercase"><?= $arItem['DATE_ACTIVE_FROM'] ?></span>
                    <h2 class="h5 text-black mb-3"><a
                                href="<?= $arItem['DETAIL_PAGE_URL'] ?>"><?= $arItem['NAME'] ?></a></h2>
                    <p><?= $arItem['PREVIEW_TEXT'] ?></p>
                </div>
            </div>
        <? endforeach; ?>

    </div>

</div>
