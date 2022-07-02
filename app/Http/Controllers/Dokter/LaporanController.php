<?php


namespace App\Http\Controllers\Dokter;


use App\Helper\CustomController;
use App\Models\Pemeriksaan;
use Illuminate\Support\Facades\Auth;

class LaporanController extends CustomController
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        return view('dokter.laporan.index');
    }

    public function data()
    {
        try {
            $tgl1 = $this->field('tgl1');
            $tgl2 = $this->field('tgl2');
            $data = Pemeriksaan::with(['pasien.member', 'dokter.dokter'])
                ->where('dokter_id', '=', Auth::id())
                ->whereBetween('tanggal', [$tgl1, $tgl2])
                ->where('status', '!=', 'menunggu')
                ->get();
            return $this->basicDataTables($data);
        } catch (\Exception $e) {
            return $this->basicDataTables([]);
        }
    }

    public function cetak()
    {
        $tgl1 = $this->field('tgl1');
        $tgl2 = $this->field('tgl2');
        $data = Pemeriksaan::with(['pasien.member', 'dokter.dokter'])
            ->where('dokter_id', '=', Auth::id())
            ->whereBetween('tanggal', [$tgl1, $tgl2])
            ->where('status', '!=', 'menunggu')
            ->get();
        return $this->convertToPdf('dokter.laporan.cetak',[
            'data' => $data,
            'tgl1' => $tgl1,
            'tgl2' => $tgl2,
        ]);
    }

    public function cetak_detail($id)
    {
        $data = Pemeriksaan::with(['pasien.member', 'dokter.dokter'])
            ->where('id', '=', $id)
            ->where('status', '!=', 'menunggu')
            ->findOrFail($id);
        return $this->convertToPdf('dokter.laporan.cetak-detail',[
            'data' => $data,
        ]);
    }
}
