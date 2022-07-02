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
            <p class="font-weight-bold mb-0" style="font-size: 20px">Halaman Pemeriksaan</p>
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
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6">
                            @if($data->status == 'menunggu')
                                <form method="post" action="/pemeriksaan-dokter/create">
                                    @csrf
                                    <input type="hidden" name="id" value="{{ $data->id }}">
                                    <div class="w-100 mb-2 mt-3 text-right">
                                        <button type="submit" class="btn btn-primary">Periksa</button>
                                    </div>
                                </form>
                            @else
                                <span class="font-weight-bold mr-2">Status Pemeriksaan :</span>
                                <span class="font-weight-bold">{{ ucwords($data->status) }}</span>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            @if($data->status == 'proses')
                <div class="card">
                    <div class="card-body">
                        <form method="post" action="/pemeriksaan-dokter/patch">
                            @csrf
                            <input type="hidden" name="id" value="{{ $data->id }}">
                            <div class="row">
                                <div class="col-lg-6 col-md-6">
                                    <div class="w-100 mb-1">
                                        <label for="asal_jaringan" class="form-label">Asal Jaringan</label>
                                        <input type="text" class="form-control" id="asal_jaringan"
                                               placeholder="Asal Jaringan"
                                               name="asal_jaringan">
                                    </div>
                                    <div class="w-100 mb-1">
                                        <label for="diagnosa" class="form-label">Diagnosa</label>
                                        <input type="text" class="form-control" id="diagnosa" placeholder="Diagnosa"
                                               name="diagnosa">
                                    </div>
                                    <div class="w-100 mb-1">
                                        <label for="tanggal_spesimen_jawab" class="form-label">Tanggal Spesimen Di
                                            Jawab</label>
                                        <input type="date" class="form-control" id="tanggal_spesimen_jawab"
                                               name="tanggal_spesimen_jawab" value="{{ date('Y-m-d')  }}">
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6">
                                    <div class="w-100 mb-1">
                                        <label for="makroskopis" class="form-label">Makroskopis</label>
                                        <textarea rows="3" class="form-control" id="makroskopis"
                                                  placeholder="Makroskopis"
                                                  name="makroskopis"></textarea>
                                    </div>
                                    <div class="w-100 mb-1">
                                        <label for="mikroskopis" class="form-label">Mikroskopis</label>
                                        <textarea rows="3" class="form-control" id="mikroskopis"
                                                  placeholder="Mikroskopis"
                                                  name="mikroskopis"></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="w-100 mb-2 mt-3 text-right">
                                <button type="submit" class="btn btn-primary">Simpan</button>
                            </div>
                        </form>
                    </div>
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
