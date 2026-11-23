<?php

return [
    'global' => [
        'save' => 'Guardar',
        'close' => 'Cerrar',
        'action' => 'Acción',
        'logout' => 'Cerrar sesión',
        'search' => 'Buscar',
        'sweet' => [
            'title' => '¿Estás seguro?',
            'text' => '¡No podrás revertir esto!',
            'confirm_delete' => 'Sí, ¡bórralo!',
        ],
    ],
    /**
     * Permission.
     */
    'permission' => [
        'add' => 'Añadir permiso',
        'edit' => 'Editar permiso',
        'title' => 'Gestión de permisos',
        'subtitle' => 'Lista de permisos',
        'fields' => [
            'name' => 'Permiso',
            'description' => 'Descripción',
            'plc_name' => 'Nombre del permiso',
            'plc_description' => 'Descripción del permiso',
        ],
        'msg' => [
            'msg_insert' => 'El permiso se ha añadido correctamente.',
            'msg_update' => 'El permiso id {0} se ha modificado correctamente.',
            'msg_delete' => 'El permiso id {0} se ha eliminado correctamente.',
            'msg_get' => 'El permiso id {0} se ha obtenido correctamente.',
            'msg_get_fail' => 'El permiso id {0} no encontrado o ya eliminado.',
        ],
    ],
    /**
     * Role.
     */
    'role' => [
        'add' => 'Añadir rol',
        'edit' => 'Editar rol',
        'title' => 'Gestión de roles',
        'subtitle' => 'Lista de roles',
        'fields' => [
            'name' => 'Rol',
            'description' => 'Descripción',
            'plc_name' => 'Nombre del rol',
            'plc_description' => 'Descripción del rol',
        ],
        'msg' => [
            'msg_insert' => 'El rol se ha añadido correctamente.',
            'msg_update' => 'El rol id {0} se ha modificado correctamente.',
            'msg_delete' => 'El rol id {0} se ha eliminado correctamente.',
            'msg_get' => 'El rol id {0} se ha obtenido correctamente.',
            'msg_get_fail' => 'El rol id {0} no encontrado o ya eliminado.',
        ],
    ],
    /**
     * Menu.
     */
    'menu' => [
        'expand' => 'Expandir',
        'collapse' => 'Contraer',
        'refresh' => 'Actualizar',
        'add' => 'Añadir menú',
        'edit' => 'Editar menú',
        'title' => 'Gestión de menús',
        'subtitle' => 'Lista de menús',
        'fields' => [
            'parent' => 'Padre',
            'warning_parent' => '¡Atención! El menú solo admite una profundidad máxima de 2.',
            'active' => 'Activo',
            'non_active' => 'No activo',
            'icon' => 'Icono',
            'info_icon' => 'Para más iconos, por favor vea',
            'place_icon' => 'Icono de fontawesome.',
            'name' => 'Título',
            'place_title' => 'Nombre del menú.',
            'route' => 'Ruta',
            'place_route' => 'Ruta para el enlace del menú.',
        ],
        'msg' => [
            'msg_insert' => 'El menú se ha añadido correctamente.',
            'msg_update' => 'El menú se ha modificado correctamente.',
            'msg_delete' => 'El menú se ha eliminado correctamente.',
            'msg_get' => 'El menú se ha obtenido correctamente.',
            'msg_get_fail' => 'El menú no encontrado o ya eliminado.',
            'msg_fail_order' => 'El menú falló al reordenar.',
        ],
    ],
    /**
     * user.
     */
    'user' => [
        'add' => 'Añadir usuario',
        'edit' => 'Editar usuario',
        'title' => 'Gestión de usuarios',
        'subtitle' => 'Lista de usuarios',
        'lastname' => 'Apellido',
        'firstname' => 'Nombre',
        'fields' => [
            'active' => 'Activo',
            'profile' => 'Perfil',
            'join' => 'Miembro desde',
            'setting' => 'Configuración',
            'non_active' => 'No activo',
        ],
        'msg' => [
            'msg_insert' => 'El usuario se ha añadido correctamente.',
            'msg_update' => 'El usuario se ha modificado correctamente.',
            'msg_delete' => 'El usuario se ha eliminado correctamente.',
            'msg_get' => 'El usuario se ha obtenido correctamente.',
            'msg_get_fail' => 'El usuario no encontrado o ya eliminado.',
        ],
    ],
     /**
     * Auth
     */
    'Auth' => [
        'showPassword' => 'Ver Contraseña',
        ]
];