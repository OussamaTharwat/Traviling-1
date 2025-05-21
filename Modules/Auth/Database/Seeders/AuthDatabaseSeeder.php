<?php

namespace Modules\Auth\Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Modules\Auth\Enums\AuthEnum;
use Modules\Auth\Enums\UserTypeEnum;
use Modules\Auth\Helpers\UserTypeHelper;

class AuthDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $userTypes = UserTypeEnum::availableTypes();
        $emailTypes = UserTypeHelper::nonMobileTypes();
        $phoneCounter = 0;

        foreach ($userTypes as $type) {
            $alphaType = UserTypeEnum::alphaTypes()[$type];
            $handleKey = in_array($type, $emailTypes) ? 'email' : 'phone';
            $handleValue = in_array($type, $emailTypes) ? "$alphaType@admin.com" : "+20112345678$phoneCounter";

            $user = User::create([
                'name' => $alphaType,
                $handleKey => $handleValue,
                'status' => true,
                'email' => in_array($type, $emailTypes) ? $handleValue : "$alphaType@fake.com",
                'phone' => $handleKey === 'phone' ? $handleValue : '+201000000000',
                AuthEnum::VERIFIED_AT => now(),
                'password' =>  Hash::make('password123'),
                'type' => $type,
            ]);

            if ($handleKey == 'phone') {
                $phoneCounter++;
            }

            switch ($type) {
                case UserTypeEnum::TOURIST:
                    // User::factory()->create(['user_id' => $user->id]);
                    break;

                case UserTypeEnum::ADMIN:

                        break;

                default: break;
            }
        }
    }
}
