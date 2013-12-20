<?php namespace Codesleeve\Guard;

use Illuminate\Support\ServiceProvider;

class GuardServiceProvider extends ServiceProvider
{
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
		$this->package('codesleeve/guard');

		$this->app['guard'] = $this->app->share(function($app)
		{
			$config = $app->config->get('guard::config');
			$config['base_path'] = base_path();
			$config['environment'] = $app['env'];
			
			$guard = new Guard($config);

			$app['events']->fire('guard.boot', $guard);

			return $guard;
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