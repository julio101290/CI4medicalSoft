<?php

return [
    'global' => [
        'save' => 'Simpan',
        'close' => 'Tutup',
        'action' => 'Aksi',
        'logout' => 'Keluar',
        'search' => 'Cari',
        'sweet' => [
            'title' => 'Apakah Anda yakin?',
            'text' => 'Tindakan ini tidak dapat dibatalkan!',
            'confirm_delete' => 'Ya, hapus!',
        ],
    ],
    /**
     * Permission.
     */
    'permission' => [
        'add' => 'Tambah izin',
        'edit' => 'Edit izin',
        'title' => 'Manajemen izin',
        'subtitle' => 'Daftar izin',
        'fields' => [
            'name' => 'Izin',
            'description' => 'Deskripsi',
            'plc_name' => 'Nama izin',
            'plc_description' => 'Deskripsi izin',
        ],
        'msg' => [
            'msg_insert' => 'Izin berhasil ditambahkan.',
            'msg_update' => 'Izin dengan id {0} berhasil diperbarui.',
            'msg_delete' => 'Izin dengan id {0} berhasil dihapus.',
            'msg_get' => 'Izin dengan id {0} berhasil diambil.',
            'msg_get_fail' => 'Izin dengan id {0} tidak ditemukan atau sudah dihapus.',
        ],
    ],
    /**
     * Role.
     */
    'role' => [
        'add' => 'Tambah peran',
        'edit' => 'Edit peran',
        'title' => 'Manajemen peran',
        'subtitle' => 'Daftar peran',
        'fields' => [
            'name' => 'Peran',
            'description' => 'Deskripsi',
            'plc_name' => 'Nama peran',
            'plc_description' => 'Deskripsi peran',
        ],
        'msg' => [
            'msg_insert' => 'Peran berhasil ditambahkan.',
            'msg_update' => 'Peran dengan id {0} berhasil diperbarui.',
            'msg_delete' => 'Peran dengan id {0} berhasil dihapus.',
            'msg_get' => 'Peran dengan id {0} berhasil diambil.',
            'msg_get_fail' => 'Peran dengan id {0} tidak ditemukan atau sudah dihapus.',
        ],
    ],
    /**
     * Menu.
     */
    'menu' => [
        'expand' => 'Perluas',
        'collapse' => 'Perkecil',
        'refresh' => 'Segarkan',
        'add' => 'Tambah menu',
        'edit' => 'Edit menu',
        'title' => 'Manajemen menu',
        'subtitle' => 'Daftar menu',
        'fields' => [
            'parent' => 'Induk',
            'warning_parent' => 'Peringatan! Menu hanya mendukung kedalaman maksimum 2.',
            'active' => 'Aktif',
            'non_active' => 'Tidak aktif',
            'icon' => 'Ikon',
            'info_icon' => 'Untuk ikon lainnya, silakan lihat',
            'place_icon' => 'Ikon Font Awesome.',
            'name' => 'Judul',
            'place_title' => 'Nama menu.',
            'route' => 'Rute',
            'place_route' => 'Rute tautan menu.',
        ],
        'msg' => [
            'msg_insert' => 'Menu berhasil ditambahkan.',
            'msg_update' => 'Menu berhasil diperbarui.',
            'msg_delete' => 'Menu berhasil dihapus.',
            'msg_get' => 'Menu berhasil diambil.',
            'msg_get_fail' => 'Menu tidak ditemukan atau sudah dihapus.',
            'msg_fail_order' => 'Gagal mengurutkan menu.',
        ],
    ],
    /**
     * User.
     */
    'user' => [
        'add' => 'Tambah pengguna',
        'edit' => 'Edit pengguna',
        'title' => 'Manajemen pengguna',
        'subtitle' => 'Daftar pengguna',
        'lastname' => 'Nama belakang',
        'firstname' => 'Nama depan',
        'fields' => [
            'active' => 'Aktif',
            'profile' => 'Profil',
            'join' => 'Anggota sejak',
            'setting' => 'Pengaturan',
            'non_active' => 'Tidak aktif',
        ],
        'msg' => [
            'msg_insert' => 'Pengguna berhasil ditambahkan.',
            'msg_update' => 'Pengguna berhasil diperbarui.',
            'msg_delete' => 'Pengguna berhasil dihapus.',
            'msg_get' => 'Pengguna berhasil diambil.',
            'msg_get_fail' => 'Pengguna tidak ditemukan atau sudah dihapus.',
        ],
    ],
    /**
     * Auth
     */
    'Auth' => [
        'showPassword' => 'Tampilkan kata sandi',
    ],
];
