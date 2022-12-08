<?php

namespace classes\shop;

use classes\animals\Animal;

interface Shop {
    public function sendOrder();
    public function buy($orderList);
}

?>