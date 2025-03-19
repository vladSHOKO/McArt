<?php
/**
 * Bitrix Framework
 * @package bitrix
 * @subpackage main
 * @copyright 2001-2024 Bitrix
 */

use Bitrix\Main\Web\Json;

/**
 * Bitrix vars
 * @global CMain $APPLICATION
 * @var array $arParams
 * @var array $arResult
 * @var CBitrixComponentTemplate $this
 */

if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

if ($arResult["SHOW_SMS_FIELD"] == true) {
    CJSCore::Init('phone_auth');
}
?>


<form action="#" class="p-5 bg-white border">

    <div class="row form-group">
        <div class="col-md-12 mb-3 mb-md-0">
            <label class="font-weight-bold" for="fullname">Full Name</label>
            <input type="text" id="fullname" class="form-control" placeholder="Full Name">
        </div>
    </div>
    <div class="row form-group">
        <div class="col-md-12">
            <label class="font-weight-bold" for="email">Email</label>
            <input type="email" id="email" class="form-control" placeholder="Email Address">
        </div>
    </div>
    <div class="row form-group">
        <div class="col-md-12">
            <label class="font-weight-bold" for="email">Subject</label>
            <input type="text" id="subject" class="form-control" placeholder="Enter Subject">
        </div>
    </div>


    <div class="row form-group">
        <div class="col-md-12">
            <label class="font-weight-bold" for="message">Message</label>
            <textarea name="message" id="message" cols="30" rows="5" class="form-control"
                      placeholder="Say hello to us"></textarea>
        </div>
    </div>

    <div class="row form-group">
        <div class="col-md-12">
            <input type="submit" value="Send Message" class="btn btn-primary  py-2 px-4 rounded-0">
        </div>
    </div>


</form>


