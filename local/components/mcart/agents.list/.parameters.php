<?php
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) {
    die();
}

$arComponentParameters = array(
    "GROUPS" => array(),
    "PARAMETERS" => array(
        "HLBLOCK_TNAME"  =>  array(
            "PARENT" => "BASE",
            "NAME" => GetMessage("MCART_AGENTS_LIST_HLBLOCK_TNAME"),
            "TYPE" => "STRING",
            "DEFAULT" => "",
        ),
        "ELEMENTS_PER_PAGE" => array(
            "PARENT" => "BASE",
            "NAME" => GetMessage("ELEMENTS_PER_PAGE"),
            "TYPE" => "NUMBER",
            "DEFAULT" => "10",
        ),
        "CACHE_TIME"  =>  ["DEFAULT"=>36000000],
    ),
);

