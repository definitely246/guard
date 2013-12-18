# Watcher

I'll be watching you... *stalker face*

This is a package utilized by asset pipeline to allow us to store common event classes here and also a couple of tests. For the most part we rely heavily on [Lurker](https://github.com/henrikbjorn/Lurker).

You need paths to watch (these should exist...)

```php

	$paths = array(
		'/some/paths/here',
		'/even/more/paths/here',
	);
```

You need event classes which should implement [Codesleeve\Watcher\Events\EventInterface](https://github.com/CodeSleeve/watcher/blob/master/src/Codesleeve/Watcher/Events/EventInterface.php)

```
	$events = array(
		new Events\LiveReloadEvent,
		new Events\LogEvent
	);
```

Finally call the watcher start

```php
	$watcher = new Watcher($paths, $events);
	$watcher->start();
```