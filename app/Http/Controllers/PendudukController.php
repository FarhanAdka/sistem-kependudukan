<?php

namespace App\Http\Controllers;

use App\Models\Penduduk;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\KartuKeluarga;

class PendudukController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user=User::where('id',auth()->user()->id)->get()->first();
        $info=[
            'name'=>$user->name
        ];
        
        $data=Penduduk::paginate(25);
        return view('Page.dataPenduduk',$info)->with('data',$data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Page.inputPenduduk');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nik' => 'required|string|size:16|unique:penduduk',
            'nama' => 'required|string|max:255',
            'jenis_kelamin' => 'required|in:laki-laki,perempuan',
            'tempat_lahir' => 'required|string|max:255',
            'tanggal_lahir' => 'required|date',
            'pendidikan' => 'required|string|max:255',
            'pekerjaan' => 'required|string|max:255',
            'nama_ayah' => 'required|string|max:255',
            'nama_ibu' => 'required|string|max:255',
            'no_kk' => 'required|string|size:16|exists:kartu_keluarga,no_kk',
            'status' => 'required|in:aktif,meninggal,lahir,masuk,keluar',
            'keterangan' => 'nullable|string|max:255',
        ]);

        // Cek apakah no_kk ada di tabel kartu_keluarga
        $kartuKeluarga = KartuKeluarga::where('no_kk', $request->no_kk)->first();
        if (!$kartuKeluarga) {
            return redirect()->back()->withErrors(['no_kk' => 'No KK tidak ditemukan dalam database kartu keluarga.']);
        }

        Penduduk::create($validatedData);

        return redirect()->route('Penduduk.index')->with('success', 'Data penduduk berhasil disimpan!');
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
