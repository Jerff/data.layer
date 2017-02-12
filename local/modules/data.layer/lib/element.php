<?

namespace Data\Layer;

use CIBlockElement;

class Element {

    static public function view($arItem) {
        View::add($arItem);
        View::push([
            'ecommerce' => [
                'detail' => [
                    'products' => $arItem
                ]
            ]
        ]);
    }

    static public function getSectionName($ID) {
        static $products = array();
        if (!isset($products[$ID])) {
            $products[$ID] = Utility::useCache([__CLASS__, __FUNCTION__, $ID], function() use ($ID) {
                        $res = CIBlockElement::GetByID($ID);
                        if ($ar_res = $res->Fetch()) {
                            return Section::getName($ar_res['IBLOCK_SECTION_ID']);
                        } else {
                            return '';
                        }
                    });
        }
        return $products[$ID];
    }

}
