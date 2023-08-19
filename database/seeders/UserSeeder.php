<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [
            [
                "first_name" => "Febri",
                "last_name" => "Nugroho",
                "email" => "p.febrinugroho@gmail.com",
                "birthday" => "1992-02-26",
                "location" => "Jakarta",
                "loc_code" => "ID",
            ],
            [
                "first_name" => "Test",
                "last_name" => "Singa",
                "email" => "test@mail.com",
                "birthday" => "2023-08-18",
                "location" => "Singapore",
                "loc_code" => "",
            ],
            [
                "first_name" => "John",
                "last_name" => "Cena",
                "email" => "test2@mail.com",
                "birthday" => "2023-08-19",
                "location" => "New_York",
                "loc_code" => "",
            ],
        ];

        foreach ($users as $key => $value) {
            User::create($value);
        }
    }
}
