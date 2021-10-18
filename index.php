<?php include "./config/config.php"; ?>
<!DOCTYPE html>
<html>

<head>
    <title>CRUD AJAX | 3120510901</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <!-- HigthChart -->
    <script src="https://code.highcharts.com/highcharts.js"></script>

    <!-- Font Awesome -->
    <script src="https://kit.fontawesome.com/75d9b9716f.js" crossorigin="anonymous"></script>

    <!-- Custom CSS -->
    <link rel="stylesheet" type="text/css" href="./assets/css/index.css" />

</head>

<body class="container">
    <section id="one">
		<div>
    		<h2>PJJ PENS UTS AJAX</h2>
		</div>
		<div>
    		<h2>Workshop Aplikasi Berbasis Web</h2>
		</div>
		<div>
    		<h5>3120510901 | Ahmad Rivaiy</h5>
		</div>
    <div style="height: 50px;"></div>
    	<div>
        	<div class="arrow bounce">
  				<a class="fa fa-arrow-down fa-2x" href="#two"></a>
			</div>
<!--     		<a href="#two">
        		<div class="arrow-container animated fadeInDown">
  					<div class="arrow-2">
   	 					<i class="fa fa-angle-down"></i>
  					</div>
  					<div class="arrow-1 animated hinge infinite zoomIn"></div>
				</div>
        	</a> -->
    	</div>
    </section>

    <section id="two">
        <div>
            <br />
            <div class="text-center">
                <h2>Perpustakaan</h2>
            </div>
            <div class="layout">
                <input name="nav" type="radio" class="nav home-radio" id="home" checked="checked" />
                <div class="page home-page">
                    <div class="page-contents">
                        <h1>Buku</h1>
                        <hr />
                        <div id="contentData"></div>
                    </div>
                </div>
                <label class="label-custom nav" for="home">
                    <span>
                        <i class="fas fa-book"></i>
                        Buku
                    </span>
                </label>

                <input name="nav" type="radio" class="about-radio" id="about" />
                <div class="page about-page">
                    <div class="page-contents">
                        <br />
                        <h1>Anggota</h1>
                        <hr />
                        <div id="contentDataAnggota"></div>
                    </div>
                </div>
                <label class="label-custom nav" for="about">
                    <span>
                        <i class="fas fa-users"></i>
                        Anggota
                    </span>
                </label>

                <input name="nav" type="radio" class="contact-radio" id="contact" />
                <div class="page contact-page">
                    <div class="page-contents">
                        <br />
                        <h1>Transaksi Peminjaman</h1>
                        <hr />
                        <div id="contentDataPeminjaman"></div>
                    </div>
                </div>
                <label class="label-custom nav" for="contact">
                    <span>
                        <i class="fab fa-buffer"></i>
                        Peminjaman
                    </span>
                </label>
            </div>
            <div class="mt-4">
                <div class="row">
                    <div class="col col-lg-12 col-sm-12">
                        <div id="char-pie" style="width:100%; height:300px;"></div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <!-- Modal Tambah Buku -->
    <div id="contentTambahBuku">

    </div>

    <!-- Modal Tambah Anggota -->
    <div id="contentTambahAnggota">
        
    </div>

    <!-- Modal Tambah Peminjaman -->
    <div id="contentTambahPeminjaman">

    </div>

    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>
    <script src="./assets/js/SistemBuku.js"></script>
    <script src="./assets/js/SistemAnggota.js"></script>
    <script src="./assets/js/SistemPeminjaman.js"></script>
    <script type="text/javascript">
    loadDataBuku();
    loadDataAnggota();
    loadDataPeminjaman();
    loadTambahPeminjaman()
    loadTambahBuku();
    loadTambahAnggota();
    loadChart();
    
    function addBukuBtn() {
    	document.getElementById("formAdd").reset();
    }
    
    function addAnggotaBtn() {
    	document.getElementById("formAddAnggota").reset();
    }
    
    function addPeminjamanBtn() {
    	document.getElementById("formAddPeminjaman").reset();
    }


    function loadDataBuku() {
        $.ajax({
            url: './controller/buku/GetData.php',
            type: 'get',
            success: function(data) {
                $('#contentData').html(data);
            }
        });
    }

    function loadDataAnggota() {
        $.ajax({
            url: './controller/anggota/GetData.php',
            type: 'get',
            success: function(data) {
                $('#contentDataAnggota').html(data);
            }
        });
    }

    function loadDataPeminjaman() {
        $.ajax({
            url: './controller/peminjaman/GetData.php',
            type: 'get',
            success: function(data) {
                $('#contentDataPeminjaman').html(data);
            }
        });
    }
    
    function loadTambahBuku() {
        $.ajax({
            url: './controller/buku/AddData.php',
            type: 'get',
            success: function(data) {
                $('#contentTambahBuku').html(data);
            }
        });
    }
    
    function loadTambahAnggota() {
        $.ajax({
            url: './controller/anggota/AddData.php',
            type: 'get',
            success: function(data) {
                $('#contentTambahAnggota').html(data);
            }
        });
    }

    function loadTambahPeminjaman() {
        $.ajax({
            url: './controller/peminjaman/AddData.php',
            type: 'get',
            success: function(data) {
                $('#contentTambahPeminjaman').html(data);
            }
        });
    }

    function loadChart() {
        $.ajax({
            url: './config/service.php?action=getChart',
            type: 'get',
            success: function(dataChart) {
                Highcharts.chart('char-pie', {
                        chart: {
                            plotBackgroundColor: null,
                            plotBorderWidth: null,
                            plotShadow: false,
                            type: 'pie'
                        },
                        title: {
                            text: 'Report Peminjaman'
                        },
                        tooltip: {
                            pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
                        },
                        accessibility: {
                            point: {
                                valueSuffix: '%'
                            }
                        },
                        plotOptions: {
                            pie: {
                                allowPointSelect: true,
                                cursor: 'pointer',
                                dataLabels: {
                                    enabled: true,
                                    format: '<b>{point.name}</b>: {point.percentage:.1f} %'
                                }
                            }
                        },
                        series: [{
                            name: 'Brands',
                            colorByPoint: true,
                            data: JSON.parse(dataChart)
                        }]
                    });
            },
            error: function(error){
                alert(error)
            }
        });
    }

    $(function() {
        $('a[href*=#]:not([href=#])').click(function() {
            if (location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') && location
                .hostname == this.hostname) {
                var target = $(this.hash);
                target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
                if (target.length) {
                    $('html,body').animate({
                        scrollTop: target.offset().top
                    }, 1000);
                    return false;
                }
            }
        });
    });
    </script>
</body>

</html>