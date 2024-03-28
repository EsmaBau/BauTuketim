$(document).ready(function() {
    // Kampüs listeleme
    $.kampusListesi = function () {
        $.ajax({
            url: "php/kampusOku.php",
            dataType: "json",
            success: function (gelen) {                               
                var _html = "";
                for (var i = 0; i < gelen[0].length; i++) {
                    _html += "<div class='checkbox-container' style='margin-bottom: 10px;'>";
                    _html += "<input type='checkbox' name='kampusAdi[]' value='" + gelen[0][i].kampusId + "' id='kampus" + gelen[0][i].kampusId + "' class='custom-checkbox'>";
                    _html += "<label for='kampus" + gelen[0][i].kampusId + "' class='checkbox-label'>" + gelen[0][i].kampusAd + "</label></div>";
                }
                $("#kampusAdi").html(_html);
            },
            error: function (xhr, status, error) {
                alert("Kampüsler alınırken bir hata oluştu: " + xhr.responseText);
            }
        });
    }
    $.kampusListesi();

    // Yetki listeleme
    $.YetkiListesi = function () {
        $.ajax({
            url: "php/yetkilerOku.php",
            dataType: "json",
            success: function (gelen) {
                var _html = "<option value='0' disabled selected>Lütfen yetki seçin</option>";
                for (var i = 0; i < gelen[0].length; i++) {
                    _html += "<option value='" + gelen[0][i].YetkiId + "'>" + gelen[0][i].YetkiAd + "</option>";
                }
                $("#yetkiAdi").html(_html);
            },
            error: function (xhr, status, error) {
                alert("Yetkiler alınırken bir hata oluştu: " + xhr.responseText);
            }
        })
    } 
    $.YetkiListesi();

    $("#btnYetkilendir").click(function () {
        // Seçilen yetki bilgisini al
        var selectedYetki = $("#yetkiAdi").val();
        
        // İşaretlenen checkbox kutularının değerlerini al
        var selectedKampus = [];
        $("input[name='kampusAdi[]']:checked").each(function () {
            selectedKampus.push($(this).val());
        });
    
        // Verilerin dolu olup olmadığını kontrol et
        if (selectedKampus.length > 0 && selectedYetki) {
            // AJAX isteğiyle mevcut yetki-kampüs atamalarını ve kampüs adlarını al
            $.ajax({
                url: "php/yetkiOku.php",
                dataType: "json",
                success: function (yetkiler) {
                    // Seçilen kampüslerde mevcut yetkiyi kontrol et
                    var conflict = false;
                    var kampusWithConflict = [];
                    for (var i = 0; i < selectedKampus.length; i++) {
                        var kampusId = selectedKampus[i];
                        // Seçilen kampüslerdeki mevcut atamaları kontrol et
                        for (var j = 0; j < yetkiler.length; j++) {
                            if (yetkiler[j].KampusId === kampusId && yetkiler[j].YetkiId === selectedYetki) {
                                conflict = true;
                                kampusWithConflict.push(yetkiler[j].KampusAd);
                            }
                        }
                    }
    
                    // Eğer çakışma varsa uyarı ver
                    if (conflict) {
                        var kampusListString = kampusWithConflict.join(", ");
                        alert("Seçtiğiniz yetki zaten şu kampüslerde tanımlı: " + kampusListString);
                    } else {
                        // AJAX isteğiyle verileri kampusYetkisKaydet.php'ye gönder
                        $.ajax({
                            url: "php/kampusYetkisKaydet.php",
                            type: "POST",
                            data: { yetkiAdi: selectedYetki, kampusAdi: selectedKampus },
                            success: function (response) {
                                // Başarılı cevap alındığında mesajı göster
                                alert(response);
                                // Input alanlarını temizle
                                $("#yetkiAdi").val('0');
                                $("input[name='kampusAdi[]']").prop('checked', false);
                            },
                            error: function (xhr, status, error) {
                                // Hata durumunda detaylı hata mesajını göster
                                alert("Yetkilendirme sırasında bir hata oluştu: " + xhr.responseText);
                            }
                        });
                    }
                },
                error: function (xhr, status, error) {
                    alert("Mevcut atamalar alınırken bir hata oluştu: " + xhr.responseText);
                }
            });
        } else {
            // Eğer seçim yapılmamışsa uyarı ver
            alert("Lütfen kampüs ve yetki seçin.");
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

    function logout(){
        window.location.href="giris.html";
    }
});
