<?php
session_start(); // Oturumu başlat

// Diğer PHP kodları devam eder...
?>
<!DOCTYPE html>
<html lang="tr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Doğalgaz Okuma</title>
    <!-- Bootstrap csS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    <!-- DataTables CSS -->
    <link href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css" rel="stylesheet">

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
    <link href="css/index.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css" rel="stylesheet">
</head>

<body>
    <!-- Page Wrapper -->
    <!-- Page Wrapper -->
    <div id="wrapper">
        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">
                <div class="sidebar-brand-icon rotate-n-15">
                </div>
                <div class="sidebar-brand-text mx-3">BAU Tüketim<sup>.</sup></div>
            </a>
            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Divider -->
            <hr class="sidebar-divider">

            <div id="adminNavs" class="d-none">

                <!-- Heading -->
                <div class="sidebar-heading">
                    Tanımlamalar
                </div>
                <li class="nav-item">
                    <a class="nav-link" href="#" data-toggle="collapse" data-target="#collapseTanımlamalar"
                        aria-expanded="true" aria-controls="collapseTanımlamalar">
                        <i class="fas fa-fw fa-cog"></i>
                        <span>Tanımlamalar</span>
                    </a>
                    <div id="collapseTanımlamalar" class="collapse" aria-labelledby="headingTanımlamalar"
                        data-parent="#accordionSidebar">
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

                <!-- Divider -->
                <hr class="sidebar-divider">
                <!-- Heading -->
                <div class="sidebar-heading">
                    Yetki Tanımlama/Verme
                </div>
                <li class="nav-item">
                    <a class="nav-link" href="#" data-toggle="collapse" data-target="#collapseYetkiler"
                        aria-expanded="true" aria-controls="collapseYetkiler">
                        <i class="fas fa-fw fa-cog"></i>
                        <span>Yetkiler</span>
                    </a>
                    <div id="collapseYetkiler" class="collapse" aria-labelledby="headingYetkiler"
                        data-parent="#accordionSidebar">
                        <div class="bg-white py-2 collapse-inner rounded">
                            <h6 class="collapse-header">Yetki İşlemleri:</h6>
                            <a class="collapse-item" href="Yetkiler.php">Yetkiler</a>
                            <a class="collapse-item" href="yetkiVerme.php">Yetki Verme</a>
                        </div>
                    </div>
                </li>
                <!-- Divider -->
                <hr class="sidebar-divider">
            </div>

            <!-- Heading -->
            <div class="sidebar-heading">
                Okumalar
            </div>
            <li class="nav-item">
                <a class="nav-link" href="#" data-toggle="collapse" data-target="#collapseOkumalar" aria-expanded="true"
                    aria-controls="collapseOkumalar">
                    <i class="fas fa-fw fa-cog"></i>
                    <span>Okumalar</span>
                </a>
                <div id="collapseOkumalar" class="collapse" aria-labelledby="headingOkumalar"
                    data-parent="#accordionSidebar">
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
                              <?php echo isset($_SESSION['yetkiId']) && $_SESSION['yetkiId'] == 2 ? "Doğalgaz Okuma" : "Kullanıcı"; ?>
                             </p>
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small"></span>
                                <img class="img-profile rounded-circle" src="img/undraw_profile.svg">
                            </a>
                        </li>
                    </ul>
                </nav>
                <div class="row">
                </div>


                <div class="container-fluid">
                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800" style="font-size: 24px; font-weight: bold;">Doğalgaz Okuma
                        </h1>
                    </div>

                    <!-- Ana Div -->
                    <div style="background-color: white; padding: 20px; border-radius: 10px; width: 400px;">

                        <!-- Kampüs Adı Girişi -->
                        <div style="margin-top: 20px;">
                            <label for="kampusAdi" style="color: black;"><b>Kampüs Adı</b></label>
                            <br>
                            <!-- Kampüs Seçim Inputu -->
                            <select id="kampusAdi" name="kampusAdi" style="width: 300px;" required></select>
                        </div>
                        <!-- Sayaç Numarası Girişi -->
                        <div style="margin-top: 20px;">
                            <label for="sayacNo" style="color: black;"><b>Sayaç Numarası</b></label>
                            <br>
                            <input type="int" id="sayacNo" name="SayaçNo" maxlength="12" class="sayacNo"
                                style="width: 300px;" required>
                        </div>

                        <!-- Okuma Tarihi Numarası Girişi -->
                        <div style="margin-top: 20px;">
                            <label for="okumaTarihi" style="color: black;"><b>Okuma Tarihi</b></label>
                            <br>
                            <input type="date" id="okumaTarihi" name="OkumaTarihi" class="okumaTarihi"
                                style="width: 300px;" required>
                        </div>

                        <!-- T1  Girişi -->
                        <div style="margin-top: 20px;">
                            <label for="T" style="color: black;"><b>T(t/kwh) </b></label>
                            <br>
                            <input type="int" id="T" name="T1" class="T" style="width: 300px;" required>
                        </div>

                        <!-- Kaydet Butonu -->
                        <div style="margin-top: 20px;">
                            <button type="button" id="btKaydet"
                                style="background-color: #307dc5; color: white; font-size: 16px; border: none; padding: 10px 20px; border-radius: 5px;">Kaydet</button>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 mb-4">
                    <div class="container-fluid">
                        <table id="dogalgazOkumaVeri" class="dogalgazOkumaVeri" style="width:100%">
                            <thead>
                                <tr>
                                    <th style="color: black;">Kampüs</th>
                                    <th style="color: black;">Sayac No</th>
                                    <th style="color: black;">Okuma Tarihi</th>
                                    <th style="color: black;">T1(t/kwh)</th>
                                    <th style="color: black;">T2(t/kwh)</th>
                                    <th style="color: black;">T3(t/kwh)</th>
                                    <th style="color: black;">İşlemler</th>

                                </tr>
                            </thead>
                            <tbody id="tableBody">
                                <!-- Veritabanından çekilecek veriler buraya eklenecek -->
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- jQuery ve Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>

    <!-- DataTables JS -->
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>

    <!-- DataTables Buttons eklentisi JS -->
    <script src="https://cdn.datatables.net/buttons/2.0.1/js/dataTables.buttons.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.70/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.70/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.0.1/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.0.1/js/buttons.print.min.js"></script>
    <script src="js/dogalgazOkuma.js"></script>

</body>

<script>
    document.addEventListener("DOMContentLoaded", function () {
        console.log("Document ready!");

        // Admin yetkisi kontrolü
        var adminNavs = document.getElementById("adminNavs");
        var yetkiId = localStorage.getItem('yetkiId');

        console.log("YetkiId: " + yetkiId);

        if (yetkiId == 3) {
            console.log("Admin girişi yapıldı!");
            adminNavs.classList.remove("d-none");
        }
        else {
            console.log("Kullanıcı girişi yapıldı!");
        }
    });
</script>

</html>