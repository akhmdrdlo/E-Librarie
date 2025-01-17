   <?php 
    session_start();
    include('../config.php');

    
   if (!isset($_SESSION['username'])) {
       header("Location: index.php");
   }
   $user = $_SESSION['username'];
    ?>
<!DOCTYPE html>
<html lang="en">
 
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="../img/logo/perpus2.png" rel="icon">
    <title>Perpustakaan | Utama</title>
    <link href="../bootstrap/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="../bootstrap/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="../bootstrap/css/ruang-admin.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">

</head>

<body id="page-top">

    <div id="wrapper">
        <!-- Sidebar -->
        <ul class="navbar-nav sidebar  sidebar-light accordion" id="accordionSidebar">
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">
                <div class="sidebar-brand-icon">
                    <img src="../img/logo/perpus.png">
                </div>
                <div class="sidebar-brand-text mx-3">E-Librarie</div>
            </a>
            <hr class="sidebar-divider my-0">
            <li class="nav-item active">
                <a class="nav-link" href="index.php">
                    <i class="fas fa-fw fa-school"></i>
                    <span>Menu Utama</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="buku.php">
                    <i class="fas fa-fw fa-book"></i>
                    <span>Daftar Buku</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="pinjam.php">
                    <i class="fas fa-fw fa-cart-plus"></i>
                    <span>Data Peminjaman</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="denda.php">
                    <i class="fas fa-fw fa-money-check-alt"></i>
                    <span>Proses Denda</span></a>
            </li>
            <hr class="sidebar-divider">
            <div class="sidebar-heading">HALAMAN</div>
            <li class="nav-item">
                <a class="nav-link" href="#" data-toggle="modal" data-target="#logout">
                    <i class="fas fa-fw fa-sign-out-alt"></i>
                    <span>Logout</span>
                </a>
            </li>
            <hr class="sidebar-divider">
            <div class="version" id="version-ruangadmin"></div>
        </ul>
        <!-- Sidebar -->
        <div id="content-wrapper" class="d-flex flex-column">
            <div id="content">
                <!-- TopBar -->
                <nav class="navbar navbar-expand navbar-light bg-navbar topbar mb-4 static-top">
                    <button id="sidebarToggleTop" class="btn btn-link rounded-circle mr-3">
            <i class="fa fa-bars text-white"></i>
          </button>
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle " href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <img class="img-profile rounded-circle" src="../img/foto/<?= $_SESSION['foto'];?>" style="max-width: 60px">

                                <span class="ml-2 d-none d-lg-inline text-white small" id="userName"><?php echo $_SESSION['nama'];?></span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="javascript:void(0);" data-toggle="modal" data-target="#dataDiri" >
                                    <i class="fa fa-user-circle fa-sm fa-fw mr-2 text-gray-400"></i> Data Diri
                                </a>
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logout">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i> Logout
                                </a>
                            </div>
                        </li>
                    </ul>
                </nav>
                <!-- Topbar -->

                <!-- Container Fluid-->
                <div class="container-fluid" id="container-wrapper">
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800 align-items-center">Selamat Datang di E-Librarie, <?php echo $_SESSION['nama'];?>!</h1>
                    </div>

                    <div class="row mb-3">
                       
                        <!-- total buku pinjam card -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card h-100">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-uppercase mb-1">total Buku yang Dipinjam</div>
                                            <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">
                                            <?php $sql=mysqli_query($db,"SELECT SUM(jumlah) FROM list_pinjam");
                                            while($stok = mysqli_fetch_array($sql)) {
                                                    echo  "".$stok['SUM(jumlah)']." Buku";
                                                ?>
                                                
                                            </div>
                                            <?php }?>
                                            
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-book fa-2x text-success"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Total Member Card -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card h-100">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-uppercase mb-1">Total Member</div>
                                            <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">
                                            <?php $sql=mysqli_query($db,"SELECT count(*) FROM list_member");
                                            while($stok = mysqli_fetch_array($sql)) {
                                                ?>
                                                <?= $stok['count(*)']?> Member
                                            </div>
                                            <?php }?>
                                            
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-users fa-2x text-info"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Total Buku Card -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card h-100">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-uppercase mb-1">Total Buku</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                                <?php $sql=mysqli_query($db,"SELECT SUM(stok) FROM list_buku");
                                            while($stok = mysqli_fetch_array($sql)) {
                                                ?>
                                                <?= $stok['SUM(stok)']?> Buku
                                            </div>
                                            <?php }?>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-book-open fa-2x text-primary"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Total Buku Card -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card h-100">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-uppercase mb-1">Total Jenis Buku</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                                <?php $sql=mysqli_query($db,"SELECT count(*) FROM list_buku");
                                            while($stok = mysqli_fetch_array($sql)) {
                                                ?>
                                                <?= $stok['count(*)']?> Buku
                                            </div>
                                            <?php }?>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-book-open fa-2x text-primary"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="container-fluid" id="container-wrapper">
                            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                                <h1 class="h3 mb-0 text-gray-800">Data Sekolah</h1>
                                <div class="d-flex flex-row-reverse align-items-center "><a href='#' class='btn btn-sm btn-success col-md-12 p-2' data-toggle='modal' data-target='#tambahModal'><i class="fa fa-file"></i>  Import Data Sekolah</a></div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12 mb-4">
                                    <!-- Simple Tables -->
                                    <div class="card"></div>
                                    <div class="table-responsive">
                                    <table class="table align-items-center table-flush">
                                            <tbody>
                                                <tr>
                                                    <th>Nama Sekolah</th>
                                                    <td>SMK IT Fatahillah </td>
                                                </tr>
                                                <tr>
                                                    <th>NPSN</th>
                                                    <td>20258413</td>
                                                </tr>
                                                <tr>
                                                    <th>Status</th>
                                                    <td>Swasta</td>
                                                </tr>
                                                <tr>
                                                    <th>Akreditasi</th>
                                                    <td>TerAkreditasi A</td>
                                                </tr>
                                                <tr>
                                                    <th>Bentuk Pendidikan</th>
                                                    <td>Sekolah Menengah Kejuruan</td>
                                                </tr>
                                                <tr>
                                                    <th>Status Kepemilikan</th>
                                                    <td>Yayasan</td>
                                                </tr>
                                                <tr>
                                                    <th>SK Pendirian Sekolah</th>
                                                    <td>60/ YF.01 /SK/VI/2006</td>
                                                </tr>
                                                <tr>
                                                    <th>Tanggal SK Pendirian</th>
                                                    <td>6/16/2006</td>
                                                </tr>
                                                <tr>
                                                    <th>SK Izin Operasi</th>
                                                    <td>421/59-Disdik</td>
                                                </tr>
                                                <tr>
                                                    <th>Tanggal SK Izin Operasi</th>
                                                    <td>1/13/2010</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="card-footer"></div>
                                </div>
                            </div>
                        </div>
                        <!--Row-->

                        <!-- Modal Profil -->
 <div class="modal fade" id="dataDiri" tabindex="-1" role="dialog" aria-labelledby="dataDiriTitle" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="dataDiriTitle">Halo, <?= $_SESSION['level']?> <span id="usName"><?php echo $_SESSION['nama'];?>!!</span>
                                        </h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                    </button>
                                    </div>
                                    <div class="modal-body  text-center">
                                        <h6 class="text-center">
                                            <b>|</b>
                                            <img src="../img/logo/perpus1.png" alt="" width="20px" height="27px">
                                            <b><i class="fa fa-pencil-alt" > </i> Profil Perpustakaan |</b>
                                        </h6>
                                        <h2 class="text-center"><img class="img-profile rounded-circle" src="../img/foto/<?= $_SESSION['foto'];?>" style="max-width: 175px; border: solid black 2px; "></h2>
                                        <h5 class="text-center text-secondary font-underline font-weight-bold"><?= $_SESSION['nama'];?></h5>
                                        <p>Username Anda : <?php echo $_SESSION['username'];?></p>
                                        <p>Email Anda : <?php echo $_SESSION['email'];?></p>
                                        <p>Nomor Telepon Anda : <i class="fa fa-icon fa-phone text-success"></i> <?php echo $_SESSION['telepon'];?></p>
                                        <p>Tingkatan Level Anda : <i class="fa fa-icon fa-security text-warning"></i> <?php echo $_SESSION['level'];?></p>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-outline-primary" data-dismiss="modal">OK!</button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Modal Logout -->
                        <div class="modal fade" id="logout" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabelLogout" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabelLogout"><b>|</b> Upss!! <i class="fas fa-sign-out-alt fa-sm fa-fw text-danger"></i><b>|</b></h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                  </button>
                                    </div>
                                    <div class="modal-body">
                                        <p>Apa kamu yakin ingin Logout, <?php echo $_SESSION['nama'];?> ?</p>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-outline-primary" data-dismiss="modal">Batal</button>
                                        <a href="../logout.php" class="btn btn-outline-danger">Logout</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Modal Tambah -->
                        <div class="modal fade" id="tambahModal" tabindex="-1" role="dialog" aria-labelledby="tambahModal" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="tambahModal">Import Data Sekolah</h5>
                                    </div>
                                    <div class="modal-body">
                                    <div class="modal-body text-center" id="tambah">
                                        <form action="excel.php" method="POST" role="form" enctype="multipart/form-data">
                                            <div class="form-group">
                                                <label class="col-form-label text-success font-weight-bold" for="dataExcel">Import Data Sekolah Dari Excel Anda</label>
                                                <label class="form-label text-danger font-weight-bolder" for="dataExcel">(Data Harus berekstensi .xls!!)</label>
                                                <input type="file" class="btn btn-primary" name="dataExcel" id="dataExcel">
                                            </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Kembali</button>
                                        <button type="submit" class="btn btn-primary" value="upload" name="upload">Tambah Data</button>
                                    </div>
                                        </form>
                                </div>
                            </div>
                        </div>
                        </div>
                    </div>
                    <!---Container Fluid-->
                </div>
                <!-- Footer -->
                <footer class="sticky-footer bg-white">
                    <div class="container my-auto">
                        <div class="copyright text-center my-auto">
                            <span>&copy; <script> document.write(new Date().getFullYear()); </script> Made By Akhmad Ridlo - 
                  <b><a href="https://indrijunanda.gitlab.io/" target="_blank">SMK Fatahillah Cileungsi</a></b>
                </span>
                        </div>
                    </div>
                </footer>
                <!-- Footer -->
            </div>
        </div>

        <!-- Scroll to top -->
        <a class="scroll-to-top rounded" href="#page-top">
            <i class="fas fa-angle-up"></i>
        </a>

        <script src="../bootstrap/vendor/jquery/jquery.min.js"></script>
        <script src="../bootstrap/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="../bootstrap/vendor/jquery-easing/jquery.easing.min.js"></script>
        <script src="../bootstrap/js/ruang-admin.min.js"></script>
        <script src="../bootstrap/vendor/chart.js/Chart.min.js"></script>
        <script src="../bootstrap/js/demo/chart-area-demo.js"></script>
</body>

</html>