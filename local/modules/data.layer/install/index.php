<?php

use Bitrix\Main\Localization\Loc,
    Bitrix\Main\ModuleManager;

Loc::loadMessages(__FILE__);
if (class_exists('data_layer'))
    return;

class data_layer extends CModule {

    public $MODULE_ID = 'data.layer';

    function __construct() {
        $arModuleVersion = array();

        include(__DIR__ . '/version.php');

        if (is_array($arModuleVersion) && array_key_exists('VERSION', $arModuleVersion)) {
            $this->MODULE_VERSION = $arModuleVersion['VERSION'];
            $this->MODULE_VERSION_DATE = $arModuleVersion['VERSION_DATE'];
        }

        $this->MODULE_NAME = Loc::getMessage('DATA_LAYER_MODULE_NAME');
        $this->MODULE_DESCRIPTION = Loc::getMessage('DATA_LAYER_MODULE_DESCRIPTION');
        $this->PARTNER_NAME = '';
        $this->PARTNER_URI = '';
    }

    public function DoInstall() {
        ModuleManager::registerModule($this->MODULE_ID);
    }

    public function DoUninstall() {
        ModuleManager::unRegisterModule($this->MODULE_ID);
    }

}
