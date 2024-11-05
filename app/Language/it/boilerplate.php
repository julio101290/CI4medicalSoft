 <?php

return [
    'global' => [
        'save'     => 'Salva',
        'close'    => 'Chiudi',
        'action'   => 'Azione',
        'logout'   => 'Esci',
        'sweet' => [
            'title'          => 'Sei sicuro?',
            'text'           => "Se non sei sicuro, puoi annullare!",
            'confirm_delete' => 'Sì, eliminalo!',
        ],
    ],

    'permission' => [
        'add'          => 'Aggiungi permesso',
        'edit'         => 'Modifica permesso',
        'title'        => 'Gestione dei Permessi',
        'subtitle'     => 'Elenco dei Permessi',
        'fields' => [
            'name'           => 'Permesso',
            'description'    => 'Descrizione',
            'plc_name'        => 'Nome del Permesso',
            'plc_description' => 'Descrizione del Permesso',
        ],
        'msg' => [
            'msg_insert'  => 'Il permesso è stato aggiunto con successo.',
            'msg_update'  => 'Il permesso con ID {0} è stato modificato con successo.',
            'msg_delete'  => 'Il permesso con ID {0} è stato eliminato con successo.',
            'msg_get'     => 'Il permesso con ID {0} è stato recuperato con successo.',
            'msg_get_fail' => 'Il permesso con ID {0} non è stato trovato o è stato eliminato.',
        ],
    ],

    'role' => [
        'add'          => 'Aggiungi ruolo',
        'edit'         => 'Modifica ruolo',
        'title'        => 'Gestione dei Ruoli',
        'subtitle'     => 'Elenco dei Ruoli',
        'fields' => [
            'name'           => 'Ruolo',
            'description'    => 'Descrizione',
            'plc_name'        => 'Nome del Ruolo',
            'plc_description' => 'Descrizione del Ruolo',
        ],
        'msg' => [
            'msg_insert'  => 'Il ruolo è stato aggiunto con successo.',
            'msg_update'  => 'Il ruolo con ID {0} è stato modificato con successo.',
            'msg_delete'  => 'Il ruolo con ID {0} è stato eliminato con successo.',
            'msg_get'     => 'Il ruolo con ID {0} è stato recuperato con successo.',
            'msg_get_fail' => 'Il ruolo con ID {0} non è stato trovato o è stato eliminato.',
        ],
    ],

    'menu' => [
        'expand'       => 'Espandi',
        'collapse'     => 'Comprimi',
        'refresh'      => 'Aggiorna',
        'add'          => 'Aggiungi menu',
        'edit'         => 'Modifica menu',
        'title'        => 'Gestione del Menu',
        'subtitle'     => 'Elenco dei Menu',
        'fields' => [
            'parent'         => 'Padre',
            'warning_parent' => 'Attenzione! Il menu supporta solo 2 livelli',
            'active'         => 'Attivo',
            'non_active'     => 'Non Attivo',
            'icon'           => 'Icona',
            'info_icon'      => 'Per più icone, si prega di consultare',
            'place_icon'     => 'Icone per Fontawesome.',
            'name'           => 'Titolo',
            'place_title'    => 'Nome per il menu.',
            'route'          => 'Rotta',
            'place_route'    => 'Rotta per il link del menu.',
        ],
        'msg' => [
            'msg_insert'  => 'Il menu è stato aggiunto con successo.',
            'msg_update'  => 'Il menu è stato modificato con successo.',
            'msg_delete'  => 'Il menu è stato eliminato con successo.',
            'msg_get'     => 'Il menu è stato recuperato con successo.',
            'msg_get_fail' => 'Il menu non esiste o è stato eliminato.',
            'msg_fail_order' => 'Si è verificato un errore durante l\'ordinamento del menu.',
        ],
    ],

    'user' => [
        'add'          => 'Aggiungi utente',
        'edit'         => 'Modifica utente',
        'title'        => 'Gestione degli Utenti',
        'subtitle'     => 'Elenco degli Utenti',
        'fields' => [
            'active'         => 'Attivo',
            'profile'        => 'Profilo',
            'join'           => 'Iscritto dal',
            'setting'        => 'Impostazioni',
            'non_active'     => 'Non Attivi',
        ],
        'msg' => [
            'msg_insert'  => 'L\'utente è stato aggiunto con successo.',
            'msg_update'  => 'L\'utente è stato modificato con successo.',
            'msg_delete'  => 'L\'utente è stato eliminato con successo.',
            'msg_get'     => 'L\'utente è stato recuperato con successo.',
            'msg_get_fail' => 'L\'utente non esiste o è stato eliminato.',
        ],
    ],
];