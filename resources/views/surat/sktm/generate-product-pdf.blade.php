<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Surat Keterangan Tidak Mampu</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            font-size: 10;
            margin-left: 0.5cm;
            margin-right: 0.5cm;
            padding: 0;
            background-color: #f9f9f9;
        }
        .container {
            width: 100%;
            height: 100%;
            margin: auto;
            background: #fff;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .header {
            text-align: center;
            margin-bottom: 20px;
            padding: 0.2cm
        }
        .headerimg {
            width: 80px;
            style='position: absolute; 
            top: 20px; 
            left: 20px;
        }
        .header h1, .header h3, .header h2 {
            margin: 5px 0;
        }
        .content {
            line-height: 1.6;
        }
        .content p {
            margin-bottom: 10px;
        }
        .content .date {
            text-align: right;
            margin-bottom: 20px;
            padding-right: 0.6cm;
        }
        .footer {
            margin-top: 40px;
        }
        .signature {
            text-align: right;
            margin-top: 60px;
        }
        .indent {
        text-indent: 50px;
        }
        .content .date2{

        }

        /* jarak titik dua */
        .info-table {
            width: 100%;
            border-collapse: collapse;
        }
        .info-table td {
            padding: 5px;
        }
        .info-table .label {
            width: 150px;
            text-align: left;
            padding-right: 10px;
        }
        .info-table .value {
            text-align: left;
        }

        /* untuk no dan tanggal */
        .info-table2 {
            width: 100%;
            border-collapse: collapse;
        }
        .info-table2 td {
            padding: 5px;
        }
        .info-table2 .label {
            width: 150px;
            text-align: left;
            padding-right: 10px;
        }
        .info-table2 .value {
            text-align: right;
        }

        /* untuk tanda tangan */
        .info-table3 {
            width: 100%;
            border-collapse: collapse;
        }
        .info-table3 td {
            padding: 5px;
        }
        .info-table3 .label {
            width: 150px;
            text-align: center;
            padding-right: 5px;
            margin-left: 4px;
            
        }
        .info-table3 .value {
            text-align: center;
            width: 150px;
            padding-right: 10px;
            padding-top: 1cm;
        }

        /* untuk atas */
        .info-table {
            width: 100%;
            border-collapse: collapse;
        }
        .info-table td {
            padding: 5px;
        }
        .info-table .label {
            width: 150px;
            text-align: left;
            padding-right: 10px;
        }
        .info-table .value {
            text-align: left;
        }
    </style>
</head>
<body>
    <div class="container">
        <img src="img/kecamatanpandanwangi.png" alt="Logo" style='position: absolute; top: 20px; left: 20px; width: 100px;'>
        <div class="header">
            <h1>SURAT KETERANGAN TIDAK MAMPU</h1>
            <h3>KETUA RW. 13 KELURAHAN PANDANWANGI</h3>
            <h3>KECAMATAN BLIMBING - MALANG JAWA TIMUR</h3>
            <h2>___________________________________________________________</h2>
        </div>
        <div class="content">
            <table class="info-table2">
                <tr>
                    <td class="label">NO : IX/234/VII/234/76</td>
                    <td class="value" class="date">Malang, {{ \Carbon\Carbon::now()->format('d F Y') }}</td>
                </tr>
            </table>
            <table class="info-table4">
                <tr>
                    <td class="label">Lampiran  </td>
                    <td class="value">: Okeh</td>
                </tr>
                <tr>
                    <td class="label">Perihal  </td>
                    <td class="value">: Bantuan </td>
                </tr>
            </table>
            <p></p>
            <p>Kepada Yth.</p>
            <p>{{ $sktm->nama }}</p>
            <p class="indent">Yang bertanda tangan di bawah ini Ketua RW. 13 Kelurahan Pandanwangi Kecamatan Blimbing Kota Malang dengan ini menerangkan bahwa:</p>
            <table class="info-table">
                <tr>
                    <td class="label">Nama Lengkap</td>
                    <td class="value">: {{ $sktm->nama }}</td>
                </tr>
                <tr>
                    <td class="label">Pekerjaan</td>
                    <td class="value">: {{ $sktm->pekerjaan }}</td>
                </tr>
                <tr>
                    <td class="label">Jenis Kelamin</td>
                    <td class="value">: {{ $sktm->jenis_kelamin }}</td>
                </tr>
                <tr>
                    <td class="label">Status Perkawinan</td>
                    <td class="value">: {{ $sktm->status_perkawinan }}</td>
                </tr>
                <tr>
                    <td class="label">Keperluan</td>
                    <td class="value">: {{ $sktm->keperluan }}</td>
                </tr>
            </table>
            <p>Dengan pernyataan diatas, adalah benar-benar bantuan yang kami harapkan. Surat keterangan ini dibuat sebagai kelengkapan pengurusan Surat Keterangan Tidak Mampu.</p>
            <p>Demikian surat keterangan tidak mampu ini kami buat, untuk dapat bantuan sebagaimana mestinya.</p>
            <table class="info-table3">
                <tr>
                    <td class="label">
                        <p class="date2">Malang, {{ \Carbon\Carbon::now()->format('d F Y') }}</p>
                        <p></p>
                        <p></p>
                        <p></p>
                        <p>{{ $sktm->nama }}</p>
                    </td>
                    <td class="value">
                       <p >Vasko</p>
                       <p></p>
                       <p></p>
                       <p></p>
                       <p>Ketua RW 013</p>
                       <p>Pandanwangi</p>
                    </td>
                </tr>
            </table>
        </div>
    </div>
</body>
</html>
