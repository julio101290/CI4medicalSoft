 <?php

return [
    'global' => [
        'save'      => 'Konservi',
        'close'     => 'Fermi',
        'action'    => 'Ago',
        'logout'    => 'Ellogiĝi',
        'sweet' => [
            'title'       => 'Ĉu vi estas certa?',
            'text'        => "Se ne, vi povas reveni!",
            'confirm_delete' => 'Jes, forigu!',
        ],
    ],

    'permission' => [
        'add'         => 'Aldoni permeson',
        'edit'        => 'Redakti permeson',
        'title'       => 'Administrado de Permesoj',
        'subtitle'    => 'Listo de Permesoj',
        'fields' => [
            'name'           => 'Permeso',
            'description'    => 'Priskribo',
            'plc_name'       => 'Nomo de la Permeso',
            'plc_description' => 'Priskribo por la Permeso',
        ],
        'msg' => [
            'msg_insert'    => 'La permeso estis aldonita sukcese.',
            'msg_update'    => 'La ID de la Permeso {0} estis modifita sukcese.',
            'msg_delete'    => 'La ID de la Permeso {0} estis forigita sukcese.',
            'msg_get'       => 'La ID de la Permeso {0} estis akirita sukcese.',
            'msg_get_fail'  => 'La ID de la Permeso {0} ne estis trovita aŭ estis forigita.',
        ],
    ],

    // ...resto de las traducciones...
];