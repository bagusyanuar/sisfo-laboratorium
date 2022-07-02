<?php


namespace App\Http\Controllers\Admin;


use App\Helper\CustomController;
use App\Models\Dokter;
use App\Models\Member;
use App\Models\Pemeriksaan;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class PemeriksaanController extends CustomController
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $data = Pemeriksaan::with(['pasien.member', 'dokter.dokter'])
            ->orderBy('id', 'DESC')
            ->get();
        return view('admin.pemeriksaan.index')->with(['data' => $data]);
    }

    public function add_page()
    {
        $pasien = Member::with('user')->get();
        return view('admin.pemeriksaan.add')->with(['pasien' => $pasien]);
    }

    public function create()
    {
        try {
            $data = [
                'tanggal' => date('Y-m-d'),
                'no_lab' => 'DU-' . \date('YmdHis'),
                'pasien_id' => $this->postField('pasien'),
                'rm' => $this->postField('rm'),
                'tanggal_spesimen_terima' => $this->postField('tanggal_spesimen_terima'),
                'asal_jaringan' => '',
                'diagnosa' => '',
                'makroskopis' => '',
                'mikroskopis' => '',
                'status' => 'menunggu',
            ];
            Pemeriksaan::create($data);
            return redirect()->back()->with(['success' => 'Berhasil Menambahkan Data...']);
        }catch (\Exception $e) {
            return redirect()->back()->with(['failed' => 'Terjadi Kesalahan ' . $e->getMessage()]);
        }
    }

    public function detail($id)
    {
        $data = Pemeriksaan::with(['pasien.member', 'dokter.dokter'])
            ->findOrFail($id);
        return view('admin.pemeriksaan.detail')->with(['data' => $data]);
    }
}
