<?php

namespace App\Http\Controllers;

use App\Models\KategoriPerlombaan;
use Illuminate\Http\Request;

class KategoriPerlombaanController extends Controller
{
    public function index()
    {
        $data = KategoriPerlombaan::all();

        return response()->json(['Kategori' => $data], 200);
    }
    public function search(Request $request)
    {
        $data = KategoriPerlombaan::where('JENIS_CODE', $request->JENIS_CODE)
                                    ->where('KATEGORI_CODE', $request->KATEGORI_CODE)->get();

        return response()->json(['Kategori' => $data], 200);
    }
}
