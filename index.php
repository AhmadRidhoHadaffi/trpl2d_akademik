<?php
//session || cookies

session_start();
// cek login sudah ada atau belum

if(!isset($_SESSION['login'])){
    header("Location: login.php");
}
?>


<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>List Data Mahasiswa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
  </head>

  <body style="background-color: #FAFAF4;">
    <nav class="navbar navbar-expand-lg" style="background-color: #95B2B8;">
        <div class="container">
            <a class="navbar-brand" href="#">🎓 Akademik</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="index.php">Home</a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link" href="index.php?page=mahasiswa">Data Mahasiswa</a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link" href="index.php?page=prodi">Prodi</a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link" href="index.php?page=profil">Profil Pengguna</a>
                    </li>
                </ul>
                <div class="ms-auto d-flex align-items-center gap-3">

                <!-- PROFIL USER -->
                <div class="d-flex align-items-center gap-2">
                    <span class="rounded-circle d-flex justify-content-center align-items-center"
                        style="width:32px;height:32px;background-color:#5a7d82;color:white;">
                        👤
                    </span>
                    <span class="fw-semibold text-dark">
                        <?= $_SESSION['email']; ?>
                    </span>
                </div>

                <!-- LOGOUT -->
                <a href="logout.php"
                onclick="return confirm('Yakin ingin logout?')"
                class="btn btn-danger btn-sm">
                    Logout
                </a>
            </div>

            </div>
        </div>
    </nav>
    <div class="container my-4">
        <?php
            $page = isset($_GET['page']) ? $_GET['page'] : 'home';
            
            if($page == 'home') include 'home.php';
            if($page == 'mahasiswa') include 'list.php';
            if($page == 'create') include 'create.php';
            if($page == 'edit') include 'edit.php';
            if($page == 'prodi') include 'list_prodi.php';
            if($page == 'input') include 'input_prodi.php';
            if($page == 'editp') include 'edit_prodi.php';
            if($page == 'profil') include 'profil.php';
        ?>
       
    </div>

    

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
  </body>
</html>