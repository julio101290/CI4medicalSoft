 <?php

return [
    'global' => [
        'save'   => 'Guardar',
        'close'  => 'Cerrar',
        'action' => 'Acción',
        'logout' => 'Salir',
        'sweet'  => [
            'title'          => 'Estas Seguro?',
            'text'           => "Si no lo estas puedes reverir!",
            'confirm_delete' => 'Si, Eliminalo!',
        ],
    ],

    /**
     * Permission.
     */
    'permission' => [
        'add'      => 'Agregar permiso',
        'edit'     => 'Editar permiso',
        'title'    => 'Administración de Permisos',
        'subtitle' => 'Lista de Permisos',
        'fields'   => [
            'name'            => 'Permisos',
            'description'     => 'Descripción',
            'plc_name'        => 'Nombre del Permiso',
            'plc_description' => 'Descripcion para el Permiso',
        ],
        'msg' => [
            'msg_insert'   => 'El permiso se ha agregado correctamente.',
            'msg_update'   => 'El ID de Permiso {0} ha sido modificado correctamente.',
            'msg_delete'   => 'El ID de Permis {0} ha sido eliminado correctamente.',
            'msg_get'      => 'El ID de Permiso {0}ha sido obtenido correctamente.',
            'msg_get_fail' => 'El ID de Permis0 {0} no se encontro o fue eliminado.',
        ],
    ],

    /**
     * Role.
     */
    'role' => [
        'add'      => 'Agregar rol',
        'edit'     => 'Editar rol',
        'title'    => 'Administrar Roles',
        'subtitle' => 'Lista de Roles',
        'fields'   => [
            'name'            => 'Rol',
            'description'     => 'DEscripcion',
            'plc_name'        => 'Nombre del Rol',
            'plc_description' => 'Descripción para el rol',
        ],
        'msg' => [
            'msg_insert'   => 'El rol ha sido agregado correctamente.',
            'msg_update'   => 'El rol con id {0} ha sido actualizado correctamente.',
            'msg_delete'   => 'El rol con id {0} ha sido eliminado correctamente.',
            'msg_get'      => 'El rol con id {0} ha sido obtenido satisfactoriamente.',
            'msg_get_fail' => 'El rol con id {0} no se encontro o fue eliminado.',
        ],
    ],

    /**
     * Menu.
     */
    'menu' => [
        'expand'   => 'Expandir',
        'collapse' => 'Colapsar',
        'refresh'  => 'Refrescar',
        'add'      => 'Agregar menu',
        'edit'     => 'Editar menu',
        'title'    => 'Administrar Menu',
        'subtitle' => 'Lista del Menu',
        'fields'   => [
            'parent'         => 'Padre',
            'warning_parent' => 'Nota! el menú solo permite 2 niveles',
            'active'         => 'Activo',
            'non_active'     => 'No Activo',
            'icon'           => 'Icono',
            'info_icon'      => 'Para mas iconos, por favor ver',
            'place_icon'     => 'Iconos para fontawesome.',
            'name'           => 'Titulo',
            'place_title'    => 'Nombre para el menu.',
            'route'          => 'Ruta',
            'place_route'    => 'Ruta para el enlace del menu.',
        ],
        'msg' => [
            'msg_insert'     => 'El menu ha sido agregado correctamente.',
            'msg_update'     => 'El menu ha sido actualizado correctamente.',
            'msg_delete'     => 'El menu ha sido eliminado correctamente',
            'msg_get'        => 'El menu ha sido obtenido correctamente.',
            'msg_get_fail'   => 'El menu no existe o fue eliminado.',
            'msg_fail_order' => 'El menu fallo al ordenar.',
        ],
    ],

    /**
     * user.
     */
    'user' => [
        'add'      => 'Agregar usuario',
        'edit'     => 'Editar usuario',
        'title'    => 'Administrar Usuarios',
        'subtitle' => 'Lista de Usuarios',
        'fields'   => [
            'active'          => 'Activo',
            'profile'         => 'Perfil',
            'join'            => 'Miembro desde',
            'setting'         => 'Configuracion',
            'non_active'      => 'No Activos',
        ],
        'msg' => [
            'msg_insert'     => 'El usuario ha sido agregado correctamente.',
            'msg_update'     => 'El usuario ha sido actualizado correctamente.',
            'msg_delete'     => 'El usuario ha sido eliminado correctamente',
            'msg_get'        => 'El usuario ha sido obtenido correctamente.',
            'msg_get_fail'   => 'El usuario no existe o fue eliminado.',
        ],
    ],
];
