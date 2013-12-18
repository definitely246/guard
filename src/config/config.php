<?php

return array(

	/*
	|--------------------------------------------------------------------------
	| paths
	|--------------------------------------------------------------------------
	|
	| These are the directories and files relative to your application which will
	| be watched when running the php artisan assets:watch command
	|
	*/
	'paths' => array(
		'app/assets/javascripts',
		'app/assets/stylesheets',
		'app/assets/images',
		'lib/assets/javascripts',
		'lib/assets/stylesheets',
		'lib/assets/images',
		'provider/assets/javascripts',
		'provider/assets/stylesheets',
		'provider/assets/images'
	),

	/*
	|--------------------------------------------------------------------------
	| events
	|--------------------------------------------------------------------------
	|
	| When the watcher_paths are changed the events listened here will be
	| called in the order they are listed. These classes should implement the
	| interface Codesleeve\Watcher\Events\EventInterface.
	|
	*/
	'events' => array(
		new Codesleeve\Watcher\Events\LogEvent
	),

);