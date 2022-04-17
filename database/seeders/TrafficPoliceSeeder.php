<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\TrafficPolice;
use Faker\factory as Faker;

class TrafficPoliceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $fake = Faker::create();


        // data insert
        for($i=1;$i<20;$i++) {
            $traffic = new TrafficPolice();
            $traffic->firstname = $fake->firstname;
            $traffic->lastname = $fake->lastname;
            $traffic->gender = "male";
            $traffic->dob = now();
            $traffic->email = $fake->email;
            $traffic->phone = $fake->phonenumber;
            $traffic->address1 = $fake->address;
            $traffic->address2 = $fake->address;
            $traffic->state = $fake->state;
            $traffic->postcode = $fake->postcode;
            $traffic->city = $fake->city;
            $traffic->user_id = $fake->name;
            $traffic->user_password = $fake->password;
            $traffic->save();
        }
    }
}
