<?php

namespace Data\Layer;

class Utility {

    const IS_CACHE = true;
    const CACHE_TIME = 3600;
    const CACHE_DIR = '/data.layer/';

    static public function useCache($cacheId, $func, $time = self::CACHE_TIME) {
        $obCache = new \CPHPCache;
        $cacheId = 'data.layer:' . $time . ':' . (is_array($cacheId) ? implode(':', $cacheId) : $cacheId);
        if (self::IS_CACHE and $obCache->InitCache($time, $cacheId, self::CACHE_DIR)) {
            $arResult = $obCache->GetVars();
        } elseif ($obCache->StartDataCache()) {
            $arResult = $func();
            $obCache->EndDataCache($arResult);
        }
        return $arResult;
    }

}
