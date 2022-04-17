<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\factory as Faker;
use App\models\TrafficRules;

class RuleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $fake = Faker::create();
        for($i=0;$i<20;$i++) {
            $traffic = new TrafficRules();

            // data insert
            $traffic->rule_no = "40".$i;
            $traffic->rule_description = "Fake Rules : ".$i;
            $traffic->penalty_point = "50".$i;
            $feedback = $traffic->save();
        }
    }
}
