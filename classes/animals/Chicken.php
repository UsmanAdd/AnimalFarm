<?php

namespace classes\animals;

use classes\Product;
use classes\animals\Animal;

class Chicken extends Animal {
    private string $typeProduct;

	public function collectProducts() {
        return rand(0, 1);
	}

	protected function setTypeProduct() {
        $this->typeProduct = Product::Eggs;
	}

	public function getTypeProduct() {
        return $this->typeProduct;
	}
}

?>