<?php

namespace App\Http\Controllers;

use App\Models\License;
use Illuminate\Http\Request;

class LicenseController extends Controller
{
    public function index()
    {
        $license = License::all();

        return response()->json(['license' => $license], 200);
    }
    public function search(Request $request)
    {
        $license = License::where('CABANG_CODE', $request->CABANG_CODE)->get();

        return response()->json(['license' => $license], 200);
    }

}
