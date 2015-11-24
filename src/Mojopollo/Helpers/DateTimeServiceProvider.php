<?php namespace Mojopollo\Helpers;

use Illuminate\Support\ServiceProvider;

class DateTimeServiceProvider extends ServiceProvider
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
    $this->app->bindShared('datetime', function()
    {
      return new DateTime;
    });
  }

  /**
   * Get the services provided by the provider.
   *
   * @return array
   */
  public function provides()
  {
    return ['datetime'];
  }

}
