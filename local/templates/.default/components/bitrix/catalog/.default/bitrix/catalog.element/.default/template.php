<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

\Data\Layer\Element::view([
    'name' => addslashes($arResult['NAME']),
    'id' => $arResult['ID'],
    'price' => $arResult['MIN_PRICE']['DISCOUNT_VALUE'],
    'category' => \Data\Layer\Section::getName($arResult['IBLOCK_SECTION_ID'])
]);
