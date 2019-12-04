<?php
# @Date:   2019-10-29T13:44:50+00:00
# @Last modified time: 2019-11-08T18:53:38+00:00




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
        $role_user = Role::where('name', 'user')->first();
        $role_doctor = Role::where('name', 'doctor')->first();
        $role_patient = Role::where('name', 'patient')->first();

        $admin = new User();
        $admin->name = 'Mo Che';
        $admin->email = 'admin@MedApp.ie';
        $admin->password = bcrypt('secret');
        $admin->save();
        $admin->roles()->attach($role_admin);


        $user = new User();
        $user->name = 'John Jones';
        $user->email = 'Johnj@MedApp.ie';
        $user->password = bcrypt('secret');
        $user->save();
        $user->roles()->attach($role_user);

        $doctor = new User();
        $doctor->name = 'Doc Hudson';
        $doctor->email = 'DocH@MedApp.ie';
        $doctor->password = bcrypt('secret');
        $doctor->save();
        $doctor->roles()->attach($role_doctor);

        $patient = new User();
        $patient->name = 'Frank Reynolds';
        $patient->email = 'BigFrank@MedApp.ie';
        $patient->password = bcrypt('secret');
        $patient->save();
        $patient->roles()->attach($role_patient);



    }
}
