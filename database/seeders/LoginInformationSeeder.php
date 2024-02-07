<?php

namespace Database\Seeders;

use App\Models\LoginInformation;
use App\Models\User;
use Illuminate\Database\Seeder;

class LoginInformationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $userIds = User::pluck('id')->toArray();

        for ($i = 0; $i < 200; $i++) {
            $userId = $userIds[array_rand($userIds)];

            LoginInformation::factory()->create(['user_id' => $userId]);
        }
    }
}
