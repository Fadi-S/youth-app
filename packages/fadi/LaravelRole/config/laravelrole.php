<?php

return [
    'admin_role_name' => "Admin",

    'default_permissions' => [
        /* Roles */
        [
            'group'  => 'Roles',
            'name'   => 'add_role',
            'label'  => 'Add Role',
        ],
        [
            'group'  => 'Roles',
            'name'   => 'edit_role',
            'label'  => 'Edit Role',
        ],
        [
            'group'  => 'Roles',
            'name'   => 'delete_role',
            'label'  => 'Delete Role',
        ],
        [
            'group'  => 'Roles',
            'name'   => 'view_role',
            'label'  => 'View Roles',
        ],

        /* Users */
        [
            'group'  => 'Users',
            'name'   => 'add_user',
            'label'  => 'Add User',
        ],
        [
            'group'  => 'Users',
            'name'   => 'edit_user',
            'label'  => 'Edit User',
        ],
        [
            'group'  => 'Users',
            'name'   => 'delete_user',
            'label'  => 'Delete User',
        ],
        [
            'group'  => 'Users',
            'name'   => 'view_user',
            'label'  => 'View Users',
        ],
    ]
];