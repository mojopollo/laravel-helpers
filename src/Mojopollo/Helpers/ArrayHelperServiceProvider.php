<?php namespace Mojopollo\Helpers;

use Illuminate\Support\ServiceProvider;

class ArrayHelperServiceProvider extends ServiceProvider
{

  /**
   * Indicates if loading of the provider is deferred.
   *
   * @var bool
   */
  protected $defer = true;

  /**
   * Register the service provider.
   *
   * @return void
   */
  public function register()
  {
    $this->app->bindShared('arrayhelper', function()
    {
      return new ArrayHelper;
    });
  }

  /**
   * Get the services provided by the provider.
   *
   * @return arr
   */
  public function provides()
  {
    return ['arrayhelper'];
  }

}
