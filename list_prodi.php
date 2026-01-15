<h1>List Prodi Mahasiswa</h1>
       <a href="index.php?page=input" class="btn btn-primary">Input Prodi Mahasiswa</a>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Nama Prodi</th>
                    <th scope="col">Jenjang</th>
                    <th scope="col">Keterangan</th>
                    <th scope="col">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                require 'koneksi.php';
                $tampil = $koneksi->query("SELECT * FROM prodi");
                //Looping data tamu
                while($data = mysqli_fetch_assoc($tampil)){
                ?>
                    <tr>
                        <td> <?= $data['id'] ?> </td>
                        <td> <?= $data['nama_prodi'] ?> </td>
                        <td> <?= $data['jenjang'] ?> </td>
                        <td> <?= $data['keterangan'] ?> </td>
                        <td>
                            <a href="index.php?page=editp&id=<?= $p['id'] ?>"
                            class="btn btn-warning btn-sm">Edit</a>

                            <a href="proses_prodi.php?delete=<?= $p['id'] ?>"
                            class="btn btn-danger btn-sm"
                            onclick="return confirm('Yakin hapus prodi?')">
                            Delete
                            </a>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>