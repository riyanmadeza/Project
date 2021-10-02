<?php

namespace App\Http\Controllers;

use App\Models\KompetisiTrial;
use App\Models\ParameterKompetisiTrial;
use App\Models\UsersAdm;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

class UsersAdmController extends Controller
{
    public function search(Request $request)
    {
        $input = $request->all();

        $this->validate($request, [
            'id_siswa' => 'required',
            'password' => 'required',
        ]);

        $user = UsersAdm::where('id_siswa',$input['id_siswa'])->first();
        
        if (!$user){
            $output[] = [
                'message' => 'ID Siswa atau password salah.',
            ];
            return response(['data' => $output], 400);
        }
        
        if (Hash::check($input['password'], $user->password)) {
            
            $Data[] = [
                'id' => $user->id,
                'id_siswa' => $user->id_siswa,
                'name' => $user->name,
                'email' => $user->email,
                'profile' => $user->profile,
                'phone' => $user->phone,
                'address' => $user->address,
                'dob' => $user->dob,
                'is_active' => $user->is_active,
            ];

            /*$jam = (int)date('H') + 7;
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
                'data' => $Data,
                'kompetisi' => $kompetisi,
                'parameterkompetisi' => $parameterkomp
            ];

            return response()->json($response, 200);*/

            return response()->json(['data' => $Data], 200);
        }

        $output[] = [
            'message' => 'ID Siswa atau password salah.',
        ];
        return response(['data' => $output], 400);
    }
}
