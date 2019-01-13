<?php

use Illuminate\Database\Seeder;
use App\Patient;

class PatientsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $patient = new Patient;
        $patient->name = "Tommy Gore";
        $patient->address = '12 Sycamore Lane, Durbin, Co. Longford';
        $patient->phone = '0892136574';
        $patient->email = 'tgore@iadt.ie';
        $patient->insurance = "O'Neill Ltd.";
        $patient->save();

        $patient = new Patient;
        $patient->name = "Brian Brown";
        $patient->address = '14 Lower Scheol, Browntown, Co. Fairry';
        $patient->phone = '0864505432';
        $patient->email = 'bbrown@browntown.ie';
        $patient->insurance = 'Aviva';
        $patient->save();

        $patient = new Patient;
        $patient->name = "Jolly Christmas";
        $patient->address = '45 Elf Park, Jingle Island';
        $patient->phone = '085475348';
        $patient->email = 'default@longisland.com';
        $patient->insurance = 'Raxel';
        $patient->save();
    }
}
