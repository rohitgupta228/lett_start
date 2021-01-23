<?php

  namespace App\Core\Notifications;

  use Illuminate\Support\ServiceProvider;

  class FlashServiceProvider extends ServiceProvider {

    public function register()
    {
      $this->app->bind('flash', function()
      {
        return $this->app->make('App\Core\Notifications\FlashNotifier');
      });
    }

  }

