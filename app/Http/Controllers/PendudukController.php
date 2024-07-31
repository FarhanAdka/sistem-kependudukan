<?php

namespace App\Http\Controllers;

use App\Models\Penduduk;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\KartuKeluarga;
use App\Imports\PendudukImport;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\PendudukExport;
use App\Services\UpdatePendudukStatusService;

class PendudukController extends Controller
{
    protected $updatePendudukStatusService;

    public function __construct(UpdatePendudukStatusService $updatePendudukStatusService)
    {
        $this->updatePendudukStatusService = $updatePendudukStatusService;
    }

    public function updateStatus()
    {
        $message = $this->updatePendudukStatusService->updateStatus();
        return redirect()->back()->with('success', $message);
    }
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
{
    $user = User::where('id', auth()->user()->id)->first();
    $info = [
        'active_home' => 'active',
        'title' => 'Data Penduduk',
        'name' => $user->name
    ];

    $katakunci = $request->get('katakunci');
    $status = $request->get('status');
    $rt = $request->get('rt');
    $rw = $request->get('rw');

    $query = Penduduk::with(['kartuKeluarga' => function ($query) {
        $query->orderBy('rw')
              ->orderBy('rt');
    }]);

    if ($katakunci) {
        $query->where(function ($q) use ($katakunci) {
            $q->where('nik', 'like', "%$katakunci%")
              ->orWhere('nama', 'like', "%$katakunci%");
        });
    }

    if ($status) {
        $query->where('status', $status);
    }

    if ($rt) {
        $query->whereHas('kartuKeluarga', function ($q) use ($rt) {
            $q->where('rt', $rt);
        });
    }

    if ($rw) {
        $query->whereHas('kartuKeluarga', function ($q) use ($rw) {
            $q->where('rw', $rw);
        });
    }

    // Tambahkan pengurutan berdasarkan nama di tabel penduduk
    $query->orderBy('nama');

    $data = $query->paginate(25);

    return view('Page.dataPenduduk', compact('data', 'info', 'katakunci', 'status', 'rt', 'rw'));
}



    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $user = User::where('id', auth()->user()->id)->first();
        $info = [
            'active_home' => 'active',
            'title' => 'Data Penduduk',
            'name' => $user->name
        ];
        return view('Page.inputPenduduk', $info);
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
            return redirect()->back()->withErrors(['no_kk.exist' => 'No KK tidak ditemukan dalam database kartu keluarga!']);
        }

        Penduduk::create($validatedData);

        return redirect()->route('Penduduk.index')->with('success', 'Data penduduk berhasil disimpan!');
    }

    public function showImportForm()
    {
        return view('Page.importPenduduk');
    }

    // Function untuk melakukan import data
    public function import(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:xlsx,xls,csv',
        ]);

        Excel::import(new PendudukImport, $request->file('file'));

        return back()->with('success', 'Data Penduduk berhasil diimpor.');
    }

    public function export() 
    {
        return Excel::download(new PendudukExport, 'penduduk.xlsx');
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
{
    $user = User::where('id', auth()->user()->id)->first();
    $info = [
        'active_home' => 'active',
        'title' => 'Detail Penduduk',
        'name' => $user->name
    ];
    $penduduk = Penduduk::find($id);
    $kartuKeluarga = KartuKeluarga::where('no_kk', $penduduk->no_kk)->first();

    return view('Page.detailPenduduk', array_merge($info, compact('penduduk', 'kartuKeluarga')));
}



    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $user = User::where('id', auth()->user()->id)->first();
        $info = [
            'active_home' => 'active',
            'title' => 'Edit Penduduk',
            'name' => $user->name
        ];
        $data = Penduduk::findOrFail($id);
        return view('Page.editPenduduk', compact('data','info'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nik' => 'required|string|size:16|unique:penduduk,nik,' . $id,
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

        $data = Penduduk::findOrFail($id);
        $data->update($request->all());

        return redirect()->route('Penduduk.index')->with('success', 'Data penduduk berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Penduduk::where('id',$id)->delete();
        return redirect()->route('Penduduk.index')->with('success', 'Stok berhasil dihapus');
    }
}
