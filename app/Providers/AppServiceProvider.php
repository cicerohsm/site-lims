<?php

namespace App\Providers;

use App\Models\User;
use App\Repositories\Contracts\EventRegistrationRepositoryInterface;
use App\Repositories\Contracts\EventRepositoryInterface;
use App\Repositories\Contracts\PostRepositoryInterface;
use App\Repositories\Contracts\PublicationRepositoryInterface;
use App\Repositories\Contracts\ResourceRepositoryInterface;
use App\Repositories\Eloquent\EloquentEventRegistrationRepository;
use App\Repositories\Eloquent\EloquentEventRepository;
use App\Repositories\Eloquent\EloquentPostRepository;
use App\Repositories\Eloquent\EloquentPublicationRepository;
use App\Repositories\Eloquent\EloquentResourceRepository;
use Illuminate\Auth\Notifications\ResetPassword;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->bind(PostRepositoryInterface::class, EloquentPostRepository::class);
        $this->app->bind(PublicationRepositoryInterface::class, EloquentPublicationRepository::class);
        $this->app->bind(ResourceRepositoryInterface::class, EloquentResourceRepository::class);
        $this->app->bind(EventRepositoryInterface::class, EloquentEventRepository::class);
        $this->app->bind(EventRegistrationRepositoryInterface::class, EloquentEventRegistrationRepository::class);
    }

    public function boot(): void
    {
        Gate::define('admin', fn (User $user) => $user->isAdmin());

        ResetPassword::toMailUsing(function (object $notifiable, string $token) {
            $url = url(route('password.reset', [
                'token' => $token,
                'email' => $notifiable->getEmailForPasswordReset(),
            ], false));

            return (new MailMessage)
                ->subject('Redefinição de senha - LIMS')
                ->greeting('Olá!')
                ->line('Recebemos uma solicitação de redefinição de senha para sua conta no LIMS.')
                ->action('Redefinir senha', $url)
                ->line('Este link expira em 60 minutos.')
                ->line('Se você não solicitou a redefinição, nenhuma ação é necessária.');
        });

        if ($this->app->runningInConsole()) {
            return;
        }

        $request = $this->app['request'];
        $forwardedProto = $request->headers->get('x-forwarded-proto');
        $isRailwayHost = str_ends_with($request->getHost(), '.up.railway.app');

        if ($forwardedProto === 'https' || $isRailwayHost || $this->app->environment('production')) {
            URL::forceRootUrl('https://' . $request->getHost());
            URL::forceScheme('https');
        }
    }
}
