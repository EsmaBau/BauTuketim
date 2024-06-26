<?php
session_start(); // Oturumu başlat

// Diğer PHP kodları devam eder...
?>

<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>BAU/Yetki Atama</title>
 <!-- Bootstrap csS -->
 <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

 <!-- DataTables CSS -->
 <link href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css" rel="stylesheet">

 <!-- Font Awesome -->
 <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" rel="stylesheet">

 <!-- Custom CSS -->
 <link href="css/sb-admin-2.min.css" rel="stylesheet">
 <link href="css/yetkiVer.css" rel="stylesheet">
 <link href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css" rel="stylesheet">
 
</head>
<body id="page-top">
    <!-- Page Wrapper -->
    <div id="wrapper">
        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">
                <div class="sidebar-brand-icon rotate-n-15">
                </div>
                <div class="sidebar-brand-text mx-3">BAU Tüketim <sup>.</sup></div>
            </a>
            <!-- Divider -->
            <hr class="sidebar-divider my-0">
            <!-- Divider -->
            <hr class="sidebar-divider">
            <!-- Heading -->
            <div class="sidebar-heading">
                Tanımlamalar
            </div>
            <li class="nav-item">
                <a class="nav-link" href="#" data-toggle="collapse" data-target="#collapseTanımlamalar" aria-expanded="true" aria-controls="collapseTanımlamalar">
                    <i class="fas fa-fw fa-cog"></i>
                    <span>Tanımlamalar</span>
                </a>
                <div id="collapseTanımlamalar" class="collapse" aria-labelledby="headingTanımlamalar" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Tanımlamalar:</h6>
                        <a class="collapse-item" href="index.php">Kampüs Tanımlama</a>
                        <a class="collapse-item" href="giderTipiBelirle.php">Gider Tipi Tanımlama</a>
                        <a class="collapse-item" href="tesisatTanimlama.php">Tesisat Tanımlama</a>
                        <a class="collapse-item" href="kullaniciTanimlama.php">Kullanıcı Tanımlama</a>
                    </div>
                </div>
            </li>
            <!-- Divider -->
            <hr class="sidebar-divider">
            <!-- Heading -->
            <div class="sidebar-heading">
                Yetki Tanımlama/Verme
            </div>
            <li class="nav-item">
                <a class="nav-link" href="#" data-toggle="collapse" data-target="#collapseYetkiler" aria-expanded="true" aria-controls="collapseYetkiler">
                    <i class="fas fa-fw fa-cog"></i>
                    <span>Yetkiler</span>
                </a>
                <div id="collapseYetkiler" class="collapse" aria-labelledby="headingYetkiler" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Yetki İşlemleri:</h6>
                        <a class="collapse-item" href="yetkiler.php">Yetkiler</a>
                        <a class="collapse-item" href="yetkiVerme.php">Yetki Verme</a>
                    </div>
                </div>
            </li>
            <!-- Divider -->
            <hr class="sidebar-divider">
            <!-- Heading -->
            <div class="sidebar-heading">
                Okumalar
            </div>
            <li class="nav-item">
                <a class="nav-link" href="#" data-toggle="collapse" data-target="#collapseOkumalar" aria-expanded="true" aria-controls="collapseOkumalar">
                    <i class="fas fa-fw fa-cog"></i>
                    <span>Okumalar</span>
                </a>
                <div id="collapseOkumalar" class="collapse" aria-labelledby="headingOkumalar" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Okuma İşlemleri:</h6>
                        <a class="collapse-item" href="elektrikOkuma.php">Elektrik Okuma</a>
                        <a class="collapse-item" href="suOkuma.php">Su Okuma</a>
                        <a class="collapse-item" href="dogalgazOkuma.php">Doğalgaz Okuma</a>
                    </div>
                </div>
            </li>
        </ul>
        <!-- End of Sidebar -->
        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">
            <!-- Main Content -->
            <div id="content">
                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>
                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                        <li class="nav-item dropdown no-arrow d-sm-none">
                            <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-search fa-fw"></i>
                            </a>
                        </li>
                        <li class="nav-item dropdown no-arrow mx-1">                         
                            <!-- Dropdown - Messages -->
                            <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="messagesDropdown">
                                <h6 class="dropdown-header">
                                   İşlemler
                                </h6>
                                <a href="#">Profil</a><br><br>
                                <a href="#" onclick="logout()">Çıkış Yap</a>
                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <p class="mr-2 d-none d-lg-inline text-gray-600 small">
                            Yetki:
                              <?php echo isset($_SESSION['yetkiId']) && $_SESSION['yetkiId'] == 3 ? "Admin" : "Kullanıcı"; ?>
                           </p>
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small"></span>
                                <img class="img-profile rounded-circle" src="img/undraw_profile.svg">
                            </a>
                        </li>
                    </ul>
                </nav>             
                    <div class="row">
                    <div class="col-lg-6 mb-4">
                </div>
                <form id="yetkiVerForm">
                <div class="container-fluid">
                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800" style="font-size: 24px; font-weight: bold; margin-left: 90px;">Yetki Verme</h1>
                    </div>
                    <!-- Ana Div -->
                    <div style="display: flex; flex-direction: column; align-items: center;">
                        <div style="background-color: white; padding: 20px; border-radius: 10px; width: 820px;">
                            <div style="display: flex; flex-direction: row; ">
                                <!-- Yetki Adı Girişi -->
                                <div style="margin-top: 20px; margin-right: 100px; margin-left: 60px;">
                                    <label for="yetkiAdi" style="color: black;"><b>Yetkisi</b></label>
                                    <br>
                                    <select type="text" id="yetkiAdi" name="yetkiAdi" class="yetkiAdi" style="width: 300px;" required>
                                    </select>
                                </div>
                                
                                <!-- Kampüs Adı Girişi -->
                                <div style="margin-top: 20px; ">
                                    <label for="kampusAdi" style="color: black;"><b>Yetki Verilecek Kampüs</b></label>
                                    <div id="kampusAdi" style="margin-top: 5px;"></div>
                                </div>
                            </div>
                            <!-- Kaydet Butonu -->
                            <div style="margin-top: 20px; text-align: center;">
                                <button type="button" id="btnYetkilendir" style="background-color: #307dc5; color: white; font-size: 14px; border: none; padding: 10px 20px; border-radius: 5px;">Yetkilendir</button>
                            </div>
                        </div>
                    </div>
                </div>
                </form>
            </div>
        </div>
        <!-- jQuery ve Bootstrap JS -->
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
        <!-- DataTables JS -->
        <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
        <!-- DataTables Buttons eklentisi JS -->
        <script src="https://cdn.datatables.net/buttons/2.0.1/js/dataTables.buttons.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.70/pdfmake.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.70/vfs_fonts.js"></script>
        <script src="https://cdn.datatables.net/buttons/2.0.1/js/buttons.html5.min.js"></script>
        <script src="https://cdn.datatables.net/buttons/2.0.1/js/buttons.print.min.js"></script>
        <script src="js/yetkiVer.js"></script>      
        
        
        
    </body>
</html>