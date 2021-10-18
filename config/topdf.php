<?php
    require_once '../vendor/autoload.php';
    include "config.php";

    //Ahmad Rivaiy | 3120510901
    use Dompdf\Dompdf;
    $dompdf = new Dompdf();

    $dateSpec   =  date('Y-m-d');
    $query = '
            SELECT
                b.judul,
                COUNT(a.kode_buku) AS jml_buku_pinjam
            FROM
                pinjam a
            JOIN buku b ON a.kode_buku = b.kode_buku
            GROUP BY b.judul, a.kode_buku
    ';
    $query2 = '
        SELECT
            b.nama,
            CASE
                WHEN SUM(a.denda) IS NULL THEN 0
                WHEN SUM(a.denda) IS NOT NULL THEN SUM(a.denda)
            END as denda
        FROM
            pinjam a
        JOIN anggota b ON a.id_anggota = b.id_anggota
        GROUP BY b.nama
    ';
    $chartData  = mysqli_query($koneksi, $query);
    $chartData2 = mysqli_query($koneksi, $query2);

    //SUM Total
    while( $row = mysqli_fetch_array( $chartData)){
        $new_array[] = $row;
    }
    $key = 'jml_buku_pinjam';
    $sum = array_sum(array_column($new_array, $key));

    $html = '
        <html lang="en">
            <head>
                <style>
                    body {
                        text-align: center;
                        color: #777;
                    }

                    body h1 {
                        font-weight: 300;
                        margin-bottom: 0px;
                        padding-bottom: 0px;
                        color: #000;
                    }

                    body h3 {
                        font-weight: 300;
                        margin-top: 10px;
                        margin-bottom: 20px;
                        font-style: italic;
                        color: #555;
                    }

                    body a {
                        color: #06f;
                    }

                    .invoice-box {
                        max-width: 800px;
                        margin: auto;
                        padding: 30px;
                        border: 1px solid #eee;
                        box-shadow: 0 0 10px rgba(0, 0, 0, 0.15);
                        font-size: 16px;
                        line-height: 24px;
                        color: #555;
                    }

                    .invoice-box table {
                        width: 100%;
                        line-height: inherit;
                        text-align: left;
                        border-collapse: collapse;
                    }

                    .invoice-box table td {
                        padding: 5px;
                        vertical-align: top;
                    }

                    .invoice-box table tr td:nth-child(2) {
                        text-align: right;
                    }

                    .invoice-box table tr.top table td {
                        padding-bottom: 20px;
                    }

                    .invoice-box table tr.top table td.title {
                        font-size: 45px;
                        line-height: 45px;
                        color: #333;
                    }

                    .invoice-box table tr.information table td {
                        padding-bottom: 40px;
                    }

                    .invoice-box table tr.heading td {
                        background: #eee;
                        border-bottom: 1px solid #ddd;
                        font-weight: bold;
                    }

                    .invoice-box table tr.details td {
                        padding-bottom: 20px;
                    }

                    .invoice-box table tr.item td {
                        border-bottom: 1px solid #eee;
                    }

                    .invoice-box table tr.item.last td {
                        border-bottom: none;
                    }

                    .invoice-box table tr.total td:nth-child(2) {
                        border-top: 2px solid #eee;
                        font-weight: bold;
                    }

                    @media only screen and (max-width: 600px) {
                        .invoice-box table tr.top table td {
                            width: 100%;
                            display: block;
                            text-align: center;
                        }

                        .invoice-box table tr.information table td {
                            width: 100%;
                            display: block;
                            text-align: center;
                        }
                    }
                </style>
            </head>
            <body>
                <div class="invoice-box">
                    <table>
                        <tr class="information">
                            <td colspan="2">
                                <table>
                                    <tr>
                                        <td>
                                            Ahmad Rivaiy<br/>
                                            3120510901
                                        </td>
                                        <td>
                                            Perpustakaan<br />
                                            Report Peminjaman<br />
                                            '.$dateSpec.'
                                        </td>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                    </table>
                    <table>
                        <tr class="heading">
                            <td>Nama Peminjam</td>
                            <td>Denda</td>
                        </tr>';

    foreach($chartData2 as $q){ 
        $html .= "<tr class='item'>
            <td>".$q['nama']."</td>
            <td>".$q["denda"]."</td>
        </tr>";
    };
    $html .= '</table>
            <table style="margin-top: 5vh;">
                <tr class="heading">
                    <td>Judul</td>
                    <td>Jumlah Buku Yang Telah Dipinjam</td>
                </tr>';
    foreach($chartData as $x){
        $html .= "<tr class='item'>
                    <td>".$x['judul']."</td>
                    <td>".$x['jml_buku_pinjam']."</td>
                </tr>";
    };

        $html .= '<tr class="total">
                    <td></td>
                    <td>Total: <?php echo $sum; ?></td>
                </tr>
            </table>
        </div>
    </body>
</html>';

    $dompdf->loadHtml($html);

    $dompdf->setPaper('A4', 'landscape');

    $dompdf->render();

    $dompdf->stream();
?>
    