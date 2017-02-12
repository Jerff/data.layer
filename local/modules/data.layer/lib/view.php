<?php

namespace Data\Layer;

class View {

    static public function init() {
        ?>
        <script>
            var dataLayerCustom = new (function () {
                var t = this;
                t.arPushList = {};

                t.getId = function (code) {
                    return 't' + code;
                };

                t.add = function (arPush) {
                    return t.arPushList[t.getId(arPush.id)] = arPush;
                };

                t.get = function (code) {
                    return t.arPushList[t.getId(code)];
                };

                t.push = function (arPush) {
                    dataLayer.push(arPush);
                    console.log(arPush);
                };

                t.addToCart = function (code, quantity) {
                    var arPush = t.get(code);
                    arPush.quantity = quantity;
                    t.push({
                        event: 'addToCart',
                        ecommerce: {
                            currencyCode: 'RUB',
                            add: {
                                products: [arPush]
                            }
                        }
                    });
                    return true;
                };

                t.removeFromCart = function (code, quantity) {
                    var arPush = t.get(code);
                    arPush.quantity = quantity;
                    t.push({
                        event: 'removeFromCart',
                        ecommerce: {
                            currencyCode: 'RUB',
                            remove: {
                                products: [arPush]
                            }
                        }
                    });
                    return true;
                };
            });
        </script>
        <?
    }

    static public function add($arPush) {
//        pre($arPush);
        ?>
        <script>
            dataLayerCustom.add(<?= json_encode($arPush) ?>);
            console.log('add', <?= json_encode($arPush) ?>);
        </script>
        <?
    }

    static public function push($arPush) {
        pre($arPush);
        ?>
        <script>
            dataLayer.push(<?= json_encode($arPush) ?>);
            console.log('push', <?= json_encode($arPush) ?>);
        </script>
        <?
    }

}
