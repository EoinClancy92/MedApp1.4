<?php
# @Date:   2019-10-29T11:21:03+00:00
# @Last modified time: 2019-10-29T14:09:10+00:00




use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(RolesTableSeeder::class);
        $this->call(UsersTableSeeder::class);
    }
}
