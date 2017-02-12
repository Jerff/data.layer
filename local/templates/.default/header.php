<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();
?>
<!DOCTYPE html>
<html lang="<?=LANGUAGE_ID?>">
<head>
    <? $APPLICATION->IncludeComponent("bitrix:main.include", "", array_merge($arDefIncludeParams,array("PATH" => SITE_DIR."include/header/head.script.php")), false, array("HIDE_ICONS"=>"Y")); ?>
</head>
<body>