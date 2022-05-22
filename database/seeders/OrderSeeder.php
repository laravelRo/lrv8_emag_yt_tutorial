<?php

namespace Database\Seeders;

use Carbon\Carbon;
use App\Models\User;
use App\Models\shop\Order;
use Faker\Generator as Faker;
use App\Models\content\Product;
use App\Models\shop\OrderItem;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        // initializarea tabelelor
        DB::statement('SET FOREIGN_KEY_CHECKS = 0;');
        OrderItem::truncate();
        Order::truncate();

        //trebuie sa gasim utilizatorii care au emailul verificat si cel putin o adresa
        $users = User::withCount('addresses')
            ->whereNotNull('email_verified_at')
            ->get()
            ->where('addresses_count', '>', 0);

        //pentru fiecare utilizator voi crea un numar aleatoriu de comenzi intre 3 si 10
        //unele comenzi sunt aprobate la o zi dupa ce au fost create, altele nu sunt aprobate
        foreach ($users as $user) {
            //aflam adresa utilizatorului
            $address = $user->addresses->first();
            //numarul de comenzi
            $nr_orders = rand(2, 10);
            for ($i = 0; $i < $nr_orders; $i++) {
                $date = Carbon::createFromDate($faker->dateTimeBetween('-1 year', 'now'));
                $order = new Order;

                //setam cheia straina a comenzii user_id
                $order->user_id = $user->id;

                $order->name = $address->name;
                $order->city = $address->city;
                $order->address = $address->address;
                $order->phone = $address->phone;

                $order->created_at = $date;
                $order->approved_at = $faker->randomElement([null, $date->addDay()]);

                $order->observation = $faker->sentence(10);

                $order->save();
            }
        }

        //creem comenzi care sa fi fost platite
        //pentru a fi platite trebuie sa fi fost aprobate

        //obtinem numarul comezilor aprobate
        $count = Order::whereNotNull("approved_at")->count();

        //selectam din comenzile aprobate jumatate pentru a le seta ca platite
        $approved_orders = Order::whereNotNull("approved_at")
            ->inRandomOrder()
            ->limit(0.50 * $count)
            ->get();
        //pentru fiecare comanda aprobata selectata aleatoriu setam payed_at
        foreach ($approved_orders as $order) {
            $order->payed_at = $order->approved_at->addDay();
            $order->save();
        }

        //creem comenzi finalizate dintre cele paltite
        $count = Order::whereNotNull("payed_at")->count();

        //selectam din comenzile aprobate jumatate pentru a le seta ca receptionate
        $payed_orders = Order::whereNotNull("payed_at")
            ->inRandomOrder()
            ->limit(0.50 * $count)
            ->get();

        foreach ($payed_orders as $order) {
            $order->recivied_at = $order->payed_at->addDay();
            $order->save();
        }

        //ADAUGAM PRODUSE IN COMENZI
        //vom crea un numar de produse in order_item pentru fiecare comanda
        $orders = Order::all();
        foreach ($orders as $order) {
            $products = Product::inRandomOrder()
                ->limit(rand(3, 10))
                ->get();

            foreach ($products as $product) {
                $order_item = new OrderItem;
                //setam cheia straina pentru order_id
                $order_item->order_id = $order->id;
                $order_item->product_id = $product->id;
                $order_item->product_name = $product->name;
                $order_item->price = $product->price;
                $order_item->qty = rand(1, 4);

                $order_item->save();
            }
        }
    }
}
