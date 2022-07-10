<?php

namespace App\Providers;

use App\Models\Application;
use App\Models\Deal;
use App\Models\Favorite;
use App\Models\Order;
use App\Models\Rating;
use App\Models\User;
use App\Policies\OrderPolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Notifications\DatabaseNotification;
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

        Gate::define('view-applications',function (User $user){
            return $user->is_driver;
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
        Gate::define('change-deal-status-driver',function (User $user, Deal $deal){
           if ($user->is_driver && $deal->driver_id == $user->id && ($deal->status==Deal::ISNEW || $deal->status==Deal::IN_PROGRESS))
               return true;
           return false;
        });
        Gate::define('change-deal-status-mover',function (User $user, Deal $deal){
            if ($user->is_mover && $deal->mover_id == $user->id && $deal->status >= Deal::DELIVERED)
                return true;
            return false;
        });
        Gate::define('close-deal',function (User $user, Deal $deal){
           if ($deal->status == Deal::CANCEL && ($user->id == $deal->driver_id || $user->id == $deal->mover_id))
               return true;
           return false;
        });


        // Rating
        Gate::define('send-rating', function (User $sender, $receiver_id){
            $deal = Deal::where(function ($query) use($sender,$receiver_id){
                $query->where('mover_id', $sender->id);
                $query->where('driver_id', $receiver_id);
            })
            ->orWhere(function ($query) use ($sender, $receiver_id){
                $query->where('driver_id', '=', $sender->id);
                $query->where('mover_id', '=', $receiver_id);
            })->first();

            $rating = Rating::where(function ($query) use($sender,$receiver_id){
                $query->where('sender_id', $sender->id);
                $query->where('receiver_id', $receiver_id);
            })->first();

            if ($deal && $deal->status >= Deal::DONE && !$rating)
                return true;
            return false;
        });

        // Notification
        Gate::define('read-notifications', function (User $user, DatabaseNotification $notification){
            return $user->id === $notification->notifiable_id;
        });

        // Favorite
        Gate::define('add-to-favorite', function (User $user, User $company){
           $f = Favorite::where('company_id', $company->id)
                        ->where('owner_id', $user->id)->first();
           if(!$f)
               return true;
           return false;
        });

    }
}
