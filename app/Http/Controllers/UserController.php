<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\KartuKeluarga;
use App\Models\Penduduk;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    function login(){
        if(Auth::check()){
            return redirect('dashboard');
        }
        return view('Page.login');
    }

    public function dashboard(){
        $user = User::where('id', auth()->user()->id)->first();
        $info = [
            'active_home' => 'active',
            'title' => 'Beranda',
            'name' => $user->name
        ];
    
        $jumlahKK = KartuKeluarga::count();
        $jumlahPenduduk = Penduduk::count();
        $jumlahAktif = Penduduk::where('status', 'aktif')->count();
        $jumlahMeninggal = Penduduk::where('status', 'meninggal')->count();
        $jumlahMasuk = Penduduk::where('status', 'masuk')->count();
        $jumlahKeluar = Penduduk::where('status', 'keluar')->count();
        $jumlahLahir = Penduduk::where('status', 'lahir')->count();
    
        // Hitung jumlah Kartu Keluarga berdasarkan RW
        $jumlahKKPerRW = [];
        for ($i = 1; $i <= 5; $i++) {
            $jumlahKKPerRW[$i] = KartuKeluarga::where('rw', $i)->count();
        }
    
        // Hitung jumlah Penduduk berdasarkan RW
        $jumlahPendudukPerRW = [];
        for ($i = 1; $i <= 5; $i++) {
            $jumlahPendudukPerRW[$i] = Penduduk::whereHas('kartuKeluarga', function($query) use ($i) {
                $query->where('rw', $i);
            })->whereIn('status', ['aktif', 'masuk', 'lahir'])->count();
        }
    
        return view('Page.dashboard', compact(
            'info',
            'jumlahKK', 
            'jumlahPenduduk', 
            'jumlahAktif', 
            'jumlahMeninggal', 
            'jumlahMasuk', 
            'jumlahKeluar', 
            'jumlahLahir',
            'jumlahKKPerRW', // Pass data jumlah kartu keluarga per RW
            'jumlahPendudukPerRW' // Pass data jumlah penduduk per RW
        ));
    }
    
    
    function profile(){
        $user = User::where('id', auth()->user()->id)->first();
        $info = [
            'active_home' => 'active',
            'title' => 'Profile',
            'name' => $user->name
        ];
        return view('Page.profile',$info); 
    }
    
    function updateProfile(Request $request){
        $request->validate([
            'name' => 'required|string|max:255',
            'username' => 'required|string|max:255|unique:users,username,' . auth()->user()->id,
            'password' => 'nullable|string|min:6',
        ]);
    
        $admin = User::find(auth()->user()->id);
    
        $data = [
            'name' => $request->name,
            'username' => $request->username,
        ];
    
        if ($request->filled('password')) {
            $data['password'] = Hash::make($request->password);
        }
    
        $admin->update($data);
    
        return redirect()->route('profile')->with('success', 'Profile berhasil diubah');
    }
}
