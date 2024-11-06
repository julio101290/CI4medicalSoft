<?php

return [
    'global' => [
        'save' => 'speichern',
        'close' => 'schließen',
        'action' => 'Aktion',
        'logout' => 'ausloggen',
        'sweet' => [
            'title' => 'Bist du sicher?',
            'text' => 'Du kannst dies rückgängig machen!',
            'confirm_delete' => 'Ja, lösche es!',
        ],
    ],
    'permission' => [
        'add' => 'Berechtigung hinzufügen',
        'edit' => 'Berechtigung bearbeiten',
        'title' => 'Berechtigungsverwaltung',
        'subtitle' => 'Liste der Berechtigungen',
        'fields' => [
            'name' => 'Berechtigung',
            'description' => 'Beschreibung',
            'plc_name' => 'Berechtigungsname',
            'plc_description' => 'Beschreibung für die Berechtigung',
        ],
        'msg' => [
            'msg_insert' => 'Die Berechtigung wurde erfolgreich hinzugefügt.',
            'msg_update' => 'Die Berechtigung mit der ID {0} wurde erfolgreich geändert.',
            'msg_delete' => 'Die Berechtigung mit der ID {0} wurde erfolgreich gelöscht.',
            'msg_get' => 'Die Berechtigung mit der ID {0} wurde erfolgreich abgerufen.',
            'msg_get_fail' => 'Die Berechtigung mit der ID {0} wurde nicht gefunden oder wurde gelöscht.',
        ],
    ],
    /**
     * Role.
     */
    'role' => [
        'add' => 'Rolle hinzufügen', // Agregar rol -> Rolle hinzufügen
        'edit' => 'Rolle bearbeiten', // Editar rol -> Rolle bearbeiten
        'title' => 'Rollen verwalten', // Administrar Roles -> Rollen verwalten
        'subtitle' => 'Liste der Rollen', // Lista de Roles -> Liste der Rollen (más directo en alemán)
        'fields' => [
            'name' => 'Rolle', // Rol -> Rolle
            'description' => 'Beschreibung', // DEscripcion -> Descripción (corrección ortográfica)
            'plc_name' => 'Rollenname', // Nombre del Rol -> Rollenname
            'plc_description' => 'Beschreibung für die Rolle', // Descripción para el rol -> Beschreibung für die Rolle
        ],
        'msg' => [
            'msg_insert' => 'Die Rolle wurde erfolgreich hinzugefügt.', // El rol ha sido agregado correctamente. -> Die Rolle wurde erfolgreich hinzugefügt.
            'msg_update' => 'Die Rolle mit der ID {0} wurde erfolgreich aktualisiert.', // El rol con id {0} ha sido actualizado correctamente. -> Die Rolle mit der ID {0} wurde erfolgreich aktualisiert.
            'msg_delete' => 'Die Rolle mit der ID {0} wurde erfolgreich gelöscht.', // El rol con id {0} ha sido eliminado correctamente. -> Die Rolle mit der ID {0} wurde erfolgreich gelöscht.
            'msg_get' => 'Die Rolle mit der ID {0} wurde erfolgreich abgerufen.', // El rol con id {0} ha sido obtenido satisfactoriamente. -> Die Rolle mit der ID {0} wurde erfolgreich abgerufen.
            'msg_get_fail' => 'Die Rolle mit der ID {0} wurde nicht gefunden oder wurde gelöscht.', // El rol con id {0} no se encontro o fue eliminado. -> Die Rolle mit der ID {0} wurde nicht gefunden oder wurde gelöscht.
        ],
    ],
    /**
     * Menu.
     */
    'menu' => [
        'expand' => 'Erweitern',
        'collapse' => 'Reduzieren',
        'refresh' => 'Aktualisieren',
        'add' => 'Menü hinzufügen',
        'edit' => 'Menü bearbeiten',
        'title' => 'Menü verwalten',
        'subtitle' => 'Menüübersicht',
        'fields' => [
            'parent' => 'Oberpunkt',
            'warning_parent' => 'Hinweis! Das Menü erlaubt nur 2 Ebenen',
            'active' => 'Aktiv',
            'non_active' => 'Inaktiv',
            'icon' => 'Icon',
            'info_icon' => 'Für weitere Icons bitte hier schauen',
            'place_icon' => 'Icons für Fontawesome.',
            'name' => 'Titel',
            'place_title' => 'Name für das Menü.',
            'route' => 'Route',
            'place_route' => 'Route für den Menülink.',
        ],
        'msg' => [
            'msg_insert' => 'Das Menü wurde erfolgreich hinzugefügt.',
            'msg_update' => 'Das Menü wurde erfolgreich aktualisiert.',
            'msg_delete' => 'Das Menü wurde erfolgreich gelöscht.',
            'msg_get' => 'Das Menü wurde erfolgreich abgerufen.',
            'msg_get_fail' => 'Das Menü existiert nicht oder wurde gelöscht.',
            'msg_fail_order' => 'Beim Sortieren des Menüs ist ein Fehler aufgetreten.',
        ],
    ],
    /**
     * user.
     */
    'user' => [
        'add' => 'Benutzer hinzufügen',
        'edit' => 'Benutzer bearbeiten',
        'title' => 'Benutzer verwalten',
        'subtitle' => 'Benutzerliste',
        'fields' => [
            'active' => 'Aktiv',
            'profile' => 'Profil',
            'join' => 'Mitglied seit',
            'setting' => 'Einstellungen',
            'non_active' => 'Inaktiv',
        ],
        'msg' => [
            'msg_insert' => 'Der Benutzer wurde erfolgreich hinzugefügt.',
            'msg_update' => 'Der Benutzer wurde erfolgreich aktualisiert.',
            'msg_delete' => 'Der Benutzer wurde erfolgreich gelöscht.',
            'msg_get' => 'Der Benutzer wurde erfolgreich abgerufen.',
            'msg_get_fail' => 'Der Benutzer existiert nicht oder wurde gelöscht.',
        ],
    ],
];
