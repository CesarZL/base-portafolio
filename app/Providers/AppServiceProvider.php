<?php

namespace App\Providers;

use Illuminate\Auth\Notifications\VerifyEmail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        VerifyEmail::toMailUsing(function($notifable, $url){
            return(new MailMessage)
                ->subject('Por favor, verifique su dirección de correo electrónico')
                ->line('Haga clic en el botón de abajo para verificar su dirección de correo electrónico.')
                ->action('Verificar dirección de correo electrónico', $url)
                ->line('Si no creó una cuenta, no se requiere ninguna otra acción.');
            });
    }
}
