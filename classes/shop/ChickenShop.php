<?php

namespace classes\shop;

use classes\animals\Chicken;

class ChickenShop implements Shop {
	private array $order;

	public function __construct()
	{
		$this->order = [];
	}

	public function buy($orderList) {
		$this->order = [];
		for ($i = 0; $i < $orderList; $i++){
			$chicken = new Chicken();
			array_push($this->order, $chicken);
		}
	}

	public function sendOrder(){
		return $this->order;
	}
}

?>