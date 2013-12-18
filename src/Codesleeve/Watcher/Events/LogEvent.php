<?php namespace Codesleeve\Watcher\Events;

class LogEvent implements EventInterface
{
	public function listen($event, $watcher)
	{
		echo $event->getResource() . ' was ' . $event->getTypeString() . PHP_EOL;
	}
}