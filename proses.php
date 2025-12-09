<?php
//include , require
require 'koneksi.php';

// === INSERT ===
if (isset($_POST['submit'])){
    $nim = $_POST['nim'];
    $nama = $_POST['nama_mhs'];
    $lahir = $_POST['tgl_lahir'];
    $alamat = $_POST['alamat'];

    $query = "INSERT INTO mahasiswa(nim, nama_mhs, tgl_lahir, alamat) VALUES('$nim', '$nama', '$lahir', '$alamat')";
    $sql = $koneksi->query($query); //eksekusi query

    if($sql){
        header("Location: index.php?page=mahasiswa");
    } else{
        echo "Gagal Menyimpan Data";
    }
}

// ==== UPDATE ====
if (isset($_POST['update'])) {
    $nim = $_POST['nim'];
    $nama = $_POST['nama_mhs'];
    $lahir = $_POST['tgl_lahir'];
    $alamat = $_POST['alamat'];

    $query = "UPDATE mahasiswa SET nim='$nim', nama_mhs='$nama', tgl_lahir='$lahir', alamat='$alamat' WHERE nim='$nim' ";
    $sql = $koneksi->query($query); //eksekusi query

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