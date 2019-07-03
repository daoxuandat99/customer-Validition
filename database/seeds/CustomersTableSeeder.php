<?php

use App\Customer;
use Illuminate\Database\Seeder;

class CustomersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $customer = new Customer();
        $customer->id = 1;
        $customer->name = "customer 1";
        $customer->age = "20";
        $customer->email = "xuandat@gmail.com";
        $customer->city_id = 1;
        $customer->save();

        $customer = new Customer();
        $customer->id = 2;
        $customer->name = "customer 2";
        $customer->age = "21";
        $customer->email = "dat@gmail.com";
        $customer->city_id = 2;
        $customer->save();

        $customer = new Customer();
        $customer->id = 3;
        $customer->name = "customer 3";
        $customer->age = "22";
        $customer->email = "xuan@gmail.com";
        $customer->city_id = 3;
        $customer->save();
    }
}
