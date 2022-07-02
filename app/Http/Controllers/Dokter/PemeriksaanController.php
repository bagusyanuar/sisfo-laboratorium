<?php


namespace App\Http\Controllers\Dokter;


use App\Helper\CustomController;
use App\Models\Pemeriksaan;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
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
            ->where('status', '!=','selesai')
            ->get();
        return view('dokter.pemeriksaan.index')->with(['data' => $data]);
    }

    public function detail($id)
    {
        $data = Pemeriksaan::with(['pasien.member', 'dokter.dokter'])
            ->findOrFail($id);
        return view('dokter.pemeriksaan.detail')->with(['data' => $data]);
    }

    public function create()
    {
        try {
            $pemeriksaan = Pemeriksaan::find($this->postField('id'));
            $data = [
                'status' => 'proses',
                'dokter_id' => Auth::id()
            ];
            $pemeriksaan->update($data);
            return redirect()->back()->with(['success' => 'Berhasil Menambahkan Data...']);
        } catch (\Exception $e) {
            return redirect()->back()->with(['failed' => 'Terjadi Kesalahan ' . $e->getMessage()]);
        }
    }

    public function patch()
    {
        try {
            $pemeriksaan = Pemeriksaan::find($this->postField('id'));
            $data = [
                'status' => 'selesai',
                'asal_jaringan' => $this->postField('asal_jaringan'),
                'diagnosa' => $this->postField('diagnosa'),
                'tanggal_spesimen_jawab' => $this->postField('tanggal_spesimen_jawab'),
                'makroskopis' => $this->postField('makroskopis'),
                'mikroskopis' => $this->postField('mikroskopis'),
            ];
            $pemeriksaan->update($data);
            return redirect('/pemeriksaan-dokter')->with(['success' => 'Berhasil Menambahkan Data...']);
        } catch (\Exception $e) {
            return redirect()->back()->with(['failed' => 'Terjadi Kesalahan ' . $e->getMessage()]);
        }
    }
}
