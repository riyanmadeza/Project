<?php

namespace App\Http\Controllers;

use App\Models\KompetisiTrial;
use App\Models\ParameterKompetisiTrial;
use App\Models\Peserta;
use App\Models\PesertaKompetisiTrial;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

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
        $kompetisiTrial = [];
        $DataPeserta = [];
        
        $pesertaKompetisi = PesertaKompetisiTrial::where('ID_PESERTA', $data['ID_PESERTA'])->get();
        $peserta = Peserta::where('ID_PESERTA', $data['ID_PESERTA'])->first();
            
        $jam = (int)date('H') + 7;
        $jamstr = '0' . (string)$jam;
        $time = Str::substr($jamstr, Str::length($jamstr) - 2, 2) . date('is');
        
        $kompetisiTrial = KompetisiTrial::where('tb_kompetisi_trial.CABANG_CODE', $data['CABANG_CODE'])
                ->where('tb_kompetisi_trial.TANGGAL_KOMPETISI', '<=', date('Y-m-d'))
                ->where('tb_kompetisi_trial.TANGGAL_SELESAI_TRIAL', '>=', date('Y-m-d'))
                ->where('tb_kompetisi_trial.JAM_MULAI','<=', $time)
                ->where('tb_kompetisi_trial.JAM_SAMPAI','>=', $time)
                ->leftJoin('tb_peserta_kompetisi_trial', 'tb_kompetisi_trial.ROW_ID', '=', 'tb_peserta_kompetisi_trial.ROW_ID_KOMPETISI')
                ->where('tb_peserta_kompetisi_trial.ID_PESERTA', '=', NULL)
                ->select('tb_kompetisi_trial.*')
                ->get();
        
        if($pesertaKompetisi->isEmpty())
        {
            $kompetisi = $kompetisiTrial;
            

            $DataPeserta[] = [
                'ID_PESERTA' => 'TRL000000001',
                'NAMA_PESERTA' => 'Peserta Trial',
                'JENIS_KELAMIN' => '-',
                'TEMPAT_LAHIR' => '-',
                'TANGGAL_LAHIR' => '-',
                'ALAMAT_PESERTA' => '-',
                'SEKOLAH_PESERTA' => '-',
                'NO_TELP_PESERTA' => '-',
                'EMAIL_PESERTA' => '-',
                'IS_USMAS' => 'N',
                'PASSWORD_PESERTA' => $data['PASSWORD_PESERTA'],
                'CABANG_CODE' => $data['CABANG_CODE'],
                'ENTRY_USER' => '-',
                'ENTRY_DATE' => '-',
                'UPDATE_USER' => '-',
                'UPDATE_DATE' => '-',
            ];

        }else{
            
            foreach ($pesertaKompetisi as $rowid){
                $rowid_komp[] = $rowid->ROW_ID_KOMPETISI;
            }            

            if(!$peserta || !Hash::check($data['PASSWORD_PESERTA'], $peserta->PASSWORD_PESERTA))
            {
                $output[] = [
                    'message' => 'Id peserta/Password tidak valid',
                    'token' => '',
                ];
                return response(['data' => $output], 400);
            }
            
            $kompetisi1 = KompetisiTrial::where('tb_kompetisi_trial.CABANG_CODE', $data['CABANG_CODE'])
                ->whereIn('tb_kompetisi_trial.ROW_ID', $rowid_komp)
                ->where('tb_kompetisi_trial.TANGGAL_KOMPETISI', '<=', date('Y-m-d'))
                ->where('tb_kompetisi_trial.TANGGAL_SELESAI_TRIAL', '>=', date('Y-m-d'))
                ->where('tb_kompetisi_trial.JAM_MULAI','<=', $time)
                ->where('tb_kompetisi_trial.JAM_SAMPAI','>=', $time)
                ->leftJoin('tb_peserta_kompetisi_trial', 'tb_kompetisi_trial.ROW_ID', '=', 'tb_peserta_kompetisi_trial.ROW_ID_KOMPETISI')
                ->select("tb_kompetisi_trial.*")
                ->get();
            
            $kompetisi = $kompetisiTrial->merge($kompetisi1);
            
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
                'PASSWORD_PESERTA' => $data['PASSWORD_PESERTA'],
                'CABANG_CODE' => $peserta->CABANG_CODE,
                'ENTRY_USER' => $peserta->ENTRY_USER,
                'ENTRY_DATE' => $peserta->ENTRY_DATE,
                'UPDATE_USER' => $peserta->UPDATE_USER,
                'UPDATE_DATE' => $peserta->UPDATE_DATE,
            ];
        }

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
        
        $output[] = [
            'message' => 'Berhasil login',
            'token' => '',
        ];

        $response = [
            'data' => $output,
            'peserta' => $DataPeserta,
            'kompetisi' => $kompetisi,
            'parameterkompetisi' => $parameterkomp
        ];

        return response()->json($response, 200);
    }
}
