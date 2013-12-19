# Guard

I'll be watching you... *stalker face*

This is a laravel 4 package that relies heavily on [Lurker](https://github.com/henrikbjorn/Lurker).

To get started update your dependencies in `composer.json`

```js
	"require": {
		"codesleeve/guard": "dev-master"
	},
```

The service provider needs to be registered in `app/config/app.php`

```php
'providers' => array(
		...
		'Codesleeve\Guard\GuardServiceProvider',
	),

```

And voila! You should now be able to run

```php
   php artisan guard:watch
```

This doesn't do much except [print out changes to our assets](https://github.com/CodeSleeve/Guard/blob/master/src/Codesleeve/Guard/Events/LogEvent.php) though. So let's learn how to configure this thing.

### Configuration

First you should publish the config

```php
   php artisan config:publish codesleeve/guard
```

Next open up `app/config/packages/codessleve/guard/config.php`


#### paths

These paths are relative to your base laravel project and will be monitored by Guard. There can be both directories and files in this array.

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

Event classes should implement [Codesleeve\Guard\Events\EventInterface](https://github.com/CodeSleeve/Guard/blob/master/src/Codesleeve/Guard/Events/EventInterface.php) and are called in order whenever a file in your paths above changes.

```php
	'events' => array(
		new Codesleeve\Guard\Events\LogEvent
	),
```