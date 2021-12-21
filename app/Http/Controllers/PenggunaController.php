<?php
 
namespace App\Http\Controllers;

use App\Models\Pengguna;
use Illuminate\Http\Request;
 
// memanggil model Pengguna

class PenggunaController extends Controller
{
    public function index()
    {
    	// mengambil semua data pengguna
    	$pengguna = Pengguna::all();
    	// return data ke view
    	return view('pengguna', ['pengguna' => $pengguna]);
    }
}