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
                'title' => 'product_management_access',
            ],
            [
                'id'    => 20,
                'title' => 'product_category_create',
            ],
            [
                'id'    => 21,
                'title' => 'product_category_edit',
            ],
            [
                'id'    => 22,
                'title' => 'product_category_show',
            ],
            [
                'id'    => 23,
                'title' => 'product_category_delete',
            ],
            [
                'id'    => 24,
                'title' => 'product_category_access',
            ],
            [
                'id'    => 25,
                'title' => 'product_tag_create',
            ],
            [
                'id'    => 26,
                'title' => 'product_tag_edit',
            ],
            [
                'id'    => 27,
                'title' => 'product_tag_show',
            ],
            [
                'id'    => 28,
                'title' => 'product_tag_delete',
            ],
            [
                'id'    => 29,
                'title' => 'product_tag_access',
            ],
            [
                'id'    => 30,
                'title' => 'product_create',
            ],
            [
                'id'    => 31,
                'title' => 'product_edit',
            ],
            [
                'id'    => 32,
                'title' => 'product_show',
            ],
            [
                'id'    => 33,
                'title' => 'product_delete',
            ],
            [
                'id'    => 34,
                'title' => 'product_access',
            ],
            [
                'id'    => 35,
                'title' => 'setting_create',
            ],
            [
                'id'    => 36,
                'title' => 'setting_edit',
            ],
            [
                'id'    => 37,
                'title' => 'setting_show',
            ],
            [
                'id'    => 38,
                'title' => 'setting_delete',
            ],
            [
                'id'    => 39,
                'title' => 'setting_access',
            ],
            [
                'id'    => 40,
                'title' => 'dealer_management_access',
            ],
            [
                'id'    => 41,
                'title' => 'trainer_management_access',
            ],
            [
                'id'    => 42,
                'title' => 'student_create',
            ],
            [
                'id'    => 43,
                'title' => 'student_edit',
            ],
            [
                'id'    => 44,
                'title' => 'student_show',
            ],
            [
                'id'    => 45,
                'title' => 'student_delete',
            ],
            [
                'id'    => 46,
                'title' => 'student_access',
            ],
            [
                'id'    => 47,
                'title' => 'mlm_package_create',
            ],
            [
                'id'    => 48,
                'title' => 'mlm_package_edit',
            ],
            [
                'id'    => 49,
                'title' => 'mlm_package_show',
            ],
            [
                'id'    => 50,
                'title' => 'mlm_package_delete',
            ],
            [
                'id'    => 51,
                'title' => 'mlm_package_access',
            ],
            [
                'id'    => 52,
                'title' => 'mlm_level_create',
            ],
            [
                'id'    => 53,
                'title' => 'mlm_level_edit',
            ],
            [
                'id'    => 54,
                'title' => 'mlm_level_show',
            ],
            [
                'id'    => 55,
                'title' => 'mlm_level_delete',
            ],
            [
                'id'    => 56,
                'title' => 'mlm_level_access',
            ],
            [
                'id'    => 57,
                'title' => 'profile_password_edit',
            ],
        ];

        Permission::insert($permissions);
    }
}
