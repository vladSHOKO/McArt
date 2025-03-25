<?php
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

$arComponentDescription = array(
    "NAME" => GetMessage("COMPONENT_NAME"),
    "DESCRIPTION" => GetMessage("COMPONENT_DESCRIPTION"),
    "ICON" => "/images/icon.gif",
    "SORT" => 20,
    "PATH" => array(
        "ID" => GetMessage("NAMESPACE_NAME"),
        "CHILD" => array(
            "ID" => "Hlblock",
            "NAME" => GetMessage("COMPONENT_SECTION"),
            "SORT" => 10
        )
    ),
    "CACHE_PATH" => "Y"
);
