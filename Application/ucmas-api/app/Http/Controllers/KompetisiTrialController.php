<?php

namespace App\Http\Controllers;

use App\Models\KompetisiTrial;
use App\Models\ParameterKompetisiTrial;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class KompetisiTrialController extends Controller
{
    public function index()
    {
        $jam = (int)date('H') + 7;
        $jamstr = '0' . (string)$jam;
        $time = Str::substr($jamstr, Str::length($jamstr) - 2, 2) . date('is');

        $kompetisi = KompetisiTrial::where('TANGGAL_KOMPETISI', date('Y-m-d'))
                ->where('JAM_MULAI','<=', $time)
                ->where('JAM_SAMPAI','>=', $time)
                ->get();

        if($kompetisi->isEmpty())
        {
            $output[] = [
                'message' => 'Tidak ada jadwal kompetisi peserta',
                'token' => '',
            ];
            return response(['data' => $output], 400);
        }

        $rowid_komp1 = [];
        foreach ($kompetisi as $rowid){
            $rowid_komp1[] = $rowid->ROW_ID;
        }

        $parameterkomp = ParameterKompetisiTrial::whereIn('ROW_ID_KOMPETISI', $rowid_komp1)->get();
        
        $response = [
            'kompetisi' => $kompetisi,
            'parameterkompetisi' => $parameterkomp
        ];

        return response()->json($response, 200);
    }
}
