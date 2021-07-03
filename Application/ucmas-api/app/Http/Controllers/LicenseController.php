<?php

namespace App\Http\Controllers;

use App\Models\License;
use Illuminate\Http\Request;

class LicenseController extends Controller
{
    public function search(Request $request)
    {
        $license = License::where('CABANG_CODE', $request->CABANG_CODE)->first();

        return response()->json(['cabang' => $license], 200);
    }

}
