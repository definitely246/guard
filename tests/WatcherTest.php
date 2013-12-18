<?php namespace Codesleeve\Watcher;

class WatcherTest extends \PHPUnit_Framework_TestCase
{	
	public function testConstruction()
	{
		$paths = array(
			__DIR__. '/fixtures/app/assets/javascripts',
			__DIR__. '/fixtures/app/assets/stylesheets',
		);

		$events = array(
			new Events\LiveReloadEvent,
			new Events\LogEvent
		);

		$watcher = new Watcher($paths, $events);

		// cannot start this thing because it will
		// lock up phpunit ^_^
		// $watcher->start();
	}
}