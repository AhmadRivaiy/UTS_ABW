$(document).ready(function () {
    //Load form edit
    $("#contentData").on("click", "#EditButton", function () {
        var kodeBuku = $(this).attr("value");
        $.ajax({
            url: './controller/buku/EditData.php',
            type: 'get',
            data: {
                kodeBuku: kodeBuku
            },
            success: function (data) {
                $('#contentData').html(data);
            }
        });
    });

    //button batal
    $("#contentData").on("click", "#cancelButton", function () {
        loadDataBuku();
    	loadTambahBuku();
    });

    //simpan data buku
    $("#contentTambahBuku").on("submit", "#formAdd", function (e) {
        e.preventDefault();
        $.ajax({
            url: './config/service.php?action=save',
            type: 'post',
            data: $(this).serialize(),
            success: function (data) {
                //alert(data);
                loadDataBuku();
                loadDataPeminjaman();
                loadTambahPeminjaman();
    			loadTambahBuku();
            }
        });
    });

    //edit data buku
    $("#contentData").on("submit", "#formEdit", function (e) {
        e.preventDefault();
        $.ajax({
            url: './config/service.php?action=edit',
            type: 'post',
            data: $(this).serialize(),
            success: function (data) {
                //alert(data);
                loadDataBuku();
                loadDataPeminjaman();
                loadTambahPeminjaman();
    			loadTambahBuku();
            }
        });
    });

    //hapus data buku berdasarkan kode_buku
    $("#contentData").on("click", "#DeleteButton", function () {
        var kodeBuku = $(this).attr("value");
        $.ajax({
            url: './config/service.php?action=delete',
            type: 'post',
            data: {
                kodeBuku: kodeBuku
            },
            success: function (data) {
                alert(data);
                loadDataBuku();
                loadTambahPeminjaman();
    			loadTambahBuku();
    			loadChart();
            }
        });
    });
})