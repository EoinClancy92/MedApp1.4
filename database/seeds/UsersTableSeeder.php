<?php
# @Date:   2019-10-29T13:44:50+00:00
# @Last modified time: 2019-12-05T19:09:18+00:00




use Illuminate\Database\Seeder;
use App\User;
use App\Role;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role_admin = Role::where('name', 'admin')->first();
        $role_doctor = Role::where('name', 'doctor')->first();
        $role_patient = Role::where('name', 'patient')->first();

        $admin = new User();
        $admin->name = 'Mo Che';
        $admin->email = 'admin@MedApp.ie';
        $admin->mobile_number = '0872466725';
        $admin->address = '20 Mo Street, Mossville, Mo';
        $admin->password = bcrypt('secret');
        $admin->save();
        $admin->roles()->attach($role_admin);


        $patient = new User();
        $patient->name = 'John Jones';
        $patient->email = 'Johnj@MedApp.ie';
        $patient->mobile_number = '0128883077';
        $patient->address = 'Jimmy Jims House, Jims Town, Dublin';
        $patient->password = bcrypt('secret');
        $patient->save();
        $patient->roles()->attach($role_patient);

        $doctor = new User();
        $doctor->name = 'Doc Hudson';
        $doctor->email = 'DocH@MedApp.ie';
        $doctor->mobile_number = '0842466441';
        $doctor->address = '101 Radiator Springs, Dallas, Texas';
        $doctor->password = bcrypt('secret');
        $doctor->save();
        $doctor->roles()->attach($role_doctor);

        $patient = new User();
        $patient->name = 'Frank Reynolds';
        $patient->email = 'BigFrank@MedApp.ie';
        $patient->mobile_number = '6969696969';
        $patient->address = 'Paddys Pub, Downtown, Philadelphia';
        $patient->password = bcrypt('secret');
        $patient->save();
        $patient->roles()->attach($role_patient);



    }
}
