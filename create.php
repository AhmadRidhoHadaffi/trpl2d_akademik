        <h1>Input Data Mahasiswa</h1>
        <form action="proses.php" method="post">
            <div class="mb-3">
                <label for="nim" class="form-label">NIM</label>
                <input type="text" class="form-control" id="nim" name="nim">
            </div>
            <div class="mb-3">
                <label for="nama" class="form-label">Nama</label>
                <input type="text" class="form-control" id="nama_mhs" name="nama_mhs">
            </div>
            <div class="mb-3">
                <label for="tgl_lahir" class="form-label">Tgl Lahir</label>
                <input type="date" class="form-control" id="tgl_lahir" name="tgl_lahir">
            </div>
            <div class="mb-3">
                <label for="alamat" class="form-label">Alamat</label>
                <textarea class="form-control" id="alamat" rows="3" name="alamat"></textarea>
            </div>
            <div class="mb-3">
                <label class="form-label">Program Studi</label>
                <input 
                    class="form-control"
                    list="listProdi"
                    name="nama_prodi"
                    placeholder="Pilih atau ketik Program Studi"
                    required
                >

                <datalist id="listProdi">
                    <?php
                    require 'koneksi.php';
                    $q = $koneksi->query("SELECT nama_prodi FROM prodi");
                    while($p = mysqli_fetch_assoc($q)){
                    ?>
                        <option value="<?= $p['nama_prodi'] ?>">
                    <?php } ?>
                </datalist>
            </div>
           
            <div>
                <input type="submit" name="submit" class="btn btn-primary">
                <a href="index.php" class="btn btn-secondary">Kembali</a>
            </div>

        </form>
