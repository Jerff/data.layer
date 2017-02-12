<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

foreach($arResult['ITEMS'] as $index => $arItem) {
    \Data\Layer\View::add([
        'name' => addslashes($arItem['NAME']),
        'id' => $arItem['ID'],
        'price' => $arItem['MIN_PRICE']['DISCOUNT_VALUE'],
        'category' => \Data\Layer\Section::getName($arItem['IBLOCK_SECTION_ID'])
    ]);
}