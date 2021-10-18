$(document).ready(function (){
    //Load form add
    $("#contentDataAnggotaAnggota").on("click", "#addButton", function () {
        $.ajax({
            url: './controller/anggota/AddData.php',
            type: 'get',
            success: function (data) {
                $('#contentDataAnggota').html(data);
            }
        });
    });

    //Load form edit dengan parameter id_anggota
    $("#contentDataAnggota").on("click", "#editButton", function () {
        var idAnggota = $(this).attr("value");
        $.ajax({
            url: './controller/anggota/EditData.php',
            type: 'get',
            data: {
                idAnggota: idAnggota
            },
            success: function (data) {
                $('#contentDataAnggota').html(data);
            }
        });
    });

    //button batal
    $("#contentDataAnggota").on("click", "#cancelButton", function () {
        loadDataAnggota();
    	loadTambahAnggota();
    });

    //simpan data anggota
    $("#contentTambahAnggota").on("submit", "#formAddAnggota", function (e) {
        e.preventDefault();
        $.ajax({
            url: './config/service.php?action=saveAnggota',
            type: 'post',
            data: $(this).serialize(),
            success: function (data) {
                //alert(data);
                loadDataAnggota();
                loadTambahPeminjaman();
    			loadTambahAnggota();
            },
            error: function (xhr, ajaxOptions, thrownError) {
                alert(xhr.status);
                alert(thrownError);
              }
        });
    });

    //edit data anggota
    $("#contentDataAnggota").on("submit", "#formEditAnggota", function (e) {
        e.preventDefault();
        $.ajax({
            url: './config/service.php?action=editAnggota',
            type: 'post',
            data: $(this).serialize(),
            success: function (data) {
                //alert(data);
                loadDataAnggota();
                loadTambahPeminjaman();
    			loadTambahAnggota();
            }
        });
    });

    //hapus data anggota berdasarkan id_anggota
    $("#contentDataAnggota").on("click", "#deleteButton", function () {
        var idAnggota = $(this).attr("value");
        $.ajax({
            url: './config/service.php?action=deleteAnggota',
            type: 'post',
            data: {
                idAnggota: idAnggota
            },
            success: function (data) {
                alert(data);
                loadDataAnggota();
                loadTambahPeminjaman();
    			loadTambahAnggota();
    			loadChart();
            }
        });
    });
})