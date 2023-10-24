<?php

namespace App\Http\Controllers;

use App\Models\RegisterSiswa;
use Illuminate\Http\Request;
use App\Http\Requests\RegisterSiswaRequest;
use Illuminate\Support\Facades\DB;

class RegisterSiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $search = request()->get('search');
        $p = RegisterSiswa::paginate();

        $registerSiswa = DB::table('register_siswas')
            ->where('nama','LIKE','%'.$search.'%')
            ->orderBy('total_nilai', 'desc')
            ->paginate($p->perPage());

        return view('register-siswa.index', compact('registerSiswa'))
        ->with('i', (request()->input('page', 1) - 1) * $p->perPage());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $registerSiswa = new RegisterSiswa();
        return view('register-siswa.create', compact('registerSiswa'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(RegisterSiswaRequest $request)
    {
        $year = date('Y');
        $randomNumber = rand(10000, 99999);
        $formattedNumber = $year . $randomNumber;

        //mulai transaksi
        DB::beginTransaction();
        try{
            $nilai_ind = $request->nilai_ind ?? 0.00;
            $nilai_ipa = $request->nilai_ipa ?? 0.00;
            $nilai_mtk = $request->nilai_mtk ?? 0.00;

            //simpan ke tabel kota
            DB::table('register_siswas')->insert([
                'no_pendaftaran'=>$formattedNumber,
                'nama'=>$request->nama,
                'alamat'=>$request->alamat,
                'tanggal_lahir'=>$request->tanggal_lahir,
                'jenis_kelamin'=>$request->jenis_kelamin,
                'agama'=>$request->agama,
                'asal_sekolah'=>$request->asal_sekolah,
                'nilai_ind'=>$nilai_ind,
                'nilai_ipa'=>$nilai_ipa,
                'nilai_mtk'=>$nilai_mtk,
                'total_nilai'=>$nilai_ind + $nilai_ipa + $nilai_mtk,
                'created_at'=>date('Y-m-d H:m:s'),
                'updated_at'=>date('Y-m-d H:m:s')
            ]);
            //jika tidak ada kesalahan commit/simpan
            DB::commit();
            return redirect()->route('daftar-siswa.index')
            ->with('success', 'Register student created successfully.');
        } catch (\Throwable $e) {
            dd($e);
            //jika terjadi kesalahan batalkan semua
            DB::rollback();
            return redirect()->route('daftar-siswa.index')
            ->with('error', 'Penyimpanan dibatalkan semua, ada kesalahan.');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(String $no_pendaftaran)
    {
        $registerSiswa = RegisterSiswa::find($no_pendaftaran);
        return view('register-siswa.show', compact('registerSiswa'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $no_pendaftaran)
    {
        $registerSiswa = RegisterSiswa::find($no_pendaftaran);
        return view('register-siswa.edit', compact('registerSiswa'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(RegisterSiswaRequest $request, string $no_pendaftaran)
    {
        //mulai transaksi
        DB::beginTransaction();
        try{
            $nilai_ind = $request->nilai_ind ?? 0.00;
            $nilai_ipa = $request->nilai_ipa ?? 0.00;
            $nilai_mtk = $request->nilai_mtk ?? 0.00;

            //simpan ke tabel kota
            DB::table('register_siswas')->where('no_pendaftaran', $no_pendaftaran)->update([
                'nama'=>$request->nama,
                'alamat'=>$request->alamat,
                'tanggal_lahir'=>$request->tanggal_lahir,
                'jenis_kelamin'=>$request->jenis_kelamin,
                'agama'=>$request->agama,
                'asal_sekolah'=>$request->asal_sekolah,
                'nilai_ind'=>$nilai_ind,
                'nilai_ipa'=>$nilai_ipa,
                'nilai_mtk'=>$nilai_mtk,
                'total_nilai'=>$nilai_ind + $nilai_ipa + $nilai_mtk,
                'created_at'=>date('Y-m-d H:m:s'),
                'updated_at'=>date('Y-m-d H:m:s')
            ]);
            //jika tidak ada kesalahan commit/simpan
            DB::commit();
            return redirect()->route('daftar-siswa.index')
            ->with('success', 'Register student updated successfully.');
        } catch (\Throwable $e) {
            dd($e);
            //jika terjadi kesalahan batalkan semua
            DB::rollback();
            return redirect()->route('daftar-siswa.index')
            ->with('error', 'Penyimpanan dibatalkan diubah ada kesalahan.');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $no_pendaftaran)
    {
        //mulai transaksi
        DB::beginTransaction();
        try{
            //hapus rekaman tabel kota
            RegisterSiswa::find($no_pendaftaran)->delete();
            DB::commit();
            return redirect()->route('daftar-siswa.index')
            ->with('success', 'Register student deleted successfully');
        } catch (\Throwable $e) {
            //jika terjadi kesalahan batalkan semua
            DB::rollback();
            return redirect()->route('daftar-siswa.index')
            ->with('error', 'Register student ada kesalahan hapus batal.');
        }
    }
}
