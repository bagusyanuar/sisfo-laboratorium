@extends('admin.layout')

@section('css')
@endsection

@section('content')
    @if (\Illuminate\Support\Facades\Session::has('success'))
        <script>
            Swal.fire("Berhasil!", '{{\Illuminate\Support\Facades\Session::get('success')}}', "success")
        </script>
    @endif

    @if (\Illuminate\Support\Facades\Session::has('failed'))
        <script>
            Swal.fire("Gagal!", '{{\Illuminate\Support\Facades\Session::get('failed')}}', "error")
        </script>
    @endif
    <div class="container-fluid pt-3">
        <div class="d-flex align-items-center justify-content-between mb-3">
            <p class="font-weight-bold mb-0" style="font-size: 20px">Halaman Detail Riwayat Pemeriksaan</p>
            <ol class="breadcrumb breadcrumb-transparent mb-0">
                <li class="breadcrumb-item">
                    <a href="/dashboard">Dashboard</a>
                </li>
                <li class="breadcrumb-item">
                    <a href="/pemeriksaan-dokter">Pemeriksaan</a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">Detail
                </li>
            </ol>
        </div>
        <div class="w-100 p-2">
            <div class="row">
                <div class="col-lg-6 col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <p class="font-weight-bold">Identitas Pasien</p>
                            <div class="row">
                                <div class="col-lg-3 col-md-3">
                                    <span class="font-weight-bold">
                                        Nama Pasien
                                    </span>
                                </div>
                                <div class="col-lg-9 col-md-9">
                                    <span class="font-weight-bold">
                                        : {{ $data->pasien->member->nama }}
                                    </span>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-3 col-md-3">
                                    <span class="font-weight-bold">
                                        Jenis Kelamin
                                    </span>
                                </div>
                                <div class="col-lg-9 col-md-9">
                                    <span class="font-weight-bold">
                                        : {{ ucwords($data->pasien->member->jenis_kelamin) }}
                                    </span>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-3 col-md-3">
                                    <span class="font-weight-bold">
                                        Tanggal Lahir
                                    </span>
                                </div>
                                <div class="col-lg-9 col-md-9">
                                    <span class="font-weight-bold">
                                        : {{ $data->pasien->member->tanggal_lahir }}
                                    </span>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-3 col-md-3">
                                    <span class="font-weight-bold">
                                        Umur
                                    </span>
                                </div>
                                <div class="col-lg-9 col-md-9">
                                    <span class="font-weight-bold">
                                        : {{ $data->pasien->member->umur }} Tahun
                                    </span>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-3 col-md-3">
                                    <span class="font-weight-bold">
                                        Alamat
                                    </span>
                                </div>
                                <div class="col-lg-9 col-md-9">
                                    <span class="font-weight-bold">
                                        : {{ $data->pasien->member->alamat }}
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-3 col-md-3">
                            <span class="font-weight-bold">
                                No. Lab
                            </span>
                                </div>
                                <div class="col-lg-9 col-md-9">
                            <span class="font-weight-bold">
                                : {{ $data->no_lab }}
                            </span>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-3 col-md-3">
                            <span class="font-weight-bold">
                                RM
                            </span>
                                </div>
                                <div class="col-lg-9 col-md-9">
                            <span class="font-weight-bold">
                                : {{ $data->rm }}
                            </span>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-3 col-md-3">
                                    <span class="font-weight-bold">
                                        Asal Jaringan
                                    </span>
                                </div>
                                <div class="col-lg-9 col-md-9">
                                    <span class="font-weight-bold">
                                        : {{ $data->asal_jaringan == '' ? '-' : $data->asal_jaringan}}
                                    </span>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-3 col-md-3">
                                    <span class="font-weight-bold">
                                        Diagnosa Klinik
                                    </span>
                                </div>
                                <div class="col-lg-9 col-md-9">
                                    <span class="font-weight-bold">
                                        : {{ $data->diagnosa == '' ? '-' : $data->diagnosa}}
                                    </span>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-3 col-md-3">
                                    <span class="font-weight-bold">
                                        Dokter
                                    </span>
                                </div>
                                <div class="col-lg-9 col-md-9">
                                    <span class="font-weight-bold">
                                        : {{ $data->dokter == null ? '-' : $data->dokter->dokter->nama}}
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="col-lg-6 col-md-6">
                            <div class="d-flex align-items-start">
                                <span class="font-weight-bold mr-2">
                                    Tanggal Spesimen
                                </span>
                                <div>
                                    <p class="font-weight-bold mb-0">
                                        Di Terima : {{ $data->tanggal_spesimen_terima }}
                                    </p>
                                    <p class="font-weight-bold mb-0">
                                        Di Jawab
                                        : {{ $data->tanggal_spesimen_jawab == null ? '-' : $data->tanggal_spesimen_jawab }}
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6">
                            <span class="font-weight-bold mr-2">Status Pemeriksaan :</span>
                            <span class="font-weight-bold">{{ ucwords($data->status) }}</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <p class="font-weight-bold">MAKROSKOPIS</p>
                    <p class="mb-2">{{ $data->makroskopis == '' ? '-' : $data->makroskopis }}</p>
                    <p class="font-weight-bold">MIKROSKOPIS</p>
                    <p class="mb-2">{{ $data->mikroskopis == '' ? '-' : $data->mikroskopis }}</p>
                </div>
            </div>
            @if($data->dokter != null)
                <div class="text-right">
                    <a href="/laporan-pemeriksaan-dokter/cetak/{{ $data->id }}" target="_blank" class="btn btn-success" id="btn-cetak">
                        <i class="fa fa-print mr-2"></i>
                        <span>Cetak</span>
                    </a>
                </div>
            @endif
        </div>
    </div>

@endsection

@section('js')
    <script src="{{ asset('/js/helper.js') }}"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            $('#table-data').DataTable({
                scrollX: true
            });
        });
    </script>
@endsection
