<?php
require 'koneksi.php';

// Proteksi halaman
if (!isset($_SESSION['login']) || !isset($_SESSION['email'])) {
    header("Location: login.php");
    exit;
}

$email = $_SESSION['email'];


// Ambil data user
$q = $koneksi->query("SELECT * FROM pengguna WHERE email='$email'");

if ($q->num_rows == 0) {
    die("Data pengguna tidak ditemukan");
}

$data = $q->fetch_assoc();
?>


<h2>Edit Profil</h2>

<form action="proses_profil.php" method="post" style="max-width:500px;">

    <div class="mb-3">
        <label class="form-label">Nama</label>
        <input type="text" 
               name="nama_lengkap" 
               class="form-control" 
               value="<?= $data['nama_lengkap']; ?>" 
               required>
    </div>

    <div class="mb-3">
        <label class="form-label">Email</label>
        <input type="email"
               class="form-control"
               value="<?= $data['email']; ?>"
               readonly>
        <small class="text-muted">Email tidak dapat diubah</small>
    </div>

    <div class="mb-3">
        <label class="form-label">Password Baru</label>
        <input type="password"
               name="password"
               class="form-control"
               placeholder="Kosongkan jika tidak ingin mengubah">
    </div>

    <button type="submit" name="update_profil" class="btn btn-primary">
        Simpan Perubahan
    </button>

</form>
