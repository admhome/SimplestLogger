<?php

/**
* SimplestLogger
*/
class SimplestLogger
{
	protected $isCLI;

	public function __construct()
	{
		$this->isCLI = (php_sapi_name() === 'cli');

		return true;
	}

	public function log($data, $needDie = true) {
		if ($this->isCLI) {
			echo '[DEBUG] Data: ' . var_export($data, true) . PHP_EOL;
		} else {
			echo '<pre>' . var_export($data, true) . '</pre>';
		}

		if ($needDie) {
			$data = debug_backtrace();

			if ($this->isCLI) {
				die('[DIE] File "' . $data[0]['file'] . '", line: ' . $data[0]['line'] . PHP_EOL);
			} else {
				die('<pre>Die in "' . $data[0]['file'] . '" on line: ' . $data[0]['line'] . '</pre>');
			}
		}

		return true;
	}
}

?>
