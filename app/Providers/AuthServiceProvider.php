<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;

use Illuminate\Auth\Notifications\VerifyEmail;
use Illuminate\Auth\Notifications\ResetPassword;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        //
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        //
        VerifyEmail::toMailUsing(function($notifiable , $url){

               return (new MailMessage)
               ->subject('Verificar Cuenta')
               ->line('Tu cuenta ya esta casi lista , solo debes presionar el enlace a continuacion')
               ->action('Confirmar Cuenta', $url)
               ->line('Por favor no contestar a este mensaje');
        });

       /* ResetPassword::toMailUsing(function($notifiable, $url) {
            return (new MailMessage)
                ->subject('Notificación de restablecimiento de contraseña')
                ->line('Está recibiendo este correo electrónico porque recibimos una solicitud de restablecimiento de contraseña para su cuenta.')
                ->action('Establecer contraseña', $url)
                ->line('Este enlace para restablecer la contraseña caducará en 60 minutos.')
                ->line('Si no solicitó un restablecimiento de contraseña, no es necesario realizar ninguna otra acción.');
        });*/
    }
}
