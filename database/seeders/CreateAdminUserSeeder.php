<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;

class CreateAdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
            'first_name' => 'Admin',
            'last_name' => 'Back Office',
            'role' => 0,
            'email' => 'admin@gmail.com',
            'phone_number' => '00000000',
            'emergency_phone_number' => '00000000',
            'resident' => 'Back Office',
            'city' => 'Back Office',
            'province' => 'Back Office',
            'postal_code' => 'Back Office',
            'village' => 'Back Office',
            'd_o_b' => 'Back Office',
            'birth_place' => 'Back Office',
            'student' => 'Back Office',
            'license_number' => 'Back Office',
            'released_on' => 'Back Office',
            'release_test_deadline' => 'Back Office',
            'minimum_activity_deadline' => 'Back Office',
            'insurance_company' => 'Back Office',
            'insurance_expiration' => 'Back Office',
            'medical_examination_deadline' => 'Back Office',
            'own_material' => 'Back Office',
            'expiry_date' => 'Back Office',
            'emergency_contact' => 'Back Office',
            'degree_of_contact' => 'Back Office',
            'user_image' => '/images/profile/user.png',
            'password' => Hash::make('12345678'),
        ]);

        $role = Role::create(['name' => 'Admin']);

        $permissions = Permission::pluck('id','id')->all();

        $role->syncPermissions($permissions);

        $user->assignRole([$role->id]);
    }
}
