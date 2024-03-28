$(document).ready(function(){
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