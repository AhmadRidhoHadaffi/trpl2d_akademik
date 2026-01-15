<h1>Input Data Prodi</h1>

<form action="proses_prodi.php" method="post">

    <div class="mb-3">
        <label class="form-label">Nama Prodi</label>
        <input type="text" class="form-control" name="nama_prodi" required>
    </div>

    <div class="mb-3">
        <label class="form-label">Jenjang</label>
        <select class="form-select" name="jenjang" required>
            <option value="">-- Pilih Jenjang --</option>
            <option value="D2">D2</option>
            <option value="D3">D3</option>
            <option value="D4">D4</option>
            <option value="S2">S2</option>
        </select>
    </div>

    <div class="mb-3">
        <label class="form-label">Keterangan</label>
        <textarea class="form-control" name="keterangan" rows="3"></textarea>
    </div>

    <button type="submit" name="submit" class="btn btn-primary">Simpan</button>
    <a href="index.php?page=prodi" class="btn btn-secondary">Kembali</a>

</form>
