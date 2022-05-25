<?php

namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{
    public function run()
    {
        $permissions = [
            [
                'id'    => 1,
                'title' => 'user_management_access',
            ],
            [
                'id'    => 2,
                'title' => 'permission_create',
            ],
            [
                'id'    => 3,
                'title' => 'permission_edit',
            ],
            [
                'id'    => 4,
                'title' => 'permission_show',
            ],
            [
                'id'    => 5,
                'title' => 'permission_delete',
            ],
            [
                'id'    => 6,
                'title' => 'permission_access',
            ],
            [
                'id'    => 7,
                'title' => 'role_create',
            ],
            [
                'id'    => 8,
                'title' => 'role_edit',
            ],
            [
                'id'    => 9,
                'title' => 'role_show',
            ],
            [
                'id'    => 10,
                'title' => 'role_delete',
            ],
            [
                'id'    => 11,
                'title' => 'role_access',
            ],
            [
                'id'    => 12,
                'title' => 'user_create',
            ],
            [
                'id'    => 13,
                'title' => 'user_edit',
            ],
            [
                'id'    => 14,
                'title' => 'user_show',
            ],
            [
                'id'    => 15,
                'title' => 'user_delete',
            ],
            [
                'id'    => 16,
                'title' => 'user_access',
            ],
            [
                'id'    => 17,
                'title' => 'audit_log_show',
            ],
            [
                'id'    => 18,
                'title' => 'audit_log_access',
            ],
            [
                'id'    => 19,
                'title' => 'setting_create',
            ],
            [
                'id'    => 20,
                'title' => 'setting_edit',
            ],
            [
                'id'    => 21,
                'title' => 'setting_show',
            ],
            [
                'id'    => 22,
                'title' => 'setting_delete',
            ],
            [
                'id'    => 23,
                'title' => 'setting_access',
            ],
            [
                'id'    => 24,
                'title' => 'dealer_management_access',
            ],
            [
                'id'    => 25,
                'title' => 'trainer_management_access',
            ],
            [
                'id'    => 26,
                'title' => 'student_create',
            ],
            [
                'id'    => 27,
                'title' => 'student_edit',
            ],
            [
                'id'    => 28,
                'title' => 'student_show',
            ],
            [
                'id'    => 29,
                'title' => 'student_delete',
            ],
            [
                'id'    => 30,
                'title' => 'student_access',
            ],
            [
                'id'    => 31,
                'title' => 'mlm_level_access',
            ],
            [
                'id'    => 32,
                'title' => 'registration_access',
            ],
            [
                'id'    => 33,
                'title' => 'check_in_access',
            ],
            [
                'id'    => 34,
                'title' => 'dealer_student_access',
            ],
            [
                'id'    => 35,
                'title' => 'agent_plan_create',
            ],
            [
                'id'    => 36,
                'title' => 'agent_plan_edit',
            ],
            [
                'id'    => 37,
                'title' => 'agent_plan_show',
            ],
            [
                'id'    => 38,
                'title' => 'agent_plan_delete',
            ],
            [
                'id'    => 39,
                'title' => 'agent_plan_access',
            ],
            [
                'id'    => 40,
                'title' => 'commission_create',
            ],
            [
                'id'    => 41,
                'title' => 'commission_edit',
            ],
            [
                'id'    => 42,
                'title' => 'commission_show',
            ],
            [
                'id'    => 43,
                'title' => 'commission_delete',
            ],
            [
                'id'    => 44,
                'title' => 'commission_access',
            ],
            [
                'id'    => 45,
                'title' => 'packages_commission_access',
            ],
            [
                'id'    => 46,
                'title' => 'profile_password_edit',
            ],
        ];

        Permission::insert($permissions);
    }
}
