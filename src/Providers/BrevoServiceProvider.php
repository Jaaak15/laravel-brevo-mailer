<?php

namespace JakGH\Providers;

use \Illuminate\Support\ServiceProvider;
use Services\BrevoService;

class BrevoServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind( BrevoService::class, function () {

            $key = config('brevo.key');
            $emailFrom = config('brevo.emailFrom');          
            $options = config('brevo.options', []);

            $instance = new BrevoService( $key, $options );

            if (filled($emailFrom)) {
                $instance->setEmailFrom($emailFrom);
            }          

            return $instance;
        });
    }

    public function provides(): array
    {
        return [BrevoService::class];
    }
}
