<?php

namespace App\Http\Controllers;

use App\Models\JawabanKompetisi;
use Illuminate\Http\Request;

class JawabanKompetisiController extends Controller
{
    public function input(Request $request)
    {
        $data = $request->validate([
            'ROW_ID_KOMPETISI' => 'required|string|max:20',
            'ID_PESERTA' => 'required|string|max:20',
            'SOAL_NO' => 'required',
            'PERTANYAAN' => 'required',
            'JAWABAN_PESERTA' => 'required',
            'JAWAB_DETIK_BERAPA' => 'required',
            'JAWAB_DATE' => 'required',
            'KUNCI_JAWABAN' => 'required',
            'SCORE_PESERTA' => 'required',
            'ENTRY_USER' => 'string',
            'UPDATE_USER' => 'string',
        ]);

        $peserta = JawabanKompetisi::create([
            'ROW_ID_KOMPETISI' => $data['ROW_ID_KOMPETISI'],
            'ID_PESERTA' => $data['ID_PESERTA'],
            'SOAL_NO' => $data['SOAL_NO'],
            'PERTANYAAN' => $data['PERTANYAAN'],
            'JAWABAN_PESERTA' => $data['JAWABAN_PESERTA'],
            'JAWAB_DETIK_BERAPA' => $data['JAWAB_DETIK_BERAPA'],
            'JAWAB_DATE' => $data['JAWAB_DATE'],
            'KUNCI_JAWABAN' => $data['KUNCI_JAWABAN'],
            'SCORE_PESERTA' => $data['SCORE_PESERTA'],
            'ENTRY_USER' => $data['ENTRY_USER'],
            'ENTRY_DATE' => now(),
            'UPDATE_USER' => $data['UPDATE_USER'],
            'UPDATE_DATE' => now(),
        ]);

        $response = [
            'message' => 'Berhasil input data'
        ];

        return response()->json($response, 201);
    }

    public function jawaban(Request $request)
    {
        $data = $request->validate([
            'ROW_ID_KOMPETISI' => 'required|string',
            'ID_PESERTA' => 'required|string|max:20',
        ]);

        $jawaban = JawabanKompetisi::where('ROW_ID_KOMPETISI', $data['ROW_ID_KOMPETISI'])
                ->where('ID_PESERTA')->get();

        if($jawaban->isEmpty())
        {
            return response(['message' => 'Tidak ada data'], 400);
        }

        $response = [
            'message' => 'data ditemukan',
            'jawaban' => $jawaban
        ];

        return response()->json($response, 200);
    }
}
