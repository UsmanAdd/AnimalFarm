<?php

namespace classes\animals;

use classes\Product;
use classes\animals\Animal;

class Cow extends Animal {
    private string $typeProduct;

    public function collectProducts() {
        return rand(8, 12);
    }

    protected function setTypeProduct(){
        $this->typeProduct = Product::Milk;
    }
	
	public function getTypeProduct() {
        return $this->typeProduct;
	}
}

?>