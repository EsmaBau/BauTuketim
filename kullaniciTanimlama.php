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
    <title>BAU/Kullanıcı Tanımlama</title>
    <!-- Bootstrap csS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    <!-- DataTables CSS -->
    <link href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css" rel="stylesheet">

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
    <link href="css/kullaniciTanimlama.css" rel="stylesheet">
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
            <hr class="sidebar-divider">

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
                        <a class="collapse-item" href="giderTipiBelirle.php">Gider Tipi Belirleme</a>
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
                <a class="nav-link" href="#" data-toggle="collapse" data-target="#collapseYetkiler" aria-expanded="true"
                    aria-controls="collapseYetkiler">
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
                    <div class="container-fluid">

                        <!-- Sol alan -->
                        <div class="col-4">
                            <div class="align-items-center justify-content-between" style="width: 600px;">
                                <h1 class="h3 text-gray-800" style="font-size: 20px; font-weight: bold; ">Kullanıcı
                                    Tanımlama</h1>
                            </div>
                            <!-- Kullanıcı tanımlama formu -->
                            <div style="background-color: white; border-radius: 30px;">
                                <!-- Kullanıcı Adı Girişi -->
                                <div style="margin-top: 20px; display: flex; align-items: center;">
                                    <label for="KullaniciAd" style="color: black; width: 70px;"><b>Ad:</b></label>
                                    <input type="text" id="KullaniciAd" name="KullaniciAd"
                                        style="width: 270px; flex: 1;" required>
                                </div>
                                <!-- Kullanıcı Soyadı Girişi -->
                                <div style="margin-top: 20px; display: flex; align-items: center;">
                                    <label for="KullaniciSoyad" style="color: black; width: 70px;"><b>Soyad:</b></label>
                                    <input type="text" id="KullaniciSoyad" name="KullaniciSoyad" style="width: 270px; "
                                        required>
                                </div>
                                <!-- Kullanıcı Yetki Girişi -->
                                <div style="margin-top: 20px; display: flex; align-items: center;">
                                    <label for="yetkiId" style="color: black; width: 70px;"><b>Yetki:</b></label>
                                    <div id="editYetki"></div>
                                </div>
                                <!-- Email Girişi -->
                                <div style="margin-top: 20px; display: flex; align-items: center;">
                                    <label for="Email" style="color: black; width: 70px;"><b>Email:</b></label>
                                    <input type="email" id="Email" name="Email" style="width: 270px; flex: 1;" required>
                                </div>
                                <!-- Şifre Girişi -->
                                <div style="margin-top: 20px; display: flex; align-items: center;">
                                    <label for="Sifre" style="color: black; width: 70px;"><b>Şifre:</b></label>
                                    <input type="password" id="Sifre" name="Sifre" style="width: 270px; flex: 1;"
                                        required>
                                </div>
                                <!-- Telefon Numarası Girişi -->
                                <div style="margin-top: 20px; display: flex; align-items: center;">
                                    <label for="Telefon" style="color: black; width: 70px;"><b>Telefon:</b></label>
                                    <input type="text" id="Telefon" name="Telefon" maxlength="12"
                                        style="width: 270px; flex: 1;" required>
                                </div>
                                <!-- Kaydet Butonu -->
                                <div style="margin-top: 15px; text-align: center;">
                                    <button type="button" id="kullaniciKaydet"
                                        style="display: flex; justify-content: center;; background-color: #307dc5; color: white; font-size: 16px; border: none; padding: 10px 20px; border-radius: 5px;">Kaydet</button>
                                </div><br>
                            </div><br>
                        </div>
                        <!-- Sağ alan -->
                        <div class="col-7">
                            <div class=" align-items-center justify-content-between">
                                <h2 class="h3 text-gray-800"
                                    style="font-size: 20px; font-weight: bold; margin-bottom: 30px;">Tanımlanan
                                    Kullanıcılar</h2>
                            </div>
                            <!-- Kullanıcılar tablosu -->
                            <table id="kullaniciVeri" class="kullaniciVeri">
                                <thead>
                                    <tr>
                                        <th style="color: black;">AD</th>
                                        <th style="color: black;">Soyad</th>
                                        <th style="color: black;">Yetki</th>
                                        <th style="color: black;">Email</th>
                                        <th style="color: black;">Şifre</th>
                                        <th style="color: black;">Telefon No</th>
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
            <!-- Modal -->
            <div class="modal fade" id="editModal2" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="editModalLabel">Veri Düzenleme</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <!-- Form alanları buraya eklenecek -->
                            <div class="container-fluid">
                                <div style="background-color: white;  width: 400px;">
                                    <form id="kullaniciForm">
                                        <div style="margin-top: 20px;display: flex; align-items: center;">
                                            <label for="editKullaniciAd"
                                                style="color: black; width: 120px;"><b>Ad:</b></label>
                                            <!-- Kullanıcı Ad Inputu -->
                                            <input type="text" id="editKullaniciAd" name="KullaniciAd"
                                                class="KullaniciAd" style="flex: 1;" required>
                                        </div>
                                        <div style="margin-top: 20px; display: flex; align-items: center;">
                                            <label for="editKullaniciSoyad"
                                                style="color: black; width: 120px;"><b>Soyad:</b></label>
                                            <!-- Kullanıcı Soyad Inputu -->
                                            <input type="text" id="editKullaniciSoyad" name="KullaniciSoyad"
                                                class="KullaniciSoyad" style="flex: 1;" required>
                                        </div>
                                        <div style="margin-top: 20px; display: flex; align-items: center;">
                                            <label for="editYetki"
                                                style="color: black; width: 120px;"><b>Yetki:</b></label>
                                            <select id="editYetki" style="width: 250px; flex: 1;" required>
                                                <option id="selectedVal" value="" selected disabled>Lütfen yetki seçin
                                                </option>
                                            </select>
                                        </div>
                                        <div style="margin-top: 20px; display: flex; align-items: center;">
                                            <label for="editEmail"
                                                style="color: black; width: 120px;"><b>Email:</b></label>
                                            <!-- Email Inputu -->
                                            <input type="email" id="editEmail" name="Email" class="Email"
                                                style="flex: 1;" required>
                                        </div>
                                        <div style="margin-top: 20px; display: flex; align-items: center;">
                                            <label for="editSifre"
                                                style="color: black; width: 120px;"><b>Şifre:</b></label>
                                            <!-- Şifre Inputu -->
                                            <input type="text" id="editSifre" name="Sifre" class="Sifre"
                                                style="flex: 1;" required>
                                        </div>
                                        <div st yle="margin-top: 20px; display: flex; align-items: center;">
                                            <label for="Telefon" style="color: black; width: 120px;"><b>Telefon
                                                    Numarası:</b></label>
                                            <!-- Telefon Inputu -->
                                            <input type="text" id="editTelefon" name="Telefon" maxlength="12"
                                                style="flex: 1;" required>
                                        </div>
                                        <!-- Kaydet Butonu -->
                                        <div style="margin-top: 20px; display: flex; justify-content: center;">
                                            <button type="button" id="editBtKaydet"
                                                style="background-color: #307dc5; color: white; font-size: 16px; border: none; padding: 10px 20px; border-radius: 5px;">Kaydet</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
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
        <script src="js/kullaniciTanimla.js"></script>

</body>

</html>