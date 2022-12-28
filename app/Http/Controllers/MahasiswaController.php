<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use Illuminate\Http\Request;

class MahasiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $mahasiswas = Mahasiswa::get();
        return view('mahasiswa.index',[
            'mahasiswas' => $mahasiswas
        ]); 
    }

    /** 
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('mahasiswa.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validate = $request->validate([
            'npm' => 'required',
            'nama' => 'required',
            'jenis_kelamin' => 'required',
            'alamat' => 'required',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required',
            'photo' => 'required|file|image', 
        ]);
        $extFile = $request->photo->getClientOriginalExtension();
        $namaFile = "mahasiswa-".time().".".$extFile; 
        $path = $request->photo->storeAs('img',$namaFile);
        $validate['photo'] = $path;
        Mahasiswa::create($validate);
        return redirect()->route('mahasiswa.index')->with('message',"Data Mahasiswa {$validate['nama']} Berhasil Ditambahkan");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Mahasiswa $mahasiswa
     * @return \Illuminate\Http\Response
     */
    public function show(Mahasiswa $mahasiswa)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Mahasiswa  $mahasiswa
     * @return \Illuminate\Http\Response
     */
    public function edit(Mahasiswa $mahasiswa)
    {
        return view('mahasiswa.edit',[
            'mahasiswa' => $mahasiswa
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Mahasiswa  $mahasiswa
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Mahasiswa $mahasiswa)
    {
        $validate = $request->validate([
            'npm' => 'required',
            'nama' => 'required',
            'jenis_kelamin' => 'required',
            'alamat' => 'required',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required',
            'photo' => 'required|file|image', 
        ]);

        $extFile = $request->photo->getClientOriginalExtension();
        $namaFile = "mahasiswa-".time().".".$extFile; 
        $path = $request->photo->storeAs('img',$namaFile);
        $validate['photo'] = $path;
        Mahasiswa::where('id', $mahasiswa->id)->update($validate);
        return redirect()->route('mahasiswa.index')->with('message',"Data Mahasiswa {$validate['nama']} Berhasil Diubah");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Mahasiswa  $mahasiswa
     * @return \Illuminate\Http\Response
     */
    public function destroy(mahasiswa $mahasiswa)
    {
        $mahasiswa->delete();
        return redirect()->route('mahasiswa.index')->with('message',"Data Mahasiswa $mahasiswa->nama Berhasil Dihapus");
    }
}






   // echo $request->namadosen;
        // tidak perlu $_POST cukup pake request
        // echo '<br>';
        // echo $request->nidn;
        // echo '<br>';
        // echo $request->jeniskelamindosen;
        // echo '<br>';
        // echo $request->alamatdosen;
        // echo '<br>';
        // echo $request->tempatlahirdosen;
        // echo '<br>';
        // echo $request->tgldosen;