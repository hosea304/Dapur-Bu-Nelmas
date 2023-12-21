<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class AdministratorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $adminstrator = new User;
        $adminstrator->name = 'Andi';
        $adminstrator->email = 'hosea@student.umn.ac.id';
        $adminstrator->usertype = 'admin';
        $adminstrator->password = bcrypt('hosea@student.umn.ac.id');
        $adminstrator->alamat = "alamat admin";
        $adminstrator->noTelp = "08123456543";
        $adminstrator->save();
        $this->command->info('Data Berhasil di Insert!');

    }
}
