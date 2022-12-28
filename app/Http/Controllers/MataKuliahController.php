<?php

namespace App\Http\Controllers;

use App\Models\MataKuliah;
use Illuminate\Http\Request;

class MataKuliahController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $matakuliahs = MataKuliah::get();
        return view('matakuliah.index',[
            'matakuliahs' => $matakuliahs
        ]); 
    }

    /** 
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('matakuliah.create');
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
            'kode_mk' => 'required',
            'nama_mk' => 'required'
        ]);
        MataKuliah::create($validate);
        return redirect()->route('matakuliah.index')->with('message',"Data Mata Kuliah {$validate['nama_mk']} Berhasil Ditambahkan");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\MataKuliah  $mataKuliah
     * @return \Illuminate\Http\Response
     */
    public function show(MataKuliah $mataKuliah)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\MataKuliah $matakuliah
     * @return \Illuminate\Http\Response
     */
    public function edit(MataKuliah$matakuliah)
    {
        return view('matakuliah.edit',[
            'matakuliah' => $matakuliah
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Matakuliah  $matakuliah
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Matakuliah $matakuliah)
    {
        $validate = $request->validate([
            'kode_mk' => 'required',
            'nama_mk' => 'required',
        ]);

        MataKuliah::where('id', $matakuliah->id)->update($validate);
        return redirect()->route('matakuliah.index')->with('message',"Data Mata Kuliah {$validate['nama_mk']} Berhasil Ditambahkan");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\MataKuliah  $matakuliah
     * @return \Illuminate\Http\Response
     */
    public function destroy(MataKuliah $matakuliah)
    {
        $matakuliah->delete();
        return redirect()->route('matakuliah.index')->with('message',"Data matakuliah $matakuliah->nama_mk Berhasil Dihapus");
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