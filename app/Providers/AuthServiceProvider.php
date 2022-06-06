<?php

namespace App\Providers;

use App\Models\Application;
use App\Models\Deal;
use App\Models\Order;
use App\Models\User;
use App\Policies\OrderPolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        Order::class => OrderPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();
        // Orders Gates
        Gate::define('send-application', function (User $user, Order $order){
            $application = Application::where(['order_id'=>$order->id,'user_id'=>$user->id])->first();
            if(!$application && $user->is_driver && $order->user_id != $user->id && $order->status == Order::IS_NEW)
                return true;
            return false;
        });

        Gate::define('confirm-application',function (User $user, Application $application){
           if ($application->order->user_id == $user->id)
               return true;
           return false;
        });

        // Deals Gates
        Gate::define('view-deal',function (User $user, Deal $deal){
            return ($user->id === $deal->mover_id || $user->id === $deal->driver_id);
        });
        Gate::define('update-deal-customer',function (User $user, Deal $deal){
           return  $user->id === $deal->mover_id;
        });
        Gate::define('update-deal-driver',function (User $user, Deal $deal){
            return  $user->id === $deal->driver_id;
        });
    }
}
