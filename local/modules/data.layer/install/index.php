<?php

/**
 * Micro Marking
 * @package hl
 * @subpackage main
 * @copyright 2001-2013 HotLab
 */
use \Bitrix\Main\Localization\Loc;
use \Bitrix\Main\Config\Option;

Loc::loadMessages(__FILE__);
if (class_exists('data_layer'))
    return;

class data_layer extends CModule {

    public $MODULE_ID = 'data.layer';
    public $MODULE_VERSION;
    public $MODULE_VERSION_DATE;
    public $MODULE_NAME;
    public $MODULE_ICON = "";
    public $MODULE_SORT = 1;
    public $MODULE_DESCRIPTION;
    public $MODULE_GROUP_RIGHTS = 'N';
    public $PARTNER_NAME;
    public $PARTNER_URI;

    public function __construct() {
        $arModuleVersion = array();

        $path = str_replace('\\', '/', __FILE__);
        $path = substr($path, 0, strlen($path) - strlen('/index.php'));
        include($path . '/version.php');

        if (is_array($arModuleVersion) && array_key_exists('VERSION', $arModuleVersion)) {
            $this->MODULE_VERSION = $arModuleVersion['VERSION'];
            $this->MODULE_VERSION_DATE = $arModuleVersion['VERSION_DATE'];
        }

        $this->MODULE_NAME = Loc::getMessage('DATA_LAYER_MODULE_NAME');
        $this->MODULE_DESCRIPTION = Loc::getMessage('DATA_LAYER_MODULE_DESCRIPTION');
        $this->PARTNER_NAME = '';
        $this->PARTNER_URI = '';
    }

    private function DoInstall() {
        $this->installDB();
    }

    private function installDB() {
        registerModule($this->MODULE_ID);
        return true;
    }

    private function DoUninstall() {
        $this->uninstallDB();
    }

    private function uninstallDB($arParams = array()) {
        Option::delete($this->MODULE_ID);
        unregisterModule($this->MODULE_ID);
        return true;
    }

}
