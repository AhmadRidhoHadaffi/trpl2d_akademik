<?php
//include , require
require 'koneksi.php';


// === INSERT ===
if (isset($_POST['submit'])) {

    $nim    = $_POST['nim'];
    $nama   = $_POST['nama_mhs'];
    $lahir  = $_POST['tgl_lahir'];
    $alamat = $_POST['alamat'];
    $nama_prodi = $_POST['nama_prodi'];

    // 1. Cari ID prodi berdasarkan nama
    $cek = $koneksi->query("
        SELECT id FROM prodi WHERE nama_prodi='$nama_prodi'
    ");

    if ($cek->num_rows == 0) {
        die("Prodi tidak ditemukan!");
    }

    $row = $cek->fetch_assoc();
    $prodi_id = $row['id'];

    // 2. Insert mahasiswa + prodi_id
    $query = "
        INSERT INTO mahasiswa
        (nim, nama_mhs, tgl_lahir, alamat, prodi_id)
        VALUES
        ('$nim', '$nama', '$lahir', '$alamat', '$prodi_id')
    ";

    $sql = $koneksi->query($query);

    if ($sql) {
        header("Location: index.php?page=mahasiswa");
        exit;
    } else {
        echo "Gagal Menyimpan Data";
    }
}


// ==== UPDATE ====
if (isset($_POST['update'])) {

    $nim    = $_POST['nim'];
    $nama   = $_POST['nama_mhs'];
    $lahir  = $_POST['tgl_lahir'];
    $alamat = $_POST['alamat'];
    $nama_prodi = $_POST['nama_prodi'];

    $cek = $koneksi->query("
        SELECT id FROM prodi WHERE nama_prodi ='$nama_prodi'
    ");

    if ($cek->num_rows == 0) {
        die("Prodi tidak ditemukan!");
    }

    $row = $cek->fetch_assoc();
    $prodi_id = $row['id'];

    $query = "
        UPDATE mahasiswa SET
            nama_mhs='$nama',
            tgl_lahir='$lahir',
            alamat='$alamat',
            prodi_id='$prodi_id'
        WHERE nim='$nim'
    ";

    $sql = $koneksi->query($query);

    if ($sql) {
        header("Location: index.php?page=mahasiswa");
        exit;
    } else {
        echo "Gagal mengupdate data!";
    }
}


// ==== DELETE ====
if (isset($_GET['delete'])) {
    $nim = $_GET['delete'];

    $query = "DELETE FROM mahasiswa WHERE nim='$nim'";
    $sql = $koneksi->query($query); //eksekusi query

    if ($sql) {
        header("Location: index.php?page=mahasiswa");
        exit;
    } else {
        echo "Gagal Menghapus data!";
    }
   
}

//Jika tidak ada aksi, langsung kembali ke index
if (!isset($_POST['submit']) && !isset($_POST['update']) && !isset($_GET['delete'])) {
    header("Location: index.php");
    exit();
}

?>