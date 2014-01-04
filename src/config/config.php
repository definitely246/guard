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
		'app/assets',
		'app/controllers',
		'app/models',
		'app/views',
		'app/routes.php',
	),

	/*
	|--------------------------------------------------------------------------
	| events
	|--------------------------------------------------------------------------
	|
	| When the paths are changed the events listened here will be
	| called in the order they are listed. These classes should implement the
	| interface Codesleeve\Watcher\Events\EventInterface.
	|
	*/
	'events' => array(
		new Codesleeve\Guard\Events\LogEvent
	),

);