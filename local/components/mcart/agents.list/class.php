<?php
if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) {
    die();
}

use \Bitrix\Main\Errorable;
use \Bitrix\Main\Engine\Contract\Controllerable;

use \Bitrix\Main\Error;
use \Bitrix\Main\ErrorCollection;

use \Bitrix\Main\Application;

use \Bitrix\Main\Data\Cache;
use \Bitrix\Main\Data\TaggedCache;

use \Bitrix\Main\Loader;
use \Bitrix\Main\Localization\Loc;
use \Bitrix\Highloadblock\HighloadBlockTable;
use \Bitrix\Main\Engine\ActionFilter;

class AgentsList extends CBitrixComponent implements Controllerable, Errorable
{
    protected ErrorCollection $errorCollection;

    protected Cache $cache;
    protected TaggedCache $taggedCache;

    protected int $cacheTime;
    protected bool $cacheInvalid;
    protected string $cacheKey;
    protected string $cachePatch;

    final public function getErrors(): array
    {
        return $this->errorCollection->toArray();
    }

    final public function getErrorByCode($code): Error
    {
        return $this->errorCollection->getErrorByCode($code);
    }

    private function addError(Error $error): void
    {
        $this->errorCollection[] = $error;
    }

    private function addErrors(array $errors): void
    {
        $this->errorCollection->add($errors);
    }

    private function showErrors(): bool
    {
        if (count($this->getErrors())) {
            foreach ($this->getErrors() as $error) {
                if ((int)$error->getCode() === 404) {
                    ShowError($error->getMessage());
                }
            }

            return true;
        }

        return false;
    }

    /**
     * Обязательный метод, запускается всегда при загрузке класса, используется для проверки Параметров
     */
    final public function onPrepareComponentParams($arParams): array
    {
        $this->initCache($arParams); // создание параметров для работы кеша

        if (!Loader::includeModule('highloadblock')) {
            $this->addError(
                new Error(Loc::getMessage('MCART_AGENTS_LIST_MODULE_NOT_INSTALLED', ['#MODULE#' => 'highloadblock']), 404)
            );
        }

        $arParams["CACHE_TIME"] = empty($arParams["CACHE_TIME"]) ? 36000000 : $arParams["CACHE_TIME"];

        $arParams["ELEMENTS_PER_PAGE"] = empty($arParams["ELEMENTS_PER_PAGE"]) ? 10 : $arParams["ELEMENTS_PER_PAGE"];

        return parent::onPrepareComponentParams($arParams);
    }

    private function initCache($arParams): void
    {
        $this->cacheInvalid = false;
        $this->errorCollection = new ErrorCollection();
        $this->cacheKey = self::class . '_' . md5(json_encode($arParams)) . '_' . md5(json_encode($_REQUEST)); // тут указывается от каких параметров зависит кэш
        $this->cachePatch = self::class; // директория для хранения файлов кеша

        $this->cache = Cache::createInstance();
        $this->taggedCache = Application::getInstance()->getTaggedCache();
    }

    final public function executeComponent(): void
    {
        if (empty($this->arParams["HLBLOCK_TNAME"])) {
            $this->addError(
                new Error(Loc::getMessage('MCART_AGENTS_LIST_NOT_HLBLOCK_TNAME')
                )
            );
        }

        if ($this->showErrors()) {
            return;
        }

        if ($this->cache->initCache(
            $this->arParams["CACHE_TIME"],
            $this->cacheKey,
            $this->cachePatch
        )) { // если кеш есть
            $this->arResult = $this->cache->getVars();
        } elseif ($this->cache->startDataCache()) { // если кеша нет
            $this->taggedCache->startTagCache($this->cachePatch); // старт для области, для тегированного кеша

            $this->arResult = []; // объявим результирующий массив

            $arHlblock = self::getHlblockTableName($this->arParams["HLBLOCK_TNAME"]);

            $this->taggedCache->registerTag('hlblock_table_name_' . $arHlblock['TABLE_NAME']); // Регистрируем кеш, чтобы по нему на событиях добавление/изменение/удаление элементов хлблока сбрасывать кеш компонента

            $entity = self::getEntityDataClassById($arHlblock); // получить класс для работы с хлблоком
            $arTypeAgents = self::getFieldListValue($arHlblock, 'UF_TYPE_OF_ACTIVITY'); // получить массив со значениями списочного свойства Виды деятельности агентов
            $this->arResult['AGENTS'] = $this->getAgents($entity, $arTypeAgents); // получить массив со списком агентов и объектом для пагинации


            if ($this->cacheInvalid) {
                $this->taggedCache->abortTagCache();
                $this->cache->abortDataCache();
            }

            $this->taggedCache->endTagCache(); // конец области, для тегированого кеша
            $this->cache->endDataCache($this->arResult); // запись arResult в кеш
        }


        $category = "mcart_agent";
        $name = "options_agents_star";
        $this->arResult['STAR_AGENTS'] = CUserOptions::GetOption($category, $name);

        $this->IncludeComponentTemplate(); // вызов шаблона компонента
    }

