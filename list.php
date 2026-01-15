<h1>List Data Mahasiswa</h1>
       <a href="index.php?page=create" class="btn btn-primary">Input Data Mahasiswa</a>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Nim</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Tgl Lahir</th>
                    <th scope="col">Alamat</th>
                    <th scope="col">Program Studi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                require 'koneksi.php';
                $tampil = $koneksi->query("
                    SELECT 
                        m.nim,
                        m.nama_mhs,
                        m.tgl_lahir,
                        m.alamat,
                        p.nama_prodi
                    FROM mahasiswa m
                    JOIN prodi p ON m.prodi_id = p.id
                ");
                //Looping data tamu
                while($data = mysqli_fetch_assoc($tampil)){
                ?>
                    <tr>
                        <td> <?= $data['nim'] ?> </td>
                        <td> <?= $data['nama_mhs'] ?> </td>
                        <td> <?= $data['tgl_lahir'] ?> </td>
                        <td> <?= $data['alamat'] ?> </td>
                        <td> <?= $data['nama_prodi'] ?> </td>
                        <td class="d-flex gap-2">
                            <a href="index.php?nim=<?= $data['nim'] ?> &page=edit" class="btn btn-warning btn-sm flex-fill">Edit</a>
                            <a href="proses.php?delete=<?= $data['nim'] ?>" class="btn btn-danger btn-sm flex-fill" 
                            onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Delete</a>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>