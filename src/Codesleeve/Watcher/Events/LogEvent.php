<?php namespace Codesleeve\Watcher\Events;

use DateTime;

class LogEvent implements EventInterface
{
	public function listen($event, $watcher)
	{
		$date = (new DateTime)->format('D M d H:i:s Y');
		echo "[{$date}] {$event->getTypeString()} {$event->getResource()}" . PHP_EOL;
	}
}