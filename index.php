<!DOCTYPE html>
<html lang="tr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BAU/Kampüs Tanımlama</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
    <link href="css/index.css" rel="stylesheet">
    <!-- DataTables CSS -->
    <link href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css" rel="stylesheet">
</head>

<body id="page-top">
    <!-- Page Wrapper -->
    <div id="wrapper">
        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
                <div class="sidebar-brand-icon rotate-n-15">
                </div>
                <div class="sidebar-brand-text mx-3">BAU Tüketim <sup>.</sup></div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <?php if ($_SESSION['yetkiId'] == 3) { ?>

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
                            <a class="collapse-item" href="index.html">Kampüs Tanımlama</a>
                            <a class="collapse-item" href="giderTipiBelirle.html">Gider Tipi Tanımlama</a>
                            <a class="collapse-item" href="tesisatTanimlama.html">Tesisat Tanımlama</a>
                            <a class="collapse-item" href="kullaniciTanimlama.html">Kullanıcı Tanımlama</a>
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
                            <a class="collapse-item" href="Yetkiler.html">Yetki Tanımlama</a>
                            <a class="collapse-item" href="yetkiVerme.html">Yetki Verme</a>
                        </div>
                    </div>
                </li>
                <!-- Divider -->
                <hr class="sidebar-divider">

            <?php } ?>

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
                        <a class="collapse-item" href="elektrikOkuma.html">Elektrik Okuma</a>
                        <a class="collapse-item" href="suOkuma.html">Su Okuma</a>
                        <a class="collapse-item" href="dogalgazOkuma.html">Doğalgaz Okuma</a>
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
                                <img class="img-profile rounded-circle" src="img/undraw_profile.svg">
                            </a>
                        </li>
                    </ul>
                </nav>
                <!-- Begin Page Content -->
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-4">
                            <!-- Page Heading -->
                            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                                <h1 class="h3 mb-0 text-gray-800" style="font-size: 20px; font-weight: bold;">Kampüs
                                    Ekle</h1>
                            </div>
                            <!-- Ana Div -->
                            <div style="background-color: white; padding: 20px; border-radius: 10px; width: 400px;">
                                <!-- Kampüs Adı Girişi -->
                                <div style="margin-top: 20px;">
                                    <label for="kampusAdi" style="color: black;"><b>Kampüs Adı</b></label>
                                    <br>
                                    <input type="text" id="kampusAdi" name="kampusAdi" class="kampusAdi"
                                        style="width: 300px;" required>
                                </div>
                                <!-- Kaydet Butonu -->
                                <div style="margin-top: 20px;">
                                    <button type="button" id="btKaydet"
                                        style="background-color: #307dc5; color: white; font-size: 16px; border: none; padding: 10px 20px; border-radius: 5px;">Kaydet</button>
                                </div>
                            </div>
                        </div>

                        <div class=" align-items-center justify-content-between">
                            <h1 class="h3 text-gray-800" style="font-size: 19px; font-weight: bold;">Kampüsler</h1>
                        </div>
                        <table id="genelVeri2" class="genelVeri2" style="width:100%">
                            <thead>
                                <tr>
                                    <th style="color: black;">Kampüs Adı</th>
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

    </div>
    <!-- Modal -->
    <div class="modal fade" id="editModal1" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editModalLabel">Veri Düzenleme</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!-- Form alanları buraya eklenecek -->
                    <div class="container-fluid">
                        <div style="background-color: white; padding: 20px; border-radius: 10px; width: 400px;">
                            <!-- Kampüs Adı Girişi -->
                            <form id="kampusForm">
                                <!-- Kampüs Adı Girişi -->
                                <div style="margin-top: 20px;">
                                    <label for="kampusAdi" style="color: black;"><b>Kampüs Adı</b></label>
                                    <br>
                                    <!-- Kampüs Seçim Inputu -->
                                    <input type="text" id="editKampusAdi" name="kampusAd" class="kampusAdi"
                                        style="width: 300px;" required>
                                </div>
                                <!-- Kaydet Butonu -->
                                <div style="margin-top: 20px;">
                                    <button type="button" id="editbtKaydet"
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
    <!-- Page level custom scripts -->
    <script src="js/index.js"></script>
</body>

</html>