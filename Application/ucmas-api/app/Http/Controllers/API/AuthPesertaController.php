<?php

namespace App\Http\Controllers\API;

use App\Models\License;
use App\Models\Peserta;
use App\Models\Kompetisi;
use Illuminate\Http\Request;
use App\Models\PesertaKompetisi;
use App\Models\ParameterKompetisi;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class AuthPesertaController extends Controller
{
    public function register(Request $request)
    {
        $data = $request->validate([
            'ID_PESERTA' => 'required|string|max:10',
            'NAMA_PESERTA' => 'required|string|max:50',
            'JENIS_KELAMIN' => 'required|string|max:1',
            'TEMPAT_LAHIR' => 'required|string|max:50',
            'TANGGAL_LAHIR' => 'required',
            'ALAMAT_PESERTA' => 'required',
            'SEKOLAH_PESERTA' => 'string',
            'NO_TELP_PESERTA' => 'string',
            'EMAIL_PESERTA' => 'required|email|unique:tb_peserta,EMAIL_PESERTA',
            'IS_USMAS' => 'string|max:1',
            'PASSWORD_PESERTA' => 'required|string',
            'CABANG_CODE' => 'required|string|max:10',
            'ENTRY_USER' => 'string',
            'UPDATE_USER' => 'string',
        ]);

        $peserta = Peserta::create([
            'ID_PESERTA' => $data['ID_PESERTA'],
            'NAMA_PESERTA' => $data['NAMA_PESERTA'],
            'JENIS_KELAMIN' => $data['JENIS_KELAMIN'],
            'TEMPAT_LAHIR' => $data['TEMPAT_LAHIR'],
            'TANGGAL_LAHIR' => $data['TANGGAL_LAHIR'],
            'ALAMAT_PESERTA' => $data['ALAMAT_PESERTA'],
            'SEKOLAH_PESERTA' => $data['SEKOLAH_PESERTA'],
            'NO_TELP_PESERTA' => $data['NO_TELP_PESERTA'],
            'EMAIL_PESERTA' => $data['EMAIL_PESERTA'],
            'IS_USMAS' => $data['IS_USMAS'],
            'PASSWORD_PESERTA' => Hash::make($data['PASSWORD_PESERTA']),
            'CABANG_CODE' => $data['CABANG_CODE'],
            'ENTRY_USER' => $data['ENTRY_USER'],
            'ENTRY_DATE' => now(),
            'UPDATE_USER' => $data['UPDATE_USER'],
            'UPDATE_DATE' => now(),
        ]);

        $token = $peserta->createToken('UcmasToken')->plainTextToken;

        $response = [
            'peserta' => $peserta,
            'token' => $token
        ];

        return response()->json($response, 201);
    }

    public function logout(Request $request)
    {
        $request->user()->currentAccessToken()->delete();
    }

    public function login(Request $request)
    {
        $data = $request->validate([
            'ID_PESERTA' => 'required|string|max:20',
            'PASSWORD_PESERTA' => 'required|string',
            'CABANG_CODE' => 'required|string'
        ]);

        $today = now();
        $license = License::where('CABANG_CODE', $data['CABANG_CODE'])
                ->whereDate('DATEFROM','<=', $today)
                ->whereDate('DATETO','>=', $today)
                ->get();

        if($license->isEmpty())
        {
            return response(['message' => 'License not valid'], 400);
        }

        $pesertaKompetisi = PesertaKompetisi::where('ID_PESERTA', $data['ID_PESERTA'])->get();

        if($pesertaKompetisi->isEmpty())
        {
            return response(['message' => 'Peserta tidak terdaftar kompetisi'], 400);
        }

        $row_id_peserta = [];
        foreach ($pesertaKompetisi as $rowid){
            $row_id_peserta[] = $rowid->ROW_ID_KOMPETISI;
        }

        $kompetisi = Kompetisi::where('CABANG_CODE', $data['CABANG_CODE'])
                ->whereIn('ROW_ID', $row_id_peserta)
                ->where('TANGGAL_KOMPETISI', date('Y-m-d'))
                ->where('JAM_MULAI','<=', date('His'))
                ->where('JAM_SAMPAI','>=', date('His'))
                ->get();

        if($kompetisi->isEmpty())
        {
            return response(['message' => 'Tidak ada jadwal kompetisi peserta'], 400);
        }

        $parameterkomp = ParameterKompetisi::whereIn('ROW_ID_KOMPETISI', $row_id_peserta)->get();
        //date('Y-m-d') date('His')
        /* return response()->json(['message' => 'OK',
                                 'data' => $kompetisi], 200); */

        $peserta = Peserta::where('ID_PESERTA', $data['ID_PESERTA'])->first();

        if(!$peserta || !Hash::check($data['PASSWORD_PESERTA'], $peserta->PASSWORD_PESERTA))
        {
            return response(['message' => 'Invalid Credentials'], 400);
        }
        else
        {
            $token = $peserta->createToken('UcmasTokenLogin')->plainTextToken;
            //$peserta->ID_PESERTA = $data['ID_PESERTA'];
            $peserta->PASSWORD_PESERTA = $data['PASSWORD_PESERTA'];

            $response = [
                'peserta' => $peserta,
                'kompetisi' => $kompetisi,
                'parameterkompetisi' => $parameterkomp,
                'token' => $token
            ];

            return response()->json($response, 200);
        }
    }

    public function changepassword(Request $request)
    {
        $data = $request->validate([
            'ID_PESERTA' => 'required|string|max:20',
            'PASSWORD_PESERTA' => 'required|string',
        ]);

        $peserta = Peserta::where('ID_PESERTA', $data['ID_PESERTA'])->first();
        $peserta->PASSWORD_PESERTA = bcrypt($data['PASSWORD_PESERTA']);

        $peserta->save();

        return response(['message' => 'Change password success'], 200);
    }
}
