<?php

namespace App\Http\Controllers;

use App\Models\KartuKeluarga;
use Illuminate\Http\Request;
use App\Models\User;

class KKController extends Controller
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
        
        $data=KartuKeluarga::paginate(25);
        return view('Page.dataKK',$info)->with('data',$data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $user=User::where('id',auth()->user()->id)->get()->first();
        $info=[
            'name'=>$user->name
        ];
        return view('Page.inputKK');
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

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $user=User::where('id',auth()->user()->id)->get()->first();
        $info=[
            'name'=>$user->name
        ];
        $data = KartuKeluarga::find($id);
        if (!$data) {
            return abort(404);
        }

        return view('Page.detailKK', compact('data', 'info'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $user = User::where('id', auth()->user()->id)->first();
        $info = [
            'name' => $user->name
        ];
        $data = KartuKeluarga::find($id);
        if (!$data) {
            return abort(404);
        }

        return view('Page.editKK', compact('data', 'info'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'no_kk' => 'required|string|size:16|unique:kartu_keluarga,no_kk,' . $id,
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

        $data->no_kk = $request->no_kk;
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

        return redirect()->route('KK.index')->with('success', 'Data Kartu Keluarga berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        KartuKeluarga::where('id',$id)->delete();
        return redirect()->route('KK.index')->with('success', 'Stok berhasil dihapus');
    }
    
}
