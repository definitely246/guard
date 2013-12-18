# Watcher

I'll be watching you... *stalker face*

This is a laravel 4 package that relies heavily on [Lurker](https://github.com/henrikbjorn/Lurker).

To get started update your dependencies in `composer.json`

```js
	"require": {
		"codesleeve/watcher": "dev-master"
	},
```

The service provider needs to be registered in `app/config/app.php`

```php
'providers' => array(
		...
		'Codesleeve\Watcher\WatcherServiceProvider',
	),

```

And voila! You should now be able to run

```php
   php artisan watch:assets
```

This doesn't do much exist log out changes to our assets though. So let's learn how to configure this thing.

### Configuration

First you should publish the config

```php
   php artisan config:publish codesleeve/watcher
```

Next open up `app/config/packages/codessleve/watcher/config.php`


#### paths

These paths are relative to your base laravel project and will be monitored by watcher. There can be both directories and files in this array.

```php
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
```

#### events

Event classes should implement [Codesleeve\Watcher\Events\EventInterface](https://github.com/CodeSleeve/watcher/blob/master/src/Codesleeve/Watcher/Events/EventInterface.php) and are called in order whenever a file in your paths above changes.

```php
	'events' => array(
		new Codesleeve\Watcher\Events\LogEvent
	),
```