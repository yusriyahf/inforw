<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Surat Kegiatan</title>
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
            height: 97%;
            margin: auto;
            background: #fff;
            padding: 15px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .header {
            text-align: center;
            margin-bottom: 20px;
            padding: 0.2cm
        }
        .header img {
            width: 80px;
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
        .indent2 {
        text-indent: 25px;
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
            padding-top: 1cm;
            
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
        <div class="header">
            <img src="img/kecamatanpandanwangi.png" alt="Logo" style='position: absolute; top: 20px; left: 20px; width: 100px;'>
            <h1>SURAT PENGAJUAN KEGIATAN</h1>
            <h3>KETUA RW. 13 KELURAHAN PANDANWANGI</h3>
            <h3>KECAMATAN BLIMBING - MALANG JAWA TIMUR</h3>
            <h2>______________________________________________________________</h2>
        </div>
        <div class="content">
            <table class="info-table2">
                <tr>
                    <td class="label">NO : </td>
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
                    <td class="value">: Okeh lagi </td>
                </tr>
            </table>
            <p></p>
            <p>Kepada Yth.</p>
            <p class="indent2">{{ $kg->users->nama }}</p>
            <p class="indent">Yang bertanda tangan di bawah ini, Ketua RW 13 Kelurahan Pandanwangi Kecamatan Blimbing Kota Malang, dengan ini menyetujui kegiatan yang diajukan sebagai berikut:</p>
            <table class="info-table">
                {{-- <tr>
                    <td class="label">Nama Lengkap</td>
                    <td class="value">: {{ $kg->nama }}</td>
                </tr> --}}
                <tr>
                    <td class="label">Tanggal</td>
                    <td class="value">: {{ date('d-m-Y', strtotime($kg->tanggal)) }}</td>
                </tr>
                <tr>
                    <td class="label">Waktu</td>
                    <td class="value">: {{ date('H:i', strtotime($kg->tanggal)) }} - Selesai</td>
                </tr>
                <tr>
                    <td class="label">Tempat</td>
                    <td class="value">: {{ $kg->alamat }}</td>
                </tr>
                <tr>
                    <td class="label">Nama Kegiatan</td>
                    <td class="value">: {{ $kg->nama_kegiatan }}</td>
                </tr>
                {{-- <tr>
                    <td class="label">Status Perkawinan</td>
                    <td class="value">: {{ $sp->status_perkawinan }}</td>
                </tr>
                <tr>
                    <td class="label">NIK</td>
                    <td class="value">: {{ $sp->nik }}</td>
                </tr>
                <tr>
                    <td class="label">Keperluan</td>
                    <td class="value">: {{ $sp->keperluan }}</td> --}}
                </tr>
            </table>
            <p>Dengan pernyataan di atas, kami <strong>MENYETUJUI</strong> pengajuan yang telah disampaikan. Surat persetujuan ini dibuat sebagai bagian dari proses persetujuan kegiatan yang diajukan.</p>
            <p>Demikian surat persetujuan ini kami buat, untuk dapat digunakan sebagaimana mestinya.</p>
            <table class="info-table3">
                <tr>
                    <td class="label">
                        <p></p>
                        <p></p>
                        <p></p>
                        <p>Penanggung Jawab</p>
                        <p> Kegiatan</p>
                        <p></p>
                        <p></p>
                        <p></p>
                        <p>{{ $kg->users->nama }}</p>
                    </td>
                    <td class="value">
                    <p>Malang, {{ \Carbon\Carbon::now()->format('d F Y') }}</p>
                    <p></p>
                    <p>Ketua RW 013</p>
                    <p>Pandanwangi</p>
                       <p></p>
                       <p></p>
                       <p></p>
                       <p >Vasko</p>
                    </td>
                </tr>
            </table>
        </div>
    </div>
</body>
</html>
