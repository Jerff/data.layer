<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

foreach ($arResult["GRID"]["ROWS"] as $arItem) {
    if(\Bitrix\Main\Loader::includeModule('data.layer')) {
        \Data\Layer\View::add([
            'name' => addslashes($arItem['NAME']),
            'id' => $arItem['PRODUCT_ID'],
            'price' => $arItem['PRICE'],
            'category' => \Data\Layer\Element::getSectionName($arItem['PRODUCT_ID'])
        ]);
    }
}