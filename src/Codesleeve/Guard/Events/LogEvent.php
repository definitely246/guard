<?php namespace Codesleeve\Guard\Events;

use DateTime;

class LogEvent implements EventInterface
{
	public function start($watcher)
	{
		$this->watcher = $watcher;
	}

	public function stop()
	{
		echo PHP_EOL . "Stopping guard:watch. Have a nice day!" . PHP_EOL;
	}

	public function listen($event)
	{
		$date = (new DateTime)->format('D M d H:i:s Y');
		echo "[{$date}] {$event->getTypeString()} {$event->getResource()}" . PHP_EOL;
	}
}