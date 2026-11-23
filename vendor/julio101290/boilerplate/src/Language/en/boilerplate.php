<?php

return [
    'global' => [
        'save' => 'Save',
        'close' => 'Close',
        'action' => 'Action',
        'logout' => 'Log out',
        'search' => 'Search',
        'sweet' => [
            'title' => 'Are you sure?',
            'text' => 'You won’t be able to revert this!',
            'confirm_delete' => 'Yes, delete it!',
        ],
    ],
    /**
     * Permission.
     */
    'permission' => [
        'add' => 'Add permission',
        'edit' => 'Edit permission',
        'title' => 'Permission management',
        'subtitle' => 'Permission list',
        'fields' => [
            'name' => 'Permission',
            'description' => 'Description',
            'plc_name' => 'Permission name',
            'plc_description' => 'Permission description',
        ],
        'msg' => [
            'msg_insert' => 'The permission has been added successfully.',
            'msg_update' => 'The permission id {0} has been updated successfully.',
            'msg_delete' => 'The permission id {0} has been deleted successfully.',
            'msg_get' => 'The permission id {0} has been retrieved successfully.',
            'msg_get_fail' => 'The permission id {0} was not found or has already been deleted.',
        ],
    ],
    /**
     * Role.
     */
    'role' => [
        'add' => 'Add role',
        'edit' => 'Edit role',
        'title' => 'Role management',
        'subtitle' => 'Role list',
        'fields' => [
            'name' => 'Role',
            'description' => 'Description',
            'plc_name' => 'Role name',
            'plc_description' => 'Role description',
        ],
        'msg' => [
            'msg_insert' => 'The role has been added successfully.',
            'msg_update' => 'The role id {0} has been updated successfully.',
            'msg_delete' => 'The role id {0} has been deleted successfully.',
            'msg_get' => 'The role id {0} has been retrieved successfully.',
            'msg_get_fail' => 'The role id {0} was not found or has already been deleted.',
        ],
    ],
    /**
     * Menu.
     */
    'menu' => [
        'expand' => 'Expand',
        'collapse' => 'Collapse',
        'refresh' => 'Refresh',
        'add' => 'Add menu',
        'edit' => 'Edit menu',
        'title' => 'Menu management',
        'subtitle' => 'Menu list',
        'fields' => [
            'parent' => 'Parent',
            'warning_parent' => 'Warning! The menu only supports a maximum depth of 2.',
            'active' => 'Active',
            'non_active' => 'Inactive',
            'icon' => 'Icon',
            'info_icon' => 'For more icons, please see',
            'place_icon' => 'Font Awesome icon.',
            'name' => 'Title',
            'place_title' => 'Menu name.',
            'route' => 'Route',
            'place_route' => 'Menu link route.',
        ],
        'msg' => [
            'msg_insert' => 'The menu has been added successfully.',
            'msg_update' => 'The menu has been updated successfully.',
            'msg_delete' => 'The menu has been deleted successfully.',
            'msg_get' => 'The menu has been retrieved successfully.',
            'msg_get_fail' => 'The menu was not found or has already been deleted.',
            'msg_fail_order' => 'The menu failed to reorder.',
        ],
    ],
    /**
     * User.
     */
    'user' => [
        'add' => 'Add user',
        'edit' => 'Edit user',
        'title' => 'User management',
        'subtitle' => 'User list',
        'lastname' => 'Last name',
        'firstname' => 'First name',
        'fields' => [
            'active' => 'Active',
            'profile' => 'Profile',
            'join' => 'Member since',
            'setting' => 'Settings',
            'non_active' => 'Inactive',
        ],
        'msg' => [
            'msg_insert' => 'The user has been added successfully.',
            'msg_update' => 'The user has been updated successfully.',
            'msg_delete' => 'The user has been deleted successfully.',
            'msg_get' => 'The user has been retrieved successfully.',
            'msg_get_fail' => 'The user was not found or has already been deleted.',
        ],
    ],
    /**
     * Auth
     */
    'Auth' => [
        'showPassword' => 'Show password',
    ],
];
