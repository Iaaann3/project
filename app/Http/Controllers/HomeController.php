<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Dana;
use App\Models\Pemasukan;
use App\Models\Pengeluaran;
use App\Models\User;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
   public function index()
{
    
    if (Auth::user()->is_admin === 1) {
    $users = User::with('danas')->get();
    $totalUsers = $users->count();
    $totalDana = $users->sum(function ($user) {
        return $user->danas->sum('saldo');
    });

    return view('admin.home', compact('users', 'totalUsers', 'totalDana'));
}

$userId = Auth::id();

$dana = Dana::where('user_id', $userId)->get();
$totalBalance = $dana->sum('saldo');


$dataDana = [];

foreach ($dana as $item) {
    $totalPemasukan = \App\Models\Pemasukan::where('id_dana', $item->id)->sum('jumlah');
    $totalPengeluaran = \App\Models\Pengeluaran::where('id_dana', $item->id)->sum('jumlah');

    $dataDana[] = [
        'nama_dana' => $item->nama_dana,
        'total_pemasukan' => $totalPemasukan,
        'total_pengeluaran' => $totalPengeluaran,
        'saldo' => $item->saldo,
    ];
}


$pemasukan = \App\Models\Pemasukan::whereHas('dana', function ($query) use ($userId) {
    $query->where('user_id', $userId);
})->latest()->take(5)->get();

$pengeluaran = \App\Models\Pengeluaran::whereHas('dana', function ($query) use ($userId) {
    $query->where('user_id', $userId);
})->latest()->take(5)->get();



return view('home', compact('dana', 'totalBalance', 'dataDana', 'pemasukan', 'pengeluaran'));

    // if (Auth::user()->is_admin == 1) {
    //     return view('admin.index'); // khusus admin
    // }

    // $userid = Auth::id();
    // $dana = Dana::where('user_id', $userid)->get();
    // return view('home', compact('dana')); // khusus user biasa
}

}
