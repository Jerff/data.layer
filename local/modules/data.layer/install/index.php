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

    var $MODULE_ID = 'data.layer';
    var $MODULE_VERSION;
    var $MODULE_VERSION_DATE;
    var $MODULE_NAME;
    var $MODULE_ICON = "";
    var $MODULE_SORT = 1;
    var $MODULE_DESCRIPTION;
    var $MODULE_GROUP_RIGHTS = 'N';
    var $PARTNER_NAME;
    var $PARTNER_URI;

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

    function DoInstall() {
        global $DB, $APPLICATION;

        $this->installFiles();
        $this->installDB();
        $this->installEvents();
    }

    function installDB() {
        registerModule($this->MODULE_ID);
        return true;
    }

    function installEvents() {
        $eventManager = Bitrix\Main\EventManager::getInstance();
        $eventManager->registerEventHandler('main', 'OnEndBufferContent', $this->MODULE_ID, '\Data\Layer\Event', 'OnEndBufferContent');
        return true;
    }

    function installFiles() {
        return true;
    }

    function DoUninstall() {
        $this->uninstallDB();
        $this->uninstallFiles();
        $this->uninstallEvents();
    }

    function uninstallDB($arParams = array()) {

        Option::delete($this->MODULE_ID);
        unregisterModule($this->MODULE_ID);
        return true;
    }

    function uninstallEvents() {
        $eventManager = Bitrix\Main\EventManager::getInstance();
        $eventManager->unregisterEventHandler('main', 'OnEndBufferContent', $this->MODULE_ID);
        return true;
    }

    function uninstallFiles() {
        return true;
    }

}
