<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
if (!empty($arResult["ORDER"])) {
    if(\Bitrix\Main\Loader::includeModule('data.layer')) {
        \Data\Layer\Basket::success($arResult["ORDER"]['ID']);
    }
}
