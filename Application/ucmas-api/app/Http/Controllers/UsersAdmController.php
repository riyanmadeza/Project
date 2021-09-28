<?php

namespace App\Http\Controllers;

use App\Models\UsersAdm;
use Illuminate\Http\Request;
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
            
            return response()->json(['data' => $user], 200);
        }

        $output[] = [
            'message' => 'ID Siswa atau password salah.',
        ];
        return response(['data' => $output], 400);
    }
}
