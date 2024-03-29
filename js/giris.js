$(document).ready(function () {
    // Form submit olduğunda çağrılacak fonksiyon
    function submitForm() {
        // Formdan kullanıcı adı ve şifre değerlerini al
        var email = $('#email').val();
        var sifre = $('#sifre').val();

        $.ajax({
            type: 'POST',
            url: 'php/giris.php',
            dataType: 'json',
            data: { email: email, sifre: sifre },
            success: function (response) {
                if (response.status === 'success') {
                    // Giriş başarılı ise yapılacak işlemler buraya yazılır
                    var yetkiId = response.YetkiId;

                    // yetkiId'yi sonraki işlemlerde kullanmak için frontend tarafında sakla
                    localStorage.setItem('yetkiId', yetkiId);
                    console.log('Giriş başarılı!' + ' YetkiId: ' + yetkiId);

                    var testYetkiId = localStorage.getItem('yetkiId');
                    console.log('localStorage\'dan YetkiId: ' + testYetkiId);

                    console.log('redirecting...');

                    if (yetkiId === 3) {
                        // YetkiId 3 ise, kullanıcıyı index.php sayfasına yönlendir
                        window.location.href = 'index.hmtl';
                    } else {
                        // YetkiId 3 değilse, kullanıcıyı elektrikOkuma.php sayfasına yönlendir
                        window.location.href = 'elektrikOkuma.html';
                    }
                } else {
                    // Giriş başarısız ise uygun mesajı göster
                    console.log('Giriş başarısız!');
                    // Hata mesajını alert ile göster
                    alert(response.message);
                }
            },
            error: function () {
                console.error('Giriş işlemi sırasında bir hata oluştu.');
            }
        });
    }

    // Form submit olduğunda submitForm fonksiyonunu çağır
    $('#girisBtn').click(function (event) {
        event.preventDefault(); // Formun normal submit işlemini engellemek için
        submitForm(); // Formu AJAX ile gönder
    });
});
