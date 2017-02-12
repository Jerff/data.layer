<?

namespace Data\Layer;

use CIBlockSection;

class Section {

    static public function getName($ID) {
        static $sections = array();
        if (!isset($sections[$ID])) {
            $sections[$ID] = Utility::useCache([__CLASS__, __FUNCTION__, $ID], function() use ($ID) {
                        $res = CIBlockSection::GetByID($ID);
                        if ($ar_res = $res->Fetch()) {
                            return $ar_res['NAME'];
                        } else {
                            return '';
                        }
                    });
        }
        return $sections[$ID];
    }

}
