<?php

/**
* SimplestLogger
*/
class SimplestLogger
{
	public function __construct()
	{
		return true;
	}

	public function log($data, $needDie = true) {
		echo '<pre>' . var_export($data, true) . '</pre>';

		if ($needDie) {
			$data = debug_backtrace();
			die('<pre>Die in "' . $data[0]['file'] . '" on line: ' . $data[0]['line'] . '</pre>');
		}

		return true;
	}
}

?>
