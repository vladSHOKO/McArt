<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die(); ?>

<? if (!empty($arResult)): ?>


    <nav id="navmenu" class="navmenu">
        <ul>

            <?
            $previousLevel = 0;
            foreach ($arResult

            as $arItem): ?>

            <? if ($previousLevel && $arItem["DEPTH_LEVEL"] < $previousLevel): ?>
                <?= str_repeat("</ul></li>", ($previousLevel - $arItem["DEPTH_LEVEL"])); ?>
            <? endif ?>

            <? if ($arItem["IS_PARENT"]): ?>


            <li class="dropdown"><a href="<?= $arItem["LINK"] ?>"><span><?= $arItem["TEXT"] ?></span><i
                            class="bi bi-chevron-down toggle-dropdown"></i></a>
                <ul>


                    <? else: ?>

                        <? if ($arItem["PERMISSION"] > "D"): ?>


                            <li><a href="<?= $arItem["LINK"] ?>"><span><?= $arItem["TEXT"] ?></span></a>
                            </li>


                        <? endif ?>

                    <? endif ?>

                    <? $previousLevel = $arItem["DEPTH_LEVEL"]; ?>

                    <? endforeach ?>

                    <? if ($previousLevel > 1)://close last item tags?>
                        <?= str_repeat("</ul></li>", ($previousLevel - 1)); ?>
                    <? endif ?>

                </ul>
                <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
    </nav>
<? endif ?>