<?php

use Illuminate\Database\Seeder;
use App\Product;
use App\Order;
use App\User;
use App\Customer;
class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        $this->call([
            CustomersTableSeeder::class,
            ProductsTableSeeder::class,
            OrdersTableSeeder::class,
            ]);
        \Bouncer::allow('administrator')->everything();

        \Bouncer::allow('user-manager')->toManage(User::class);
        
        \Bouncer::allow('shop-manager')->toManage(Product::class);

        \Bouncer::allow('shop-manager')->toManage(Order::class);

        $admin = factory(User::class)->create([
            'email' => 'administrator@example.com'
        ]);

        $admin->assign('administrator');

        $userManager = factory(User::class)->create([
            'email' => 'user.manager@example.com'
        ]);

        $userManager->assign('user-manager');
        \Bouncer::disallow($userManager)->toManage(Product::class);
        \Bouncer::disallow($userManager)->toManage(Order::class);
        \Bouncer::disallow($userManager)->toManage(Customer::class);
        
        $shopManager = factory(User::class)->create([
            'email' => 'shop.manager@example.com'
        ]);

        $shopManager->assign('shop-manager');

        \Bouncer::disallow($shopManager)->toManage(Customer::class);

        // factory(App\User::class)->create([
        //     'email' => 'usermanager@example.com'
        // ]);
    }
}
