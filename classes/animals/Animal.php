<?php

namespace classes\animals;

abstract class Animal {
    private $id;

    abstract public function collectProducts();
    abstract protected function setTypeProduct();
    abstract public function getTypeProduct();

    public final function __construct() {
        $this->id = uniqid();
        $this->setTypeProduct();
    }
    
	public function getId() {
		return $this->id;
	}
}

?>