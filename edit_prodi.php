<?php
require 'koneksi.php';
$id = $_GET['id'];
$q = $koneksi->query("SELECT * FROM prodi WHERE id='$id'");
$data = $q->fetch_assoc();
?>

<h1>Edit Data Prodi</h1>

<form action="proses_prodi.php" method="post">
    <input type="hidden" name="id" value="<?= $data['id'] ?>">

    <div class="mb-3">
        <label class="form-label">Nama Prodi</label>
        <input type="text" class="form-control" name="nama_prodi"
               value="<?= $data['nama_prodi'] ?>" required>
    </div>

    <div class="mb-3">
        <label class="form-label">Jenjang</label>
        <select class="form-select" name="jenjang" required>
            <option value="D2" <?= $data['jenjang']=='D2'?'selected':'' ?>>D2</option>
            <option value="D3" <?= $data['jenjang']=='D3'?'selected':'' ?>>D3</option>
            <option value="D4" <?= $data['jenjang']=='D4'?'selected':'' ?>>D4</option>
            <option value="S2" <?= $data['jenjang']=='S2'?'selected':'' ?>>S2</option>
        </select>
    </div>

    <div class="mb-3">
        <label class="form-label">Keterangan</label>
        <textarea class="form-control" name="keterangan" rows="3"><?= $data['keterangan'] ?></textarea>
    </div>

    <button type="submit" name="update" class="btn btn-primary">Update</button>
    <a href="index.php?page=prodi" class="btn btn-secondary">Kembali</a>
</form>
