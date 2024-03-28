$(document).ready(function() {
    var dataTable = $('#genelVeriYetki').DataTable({
        searching: true,
        paging: true,
        ordering: true,
        info: true,
        responsive: true,
        columnDefs: [
            { targets: [0, 1], width: '100%' },
            { targets: 'no-sort', orderable: false }
        ],
        language: {
            "emptyTable": "No data available in table",
            "search": "Ara:",
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
                "sPrevious": "Önceki"
            }
        },
        dom: 'lBfrtip',
        lengthMenu: [10, 25, 50, 100],
        "buttons": [{
            extend: 'collection',
            className: 'btn btn-more btn-sm',
            text: 'More',
            buttons: [{
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
        }]
    });

    $("#btnYetkiKaydet").click(function() {
        var yetkiAdi = $("#yetkiAdi").val();
        $.ajax({
            url: "php/YetkiKaydet.php",
            type: "post",
            data: { yetki: yetkiAdi },
            success: function(gelen) {
                alert(gelen);
                $.dataListele();
                // Inputları temizle
                $("#yetkiAdi").val('');
            }
        });
    });

    $.dataListele = function() {
        $.ajax({
            url: "php/YetkiVeriCek.php",
            dataType: "json",
            success: function(gelen) {
                if (gelen.length > 0) {
                    dataTable.clear().draw();
                    for (var i = 0; i < gelen.length; i++) {
                        dataTable.row.add([
                            gelen[i].YetkiAd,
                            "<div class='btn-group' role='group'>" +
                            "<button class='btnYetkiSil btn btn-primary' style='background-color: #307dc5; color: #ffffff ;' data-id='" + gelen[i].YetkiId + "'>Sil</button>" +
                            "<button class='btnYetkiDuzenle btn btn-primary' data-id='" + gelen[i].YetkiId + "'>Düzenle</button>" +
                            "</div>"
                        ]).draw();
                    }
                }
            },
            error: function(xhr, status, error) {
                alert("Veri çekme hatası: " + xhr.responseText);
            }
        });
    };
    $.dataListele();

    document.getElementById("yetkiTabloAc").addEventListener("click", function() {
        var div = document.getElementById("acilacakYetkiTablo");
        if (div.style.display === "none") {
            div.style.display = "block";
        } else {
            div.style.display = "none";
        }
    });

    $(document).on('click', '.btnYetkiDuzenle', function() {
        var row = $(this).closest('tr');
        var YetkiId = $(this).data('id');
        $('#duzenleYetkiAdi').val(YetkiAd);
        $('#duzenleId').val(YetkiId);
        $('#duzenleModal').modal('show');
    });

    $('#duzenleKaydet').click(function() {
        var YetkiAd = $('#duzenleYetkiAdi').val();
        var YetkiId = $('#duzenleId').val();

        $.ajax({
            url: 'php/YetkiDuzenle.php',
            method: 'POST',
            data: { YetkiId: YetkiId, YetkiAd: YetkiAd },
            success: function(response) {
                alert(response);
                $('#duzenleModal').modal('hide');
                $.dataListele();
                // Inputları temizle
                $('#duzenleYetkiAdi').val('');
            },
            error: function(xhr, status, error) {
                alert("Düzenleme hatası: " + xhr.responseText);
            }
        });
    });

    $('#accordionSidebar .nav-link').on('click', function() {
        var submenu = $(this).next('.collapse');
        $('#accordionSidebar .collapse').not(submenu).collapse('hide');
        submenu.collapse('toggle');
    });
});

function logout() {
    window.location.href = "giris.html"
}

document.addEventListener("DOMContentLoaded", function() {
    var profileDropdown = document.getElementById("userDropdown");
    var profileMenu = document.querySelector(".dropdown-menu-right");

    profileDropdown.addEventListener("click", function(event) {
        profileMenu.classList.toggle("show");
    });

    document.addEventListener("click", function(event) {
        if (!profileDropdown.contains(event.target)) {
            profileMenu.classList.remove("show");
        }
    });
});
