<?php namespace Codesleeve\Watcher;

use Illuminate\Support\ServiceProvider;

class WatcherServiceProvider extends ServiceProvider {

	/**
	 * Indicates if loading of the provider is deferred.
	 *
	 * @var bool
	 */
	protected $defer = false;

	/**
	 * Register the service provider.
	 *
	 * @return void
	 */
	public function register()
	{
		$this->package('codesleeve/watcher');

		$this->app['watcher'] = $this->app->share(function($app)
		{
			$config = $app->config->get('watcher::config');
			$config['base_path'] = base_path();
			$config['environment'] = $app['env'];
			
			$watcher = new Watcher($config);

			$app['events']->fire('watcher.boot', $watcher);

			return $watcher;
		});

		$this->app['watch'] = $this->app->share(function($app)
        {
            return new Commands\WatchCommand;
        });

		$this->commands('watch');
	}

	/**
	 * Get the services provided by the provider.
	 *
	 * @return array
	 */
	public function provides()
	{
		return array();
	}

}