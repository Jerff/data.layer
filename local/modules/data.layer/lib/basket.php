<?

namespace Data\Layer;

use Bitrix\Sale;

class Basket {

    public static function success($orderId) {
        if (empty($_SESSION['ORDER_SUCCESS'][$orderId])) {
            $_SESSION['ORDER_SUCCESS'][$orderId] = true;
            $order = Sale\Order::load($orderId);
            $arPushList = array();
            foreach ($order->getBasket() as $basketItem) {
                $arPushList[] = [
                    'name' => addslashes($basketItem->getField('NAME')),
                    'id' => $basketItem->getField('PRODUCT_ID'),
                    'price' => round($basketItem->getField('PRICE') * $basketItem->getField('QUANTITY'), 2),
                    'category' => \Data\Layer\Element::getSectionName($basketItem->getField('PRODUCT_ID')),
                ];
            }
            View::push([
                'ecommerce' => [
                    'purchase' => [
                        'actionField' => [
                            'id' => $orderId,
                            'revenue' => round($order->getField('PRICE'), 2),
                        ],
                        'products' => $arPushList
                    ]
                ]
            ]);
        }
    }

}
