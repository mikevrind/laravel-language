<?php namespace MikeVrind\LaravelLanguage;

use Illuminate\Support\ServiceProvider;

class LaravelLanguageServiceProvider extends ServiceProvider {

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

        $this->app->bindIf('command.language.doubles', function () {
            return new Console\DoublesCommand();
        });

        $this->commands('command.language.doubles');
	}

	/**
	 * Get the services provided by the provider.
	 *
	 * @return array
	 *
	public function provides()
	{
		return array();
	}
     * */

}
