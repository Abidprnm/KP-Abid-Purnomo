// scripts.js

// Fungsi untuk menampilkan loading screen
function showLoadingScreen() {
    $("#loadingScreen").fadeIn("slow");
}

// Fungsi untuk menyembunyikan loading screen
function hideLoadingScreen() {
    $("#loadingScreen").fadeOut("slow");
}

// Fungsi untuk mengganti halaman dengan efek loading
function changePage(url) {
    showLoadingScreen();
    setTimeout(function () {
        $("#content").addClass("hidden"); // Sembunyikan konten saat loading screen muncul
        $("#content").load(url, function () {
            hideLoadingScreen();
            $("#content").removeClass("hidden"); // Tampilkan konten setelah halaman dimuat
        });
    }, 1000); // Simulasi penundaan loading
}

$(document).ready(function () {
    // Inisialisasi loading screen saat halaman pertama dimuat
    hideLoadingScreen();

    // Tangkap klik pada tautan dengan kelas "ajax-link"
    $(document).on("click", ".ajax-link", function (e) {
        e.preventDefault();
        var targetUrl = $(this).attr("href");
        changePage(targetUrl);
    });
});
