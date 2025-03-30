<?
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
?>

<div class="site-section">
    <div class="container">
        <div class="row">

            <div class="col-md-12 col-lg-8 mb-5">
                <?
                if (!empty($arParams["~AUTH_RESULT"])) {
                    ShowMessage($arParams["~AUTH_RESULT"]);
                }

                if (!empty($arResult['ERROR_MESSAGE'])) {
                    ShowMessage($arResult['ERROR_MESSAGE']);
                }
                ?>

                <form name="form_auth" class="p-5 bg-white border" method="post" target="_top" action="<?= $arResult["AUTH_URL"] ?>">

                    <input type="hidden" name="AUTH_FORM" value="Y"/>
                    <input type="hidden" name="TYPE" value="AUTH"/>
                    <? if ($arResult["BACKURL"] <> ''): ?>
                        <input type="hidden" name="backurl" value="<?= $arResult["BACKURL"] ?>"/>
                    <? endif ?>
                    <? foreach ($arResult["POST"] as $key => $value): ?>
                        <input type="hidden" name="<?= $key ?>" value="<?= $value ?>"/>
                    <? endforeach ?>

                    <div class="row form-group">
                        <div class="col-md-12 mb-3 mb-md-0">
                            <label class="font-weight-bold" for="login">Логин</label>
                            <input class="form-control" type="text" name="USER_LOGIN" maxlength="255"
                                   value="<?= $arResult["LAST_LOGIN"] ?>"/>
                        </div>
                    </div>


                    <div class="row form-group">
                        <div class="col-md-12">
                            <label class="font-weight-bold" for="password">Пароль</label>
                            <input class="form-control" type="password" name="USER_PASSWORD"
                                   maxlength="255"
                                   autocomplete="off"/>
                        </div>
                    </div>

                        <? if ($arResult["CAPTCHA_CODE"]): ?>
                            <tr>
                                <td></td>
                                <td><input type="hidden" name="captcha_sid"
                                           value="<? echo $arResult["CAPTCHA_CODE"] ?>"/>
                                    <img src="/bitrix/tools/captcha.php?captcha_sid=<? echo $arResult["CAPTCHA_CODE"] ?>"
                                         width="180" height="40" alt="CAPTCHA"/></td>
                            </tr>
                            <tr>
                                <td class="bx-auth-label"><? echo GetMessage("AUTH_CAPTCHA_PROMT") ?>:</td>
                                <td><input class="bx-auth-input form-control" type="text" name="captcha_word"
                                           maxlength="50"
                                           value="" size="15" autocomplete="off"/></td>
                            </tr>
                        <? endif; ?>

                    <div class="row form-group">
                        <div class="col-md-12">
                            <input type="submit" class="btn btn-primary  py-2 px-4 rounded-0" name="Login"
                                   value="<?= GetMessage("AUTH_AUTHORIZE") ?>"/>
                        </div>
                    </div>

                    <div class="row form-group">
                        <? if ($arParams["NOT_SHOW_LINKS"] != "Y"): ?>
                        <div class="col-md-12">
                            <a href="<?= $arResult["AUTH_FORGOT_PASSWORD_URL"] ?>"
                               rel="nofollow"><?= GetMessage("AUTH_FORGOT_PASSWORD_2") ?></a>
                        </div>
                        <? endif ?>
                        <? if ($arParams["NOT_SHOW_LINKS"] != "Y" && $arResult["NEW_USER_REGISTRATION"] == "Y"): ?>
                        <div class="col-md-12">
                            <a href="<?= $arResult["AUTH_REGISTER_URL"] ?>"
                               rel="nofollow"><?= GetMessage("AUTH_REGISTER") ?></a>
                        </div>
                        <? endif ?>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>

<script>
    <?if ($arResult["LAST_LOGIN"] <> ''):?>
    try {
        document.form_auth.USER_PASSWORD.focus();
    } catch (e) {
    }
    <?else:?>
    try {
        document.form_auth.USER_LOGIN.focus();
    } catch (e) {
    }
    <?endif?>
</script>

