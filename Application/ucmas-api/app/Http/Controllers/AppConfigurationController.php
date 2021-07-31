<?php

namespace App\Http\Controllers;

use App\Models\AppConfiguration;
use Illuminate\Http\Request;

class AppConfigurationController extends Controller
{
    public function index()
    {
        $appconfig = AppConfiguration::all();

        return response()->json(['config' => $appconfig], 200);
    }
    public function search(Request $request)
    {
        $appconfig = AppConfiguration::where('CONFIG_CODE', $request->CONFIG_CODE)
                                    ->where('CABANG_CODE', $request->CONFIG_CODE)
                                    ->get();

        return response()->json(['config' => $appconfig], 200);
    }
}