    /**
     * Метод для получения данных хлблока по TABLE_NAME
     * @param string $hl_block_name - название таблицы хлблока
     * @return array
     */
    private static function getHlblockTableName(string $hl_block_name): array
    {
        if (empty($hl_block_name) || strlen($hl_block_name) < 1) {
            return [];
        }

        $result = HighloadBlockTable::getList([
            'filter' => [
                "TABLE_NAME" => $hl_block_name,
            ],
        ]);

        if ($row = $result->fetch()) {
            return $row;
        }


        return [];
    }

    /**
     * Метод для получения класса для работы с элементами хлблока
     * @param array $arHlblock - массив с данными хлблока
     * @return string
     * @throws \Bitrix\Main\SystemException
     */
    private static function getEntityDataClassById(array $arHlblock): string
    {
        if (empty($arHlblock)) {
            return '';
        }

        $entity = HighloadBlockTable::compileEntity($arHlblock);
        return $entity->getDataClass();
    }

    /**
     * Метод для получения значений списочного свойства
     * @param array $arHlblock - массив с данными хлблока (нужен ID хлблока)
     * @param string $fieldName - Код списочного свойства
     * @return array
     */
    private function getFieldListValue(array $arHlblock, string $fieldName): array
    {
        $result = [];

        //Получаем ID пользовательского поля, по его коду
        $fieldID = Bitrix\Main\UserFieldTable::getList([
            'filter' => [
                "ENTITY_ID" => "HLBLOCK_" . $arHlblock['ID'],
                "FIELD_NAME" => $fieldName,
            ],
        ])->Fetch()["ID"];

        if ($fieldID) {
            $enumValues = CUserFieldEnum::GetList([], [
                "USER_FIELD_ID" => $fieldID,
            ]);

            while ($enum = $enumValues->Fetch()) {
                $result[$enum['ID']] = [
                    'VALUE' => $enum['VALUE'],
                ];
            }
        }
        return $result;
    }

    /**
     * Метод для получения списка агентов
     * @param string $entity - класс хлблока
     * @param array $arTypeAgents - массив Видов деятельности агентов
     * @return array|array[]
     */
    private function getAgents(string $entity, array $arTypeAgents): array
    {
        $arAgents = [
            'NAV_OBJECT' => [], // для построения постраничной навигации
            'ITEMS' => [], // список агентов
        ];

        $nav = new \Bitrix\Main\UI\PageNavigation("nav-agents");
        $nav->allowAllRecords(true)
            ->setPageSize($this->arParams['ELEMENTS_PER_PAGE'])
            ->initFromUri();

        $filter = [
            "UF_ACTIVITY" => "1"
        ];

        $rsAgents = $entity::getList([
            "select" => ["ID", "UF_ACTIVITY", "UF_TYPE_OF_ACTIVITY", "UF_PHOTO", "UF_PHONE", "UF_EMAIL", "UF_FIO"],
            "filter" => $filter,
            "count_total" => true,
            "offset" => $nav->getOffset(),
            "limit" => $nav->getLimit(),
        ]);

        while ($arAgent = $rsAgents->fetch()) {
            /**
             * В свойстве Вид деятельности записан ID значения списка,
             * с помощью массива $arTypeAgents определить значение
             */
            $arAgent["UF_TYPE_OF_ACTIVITY"] = $arTypeAgents[$arAgent["UF_TYPE_OF_ACTIVITY"]]['VALUE'];

            /**  В свойстве Фото записан ID файла из таблицы b_file,
             * если значение есть, то получить путь через класс \CFile
             */
            if (!empty($arAgent["UF_PHOTO"])) {
                $arAgent["UF_PHOTO_URL"] = \CFile::GetPath($arAgent["UF_PHOTO"]);

            }


            $arAgents['ITEMS'][$arAgent['ID']] = $arAgent;
        }

        $nav->setRecordCount($rsAgents->getCount());
        $arAgents['NAV_OBJECT'] = $nav;

        return $arAgents;
    }

    /**
     * Конфигурация событий для ajax
     */
    final public function configureActions(): array
    {
        return [
            'clickStar' => [
                'prefilters' => [
                    new ActionFilter\Authentication(),
                    new ActionFilter\HttpMethod(
                        [ActionFilter\HttpMethod::METHOD_POST]
                    ),
                    new ActionFilter\Csrf(),
                ]
            ],
        ];
    }

    /**
     * Метод для изменения избранных агентов через ajax
     * @param $agentID - ID элемента агента
     * @return array|string[]
     */
    public function clickStarAction($agentID)
    {
        $result = []; // ответ, который уйдет на фронт

        $value = []; // массив ID элементов, которые пользователь добавил в избранное

        $starAgents = CUserOptions::GetOption("mcart_agent", "options_agents_star");
        if (!empty($starAgents)) {
            if (!is_array($starAgents)) {
                $starAgents = [$starAgents];
            }
            if (in_array($agentID, $starAgents)) {
                $agentIDKey = array_search($agentID, $starAgents);
                unset($starAgents[$agentIDKey]);
            } else {
                $starAgents[] = $agentID;
            }
            $value = $starAgents;
        } else {
            $value[] = $agentID;
        }
        if (CUserOptions::SetOption("mcart_agent", "options_agents_star", $value)) {
            $result["action"] = "success";
        }

        $result["agents"] = $value;

        return $result;
    }
}
