<?php

namespace App\Http\Controllers;

use App\Models\Dosen;
use Illuminate\Http\Request;

class DosenController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dosens = Dosen::get();
        return view('dosen.index',[
            'dosens' => $dosens
        ]); 
    }

    /** 
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dosen.create');
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
            'nama' => 'required',
            'nidn' => 'required',
            'jenis_kelamin' => 'required',
            'alamat' => 'required',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required',
            'photo' => 'required|file|image', 
        ]);
        $extFile = $request->photo->getClientOriginalExtension();
        $namaFile = "praktikum-".time().".".$extFile; 
        $path = $request->photo->storeAs('img',$namaFile);
        $validate['photo'] = $path;
        dosen::create($validate);
        return redirect()->route('dosen.index')->with('message',"Data Dosen {$validate['nama']} Berhasil Ditambahkan");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Dosen  $dosen
     * @return \Illuminate\Http\Response
     */
    public function show(Dosen $dosen)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Dosen  $dosen
     * @return \Illuminate\Http\Response
     */
    public function edit(Dosen $dosen)
    {
        return view('dosen.edit',[
            'dosen' => $dosen
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Dosen  $dosen
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Dosen $dosen)
    {
        $validate = $request->validate([
            'nama' => 'required',
            'nidn' => 'required',
            'jenis_kelamin' => 'required',
            'alamat' => 'required',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'r   equired',
            'photo' => 'required|file|image', 
        ]);

        $extFile = $request->photo->getClientOriginalExtension();
        $namaFile = "praktikum-".time().".".$extFile; 
        $path = $request->photo->storeAs('img',$namaFile);
        $validate['photo'] = $path;
        Dosen::where('id', $dosen->id)->update($validate);
        return redirect()->route('dosen.index')->with('message',"Data Dosen {$validate['nama']} Berhasil Diubah");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Dosen  $dosen
     * @return \Illuminate\Http\Response
     */
    public function destroy(Dosen $dosen)
    {
        $dosen->delete();
        return redirect()->route('dosen.index')->with('message',"Data Dosen $dosen->nama Berhasil Dihapus");
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