// ambil elemen2 yang dibutuhkan
//var keyword = document.getElementById('keyword');
var tombolCari = document.getElementById('carisiswa');
var container = document.getElementById('container-ajax');

// tambahkan event ketika keyword ditulis
tombolCari.addEventListener('mouseover', function () {
    alert('berhasil');
    // // buat object ajax
    // var xhr = new XMLHttpRequest();

    // // cek kesiapan ajax
    // xhr.onreadystatechange = function () {
    //     if (xhr.readyState == 4 && xhr.status == 200) {
    //         container.innerHTML = xhr.responseText;
    //     }
    // }

    // // eksekusi ajax
    // xhr.open('GET', 'view/guru/v_daftarNilai.php');
    // xhr.send();

});