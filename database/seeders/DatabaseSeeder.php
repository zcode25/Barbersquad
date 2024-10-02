<?php

namespace Database\Seeders;

use App\Models\Barberman;
use App\Models\Service;
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
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        User::create([
            'name'      => 'admin',
            'username'  => 'admin',
            'email'     => 'admin@gmail.com',
            'telephone' => '6281356437865',
            'password'  => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
            'address'   => 'Bekasi',
            'type'      => 'admin'
        ]);

        User::create([
            'name'      => 'Asep',
            'username'  => 'asep',
            'email'     => 'asep@gmail.com',
            'telephone' => '6281398435612',
            'password'  => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
            'address'   => 'Tambun',
            'type'      => 'customer'
        ]);

        User::create([
            'name'      => 'Mail',
            'username'  => 'mail',
            'email'     => 'mail@gmail.com',
            'telephone' => '6281312321234',
            'password'  => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
            'address'   => 'Cikarang',
            'type'      => 'customer'
        ]);

        Barberman::create([
           'barberman_name'         => 'Joko',
           'barberman_username'     => 'joko',
           'barberman_email'        => 'joko@gmail.com',
           'barberman_telephone'    => '6281388654321',
           'barberman_address'      => 'Jakarta',
        ]);

        Barberman::create([
            'barberman_name'         => 'Adam',
            'barberman_username'     => 'adam',
            'barberman_email'        => 'adam@gmail.com',
            'barberman_telephone'    => '6281316671373',
            'barberman_address'      => 'Jakarta',
         ]);

        Service::create([
            'service_name'          => 'Gentlemen Grooming',
            'service_description'   => 'Lorem ipsum dolor sit amet consectetur adipisicing elit.',
            'service_price'         => 70000
        ]);

        Service::create([
            'service_name'          => 'Gentlemen Grooming & Hairspa',
            'service_description'   => 'Lorem ipsum dolor sit amet consectetur adipisicing elit.',
            'service_price'         => 90000
        ]);

        Service::create([
            'service_name'          => 'Grooming + Hair Tattoo',
            'service_description'   => 'Lorem ipsum dolor sit amet consectetur adipisicing elit.',
            'service_price'         => 130000
        ]);

    }
}
