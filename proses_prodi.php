<?php
require 'koneksi.php';

// INSERT
if (isset($_POST['submit'])) {
    $nama = $_POST['nama_prodi'];
    $jenjang = $_POST['jenjang'];
    $ket = $_POST['keterangan'];

    $q = $koneksi->query("
        INSERT INTO prodi (nama_prodi, jenjang, keterangan)
        VALUES ('$nama', '$jenjang', '$ket')
    ");

    if ($q) {
        header("Location: index.php?page=prodi");
        exit;
    } else {
        echo "Gagal menambah prodi";
    }
}

// UPDATE
if (isset($_POST['update'])) {
    $id = $_POST['id'];
    $nama = $_POST['nama_prodi'];
    $jenjang = $_POST['jenjang'];
    $ket = $_POST['keterangan'];

    $q = $koneksi->query("
        UPDATE prodi SET
            nama_prodi='$nama',
            jenjang='$jenjang',
            keterangan='$ket'
        WHERE id='$id'
    ");

    if ($q) {
        header("Location: index.php?page=prodi");
        exit;
    } else {
        echo "Gagal update prodi";
    }
}

// DELETE
if (isset($_GET['delete'])) {
    $id = $_GET['delete'];

    $q = $koneksi->query("DELETE FROM prodi WHERE id='$id'");

    if ($q) {
        header("Location: index.php?page=prodi");
        exit;
    } else {
        echo "Gagal hapus prodi";
    }
}
