<?php

namespace classes\shop;

use classes\animals\Cow;

class CowShop implements Shop {
	private array $order;

	public function __construct()
	{
		$this->order = [];
	}

	public function buy($orderList) {
		$this->order = [];
		for ($i = 0; $i < $orderList; $i++){
			$cow = new Cow();
			array_push($this->order, $cow);
		}
	}

	public function sendOrder(){
		return $this->order;
	}
}

?>