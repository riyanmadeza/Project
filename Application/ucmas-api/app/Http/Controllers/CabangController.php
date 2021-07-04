<?php

namespace App\Http\Controllers;

use App\Models\Cabang;
use Illuminate\Http\Request;

class CabangController extends Controller
{
    public function index()
    {
        $cabang = Cabang::all();

        return response()->json(['cabang' => $cabang], 200);
    }

    public function search(Request $request)
    {
        $cabang = Cabang::where('CABANG_CODE', $request->CABANG_CODE)->get();

        return response()->json(['cabang' => $cabang], 200);
    }

    public function store(Request $request)
    {
        $request->validate([
            'CABANG_CODE' => 'required|max:10|unique:tb_cabang,CABANG_CODE',
            'CABANG_NAME' => 'required|max:50',
            'IS_PUSAT' => 'required|max:1',
            'ALAMAT' => 'required',
            'NO_TELP' => 'required|max:50',
            'EMAIL' => 'required|max:50',
        ]);

        $cabang = new Cabang();
        $cabang->CABANG_CODE = $request->CABANG_CODE;
        $cabang->CABANG_NAME = $request->CABANG_NAME;
        $cabang->IS_PUSAT = $request->IS_PUSAT;
        $cabang->ALAMAT = $request->ALAMAT;
        $cabang->NO_TELP = $request->NO_TELP;
        $cabang->EMAIL = $request->EMAIL;
        $cabang->ENTRY_USER = $request->ENTRY_USER;
        $cabang->ENTRY_DATE = now();
        $cabang->UPDATE_USER = $request->UPDATE_USER;
        $cabang->UPDATE_DATE = now();
        $cabang->save();

        return response()->json(['message' => 'Cabang added Successful'], 200);
    }

    public function delete(Request $request)
    {
        $cabang = Cabang::where('CABANG_CODE', $request->CABANG_CODE)->first();
        $cabang->delete();

        return response('Deleted successful', 200);
    }
}
