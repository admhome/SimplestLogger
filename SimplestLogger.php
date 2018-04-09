<?php

/**
 * SimplestLogger
 */
class SimplestLogger
{
	/**
	 * Признак запуска скрипта: CLI или нет
	 * @param boolean
	 */
	protected $isCLI;

	/**
	 * Конструктор
	 * 
	 * @return boolean
	 */
	public function __construct()
	{
		$this->isCLI = (php_sapi_name() === 'cli');

		return true;
	}

	/**
	 * Убить процесс выполнения скрипта
	 */
	protected function rip() {
		$data = debug_backtrace();

		if ($this->isCLI) {
			die('[DIE] File "' . $data[0]['file'] . '", line: ' . $data[0]['line'] . PHP_EOL);
		} else {
			die('<pre>Die in "' . $data[0]['file'] . '" on line: ' . $data[0]['line'] . '</pre>');
		}
	}

	/**
	 * Вывод сообщения
	 * 
	 * @param mixed $data данные для вывода
	 * @param boolean $needDie требуется ли немедленное прерывание скрипта
	 * 
	 * @return boolean
	 */
	public function log($data, $needDie = true) {
		if ($this->isCLI) {
			echo '[DEBUG] Data: ' . var_export($data, true) . PHP_EOL;
		} else {
			echo '<pre>' . var_export($data, true) . '</pre>';
		}

		if ($needDie) {
			$this->rip();
		}

		return true;
	}

	/**
	 * Вывод в лог объекта с замыканиями и прочими вещами
	 * 
	 * @param mixed $data данные для вывода
	 * @param boolean $needDie требуется ли немедленное прерывание скрипта
	 * 
	 * @return boolean
	 */
	public function logObject($data, $needDie = true) {
		if ($this->isCLI) {
			echo '[DEBUG] Data: ' . PHP_EOL;
			var_dump($data);
			echo PHP_EOL;
		} else {
			echo '<pre>' . PHP_EOL;
			var_dump($data);
			echo '</pre>' . PHP_EOL;
		}

		if ($needDie) {
			$this->rip();
		}

		return true;
	}
}

?>
