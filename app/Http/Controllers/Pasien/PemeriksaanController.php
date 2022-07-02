<?php


namespace App\Http\Controllers\Pasien;


use App\Helper\CustomController;
use App\Models\Pemeriksaan;
use Illuminate\Support\Facades\Auth;

class PemeriksaanController extends CustomController
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $data = Pemeriksaan::with(['pasien.member', 'dokter.dokter'])
            ->where('pasien_id', '=',Auth::id())
            ->get();
        return view('pasien.pemeriksaan.index')->with(['data' => $data]);
    }

    public function detail($id)
    {
        $data = Pemeriksaan::with(['pasien.member', 'dokter.dokter'])
            ->findOrFail($id);
        return view('pasien.pemeriksaan.detail')->with(['data' => $data]);
    }
}
