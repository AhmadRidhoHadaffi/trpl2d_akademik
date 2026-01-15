<?php
session_start();
require 'koneksi.php';

if (!isset($_SESSION['login']) || !isset($_SESSION['email'])) {
    header("Location: login.php");
    exit;
}

if (isset($_POST['update_profil'])) {

    $email = $_SESSION['email'];
    $nama  = trim($_POST['nama_lengkap']);
    $pass  = $_POST['password'];

    if ($nama === '') {
        die("Nama tidak boleh kosong");
    }

    // Jika password diisi → update
    if ($pass !== '') {
        $pass_md5 = md5($pass);

        $q = $koneksi->query("
            UPDATE pengguna 
            SET nama_lengkap='$nama', password='$pass_md5'
            WHERE email='$email'
        ");
    } else {
        // Jika password kosong → hanya update nama
        $q = $koneksi->query("
            UPDATE pengguna 
            SET nama_lengkap='$nama'
            WHERE email='$email'
        ");
    }

    if ($q) {
        header("Location: login.php?page=prodi");
        exit;
    } else {
        echo "Gagal update prodi";
    }

    
}
