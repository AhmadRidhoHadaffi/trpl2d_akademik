<?php
  require 'koneksi.php';
  $nim = $_GET['nim'];
  $query =$koneksi->query("SELECT * FROM mahasiswa WHERE nim = '$nim'");
  $data = $query->fetch_assoc();
?>
<h1>Edit Data Mahasiswa</h1>
<form action="proses.php" method="post">
    <input type="hidden" name="nim" value="<?= $data['nim'] ?>">
    <div class="mb-3">
        <label for="nim" class="form-label">NIM</label>
        <input type="text" class="form-control" id="nim" name="nim" value="<?=  $data['nim'] ?>">
    </div>
    <div class="mb-3">
        <label for="nama" class="form-label">Nama</label>
        <input type="text" class="form-control" id="nama" name="nama_mhs" value="<?=  $data['nama_mhs'] ?>">
    </div>
    <div class="mb-3">
        <label for="lahir" class="form-label">Tanggal Lahir</label>
        <input type="date" class="form-control" id="lahir" name="tgl_lahir" value="<?= $data['tgl_lahir'] ?>">
    </div>
    <div class="mb-3">
        <label for="alamat" class="form-label">Alamat</label>
        <textarea class="form-control" id="alamat" rows="3" name="alamat"><?= $data['alamat']?></textarea>
    </div>
    <div>
        <button type="submit" name="update" class="btn btn-primary">Simpan</button>
        <a href="index.php" class="btn btn-primary">Kembali</a>
    </div>
</form>
