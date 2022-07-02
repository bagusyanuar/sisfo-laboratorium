<?php


namespace App\Http\Controllers\Admin;


use App\Helper\CustomController;
use App\Models\Dokter;
use App\Models\Member;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DokterController extends CustomController
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $data = Dokter::with('user')->get();
        return view('admin.pengguna.dokter.index')->with(['data' => $data]);
    }

    public function add_page()
    {
        return view('admin.pengguna.dokter.add');
    }

    public function create()
    {
        try {
            DB::beginTransaction();
            $user_data = [
                'username' => $this->postField('username'),
                'password' => Hash::make($this->postField('password')),
                'role' => 'dokter',
            ];
            $user = User::create($user_data);
            $dokter_data = [
                'user_id' => $user->id,
                'nama' => $this->postField('nama'),
                'no_hp' => $this->postField('no_hp'),
                'alamat' => $this->postField('alamat'),
            ];
            Dokter::create($dokter_data);
            DB::commit();
            return redirect()->back()->with(['success' => 'Berhasil Menambahkan Data...']);
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with(['failed' => 'Terjadi Kesalahan ' . $e->getMessage()]);
        }
    }

    public function edit_page($id)
    {
        $data = User::with('dokter')->where('id', '=', $id)->firstOrFail();
        return view('admin.pengguna.dokter.edit')->with(['data' => $data]);
    }

    public function patch()
    {
        try {
            DB::beginTransaction();
            $id = $this->postField('id');
            $user = User::find($id);
            $data_user = [
                'username' => $this->postField('username'),
            ];
            if ($this->postField('password') !== '') {
                $data_user['password'] = Hash::make($this->postField('password'));
            }
            $user->update($data_user);
            $dokter = Dokter::with('user')->where('user_id', '=', $user->id)->firstOrFail();
            $dokter_data = [
                'user_id' => $user->id,
                'nama' => $this->postField('nama'),
                'no_hp' => $this->postField('no_hp'),
                'alamat' => $this->postField('alamat'),
            ];
            $dokter->update($dokter_data);
            DB::commit();
            return redirect('/dokter')->with(['success' => 'Berhasil Merubah Data...']);
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with(['failed' => 'Terjadi Kesalahan' . $e->getMessage()]);
        }
    }

    public function destroy()
    {
        try {
            DB::beginTransaction();
            $id = $this->postField('id');
            Member::with('user')->where('user_id', '=', $id)->delete();
            User::destroy($id);
            DB::commit();
            return $this->jsonResponse('success', 200);
        } catch (\Exception $e) {
            DB::rollBack();
            return $this->jsonResponse('failed', 500);
        }
    }
}
