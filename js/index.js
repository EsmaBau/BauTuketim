$(document).ready(function() {
  // DataTable başlatma
  var dataTable = $('#genelVeri2').DataTable({
      searching: true,
      paging: true,
      ordering: true,
      info: true,
      responsive: true,
      columnDefs: [
          { targets: [0,1], width: '30%' },
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
  
  //kaydetme
  $("#btKaydet").click(function () {
    var kampusAdi = $("#kampusAdi").val();
    $.ajax({
        url: "php/kaydet.php",
        type: "post",
        data: { kampus: kampusAdi },
        success: function (gelen) {
            alert(gelen);
            $.dataListele(); // Yeni verileri çekmek için dataListele fonksiyonunu çağırın
            $("#kampusAdi").val(""); // Giriş kutusunu sıfırla
        },
    });
});
    // Verileri listeleme fonksiyonu
    $.dataListele = function () {
      $.ajax({
        url: "php/kampusVeriCek.php",
        dataType: "json",
        success: function (gelen) {
          if (gelen.length > 0) {
            dataTable.clear().draw();
            for (var i = 0; i < gelen.length; i++) {
              dataTable.row
                .add([
                  gelen[i].kampusAd,
                  "<div class='btn-group' role='group'>" +
                    "<button class='btnKampusSil btn btn-primary' style='background-color: #307dc5; color: #ffffff ;' data-id='" +
                    gelen[i].kampusId +
                    "'>Sil</button>" +
                    "<button class='btnKampusDuzenle btn btn-primary' data-id='" +
                    gelen[i].kampusId +
                    "'   data-name='" +
                    gelen[i].kampusAd +
                    "'>Düzenle</button>" +
                    "</div>",
                ])
                .draw();
            }
          }
        },
        error: function (xhr, status, error) {
          alert("Veri çekme hatası: " + xhr.responseText);
        },
      });
    };
    $.dataListele();

// Sil butonuna tıklama olayı
$("#genelVeri2").on("click", ".btnKampusSil", function () {
  var id = $(this).data("id");
  var sonuc = confirm("Silmek istiyor musunuz?");
  if (sonuc) {
    $.ajax({
      url: "php/KampusSil.php",
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

    var _editKampusId;
    $("#genelVeri2").on("click", ".btnKampusDuzenle", function() {
        var rowData = dataTable.row($(this).closest("tr")).data();
    
        $("#editKampusAdi").val(rowData[0]);
        _editKampusId = $(this).attr("data-id");
        
        $("#editModal1").modal("show");
    });
    
    // `editBtKaydet` butonunu dinleme
    $("#editbtKaydet").click(function() {
        var KampusIdx = _editKampusId;
        var KampusAd = $("#editKampusAdi").val();
        
        $.ajax({
            url: "php/kampusDuzenle.php",
            method: "POST",
            data: { 
                KampusId: KampusIdx,
                KampusAd: KampusAd
            },
            success: function(response) {
                alert(response);
                $.dataListele();
                $('#editModal1').modal('hide');
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




