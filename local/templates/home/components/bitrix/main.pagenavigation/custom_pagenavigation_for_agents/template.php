<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

/** @var array $arParams */
/** @var array $arResult */
/** @var CBitrixComponentTemplate $this */

/** @var PageNavigationComponent $component */
$component = $this->getComponent();

$this->setFrameMode(true);
?>
<div class="row">
    <div class="col-md-12 text-center">
        <div class="site-pagination">
            <? for ($i = 0; $i < $arResult['PAGE_COUNT']; $i++): ?>
                <?if ($i < 5):?>
                <a href="<?= htmlspecialcharsbx($component->replaceUrlTemplate($arResult["START_PAGE"] + $i)) ?>" <? if ($arResult['CURRENT_PAGE'] == $arResult["START_PAGE"] + $i): ?> class="active" <? endif; ?>><?= $arResult['START_PAGE'] + $i ?></a>
                <?endif;?>
            <? endfor; ?>
        </div>
    </div>
</div>