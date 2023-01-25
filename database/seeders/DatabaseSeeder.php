<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

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
        //     'name' => 'arman',
        //     'username' => 'arman23',
        //     'email' => 'arman23@gmail.com',
        //     'password' => Hash::make('12345678'), 
        //     'role' => 'user'
        // ]);
        \App\Models\About::create([
            'about' => 'Kami menyediakan layanan laundry profesional dan
            berkualitas, yang dapat Anda pesan dengan mudah melalui website kami. Dengan layanan
            online
            kami, Anda dapat menghemat waktu dan tenaga Anda tanpa harus keluar rumah. Kami menjamin
            kebersihan dan keamanan pakaian Anda selama proses laundry. Ayo pesan sekarang dan
            rasakan
            kenyamanan layanan laundry kami!'
        ]);
    }
}