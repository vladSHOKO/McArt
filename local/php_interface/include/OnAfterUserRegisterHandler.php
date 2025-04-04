<?php

class OnAfterUserRegisterHandler
{
    public static function defineUserGroup($arFields): void
    {
        if ($arFields['USER_ID'] > 0) {
            switch ($arFields['UF_USER_TYPE']) {
                //Покупатель
                case 7:
                    CUser::SetUserGroup($arFields['USER_ID'], [6]);
                    break;
                //Продавец
                case 8:
                    CUser::SetUserGroup($arFields['USER_ID'], [7]);
                    break;
                default:
                    AddMessage2Log("Выбрана несуществующая группа пользователей");
                    break;
            }
        }
    }
}
