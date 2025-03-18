<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die(); ?>

<? if (!empty($arResult)): ?>
<ul class="site-menu js-clone-nav d-none d-lg-block">

    <?
    $previousLevel = 0;
    foreach ($arResult

    as $arItem): ?>

    <? if ($previousLevel && $arItem["DEPTH_LEVEL"] < $previousLevel):?>
        <?= str_repeat("</ul></li>", ($previousLevel - $arItem["DEPTH_LEVEL"])); ?>
    <? endif ?>

    <? if ($arItem["IS_PARENT"]): ?>

    <li class="has-children"><a href="<?= $arItem["LINK"] ?>"><?= $arItem["TEXT"] ?></a>
        <ul class="dropdown">

            <? else:?>

                <? if ($arItem["PERMISSION"] > "D"):?>

                    <? if ($arItem["DEPTH_LEVEL"] == 1):?>
                        <li class="<? if ($arItem["SELECTED"]):?>active<? endif ?>"><a
                                    href="<?= $arItem["LINK"] ?>"><?= $arItem["TEXT"] ?></a></li>
                    <? else:?>
                        <li<? if ($arItem["SELECTED"]):?> class="item-selected"<? endif ?>><a
                                    href="<?= $arItem["LINK"] ?>"><?= $arItem["TEXT"] ?></a></li>
                    <? endif ?>
                <? endif ?>

            <? endif ?>

            <? $previousLevel = $arItem["DEPTH_LEVEL"]; ?>

            <? endforeach ?>

            <? if ($previousLevel > 1)://close last item tags?>
                <?= str_repeat("</ul></li>", ($previousLevel - 1)); ?>
            <? endif ?>

        </ul>
        <? endif ?>
