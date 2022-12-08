<?php

namespace classes\shop;

use classes\Farm;
use classes\shop\CowShop;
use classes\shop\ChickenShop;

class AnimalShop implements Shop {
	private CowShop $cowShop;
	private ChickenShop $chickenShop;
	private Farm $farm;
	private array $order;

	public function __construct(Farm $farm){
		$this->order = [];
		$this->farm = $farm;
		$this->cowShop = new CowShop();
		$this->chickenShop = new ChickenShop();
	}

	public function buy($orderList) {
		$this->order = [];
		foreach ($orderList as $item => $count){
			if (!$count) 
				continue;
				
			$item = strtolower($item);
			switch ($item){
				case "cow":
					$this->cowShop->buy($count);
					array_push($this->order, $this->cowShop->sendOrder());
					break;
				case "chicken":
					$this->chickenShop->buy($count);
					array_push($this->order, $this->chickenShop->sendOrder());
					break;
			}
		}
		$this->sendOrder();
	}

	public function sendOrder(){
		foreach ($this->order as $item){
			$this->farm->addAnimal($item);
		}
	}
}

?>