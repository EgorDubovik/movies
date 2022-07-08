<?php

namespace Database\Seeders;

use App\Models\Addresses;
use App\Models\Order;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::factory()->count(10)->create()->each(function ($user){
            $orders = Order::factory()->count(rand(1,3))->make()->each(function ($order){
                $address_from = Addresses::factory()->create();
                $address_to = Addresses::factory()->create();
                $order->address_from_id = $address_from->id;
                $order->address_to_id = $address_to->id;
            });

            $user->orders()->saveMany($orders);
        });
    }
}