<div class="col-md-12 col-lg-8 mb-5">

    <? if (!$arResult["SHOW_EMAIL_SENT_CONFIRMATION"]): ?>

        <form method="post" class="p-5 bg-white border" action="<?= $arResult["AUTH_URL"] ?>" name="bform"
              enctype="multipart/form-data">
            <input type="hidden" name="AUTH_FORM" value="Y"/>
            <input type="hidden" name="TYPE" value="REGISTRATION"/>

            <div class="row form-group">
                <div class="col-md-12 mb-3 mb-md-0">
                    <label class="font-weight-bold"><b><?= GetMessage("AUTH_REGISTER") ?></b></label>
                </div>
            </div>

            <div class="row form-group">
                <div class="col-md-12 mb-3 mb-md-0">
                    <label class="font-weight-bold" for="user-name"><?= GetMessage("AUTH_NAME") ?></label>
                    <input id="user-name" type="text" name="USER_NAME" maxlength="50"
                           value="<?= $arResult["USER_NAME"] ?>"
                           class="form-control" placeholder="First name"/>
                </div>
            </div>

            <div class="row form-group">
                <div class="col-md-12 mb-3 mb-md-0">
                    <label class="font-weight-bold" for="last-name"><?= GetMessage("AUTH_LAST_NAME") ?></label>
                    <input type="text" name="USER_LAST_NAME" maxlength="50"
                           value="<?= $arResult["USER_LAST_NAME"] ?>" class="form-control" placeholder="Last name"/>
                </div>
            </div>
            <div class="row form-group">
                <div class="col-md-12 mb-3 mb-md-0">
                    <label class="font-weight-bold" for="login"><?= GetMessage("AUTH_LOGIN_MIN") ?></label>
                    <input id="login" type="text" name="USER_LOGIN" maxlength="50"
                           value="<?= $arResult["USER_LOGIN"] ?>"
                           class="form-control" placeholder="Login"/>
                </div>
            </div>
            <div class="row form-group">
                <div class="col-md-12">
                    <label class="font-weight-bold" for="password"><?= GetMessage("AUTH_PASSWORD_REQ") ?></label>
                    <input type="password" id="password" name="USER_PASSWORD" maxlength="255"
                           value="<?= $arResult["USER_PASSWORD"] ?>" class="form-control" autocomplete="off"
                           placeholder="Password"/>
                </div>
            </div>
            <div class="row form-group">
                <div class="col-md-12 mb-3 mb-md-0">
                    <label class="font-weight-bold" for="confirm"><?= GetMessage("AUTH_CONFIRM") ?></label>
                    <input id="confirm" type="password" name="USER_CONFIRM_PASSWORD" maxlength="255"
                           value="<?= $arResult["USER_CONFIRM_PASSWORD"] ?>" class="form-control"
                           autocomplete="off" placeholder="Confirm password"/>
                </div>
            </div>
            <? if ($arResult["EMAIL_REGISTRATION"]): ?>

                <div class="row form-group">
                    <div class="col-md-12">
                        <label class="font-weight-bold" for="email"><?= GetMessage("AUTH_EMAIL") ?></label>
                        <input type="email" id="email" name="USER_EMAIL" maxlength="255"
                               value="<?= $arResult["USER_EMAIL"] ?>"
                               class="form-control" placeholder="Email"/>
                    </div>
                </div>
            <? endif ?>
            <? if ($arResult["PHONE_REGISTRATION"]): ?>
                <div class="row form-group">
                    <div class="col-md-12">
                        <label class="font-weight-bold"
                               for="phone"><? echo GetMessage("main_register_phone_number") ?></label>
                        <input type="text" id="phone" name="USER_PHONE_NUMBER" maxlength="255"
                               value="<?= $arResult["USER_PHONE_NUMBER"] ?>" class="form-control" placeholder="Phone"/>
                    </div>
                </div>
            <? endif ?>


            <? // ********************* User properties ***************************************************?>
            <? if ($arResult["USER_PROPERTIES"]["SHOW"] == "Y"): ?>
                <? foreach ($arResult["USER_PROPERTIES"]["DATA"] as $FIELD_NAME => $arUserField): ?>

                    <div class="row form-group">
                        <div class="col-md-12 mb-3 mb-md-0">
                            <?= $arUserField["EDIT_FORM_LABEL"] ?> <br>
                            <? $APPLICATION->IncludeComponent(
                                "bitrix:system.field.edit",
                                $arUserField["USER_TYPE"]["USER_TYPE_ID"],
                                array("bVarsFromForm" => $arResult["bVarsFromForm"], "arUserField" => $arUserField, "form_name" => "bform"), null, array("HIDE_ICONS" => "Y")); ?>
                        </div>
                    </div>
                <? endforeach; ?>
            <? endif; ?>
            <? // ******************** /User properties ***************************************************

            /* CAPTCHA */
            if ($arResult["USE_CAPTCHA"] == "Y") {
                ?>

                <div class="row form-group">
                    <div class="col-md-12 mb-3 mb-md-0">
                        <label class="font-weight-bold"><b><b><?= GetMessage("CAPTCHA_REGF_TITLE") ?></b></b></label>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col-md-12 mb-3 mb-md-0">
                        <input class="form-control" type="hidden" name="captcha_sid"
                               value="<?= $arResult["CAPTCHA_CODE"] ?>"/>
                        <img src="/bitrix/tools/captcha.php?captcha_sid=<?= $arResult["CAPTCHA_CODE"] ?>"
                             width="180" height="40" alt="CAPTCHA"/>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col-md-12 mb-3 mb-md-0">
                        <label class="font-weight-bold" for="capcha"><?= GetMessage("CAPTCHA_REGF_PROMT") ?></label>
                        <input type="text" id="capcha" name="captcha_word" maxlength="50" value="" autocomplete="off"
                               class="form-control"/>
                    </div>
                </div>
                <?
            }
            /* CAPTCHA */
            ?>

            <? $APPLICATION->IncludeComponent("bitrix:main.userconsent.request", "",
                array(
                    "ID" => COption::getOptionString("main", "new_user_agreement", ""),
                    "IS_CHECKED" => "Y",
                    "AUTO_SAVE" => "N",
                    "IS_LOADED" => "Y",
                    "ORIGINATOR_ID" => $arResult["AGREEMENT_ORIGINATOR_ID"],
                    "ORIGIN_ID" => $arResult["AGREEMENT_ORIGIN_ID"],
                    "INPUT_NAME" => $arResult["AGREEMENT_INPUT_NAME"],
                    "REPLACE" => array(
                        "button_caption" => GetMessage("AUTH_REGISTER"),
                        "fields" => array(
                            rtrim(GetMessage("AUTH_NAME"), ":"),
                            rtrim(GetMessage("AUTH_LAST_NAME"), ":"),
                            rtrim(GetMessage("AUTH_LOGIN_MIN"), ":"),
                            rtrim(GetMessage("AUTH_PASSWORD_REQ"), ":"),
                            rtrim(GetMessage("AUTH_EMAIL"), ":"),
                        )
                    ),
                )
            ); ?>
            <div class="row form-group">
                <div class="col-md-12">
                    <input type="submit" name="Register" value="<?= GetMessage("AUTH_REGISTER") ?>" class="btn btn-primary  py-2 px-4 rounded-0"/>
                </div>
            </div>
        </form>

    <? endif ?>


</div>
