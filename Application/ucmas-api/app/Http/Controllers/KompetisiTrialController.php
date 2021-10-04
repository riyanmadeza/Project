<?php

namespace App\Http\Controllers;

use App\Models\KompetisiTrial;
use App\Models\ParameterKompetisiTrial;
use App\Models\Peserta;
use App\Models\PesertaKompetisiTrial;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

class KompetisiTrialController extends Controller
{
    public function search(Request $request)
    {
        $data = $request->validate([
            'ID_PESERTA' => '',
            'PASSWORD_PESERTA' => '',
            'CABANG_CODE' => 'required|string'
        ]);

        $rowid_komp = [];
        $kompetisi = [];
        $DataPeserta = [];
        $pesertaKompetisi = PesertaKompetisiTrial::where('ID_PESERTA', $data['ID_PESERTA'])->get();
        $peserta = Peserta::where('ID_PESERTA', $data['ID_PESERTA'])->first();

        $jam = (int)date('H') + 7;
        $jamstr = '0' . (string)$jam;
        $time = Str::substr($jamstr, Str::length($jamstr) - 2, 2) . date('is');

        if($pesertaKompetisi->isEmpty())
        {
            $kompetisi = KompetisiTrial::where('CABANG_CODE', $data['CABANG_CODE'])
                ->where('TANGGAL_KOMPETISI', '<=', date('Y-m-d'))
                ->where('TANGGAL_SELESAI_TRIAL', '>=', date('Y-m-d'))
                ->where('JAM_MULAI','<=', $time)
                ->where('JAM_SAMPAI','>=', $time)
                ->get();

            $DataPeserta[] = [
                'ID_PESERTA' => null,
                'NAMA_PESERTA' => 'Peserta Trial',
                'JENIS_KELAMIN' => null,
                'TEMPAT_LAHIR' => null,
                'TANGGAL_LAHIR' => null,
                'ALAMAT_PESERTA' => null,
                'SEKOLAH_PESERTA' => null,
                'NO_TELP_PESERTA' => null,
                'EMAIL_PESERTA' => null,
                'IS_USMAS' => 'N',
                'CABANG_CODE' => $data['CABANG_CODE'],
            ];

        }else{
            
            foreach ($pesertaKompetisi as $rowid){
                $rowid_komp[] = $rowid->ROW_ID_KOMPETISI;
            }            

            if(!$peserta || !Hash::check($data['PASSWORD_PESERTA'], $peserta->PASSWORD_PESERTA))
            {
                $output[] = [
                    'message' => 'Id peserta/Password tidak valid',
                ];
                return response(['data' => $output], 400);
            }

            $kompetisi = KompetisiTrial::where('CABANG_CODE', $data['CABANG_CODE'])
                ->whereIn('ROW_ID', $rowid_komp)
                ->where('TANGGAL_KOMPETISI', '<=', date('Y-m-d'))
                ->where('TANGGAL_SELESAI_TRIAL', '>=', date('Y-m-d'))
                ->where('JAM_MULAI','<=', $time)
                ->where('JAM_SAMPAI','>=', $time)
                ->get();

            $DataPeserta[] = [
                'ID_PESERTA' => $data['ID_PESERTA'],
                'NAMA_PESERTA' => $peserta->NAMA_PESERTA,
                'JENIS_KELAMIN' => $peserta->JENIS_KELAMIN,
                'TEMPAT_LAHIR' => $peserta->TEMPAT_LAHIR,
                'TANGGAL_LAHIR' => $peserta->TANGGAL_LAHIR,
                'ALAMAT_PESERTA' => $peserta->ALAMAT_PESERTA,
                'SEKOLAH_PESERTA' => $peserta->SEKOLAH_PESERTA,
                'NO_TELP_PESERTA' => $peserta->NO_TELP_PESERTA,
                'EMAIL_PESERTA' => $peserta->EMAIL_PESERTA,
                'IS_USMAS' => $peserta->IS_USMAS,
                'CABANG_CODE' => $peserta->CABANG_CODE,
            ];
        }

        if($kompetisi->isEmpty())
        {
            $output[] = [
                'message' => 'Tidak ada jadwal kompetisi peserta',
            ];
            return response(['data' => $output], 400);
        }

        $rowid_komp1 = [];
        foreach ($kompetisi as $rowid){
            $rowid_komp1[] = $rowid->ROW_ID;
        }

        $parameterkomp = ParameterKompetisiTrial::whereIn('ROW_ID_KOMPETISI', $rowid_komp1)->get();
        
        $response = [
            'peserta' => $DataPeserta,
            'kompetisi' => $kompetisi,
            'parameterkompetisi' => $parameterkomp
        ];

        return response()->json($response, 200);
    }
}
