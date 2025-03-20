<?php

require_once "include/OnAfterUserRegisterHandler.php";

AddEventHandler("main", "OnAfterUserRegister", ["OnAfterUserRegisterHandler", "defineUserGroup"]);
