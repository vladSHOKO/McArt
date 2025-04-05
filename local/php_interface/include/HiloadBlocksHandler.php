<?php

use Bitrix\Main\Entity\Event;

class HiloadBlocksHandler
{
    public static function updateCache(Event $event): void
    {
        $entity = $event->getEntity();

        $tableName = $entity->getDBTableName();

        $taggedCache = \Bitrix\Main\Application::getInstance()->getTaggedCache();
        $taggedCache->clearByTag('hlblock_table_name_' . $tableName);
    }

}