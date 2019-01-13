<?php

use Illuminate\Database\Seeder;
use App\Doctor;

class DoctorsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $doctor = new Doctor;
        $doctor->name = "Darren O'Beirne";
        $doctor->address = '51 Auckland Road';
        $doctor->phone = '087656745';
        $doctor->email = 'dobeirne@gmail.com';
        $doctor->start_date = '12/06/2010';
        $doctor->start_date = date('Y-m-d', strtotime($doctor->start_date));
        $doctor->save();

        $doctor = new Doctor;
        $doctor->name = "Dave Mooney";
        $doctor->address = '456 Janice Street';
        $doctor->phone = '083145354';
        $doctor->email = 'dmooney@iadt.ie';
        $doctor->start_date = '31/12/2005';
        $doctor->start_date = date('Y-m-d', strtotime($doctor->start_date));
        $doctor->save();

        $doctor = new Doctor;
        $doctor->name = "Dave Mooney";
        $doctor->address = '456 Janice Street';
        $doctor->phone = '083145354';
        $doctor->email = 'dmooney@iadt.ie';
        $doctor->start_date = '31/12/2005';
        $doctor->start_date = date('Y-m-d', strtotime($doctor->start_date));
        $doctor->save();

        $doctor = new Doctor;
        $doctor->name = "Dave Mooney";
        $doctor->address = '456 Janice Street';
        $doctor->phone = '083145354';
        $doctor->email = 'dmooney@iadt.ie';
        $doctor->start_date = '31/12/2005';
        $doctor->start_date = date('Y-m-d', strtotime($doctor->start_date));
        $doctor->save();
    }
}
