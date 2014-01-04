# Guard

### No ruby? No node? No problem.

Guard allows you to run custom and packaged events whenever files are changed with your configurable paths. _Note, this package is meant to be used with Laravel 4._

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
		'app/assets',
		'app/models',
		'app/controllers',
		'app/views',
	),
```

#### events

Event classes should implement [Codesleeve\Guard\Events\EventInterface](https://github.com/CodeSleeve/Guard/blob/master/src/Codesleeve/Guard/Events/EventInterface.php) and are called in order whenever a file in your paths above changes.

```php
	'events' => array(
		new Codesleeve\Guard\Events\LogEvent
	),
```

## FAQ

#### pcntl_signal disabled_functions

In order to capture the ctrl+c event from keyboard we use pcntl_signal which depending on what package manager/operating system you use could be disabled in your php.ini. Be sure to [remove pcntl_signal](http://stackoverflow.com/questions/16262854/pcntl-not-working-on-ubuntu-from-security-reasons) from your `disabled_functions`.