<?php

namespace App\Http\Controllers;

//use App\Models\Siswa;
use Illuminate\Http\Request;

class PesertaController extends Controller
{
    /* public function index()
    {
        $siswa = Siswa::all();

        return response()->json(['Siswas' => $siswa], 200);
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_siswa' => ['required'],
            'nama_siswa' => ['required'],
            'jns_kelamin' => ['required', 'in:Laki-laki,Perempuan'],
            'tmpt_lahir' => ['required'],
            'tgl_lahir' => ['required'],
            'alamat' => ['required']
        ]);
        $siswa = new Siswa;        
        $siswa->id_siswa = $request->id_siswa;
        $siswa->nama_siswa = $request->nama_siswa;
        $siswa->jns_kelamin = $request->jns_kelamin;
        $siswa->tmpt_lahir = $request->tmpt_lahir;
        $siswa->tgl_lahir = $request->tgl_lahir;
        $siswa->alamat = $request->alamat;
        $siswa->save();

        return response()->json(['message' => 'Siswa added Successful'], 200);
    } */
}
