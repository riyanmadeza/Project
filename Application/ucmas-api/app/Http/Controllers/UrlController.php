<?php

namespace App\Http\Controllers;

use App\Models\Url;
use Illuminate\Http\Request;

class UrlController extends Controller
{
    public function index()
    {
        $url = Url::all();

        return response()->json(['license' => $url], 200);
    }
    public function search(Request $request)
    {
        $url = Url::where('URL_CODE', $request->URL_CODE)->get();

        return response()->json(['url' => $url], 200);
    }
}
