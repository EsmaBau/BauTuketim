$(document).ready(function () {

    var dataTable = $('#elektrikOkumaVeri').DataTable({
        searching: true,
        paging: true,
        ordering: true,
        info: true,
        responsive: true,
        columnDefs: [
            { targets: [7], width: '30%' },
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
                "sPrevious": "Önceki"} // "Ara" metnini burada özelleştiriyoruz
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
                          columns: [0,1,2,3,4,5,6]
                      }
                  },
                  {
                      extend: 'excel',
                      className: 'btn btn-dark btn-sm',
                      text: '<i class="far fa-file-excel"></i> Excel',
                      exportOptions: {
                          columns: [0,1,2,3,4,5,6]
                      }
                  },
                  {
                      extend: 'pdf',
                      className: 'btn btn-dark btn-sm',
                      text: '<i class="far fa-file-pdf"></i> Pdf',
                      exportOptions: {
                          columns: [0,1,2,3,4,5,6]
                      }
                  },
                  {
                      extend: 'csv',
                      className: 'btn btn-dark btn-sm',
                      text: '<i class="fas fa-file-csv"></i> CSV',
                      exportOptions: {
                          columns: [0,1,2,3,4,5,6]
                      }
                  },
                  {
                      extend: 'print',
                      className: 'btn btn-dark btn-sm',
                      text: '<i class="fas fa-print"></i> Print',
                      exportOptions: {
                          columns: [0,1,2,3,4,5,6]
                      }
                  }
              ]
          }
      ]
    });
    
    $.kampusListesi = function () {
        $.ajax({
            url: "php/kampusOku.php",
            dataType: "json",
            success: function (gelen) {
                var _html = "<option value='0' disabled selected>Lütfen Kampüs seçin</option>";
                for (var i = 0; i < gelen[0].length; i++) {
                    _html += "<option value='" + gelen[0][i].kampusId + "'>" + gelen[0][i].kampusAd + "</option>";
                }
                $("#kampusAdi").html(_html);
            }
        });
    }
    $.kampusListesi();

    $.giderTuruListesi = function () {
        var kampusId = $("#kampusAdi").val();
        $.ajax({
            url: "php/giderTuruOku.php",
            type: "post",
            data: {kampusId: kampusId},
            dataType: "json",
            success: function (gelen) {
                var _html = "<option value='0' disabled selected>Lütfen Gider Tipi seçin</option>";
                for (var i = 0; i < gelen[0].length; i++) {
                    // Elektrik kelimesini büyük-küçük harf duyarsız şekilde kontrol edin
                    if (gelen[0][i].Tip.toLowerCase() === "elektrik") {
                        _html += "<option value='" + gelen[0][i].GiderTipiId + "'>" + gelen[0][i].Tip + "</option>";
                    }
                }
                $("#giderTuru").html(_html);
            }
        });
    }

    $("#kampusAdi").change(function(){
        $("#giderTuru").html("");
        $.giderTuruListesi();
    });


    // Kaydet butonuna tıklandığında işlemleri gerçekleştir
    $("#btKaydet").click(function () {
        var kampusAd = $("#kampusAdi").val();
        var tip = $("#giderTuru").val();
        var tesisatNo = $("#tesisatNo").val();    
        var okumaTarihi = $("#okumaTarihi").val();
        var t1 = $("#t1").val();
        var t2 = $("#t2").val();
        var t3 = $("#t3").val();    

        $.ajax({            
            url: "php/elektrikOkumaKaydet.php",
            type: "post",
            data: { kampusAd: kampusAd,tip: tip, tesisatNo: tesisatNo,okumaTarihi: okumaTarihi,t1: t1,t2: t2,t3: t3 },
            success: function (response) {
                alert(response);
                // Girdileri sıfırla
                $("#kampusAdi").val('');
                $("#giderTuru").val('');
                $("#tesisatNo").val('');
                $("#okumaTarihi").val('');
                $("#t1").val('');
                $("#t2").val('');
                $("#t3").val('');
            },
            error: function () {
                alert("Hata: Veri eklenemedi.");
            }
        });
    });
   
    $.sayacListesi = function () {
        var giderTuruId = $("#giderTuru").val();
        var kampusId = $("#kampusAdi").val();
        if (giderTuruId && kampusId) {
            $.ajax({
                url: "php/sayacOku.php",
                type: "post",
                data: {kampusId: kampusId, giderTuruId: giderTuruId}, // Değişken isimlerini uygun hale getir
                dataType: "json",
                success: function (gelen) {
                    var _html = "<option value='0' disabled selected>Sayaç Numarası</option>";
                    for (var i = 0; i < gelen.length; i++) {
                        _html += "<option value='" + gelen[i].TesisatId + "'>" + gelen[i].TesisatNo + "</option>";
                    }
                    $("#tesisatNo").html(_html);
                }
            });
        }
    }
    
    $("#giderTuru").change(function () {
        $("#tesisatNo").html(""); // Sayaç numarası alanını temizle
        $.sayacListesi();
    });

        // Verileri listeleme fonksiyonu
        $.dataListele = function() {
            $.ajax({
                url: "php/elektrikOkumaVeriCek.php", 
                dataType: "json",
                success: function (gelen) {
                    if (gelen.length > 0) {
                        dataTable.clear().draw();
                        for (var i = 0; i < gelen.length; i++) {
                           
                            dataTable.row.add([                            
                                gelen[i].kampusAd,
                                gelen[i].tip, 
                                gelen[i].tesisatNo, 
                                gelen[i].okumaTarihi,
                                gelen[i].t1,
                                gelen[i].t2,
                                gelen[i].t3,
                                '<div class="btn-group" role="group">' +
                                '<button class="BtneOkumaSil btn" style="background-color: #307dc5; color: white;" id="' + gelen[i].elektrikOkumaId + '">Sil</button>' +
                                '<button class="BtneOkumaDuzenle btn btn-primary" id="' + gelen[i].elektrikOkumaId + '">Düzenle</button>' +
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

       /* var yetkiId = 3; // Bu değer sunucudan veya başka bir kaynaktan alınabilir

        // YetkiId 3 olmayan kullanıcılar için bazı menüleri gizle
        if (yetkiId !== 3) {
            // Tanımlamalar menüsünü gizle
            $('#collapseTanımlamalar').parent('.nav-item').hide();
            // Yetki Tanımlama/Verme menüsünü gizle
            $('#collapseYetkiler').parent('.nav-item').hide();
        }  $('#collapseYetkiler').parent('.nav-item').hide();/*/
        



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


  
    // Collapse işlevini etkinleştir
     $('#accordionSidebar .nav-link').on('click', function(){
        // Tıklanan menü öğesinin alt menüsünü bul
        var submenu = $(this).next('.collapse');
       
         // Tüm alt menüleri kapalı olarak ayarla
       $('#accordionSidebar .collapse').not(submenu).collapse('hide');
       
        // Tıklanan menü öğesinin alt menüsünü aç veya kapat
        submenu.collapse('toggle');
   });
