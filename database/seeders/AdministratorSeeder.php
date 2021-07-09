<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class AdministratorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $administrator = new \App\Models\User;
        $administrator->username = "SuperAdmin";
        $administrator->name = "SuperAdmin";
        $administrator->email = "superadmin@gmail.test";
        $administrator->roles = "SUPERADMIN";
        $administrator->password = \Hash::make("12345678");
        $administrator->nik = "123456789101111111";
        $administrator->save();
        $this->command->info("User Admin berhasil diinsert");
    }
}
