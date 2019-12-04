<?php
# @Date:   2019-10-29T13:48:53+00:00
# @Last modified time: 2019-11-08T18:42:23+00:00




use Illuminate\Database\Seeder;
use App\Role;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role_admin = new Role();
        $role_admin->name = 'admin';
        $role_admin->description = 'An administrator user';
        $role_admin->save();

        $role_user = new Role();
        $role_user->name = 'user';
        $role_user->description = 'An ordinary user';
        $role_user->save();

        $role_doctor = new Role();
        $role_doctor->name = 'doctor';
        $role_doctor->description = 'A Doctor user';
        $role_doctor->save();

        $role_patient = new Role();
        $role_patient->name = 'patient';
        $role_patient->description = 'A sick little puppy';
        $role_patient->save();
    }
}
