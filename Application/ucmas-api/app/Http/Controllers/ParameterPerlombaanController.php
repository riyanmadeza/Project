<?php

namespace App\Http\Controllers;

use App\Models\ParameterPerlombaan;
use Illuminate\Http\Request;

class ParameterPerlombaanController extends Controller
{
    public function index()
    {
        $data = ParameterPerlombaan::all();

        return response()->json(['parameter' => $data], 200);
    }
    public function search(Request $request)
    {
        $parameter = ParameterPerlombaan::where('JENIS_CODE', $request->JENIS_CODE)
                                        ->where('KATEGORI_CODE', $request->KATEGORI_CODE)
                                        ->where('PARAMETER_ID', $request->PARAMETER_ID)
                                        ->get();

        return response()->json(['parameter' => $parameter], 200);
    }
}
