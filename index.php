<?
require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/header.php");
$APPLICATION->SetTitle("Биржа недвижимости");
?>
<?
$arrFilter = array(
    "PROPERTY_PRIORITY_VALUE" => "Да"
);
$APPLICATION->IncludeComponent(
    "bitrix:news.list",
    "custom_slider",
    array(
        "ACTIVE_DATE_FORMAT" => "m/d/Y",
        "ADD_SECTIONS_CHAIN" => "Y",
        "AJAX_MODE" => "N",
        "AJAX_OPTION_ADDITIONAL" => "",
        "AJAX_OPTION_HISTORY" => "N",
        "AJAX_OPTION_JUMP" => "N",
        "AJAX_OPTION_STYLE" => "Y",
        "CACHE_FILTER" => "N",
        "CACHE_GROUPS" => "Y",
        "CACHE_TIME" => "172800",
        "CACHE_TYPE" => "A",
        "CHECK_DATES" => "Y",
        "DETAIL_URL" => "",
        "DISPLAY_BOTTOM_PAGER" => "Y",
        "DISPLAY_DATE" => "Y",
        "DISPLAY_NAME" => "Y",
        "DISPLAY_PICTURE" => "Y",
        "DISPLAY_PREVIEW_TEXT" => "Y",
        "DISPLAY_TOP_PAGER" => "N",
        "FIELD_CODE" => array(
            0 => "NAME",
            1 => "PREVIEW_TEXT",
            2 => "PREVIEW_PICTURE",
            3 => "",
        ),
        "FILTER_NAME" => "arrFilter",
        "HIDE_LINK_WHEN_NO_DETAIL" => "N",
        "IBLOCK_ID" => "1",
        "IBLOCK_TYPE" => "announcement",
        "INCLUDE_IBLOCK_INTO_CHAIN" => "Y",
        "INCLUDE_SUBSECTIONS" => "Y",
        "MESSAGE_404" => "",
        "NEWS_COUNT" => "20",
        "PAGER_BASE_LINK_ENABLE" => "N",
        "PAGER_DESC_NUMBERING" => "N",
        "PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
        "PAGER_SHOW_ALL" => "N",
        "PAGER_SHOW_ALWAYS" => "N",
        "PAGER_TEMPLATE" => ".default",
        "PAGER_TITLE" => "News",
        "PARENT_SECTION" => "",
        "PARENT_SECTION_CODE" => "",
        "PREVIEW_TRUNCATE_LEN" => "",
        "PROPERTY_CODE" => array(
            0 => "PRICE",
            1 => "",
        ),
        "SET_BROWSER_TITLE" => "Y",
        "SET_LAST_MODIFIED" => "N",
        "SET_META_DESCRIPTION" => "Y",
        "SET_META_KEYWORDS" => "Y",
        "SET_STATUS_404" => "N",
        "SET_TITLE" => "Y",
        "SHOW_404" => "N",
        "SORT_BY1" => "ACTIVE_FROM",
        "SORT_BY2" => "SORT",
        "SORT_ORDER1" => "DESC",
        "SORT_ORDER2" => "ASC",
        "STRICT_SECTION_CHECK" => "N",
        "COMPONENT_TEMPLATE" => "custom_slider"
    ),
    false
); ?>


    <div class="py-5">
        <div class="container">

            <div class="row">
                <div class="col-md-6 col-lg-4 mb-3 mb-lg-0">
                    <div class="feature d-flex align-items-start">
                        <? $APPLICATION->IncludeComponent(
                            "bitrix:main.include",
                            "",
                            array(
                                "AREA_FILE_SHOW" => "file",
                                "AREA_FILE_SUFFIX" => "inc",
                                "EDIT_TEMPLATE" => "",
                                "PATH" => "/include/info1.php"
                            )
                        ); ?>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4 mb-3 mb-lg-0">
                    <div class="feature d-flex align-items-start">
                        <? $APPLICATION->IncludeComponent(
                            "bitrix:main.include",
                            "",
                            array(
                                "AREA_FILE_SHOW" => "file",
                                "AREA_FILE_SUFFIX" => "inc",
                                "EDIT_TEMPLATE" => "",
                                "PATH" => "/include/info2.php"
                            )
                        ); ?>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4 mb-3 mb-lg-0">
                    <div class="feature d-flex align-items-start">
                        <? $APPLICATION->IncludeComponent(
                            "bitrix:main.include",
                            "",
                            array(
                                "AREA_FILE_SHOW" => "file",
                                "AREA_FILE_SUFFIX" => "inc",
                                "EDIT_TEMPLATE" => "",
                                "PATH" => "/include/info3.php"
                            )
                        ); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="site-section site-section-sm bg-light">
                <? $APPLICATION->IncludeComponent(
                    "bitrix:news.line",
                    "custom_announcements_for_index",
                    array(
                        "ACTIVE_DATE_FORMAT" => "m/d/Y",
                        "CACHE_GROUPS" => "Y",
                        "CACHE_TIME" => "172800",
                        "CACHE_TYPE" => "A",
                        "DETAIL_URL" => "",
                        "FIELD_CODE" => array(
                            0 => "NAME",
                            1 => "PREVIEW_TEXT",
                            2 => "PREVIEW_PICTURE",
                            3 => "PROPERTY_TOTAL_AREA",
                            4 => "PROPERTY_NUMBER_OF_BATHROOMS",
                            5 => "PROPERTY_PRICE",
                            6 => "PROPERTY_NUMBER_OF_FLOORS",
                            7 => "PROPERTY_GARAGE",
                        ),
                        "IBLOCKS" => array(
                            0 => "1",
                        ),
                        "IBLOCK_TYPE" => "announcement",
                        "NEWS_COUNT" => "9",
                        "SORT_BY1" => "ACTIVE_FROM",
                        "SORT_BY2" => "SORT",
                        "SORT_ORDER1" => "DESC",
                        "SORT_ORDER2" => "ASC",
                        "COMPONENT_TEMPLATE" => "custom_announcements_for_index"
                    ),
                    false
                ); ?>

    </div>

    <div class="site-section">
                <? $APPLICATION->IncludeComponent(
	"bitrix:news.line", 
	"custom_services_index", 
	array(
		"ACTIVE_DATE_FORMAT" => "m/d/Y",
		"CACHE_GROUPS" => "Y",
		"CACHE_TIME" => "7776000",
		"CACHE_TYPE" => "A",
		"DETAIL_URL" => "",
		"FIELD_CODE" => array(
			0 => "NAME",
			1 => "PROPERTY_LINK",
			2 => "",
		),
		"IBLOCKS" => array(
			0 => "7",
		),
		"IBLOCK_TYPE" => "services",
		"NEWS_COUNT" => "6",
		"SORT_BY1" => "ACTIVE_FROM",
		"SORT_BY2" => "SORT",
		"SORT_ORDER1" => "DESC",
		"SORT_ORDER2" => "ASC",
		"COMPONENT_TEMPLATE" => "custom_services_index"
	),
	false
); ?>

    </div>

    <div class="site-section bg-light">

                <? $APPLICATION->IncludeComponent(
	"bitrix:news.line", 
	"custom_news_index", 
	array(
		"ACTIVE_DATE_FORMAT" => "m/d/Y",
		"CACHE_GROUPS" => "Y",
		"CACHE_TIME" => "604800",
		"CACHE_TYPE" => "A",
		"DETAIL_URL" => "",
		"FIELD_CODE" => array(
			0 => "NAME",
			1 => "PREVIEW_TEXT",
			2 => "PREVIEW_PICTURE",
			3 => "DATE_ACTIVE_FROM",
			4 => "",
		),
		"IBLOCKS" => array(
			0 => "2",
		),
		"IBLOCK_TYPE" => "news",
		"NEWS_COUNT" => "3",
		"SORT_BY1" => "ACTIVE_FROM",
		"SORT_BY2" => "SORT",
		"SORT_ORDER1" => "DESC",
		"SORT_ORDER2" => "ASC",
		"COMPONENT_TEMPLATE" => "custom_news_index"
	),
	false
); ?>
    </div>
    </p><? require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/footer.php"); ?>