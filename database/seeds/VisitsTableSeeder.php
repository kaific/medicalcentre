<?php

use Illuminate\Database\Seeder;
use App\Visit;

class VisitsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $visit = new Visit;
        $visit->date = '10/01/2019';
        $visit->date = date('Y-m-d', strtotime($visit->date));
        $visit->time = '12:00:00';
        $visit->duration = '00:30:00';
        $visit->patient_id = '1';
        $visit->doctor_id = '1';
        $visit->cost = '50';
        $visit->save();

        $visit = new Visit;
        $visit->date = '10/01/2019';
        $visit->date = date('Y-m-d', strtotime($visit->date));
        $visit->time = '12:00:00';
        $visit->duration = '00:30:00';
        $visit->patient_id = '1';
        $visit->doctor_id = '1';
        $visit->cost = '50';
        $visit->save();
    }
}
