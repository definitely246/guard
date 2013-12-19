<?php namespace Codesleeve\Guard;

class GuardTest extends \PHPUnit_Framework_TestCase
{	
	public function testConstruction()
	{
		$paths = array(
			__DIR__. '/fixtures/app/assets/javascripts',
			__DIR__. '/fixtures/app/assets/stylesheets',
		);

		$events = array(
			new Events\LogEvent
		);

		$watcher = new Guard($paths, $events);

		// cannot start this thing because it will
		// lock up phpunit ^_^
		// $watcher->start();
	}
}