$(document).ready(function () {

    var dataTable = $('#genelVeri1').DataTable({
        searching: true,
        paging: true,
        ordering: true,
        info: true,
        responsive: true,
        columnDefs: [
            { targets: [3], width: '50%' },
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
                            columns: [0,1,2]
                        }
                    },
                    {
                        extend: 'excel',
                        className: 'btn btn-dark btn-sm',
                        text: '<i class="far fa-file-excel"></i> Excel',
                        exportOptions: {
                            columns: [0,1,2]
                        }
                    },
                    {
                        extend: 'pdf',
                        className: 'btn btn-dark btn-sm',
                        text: '<i class="far fa-file-pdf"></i> Pdf',
                        exportOptions: {
                            columns: [0,1,2]
                        }
                    },
                    {
                        extend: 'csv',
                        className: 'btn btn-dark btn-sm',
                        text: '<i class="fas fa-file-csv"></i> CSV',
                        exportOptions: {
                            columns: [0,1,2]
                        }
                    },
                    {
                        extend: 'print',
                        className: 'btn btn-dark btn-sm',
                        text: '<i class="fas fa-print"></i> Print',
                        exportOptions: {
                            columns: [0,1,2]
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
                var _html = "<option value='0' disabled selected>Lütfen kampüs seçin</option>";
                for (var i = 0; i < gelen[0].length; i++) {
                    _html += "<option value='" + gelen[0][i].kampusId + "'>" + gelen[0][i].kampusAd + "</option>";
                }
                $("#kampusId").html(_html);
            }
        })
    }
    $.kampusListesi();


    $.giderTuruListesi = function () {
        var kampusId = $("#kampusId").val();
        $.ajax({
            url: "php/giderTuruOku.php",
            type: "post",
            data: {kampusId: kampusId},
            dataType: "json",
            success: function (gelen) {
                var _html = "<option value='0' disabled selected>Lütfen Gider Tipi seçin</option>";
                for (var i = 0; i < gelen[0].length; i++) {
                    _html += "<option value='" + gelen[0][i].GiderTipiId + "'>" + gelen[0][i].Tip + "</option>";
                }
                $("#giderTuru").html(_html);
            }
        });
    }

    $("#kampusId").change(function(){
        $("#giderTuru").html("");
        $.giderTuruListesi();
    });




    $("#tesisatBtn").click(function () {
        var _giderTuru = $("#giderTuru").val();
        var _tesisatNo = $("#tesisatNo").val();
    
        $.ajax({
            url: "php/tesisatKaydet.php",
            type: "post",
            data: { GiderTipiId: _giderTuru, TesisatNo: _tesisatNo },
            success: function (response) {
                alert(response);
                // Girdileri sıfırla
                $("#kampusId").val(0);
                $("#giderTuru").val(0);
                $("#tesisatNo").val('');
                // Tabloyu güncelle
                $.dataListele(); // Yeni verileri çekmek için dataListele fonksiyonunu çağırın
            },
            error: function (xhr, status, error) {
                alert("Hata: Veri eklenemedi. " + xhr.responseText);
            }
        });
    });

    $.dataListele=function(){
        $.ajax({
            url: "php/veriCek.php", 
            dataType: "json",
            success: function (veriler) {
                if (veriler.length > 0) {
                    dataTable.clear().draw();
                    for (var i = 0; i < veriler.length; i++) {
                        dataTable.row.add([
                            veriler[i].kampusAd,
                            veriler[i].giderTuru,
                            veriler[i].tesisatNo,
                        "<button class='btnTesisatSil btn btn-primary ' style='background-color: #307dc5; color: #ffffff ;' data-id='" + veriler[i].tesisatId + "' >Tesisat Sil</button> <button class='btnTesisatDuzenle btn btn-primary' data-id='" + veriler[i].tesisatId + "'>Düzenle</button>"
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
        $("#genelVeri1").on("click", ".btnTesisatSil", function(){
            var id = $(this).data("id");
            var sonuc = confirm("Silmek istiyor musunuz?");
            if (sonuc) {
                $.ajax({
                url: "php/sil.php",
                method: "POST",
                data: { sil: id },
                success: function(response) {
                    alert(response);
                    alert("Tesisat başarıyla silindi.");
                    $.dataListele();
                },
                error: function(xhr, status, error) {
                    alert("Tesisat silinirken bir hata oluştu: " + xhr.responseText);
                }
            });
        }
     });          
        var  _editTesisatId;
        $("#genelVeri1").on("click", ".btnTesisatDuzenle", function() {
      
         var rowData = dataTable.row($(this).closest("tr")).data();//dataTable nesnesinin .row() yöntemine ileterek, bu satırın DataTables veri  tablosundaki karşılık gelen satır nesnesini alır.

     // Modal içindeki inputları günceller
         $("#editKampusId").val(rowData[0]);
         $("#editGiderTuru").val(rowData[1]);
         $("#editTesisatNox").val(rowData[2]);
         _editTesisatId = $(this).attr("data-id");

        $("#editModal").modal("show");
     });


     $("#editTesisatBtn").on("click", function() {
       var tesisatIdx =  _editTesisatId;
       var tesisatNox =  $("#editTesisatNox").val();
       // AJAX kullanarak güncellenmiş veriyi sunucuya gönderme
         $.ajax({
            url: "php/edit.php",
            method: "POST",
            data: {tesisatId: tesisatIdx, tesisatNo:tesisatNox},
            success: function(response) {
                alert(response);
                // Düzenleme işlemi başarılı ise tabloyu yeniden çiz
                $.dataListele();
                $('#editModal').modal('hide');
            },
            error: function(xhr, status, error) {
                alert("Düzenleme hatası: " + xhr.responseText);
            }
        });
    });

});

    $.genelTablo = function () {
        $.ajax({
            url: "php/genelTabloOku.php",
            dataType: "json",
            success: function (veriler) {
                if (veriler.length > 0) {
                    dataTable.clear().draw();
                    for (var i = 0; i < veriler.length; i++) {
                        dataTable.row.add([
                            veriler[i].kampusAd,
                            veriler[i].giderTuru,
                            veriler[i].tesisatNo,
                            "<button class='btnTesisatSil btn btn-primary' style='background-color: #307dc5; color: #ffffff ;' data-id='" + veriler[i].tesisatId + "' >Tesisat Sil</button> <button class='btnTesisatDuzenle btn btn-primary' data-id='" + veriler[i].tesisatId + "'>Düzenle</button>"
                        ]).draw();
                    }
                }
            },
            error: function (xhr, status, error) {
                alert("Veri çekme hatası: " + xhr.responseText);
            }
        });
    }
    $.genelTablo();
   


  //JavaScript kısmı 
   function logout(){
    window.location.href="giris.html"
      
   }
   document.addEventListener("DOMContentLoaded", function() {
    var profileDropdown = document.getElementById("userDropdown");
    var profileMenu = document.querySelector(".dropdown-menu-right");

    profileDropdown.addEventListener("click", function(event) {
        // Toggle the visibility of the profile menu
        profileMenu.classList.toggle("show");
    });

    // Close the profile menu if the user clicks outside of it
    document.addEventListener("click", function(event) {
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
   
});

