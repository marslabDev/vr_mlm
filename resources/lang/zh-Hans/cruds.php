<?php

return [
    'userManagement' => [
        'title'          => '用户管理',
        'title_singular' => '用户管理',
    ],
    'permission' => [
        'title'          => '权限',
        'title_singular' => '权限',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => ' ',
            'title'             => 'Title',
            'title_helper'      => ' ',
            'created_at'        => 'Created at',
            'created_at_helper' => ' ',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'Deleted at',
            'deleted_at_helper' => ' ',
        ],
    ],
    'role' => [
        'title'          => '角色',
        'title_singular' => '角色',
        'fields'         => [
            'id'                 => 'ID',
            'id_helper'          => ' ',
            'title'              => 'Title',
            'title_helper'       => ' ',
            'permissions'        => 'Permissions',
            'permissions_helper' => ' ',
            'created_at'         => 'Created at',
            'created_at_helper'  => ' ',
            'updated_at'         => 'Updated at',
            'updated_at_helper'  => ' ',
            'deleted_at'         => 'Deleted at',
            'deleted_at_helper'  => ' ',
        ],
    ],
    'user' => [
        'title'          => '用户',
        'title_singular' => '用户',
        'fields'         => [
            'id'                       => 'ID',
            'id_helper'                => ' ',
            'name'                     => 'Name',
            'name_helper'              => ' ',
            'email'                    => 'Email',
            'email_helper'             => ' ',
            'email_verified_at'        => 'Email verified at',
            'email_verified_at_helper' => ' ',
            'password'                 => 'Password',
            'password_helper'          => ' ',
            'roles'                    => 'Roles',
            'roles_helper'             => ' ',
            'remember_token'           => 'Remember Token',
            'remember_token_helper'    => ' ',
            'created_at'               => 'Created at',
            'created_at_helper'        => ' ',
            'updated_at'               => 'Updated at',
            'updated_at_helper'        => ' ',
            'deleted_at'               => 'Deleted at',
            'deleted_at_helper'        => ' ',
        ],
    ],
    'auditLog' => [
        'title'          => 'Audit Logs',
        'title_singular' => 'Audit Log',
        'fields'         => [
            'id'                  => 'ID',
            'id_helper'           => ' ',
            'description'         => 'Description',
            'description_helper'  => ' ',
            'subject_id'          => 'Subject ID',
            'subject_id_helper'   => ' ',
            'subject_type'        => 'Subject Type',
            'subject_type_helper' => ' ',
            'user_id'             => 'User ID',
            'user_id_helper'      => ' ',
            'properties'          => 'Properties',
            'properties_helper'   => ' ',
            'host'                => 'Host',
            'host_helper'         => ' ',
            'created_at'          => 'Created at',
            'created_at_helper'   => ' ',
            'updated_at'          => 'Updated at',
            'updated_at_helper'   => ' ',
        ],
    ],
    'setting' => [
        'title'          => 'Settings',
        'title_singular' => 'Setting',
    ],
    'dealerManagement' => [
        'title'          => 'Dealer Management',
        'title_singular' => 'Dealer Management',
    ],
    'trainerManagement' => [
        'title'          => 'Trainer Management',
        'title_singular' => 'Trainer Management',
    ],
    'student' => [
        'title'          => 'Students',
        'title_singular' => 'Student',
    ],
    'mlmLevel' => [
        'title'          => 'Mlm Level',
        'title_singular' => 'Mlm Level',
        'fields'         => [
            'id'                    => 'ID',
            'id_helper'             => ' ',
            'user'                  => 'User',
            'user_helper'           => ' ',
            'current_plan'          => 'Current Plan',
            'current_plan_helper'   => ' ',
            'up_line'               => 'Up Line',
            'up_line_helper'        => ' ',
            'position'              => 'Position',
            'position_helper'       => ' ',
            'path'                  => 'Path',
            'path_helper'           => ' ',
            'level'                 => 'Level',
            'level_helper'          => ' ',
            'children_count'        => 'Children Count',
            'children_count_helper' => ' ',
            'created_at'            => 'Created at',
            'created_at_helper'     => ' ',
            'updated_at'            => 'Updated at',
            'updated_at_helper'     => ' ',
            'deleted_at'            => 'Deleted at',
            'deleted_at_helper'     => ' ',
        ],
    ],
    'registration' => [
        'title'          => 'Registration',
        'title_singular' => 'Registration',
    ],
    'checkIn' => [
        'title'          => 'Check In',
        'title_singular' => 'Check In',
    ],
    'dealerStudent' => [
        'title'          => 'Dealer Student',
        'title_singular' => 'Dealer Student',
        'fields'         => [
            'id'                         => 'ID',
            'id_helper'                  => ' ',
            'tuition_package_efk'        => 'Tuition Package',
            'tuition_package_efk_helper' => ' ',
            'student_efk'                => 'Student',
            'student_efk_helper'         => ' ',
            'referral_efk'               => 'Referral',
            'referral_efk_helper'        => ' ',
            'created_at'                 => 'Created at',
            'created_at_helper'          => ' ',
            'updated_at'                 => 'Updated at',
            'updated_at_helper'          => ' ',
            'deleted_at'                 => 'Deleted at',
            'deleted_at_helper'          => ' ',
        ],
    ],
    'agentPlan' => [
        'title'          => 'Agent Plan',
        'title_singular' => 'Agent Plan',
        'fields'         => [
            'id'                          => 'ID',
            'id_helper'                   => ' ',
            'name'                        => 'Name',
            'name_helper'                 => ' ',
            'price'                       => 'Price',
            'price_helper'                => 'RM 1000.00',
            'description'                 => 'Description',
            'description_helper'          => ' ',
            'roles'                       => 'Roles',
            'roles_helper'                => ' ',
            'commissionable_level'        => 'Commissionable Level',
            'commissionable_level_helper' => ' ',
            'created_at'                  => 'Created at',
            'created_at_helper'           => ' ',
            'updated_at'                  => 'Updated at',
            'updated_at_helper'           => ' ',
            'deleted_at'                  => 'Deleted at',
            'deleted_at_helper'           => ' ',
        ],
    ],
    'commission' => [
        'title'          => 'Commission',
        'title_singular' => 'Commission',
        'fields'         => [
            'id'                         => 'ID',
            'id_helper'                  => ' ',
            'tuition_package_efk'        => 'Tuition Package Efk',
            'tuition_package_efk_helper' => ' ',
            'agent_plan'                 => 'Agent Plan',
            'agent_plan_helper'          => ' ',
            'created_at'                 => 'Created at',
            'created_at_helper'          => ' ',
            'updated_at'                 => 'Updated at',
            'updated_at_helper'          => ' ',
            'deleted_at'                 => 'Deleted at',
            'deleted_at_helper'          => ' ',
            'commission'                 => 'Commission',
            'commission_helper'          => ' ',
        ],
    ],
    'eachLevelCommission' => [
        'title'          => 'Each Level Commission',
        'title_singular' => 'Each Level Commission',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => ' ',
            'commission'        => 'Commission',
            'commission_helper' => ' ',
            'created_at'        => 'Created at',
            'created_at_helper' => ' ',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'Deleted at',
            'deleted_at_helper' => ' ',
            'level'             => 'Level',
            'level_helper'      => ' ',
        ],
    ],
];
