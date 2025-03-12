<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die(); ?>
<footer class="site-footer">
    <div class="container">
        <div class="row">
            <div class="col-lg-4">
                <div class="mb-5">
                    <? $APPLICATION->IncludeComponent(
                        "bitrix:main.include",
                        "",
                        array(
                            "AREA_FILE_SHOW" => "file",
                            "AREA_FILE_SUFFIX" => "inc",
                            "EDIT_TEMPLATE" => "",
                            "PATH" => "/include/about_us.php"
                        )
                    ); ?>
                </div>


            </div>
            <div class="col-lg-4 mb-5 mb-lg-0">
                <div class="row mb-5">
                    <div class="col-md-12">
                        <h3 class="footer-heading mb-4"><?= GetMessage("NAVIGATION") ?></h3>
                    </div>

                    <div class="col-md-6 col-lg-6">
                        <? $APPLICATION->IncludeComponent("bitrix:menu", "custom_footer_menu", array(
                            "ALLOW_MULTI_SELECT" => "N",    // Разрешить несколько активных пунктов одновременно
                            "CHILD_MENU_TYPE" => "left",    // Тип меню для остальных уровней
                            "DELAY" => "N",    // Откладывать выполнение шаблона меню
                            "MAX_LEVEL" => "1",    // Уровень вложенности меню
                            "MENU_CACHE_GET_VARS" => "",    // Значимые переменные запроса
                            "MENU_CACHE_TIME" => "604800",    // Время кеширования (сек.)
                            "MENU_CACHE_TYPE" => "A",    // Тип кеширования
                            "MENU_CACHE_USE_GROUPS" => "Y",    // Учитывать права доступа
                            "ROOT_MENU_TYPE" => "top",    // Тип меню для первого уровня
                            "USE_EXT" => "N",    // Подключать файлы с именами вида .тип_меню.menu_ext.php
                            "COMPONENT_TEMPLATE" => ".default"
                        ),
                            false
                        ); ?>
                    </div>
                </div>


            </div>

            <div class="col-lg-4 mb-5 mb-lg-0">
                <? $APPLICATION->IncludeComponent(
                    "bitrix:main.include",
                    "",
                    array(
                        "AREA_FILE_SHOW" => "file",
                        "AREA_FILE_SUFFIX" => "inc",
                        "EDIT_TEMPLATE" => "",
                        "PATH" => "/include/follow_us.php"
                    )
                ); ?>


            </div>

        </div>
        <div class="row pt-5 mt-5 text-center">
            <? $APPLICATION->IncludeComponent(
                "bitrix:main.include",
                "",
                array(
                    "AREA_FILE_SHOW" => "file",
                    "AREA_FILE_SUFFIX" => "inc",
                    "EDIT_TEMPLATE" => "",
                    "PATH" => "/include/end_text.php"
                )
            ); ?>

        </div>
    </div>
</footer>

</div>

</body>

</html>