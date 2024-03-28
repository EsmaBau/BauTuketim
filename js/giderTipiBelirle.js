$(document).ready(function () {
    var dataTable;

    $.kampusListesi = function () {
        $.ajax({
            url: "php/kampusOku.php",
            dataType: "json",
            success: function (gelen) {                               
                var _html = "<option value='0' disabled selected>Lütfen kampüs seçin</option>";
                for (var i = 0; i < gelen[0].length; i++) {
                    _html += "<option value='" + gelen[0][i].kampusId + "'>" + gelen[0][i].kampusAd + "</option>";
                }
                $("#kampusAdi").html(_html);
            }
        })
    }

    $.giderTuruOku = function () {
        $.ajax({
            url: "php/giderVeriCek.php",
            dataType: "json",
            success: function (gelen) {
                if (!dataTable) {
                    dataTable = $('#genelVeri3').DataTable({
                        searching: true,
                        paging: true,
                        buttons: true,
                        paging: true,
                        ordering: true,
                        info: true,
                        responsive: true,
                        autoWidth: false,
                        columnDefs: [
                            { targets: [1], width: '30%'},
                            { targets: 'sort', orderable: false },
                            {
                                targets: -1,
                                render: function(data, type, row, meta) {
                                    return "<div class='btn-group' role='group'><button class='silBtn btn'style='background-color: #307dc5 ; color: white;'  data-id='" + row[0] + "'>Sil</button><button class='duzenleBtn btn btn-primary' data-id='" + row[0] + "'>Düzenle</button></div>";
                                }
                            }
                        ],
                        language: {
                            "emptyTable": "No data available in table",
                            "search": "Ara:" ,
                            "lengthMenu": "Göster _MENU_ ",
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
                                            columns: [0]
                                        }
                                    },
                                    {
                                        extend: 'excel',
                                        className: 'btn btn-dark btn-sm',
                                        text: '<i class="far fa-file-excel"></i> Excel',
                                        exportOptions: {
                                            columns: [0]
                                        }
                                    },
                                    {
                                        extend: 'pdf',
                                        className: 'btn btn-dark btn-sm',
                                        text: '<i class="far fa-file-pdf"></i> Pdf',
                                        exportOptions: {
                                            columns: [0]
                                        }
                                    },
                                    {
                                        extend: 'csv',
                                        className: 'btn btn-dark btn-sm',
                                        text: '<i class="fas fa-file-csv"></i> CSV',
                                        exportOptions: {
                                            columns: [0]
                                        }
                                    },
                                    {
                                        extend: 'print',
                                        className: 'btn btn-dark btn-sm',
                                        text: '<i class="fas fa-print"></i> Print',
                                        exportOptions: {
                                            columns: [0]
                                        }
                                    }
                                ]
                            }
                        ]
                    }); 
                } else {
                    dataTable.clear().draw(); // Tabloyu temizle
                }
                
                for (var i = 0; i < gelen[0].length; i++) {
                    dataTable.row.add([
                        gelen[0][i].kampusAd,
                        gelen[0][i].tip,
                    ]).draw();
                }
            }
        });
    };

    // İlk kez sayfa yüklendiğinde kampusListesi ve giderTuruOku fonksiyonlarını çağır
    $.kampusListesi();
    $.giderTuruOku();

    
// Kaydet butonuna tıklandığında işlemleri gerçekleştir
$("#kaydetBtn").click(function () {
    var _kampusId = $("#kampusAdi").val();
    var _giderTuru = $("#giderTuru").val();

    $.ajax({            
        url: "php/gidertipikaydet.php",
        type: "post",
        data: { kampusId: _kampusId, giderTuru: _giderTuru },
        success: function (response) {
            alert(response);
            $.giderTuruOku(_kampusId);
            // Girdileri sıfırla
            $("#kampusAdi").val('0'); // Varsayılan değeri seç
            $("#giderTuru").val(''); // Boş string ata
        },
        error: function () {
            alert("Hata: Veri eklenemedi.");
        }
    });
});

  
   
   document.getElementById("giderTabloAc").addEventListener("click", function() {
    var div = document.getElementById("acilacakGiderTablo");
    if (div.style.display === "none") {
        div.style.display = "block";
    } else {
        div.style.display = "none";
    }
  });

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

  var _editGiderTipiId;
  $("#genelVeri3").on("click", ".duzenleBtn", function() {
      var rowData = dataTable.row($(this).closest("tr")).data();

 
      $("#editKampusAdi").val(rowData[0]);
      $("#editGiderTuru").val(rowData[1]);
      _editGiderTipiId = $(this).attr("data-id");
      
      $("#editModal5").modal("show");
  });
  
  // duzenle 99
  $("#editbtKaydet").click(function() {
      var GiderTipiIdx = _editGiderTipiId;
      var Tipx = $("#editGiderTuru").val();
      
      $.ajax({
          url: "php/giderTipiDuzenle.php",
          method: "POST",
          data: { 
              GiderTipiId: GiderTipiIdx,
              Tip: Tipx
          },
          success: function(response) {
              alert(response);
              $.dataListele();
              $('#editModal5').modal('hide');
          },
          error: function(xhr, status, error) {
              alert("Düzenleme hatası: " + xhr.responseText);
          }
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

});


 function logout(){
    window.location.href="giris.html"
      
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






