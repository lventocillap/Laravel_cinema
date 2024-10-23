<?php

namespace Database\Seeders;

use App\Enums\ProfileEnum;
use App\Models\Profile;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProfileSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $profileEnum = ProfileEnum::cases();
        foreach($profileEnum as $profile){
            Profile::create([
                'user_id' => $profile->userId(),
                'document_number' => $profile->documentNumber(),
                'cellphone' => $profile->cellphone(),
                'email_verification' => $profile->emailVerification(),
                'name' => $profile->value
            ]);
        }
    }
}
