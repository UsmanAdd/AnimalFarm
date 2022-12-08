<?php

namespace classes\logger;

use classes\logger\Logger;

class ConsoleLogger implements Logger {
	public function log($msg) {
        echo $msg . "\n";
	}
}

?>