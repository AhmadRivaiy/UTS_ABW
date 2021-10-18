$(document).ready(function (){
    //Load form add
    $("#contentDataPeminjamanAnggota").on("click", "#addButton", function () {
        $.ajax({
            url: './controller/anggota/AddData.php',
            type: 'get',
            success: function (data) {
                $('#contentDataPeminjaman').html(data);
            }
        });
    });

    //Load kembali
    $("#contentDataPeminjaman").on("click", "#kembaliButton", function () {
        var idPeminjaman = $(this).attr("value");
        var tglPinjam = $(this).attr("tglPinjam");
        $.ajax({
            url: './config/service.php?action=kembaliPeminjaman',
            type: 'post',
            data: {
                idPeminjaman: idPeminjaman,
                tglPinjam: tglPinjam
            },
            success: function (data) {
                loadDataPeminjaman();
                loadChart();
            }
        });
    });

    //button batal
    $("#contentDataPeminjaman").on("click", "#cancelButton", function () {
        loadDataPeminjaman();
    });

    //simpan data
    $("#contentTambahPeminjaman").on("submit", "#formAddPeminjaman", function (e) {
        e.preventDefault();
        $.ajax({
            url: './config/service.php?action=savePeminjaman',
            type: 'post',
            data: $(this).serialize(),
            success: function (data) {
                //alert(data);
                loadDataPeminjaman();
                loadChart();
            },
            error: function (xhr, ajaxOptions, thrownError) {
                alert(xhr.status);
                alert(thrownError);
              }
        });
    });

    //hapus data
    $("#contentDataPeminjaman").on("click", "#deleteButton", function () {
        var idPeminjaman = $(this).attr("value");
        $.ajax({
            url: './config/service.php?action=deletePeminjaman',
            type: 'post',
            data: {
                idPeminjaman: idPeminjaman
            },
            success: function (data) {
                alert(data);
                loadDataPeminjaman();
                loadChart();
            }
        });
    });
})