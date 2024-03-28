    $(document).ready(function() {
        var _editKullaniciId = 0;
        var dataTable = $('#kullaniciVeri').DataTable({
            searching: true,
            paging: true,
            ordering: true,
            info: true,
            responsive: true,
            columnDefs: [
                { targets: [6], width: '50%' },
                { targets: 'no-sort', orderable: false }
            ],
            language: {
                "emptyTable": "No data available in table",
                "search": "Ara:",
                "lengthMenu": "Göster _MENU_ " ,
                "sEmptyTable": "Tabloda herhangi bir veri mevcut değil",
                "sInfo": "Toplam _TOTAL_ kayıttan _START_ - _END_ arası gösteriliyor",
                "sInfoEmpty": "Kayıt yok",
                "sInfoFiltered": "(_MAX_ kayıt içerisinden bulunan)",                          
                "sZeroRecords": "Eşleşen kayıt bulunamadı",
                "oPaginate": {
                    "sFirst": "İlk",
                    "sLast": "Son",
                    "sNext": "Sonraki",
                    "sPrevious": "Önceki"}
            },
            dom: 'lBfrtip', // l harfi lengthMenu özelliğini aktive eder
            lengthMenu: [10, 25, 50, 100], // "Show entries" seçeneklerini belirtin
            "buttons": [
                // Daha fazla butonu "more" adlı bir butona sığdırma
                {
                    extend: 'collection',
                    className: 'btn btn-more btn-sm',
                    text: 'More',
                    buttons: [
                        {
                            extend: 'copy',
                            className: 'btn btn-dark btn-sm',
                            text: '<i class="far fa-copy"></i> Copy',
                            exportOptions: {
                                columns: [,1,2,3,4,5]
                            }
                        },
                        {
                            extend: 'excel',
                            className: 'btn btn-dark btn-sm',
                            text: '<i class="far fa-file-excel"></i> Excel',
                            exportOptions: {
                                columns: [0,1,2,3,4,5]
                            }
                        },
                        {
                            extend: 'pdf',
                            className: 'btn btn-dark btn-sm',
                            text: '<i class="far fa-file-pdf"></i> Pdf',
                            exportOptions: {
                                columns: [0,1,2,3,4,5]
                            }
                        },
                        {
                            extend: 'csv',
                            className: 'btn btn-dark btn-sm',
                            text: '<i class="fas fa-file-csv"></i> CSV',
                            exportOptions: {
                                columns: [0,1,2,3,4,5]
                            }
                        },
                        {
                            extend: 'print',
                            className: 'btn btn-dark btn-sm',
                            text: '<i class="fas fa-print"></i> Print',
                            exportOptions: {
                                columns: [0,1,2,3,4,5]
                            }
                        }
                    ]
                }
            ]
        
        });
        $.dataListele = function() {
            $.ajax({
                url: "php/kullaniciVeriCek.php", 
                dataType: "json",
                success: function (gelen) {
                    if (gelen.length > 0) {
                        dataTable.clear().draw();
                        for (var i = 0; i < gelen.length; i++) {      
                            dataTable.row.add([                            
                                gelen[i].kullaniciAd, 
                                gelen[i].kullaniciSoyad,
                                gelen[i].yetkiAd, 
                                gelen[i].email, 
                                gelen[i].sifre,
                                gelen[i].kullaniciTelefon,
                                '<div class="btn-group" role="group">' +
                                '<button class="BtnKullaniciSil btn" style="background-color: #307dc5; color: white;" id="' + gelen[i].kullaniciId + '">Sil</button>' +
                                '<button class="BtnKullaniciDuzenle btn btn-primary" id="' + gelen[i].kullaniciId + '">Düzenle</button>' +
                                '</div>'           
                            ]).draw();
                        }
                    }
                },
                error: function (xhr, status, error) {
                    alert("Veri çekme hatası: " + xhr.responseText);
                }
            });
        };             
        $.dataListele();  

    // Yetki listesini getirme fonksiyonu
    function YetkiListesi() {
        $.ajax({
            url: "php/yetkiOku.php",
            dataType: "json",
            success: function (gelen) {
                var _html = "";
                for (var i = 0; i < gelen.length; i++) {
                    var yetki = gelen[i];
                    // Her bir yetki için checkbox oluştur
                    _html += "<div class='form-check'><input type='checkbox' class='form-check-input chkYetki' value='" + yetki.YetkiId + "' id='chkYetki" + yetki.YetkiId + "'><label class='form-check-label' for='chkYetki" + yetki.YetkiId + "'>" + yetki.YetkiAd + " - " + yetki.KampusAd + "</label></div>";
                }
                $("#editYetki").html(_html);
            },
            error: function(xhr, status, error) {
                console.error("Yetki verileri alınamadı:", error);
            }
        });
    } 
    YetkiListesi();

        
        // Kaydet butonuna tıklandığında işlemleri gerçekleştir
    // Kaydet butonuna tıklandığında işlemleri gerçekleştir
$("#kullaniciKaydet").click(function () {
    // Kullanıcı bilgilerini al
    var _KullaniciAd = $("#KullaniciAd").val();
    var _KullaniciSoyad = $("#KullaniciSoyad").val();
    var _Email = $("#Email").val();
    var _Sifre = $("#Sifre").val();
    var _Telefon = $("#Telefon").val();
    
    // Seçili yetkileri al
    var selectedYetkiId = [];
    $(".chkYetki:checked").each(function() {
        selectedYetkiId.push($(this).val());
    });
    
    // Seçili yetkileri JSON formatında bir string'e dönüştür
    var selectedYetkiIdJSON = JSON.stringify(selectedYetkiId);
    
    // Verileri php/kullaniciKaydet.php'ye gönder
    $.ajax({            
        url: "php/kullaniciKaydet.php",
        type: "post",
        data: {
            KullaniciAd: _KullaniciAd,
            KullaniciSoyad: _KullaniciSoyad,
            YetkiId: selectedYetkiIdJSON, // Seçilen yetki ID'lerini JSON formatında gönder
            Email: _Email,
            Sifre: _Sifre,
            Telefon: _Telefon
        },
        success: function (response) {
            alert(response);    
            // Veri gönderildikten sonra tüm input alanlarını temizle
            $("#KullaniciAd").val('');
            $("#KullaniciSoyad").val('');
            $(".chkYetki").prop('checked', false); // Checkbox'ları temizle
            $("#Email").val('');
            $("#Sifre").val('');
            $("#Telefon").val('');
            $.dataListele(); // Tabloyu güncelle
        },
        error: function () {
            alert("Hata: Veri eklenemedi.");
        }
    });
});

        

        
        var xxx=10;
        $("#kullaniciVeri").on("click", ".BtnKullaniciDuzenle", function() {
            var rowData = dataTable.row($(this).closest("tr")).data();
        
            $("#editKullaniciAd").val(rowData[0]);
            $("#editKullaniciSoyad").val(rowData[1]);
            $("#editYetki").val(rowData[2]);
            $("#editEmail").val(rowData[3]);
            $("#editSifre").val(rowData[4]); 
            $("#editTelefon").val(rowData[5]);
            xxx = $(this).attr("id");
            alert("Kullanıcı ID1 : " + xxx);
            $("#editModal2").modal("show");
        });
        
        // `editBtKaydet` butonunu dinleme
        $("#editBtKaydet").click(function() {
            var KullaniciId = xxx;
            alert("Kullanıcı ID2: " + xxx);
            var KullaniciAd = $("#editKullaniciAd").val();
            var KullaniciSoyad = $("#editKullaniciSoyad").val();
            var Email = $("#editEmail").val();
            var Sifre = $("#editSifre").val();
            var YetkiId = $("#editYetki").val();
            var KullaniciTelefon = $("#editTelefon").val();
            
            alert("Kullanıcı ID: " + xxx + " Yetki: " + YetkiId);

            $.ajax({
                url: "php/kullaniciDuzenle.php",
                method: "POST",
                data: { 
                    KullaniciId: KullaniciId,
                    KullaniciAd: KullaniciAd,
                    YetkiId: YetkiId,
                    KullaniciSoyad: KullaniciSoyad,
                    Email: Email,
                    Sifre: Sifre,
                    KullaniciTelefon: KullaniciTelefon
                },
                success: function(response) {
                    alert(response);
                    $.dataListele();
                    $('#editModal2').modal('hide');
                },
                error: function(xhr, status, error) {
                    alert("Düzenleme hatası: " + xhr.responseText);
                }
            });
        });
        // Sil butonuna tıklama olayı
        $("#kullaniciVeri").on("click", ".BtnKullaniciSil", function () {
            var id = $(this).data("id");
            var sonuc = confirm("Silmek istiyor musunuz?");
            if (sonuc) {
            $.ajax({
                url: "php/KullaniciSil.php",
                method: "POST",
                data: { sil: id },
                success: function (response) {
                alert(response);
                alert("Kampüs başarıyla silindi.");
                $.dataListele();
                },
                error: function (xhr, status, error) {
                alert("Kampüs silinirken bir hata oluştu: " + xhr.responseText);
                },
            });
            }
        });

        
        var _editKullaniciId;
        $("#kullaniciVeri").on("click", ".BtnKullaniciDuzenle", function() {
            var rowData = dataTable.row($(this).closest("tr")).data();
        
            $("#editKullaniciAd").val(rowData[0]);
            $("#editKullaniciSoyad").val(rowData[1]);
            //   $("#editYetki").val(rowData[2]);
            $("#editEmail").val(rowData[3]);
            $("#editSifre").val(rowData[4]); 
            $("#editTelefon").val(rowData[5]);
            _editKullaniciId = $(this).attr("data-id");
            //alert("Form Id: " + $(this).attr("data-id"));
            $("#editModal2").modal("show");
        });
        
        // `editBtKaydet` butonunu dinleme
        $("#editBtKaydet").click(function() {
            var kullaniciIdx = _editKullaniciId;
            
            var KullaniciAd = $("#editKullaniciAd").val();
            var KullaniciSoyad = $("#editKullaniciSoyad").val();
            //   var YetkiId = $("#editYetki").val();
            var Email = $("#editEmail").val();
            var Sifre = $("#editSifre").val();
            var KullaniciTelefon = $("#editTelefon").val();
            
            $.ajax({
                url: "php/kullaniciDuzenle.php",
                method: "POST",
                data: { 
                    KullaniciId: kullaniciIdx,
                    KullaniciAd: KullaniciAd,
                    KullaniciSoyad: KullaniciSoyad,
                    YetkiId:YetkiId,
                    Email: Email,
                    Sifre: Sifre,
                    KullaniciTelefon: KullaniciTelefon
                },
                success: function(response) {
                    alert(response);
                    $.dataListele();
                    $('#editModal2').modal('hide');
                },
                error: function(xhr, status, error) {
                    alert("Düzenleme hatası: " + xhr.responseText);
                }
            });
        });
        });



        // Collapse işlevini etkinleştir
        $('#accordionSidebar .nav-link').on('click', function(){
            // Tıklanan menü öğesinin alt menüsünü bul
            var submenu = $(this).next('.collapse');   
            // Tüm alt menüleri kapalı olarak ayarla
            $('#accordionSidebar .collapse').not(submenu).collapse('hide');   
            // Tıklanan menü öğesinin alt menüsünü aç veya kapat
            submenu.collapse('toggle');
        });


    function logout(){
        window.location.href="giris.html";   
    }

    // Profil dropdown menüsünün gösterilmesi ve gizlenmesi
    var profileDropdown = document.getElementById("userDropdown");
    var profileMenu = document.querySelector(".dropdown-menu-right");

    profileDropdown.addEventListener("click", function (event) {
        profileMenu.classList.toggle("show");
    });

    document.addEventListener("click", function (event) {
        if (!profileDropdown.contains(event.target)) {
            profileMenu.classList.remove("show");
        }
    });
