<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
$sectionID = $APPLICATION->IncludeComponent(
        "bitrix:catalog.section", '.default', $arSectionParams,
        $component
);
\Data\Layer\View::push([
    'category_id' => $sectionID
]);