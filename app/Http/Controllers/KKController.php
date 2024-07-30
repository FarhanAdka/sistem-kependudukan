<?php

namespace App\Http\Controllers;

use App\Models\KartuKeluarga;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Penduduk;
use App\Imports\KartuKeluargaImport;
use Maatwebsite\Excel\Facades\Excel;

class KKController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
{
    $user = User::where('id', auth()->user()->id)->first();
    $info = [
        'active_home' => 'active',
        'title' => 'Data Kartu Keluarga',
        'name' => $user->name
    ];

    $katakunci = $request->get('katakunci');
    $dusun = $request->get('dusun');
    $rt = $request->get('rt');
    $rw = $request->get('rw');
    $sort_by = $request->get('sort_by', 'no_kk');
    $sort_order = $request->get('sort_order', 'asc');

    $query = KartuKeluarga::query();

    if ($katakunci) {
        $query->where(function($q) use ($katakunci) {
            $q->where('no_kk', 'LIKE', "%$katakunci%")
              ->orWhere('nama_kk', 'LIKE', "%$katakunci%");
        });
    }

    if ($dusun) {
        $query->where('alamat', 'LIKE', "%$dusun%");
    }

    if ($rt) {
        $query->where('rt', $rt);
    }

    if ($rw) {
        $query->where('rw', $rw);
    }

    $query->orderBy($sort_by, $sort_order);

    $data = $query->paginate(25);

    return view('Page.dataKK', compact('info', 'data'));
}



    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $user=User::where('id',auth()->user()->id)->get()->first();
        $info = [
            'active_home' => 'active',
            'title' => 'Input Kartu Keluarga',
            'name' => $user->name
        ];
        return view('Page.inputKK', $info);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'no_kk' => 'required|string|max:16|unique:kartu_keluarga',
            'nama_kk' => 'required|string',
            'alamat' => 'required|in:Dusun 1,Dusun 2',
            'rt' => 'required|integer|min:1|max:20',
            'rw' => 'required|integer|min:1|max:5',
            'scan_kk' => 'nullable|file|mimetypes:application/pdf',
        ]);

        $scanKkPath = null;
        if ($request->hasFile('scan_kk')) {
            $scanKkFile = $request->file('scan_kk');
            $scanKkPath = $scanKkFile->store('scan_kk','public');
        }

        KartuKeluarga::create([
            'no_kk' => $validatedData['no_kk'],
            'nama_kk' => $validatedData['nama_kk'],
            'alamat' => $validatedData['alamat'],
            'rt' => $validatedData['rt'],
            'rw' => $validatedData['rw'],
            'scan_kk' => $scanKkPath,
        ]);

        return redirect()->route('KK.index')->with('success', 'Data kartu keluarga berhasil disimpan!');
    }
    // Function untuk menampilkan form import
    public function showImportForm()
    {
        return view('Page.importKK');
    }

    // Function untuk melakukan import data
    public function import(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:xlsx,xls,csv',
        ]);

        Excel::import(new KartuKeluargaImport, $request->file('file'));

        return back()->with('success', 'Data Kartu Keluarga berhasil diimpor.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $user = User::where('id', auth()->user()->id)->first();
        $info = [
            'active_home' => 'active',
            'title' => 'Detail Kartu Keluarga',
            'name' => $user->name
        ];
        $data = KartuKeluarga::find($id);
        if (!$data) {
            return abort(404);
        }
        
        $penduduk = Penduduk::where('no_kk', $data->no_kk)->get();

        return view('Page.detailKK', array_merge($info, compact('data', 'penduduk')));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $user = User::where('id', auth()->user()->id)->first();
        $info = [
            'active_home' => 'active',
            'title' => 'Edit Kartu Keluarga',
            'name' => $user->name
        ];
        $data = KartuKeluarga::find($id);
        if (!$data) {
            return abort(404);
        }

        return view('Page.editKK', array_merge($info, compact('data')));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'nama_kk' => 'required|string|max:255',
            'alamat' => 'required|in:Dusun 1,Dusun 2',
            'rt' => 'required|integer|min:1|max:20',
            'rw' => 'required|integer|min:1|max:5',
            'scan_kk' => 'nullable|file|mimetypes:application/pdf|max:2048',
        ]);

        $data = KartuKeluarga::find($id);
        if (!$data) {
            return abort(404);
        }

        $data->nama_kk = $request->nama_kk;
        $data->alamat = $request->alamat;
        $data->rt = $request->rt;
        $data->rw = $request->rw;

        if ($request->hasFile('scan_kk')) {
            $file = $request->file('scan_kk');
            $filePath = $file->store('scan_kk', 'public');
            $data->scan_kk = $filePath;
        }

        $data->save();

        return redirect()->route('KK.index')->with('success', 'Data Kartu Keluarga berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        KartuKeluarga::where('id',$id)->delete();
        return redirect()->route('KK.index')->with('success', 'Data Kartu Keluarga berhasil dihapus!');
    }
    
}
