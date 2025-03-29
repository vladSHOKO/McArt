<?php

require_once "include/OnAfterUserRegisterHandler.php";
require_once "include/HiloadBlocksHandler.php";

AddEventHandler("main", "OnAfterUserRegister", ["OnAfterUserRegisterHandler", "defineUserGroup"]);

$eventManager = \Bitrix\Main\EventManager::getInstance();

$eventManager->addEventHandler("", "AgentsOnAfterAdd", "HiloadBlocksHandler::updateCache");
$eventManager->addEventHandler("", "AgentsOnAfterUpdate", "HiloadBlocksHandler::updateCache");
$eventManager->addEventHandler("", "AgentsOnAfterDelete", "HiloadBlocksHandler::updateCache");
