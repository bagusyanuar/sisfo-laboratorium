<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="css/bootstrap3.min.css" rel="stylesheet">
    <style>
        .report-title {
            font-size: 14px;
            font-weight: bolder;
        }

        .f-bold {
            font-weight: bold;
        }

        .footer {
            position: fixed;
            bottom: 0cm;
            right: 0cm;
            height: 2cm;
        }
    </style>
</head>
<body>
<div class="text-center f-bold report-title">LAPORAN HASIL PEMERIKSAAN HISPATOLOGI</div>
<div class="text-center f-bold report-title">LABORATORIUM DHARMA USADA</div>
<hr>
<p class="f-bold">Identitas Pasien :</p>
<div class="row">
    <div class="col-xs-2"><span class="f-bold">Nama Pasien</span></div>
    <div class="col-xs-3">: {{ $data->pasien->member->nama }}</div>
    <div class="col-xs-2"><span class="f-bold">No. Lab</span></div>
    <div class="col-xs-3">: {{ $data->no_lab }}</div>
</div>
<div class="row">
    <div class="col-xs-2"><span class="f-bold">Jenis Kelamin</span></div>
    <div class="col-xs-3">: {{ ucwords($data->pasien->member->jenis_kelamin) }}</div>
    <div class="col-xs-2"><span class="f-bold">RM</span></div>
    <div class="col-xs-3">: {{ $data->rm }}</div>
</div>
<div class="row">
    <div class="col-xs-2"><span class="f-bold">Tanggal Lahir</span></div>
    <div class="col-xs-3">: {{ $data->pasien->member->tanggal_lahir }}</div>
    <div class="col-xs-2"><span class="f-bold">Asal Jaringan</span></div>
    <div class="col-xs-3">: {{ $data->asal_jaringan }}</div>
</div>
<div class="row">
    <div class="col-xs-2"><span class="f-bold">Umur</span></div>
    <div class="col-xs-3">: {{ $data->pasien->member->umur }}</div>
    <div class="col-xs-2"><span class="f-bold">Diagnosa Klinik</span></div>
    <div class="col-xs-3">: {{ $data->diagnosa }}</div>
</div>
<div class="row">
    <div class="col-xs-2"><span class="f-bold">Alamat</span></div>
    <div class="col-xs-3">: {{ $data->pasien->member->alamat }}</div>
</div>
<hr>
<p class="f-bold">Tanggal Spesimen</p>
<div class="row">
    <div class="col-xs-2"><span class="f-bold">Di Terima</span></div>
    <div class="col-xs-3">: {{ $data->tanggal_spesimen_terima }}</div>
</div>
<div class="row">
    <div class="col-xs-2"><span class="f-bold">Di Jawab</span></div>
    <div class="col-xs-3">: {{ $data->tanggal_spesimen_jawab }}</div>
</div>
<hr>
<p class="f-bold">MAKROSKOPIS</p>
<p>{{ $data->makroskopis }}</p>
<p class="f-bold">MIKROSKOPIS</p>
<p>{{ $data->mikroskopis }}</p>

<div class="row">
    <div class="col-xs-8"></div>
    <div class="col-xs-3">
        <div class="text-center">
            <p class="text-center">Sukoharjo, {{ date('d-m-Y') }}</p>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-xs-3">
        <div class="text-center">
        </div>
    </div>
    <div class="col-xs-5"></div>
    <div class="col-xs-3">
        <div class="text-center">
            <p class="text-center">Dokter</p>
        </div>
    </div>
</div>
<br>
<br>
<div class="row">
    <div class="col-xs-3">
        <div class="text-center">
        </div>
    </div>
    <div class="col-xs-5"></div>
    <div class="col-xs-3">
        <div class="text-center">
            <p class="text-center">({{ $data->dokter->dokter->nama }})</p>
        </div>
    </div>
</div>
</body>
</html>
