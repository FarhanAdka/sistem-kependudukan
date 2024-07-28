<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\KartuKeluarga;
use App\Models\Penduduk;

class UserController extends Controller
{
    function login(){
        if(Auth::check()){
            return redirect('dashboard');
        }
        return view('Page.login');
    }

    function dashboard(){
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

        return view('Page.dashboard', compact(
            'info',
            'jumlahKK', 
            'jumlahPenduduk', 
            'jumlahAktif', 
            'jumlahMeninggal', 
            'jumlahMasuk', 
            'jumlahKeluar', 
            'jumlahLahir'
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
    
    function updateProfile(){

    }
}
