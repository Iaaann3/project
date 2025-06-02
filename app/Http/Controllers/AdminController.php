<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Dana;

class AdminController extends Controller
{
    public function index()
    {
       $totalUsers = User::count();
    $totalDana = Dana::sum('saldo');
    $dana = Dana::all();
    $users = User::with('dana')->get(); 

    return view('home', compact('totalUsers', 'totalDana', 'dana', 'users'));
    }
}
