<h1>List Data Mahasiswa</h1>
       <a href="index.php?page=create" class="btn btn-primary">Input Data Mahasiswa</a>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Nim</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Tgl Lahir</th>
                    <th scope="col">Alamat</th>
                </tr>
            </thead>
            <tbody>
                <?php
                require 'koneksi.php';
                $tampil = $koneksi->query("SELECT * FROM mahasiswa");
                //Looping data tamu
                while($data = mysqli_fetch_assoc($tampil)){
                ?>
                    <tr>
                        <td> <?= $data['nim'] ?> </td>
                        <td> <?= $data['nama_mhs'] ?> </td>
                        <td> <?= $data['tgl_lahir'] ?> </td>
                        <td> <?= $data['alamat'] ?> </td>
                        <td class="d-flex gap-2">
                            <a href="index.php?nim=<?= $data['nim'] ?> &page=edit" class="btn btn-warning btn-sm flex-fill">Edit</a>
                            <a href="proses.php?delete=<?= $data['nim'] ?>" class="btn btn-danger btn-sm flex-fill" 
                            onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Delete</a>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>