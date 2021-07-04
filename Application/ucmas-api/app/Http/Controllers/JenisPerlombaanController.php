<?php

namespace App\Http\Controllers;

use App\Models\JenisPerlombaan;
use Illuminate\Http\Request;

class JenisPerlombaanController extends Controller
{
    public function index()
    {
        $data = JenisPerlombaan::all();

        return response()->json(['Jenis Perlombaan' => $data], 200);
    }
    public function search(Request $request)
    {
        $data = JenisPerlombaan::where('JENIS_CODE', $request->JENIS_CODE)->get();

        return response()->json(['Jenis Perlombaan' => $data], 200);
    }
}
